// Typekit
try{Typekit.load({ async: true });}catch(e){}

// Shorthand for $( document ).ready()
jQuery(function($) {
	"use strict";
    //console.log( "ready!" );

	// Nav button for mobile
	$('.btn-menu').click(function() {
		if($('body').hasClass('menuopen')) {
			$('body').removeClass('menuopen');
			menu_close();
		}
		else {
			$('body').addClass('menuopen');
			menu_open();
		}
	});

	// Scroll based transitions
	$(window).scroll(function(){
		scrollActions();
    });

	scrollActions();

	// Modal Toggle, for virtual tour on homepage
	$('.vc_row.btntour').click(function() {
		$('#tourmodal').modal('show');
	});

	// Modal Toggle for search
	$('.searchopen a').click(function(e) {
		console.log("click searchopen");
		$('#searchmodal').modal('show');
		e.preventDefault();
		return false;
	});


	$('#menu-secondary-campaign-menu li a[href="#the-challenge"]').parent('li').addClass('active');

	// Secondary Nav for Campaign
	$('#menu-secondary-campaign-menu li a').click(function(e) {
		var show_section = $(this).attr('href');
		showChallengeSection(show_section);
	});

	$('#menu-share-your-story-menu li a[href="#make-waves"]').parent('li').addClass('active');

	// Secondary Nav for Campaign
	$('#menu-share-your-story-menu li a').click(function(e) {
		var show_section = $(this).attr('href');
		showStorySection(show_section);
	});

	$('.share-story-tab-button').click(function(e) {
		var show_section = $(this).attr('href');
		showStorySection(show_section);
	});

	//Show section buttons
	$('a.show-section').click(function(e){
		e.preventDefault();
		var btnHref = $(this).attr('href');
		var btnSection = btnHref.substring(btnHref.indexOf('#'));
		showChallengeSection(btnSection);
	});

	$('.lcoh-history .events .event').not('.event2008').hide();
	$('.lcoh-history .event.event2008').addClass('active');
	$('.lcoh-history .year.year2008').addClass('active');
	$('.lcoh-history .timeline .year').not('.disabled').click(function(e){
		if($(this).hasClass('active')){
			// Do Nothing.
		} else {
			var eventName = ".event"+$(this).text();
			$('.event.active').removeClass('active').fadeOut("slow");
			$(eventName).addClass('active').show();
			$(this).siblings('.year').removeClass('active');
			$(this).addClass('active');
		}
	});

	var url = window.location.href;
	var hashIndex = url.indexOf('#');
	if(hashIndex != -1){
		var section = url.substring(hashIndex);
		console.log(section);
		var validSections1 = ['#the-challenge','#about-lcoh','#our-services','#patient-stories'];
		var validSections2 = ['#make-waves','#story-prompts','#submit-your-story','#hear-stories'];
		if(validSections1.indexOf(section) != -1){
			showChallengeSection(section);
		} else if (validSections2.indexOf(section) != -1){
			showStorySection(section);
		}
	}

	// Scroll to flipbook

	$('a[href="#flipbook"]').click(function(e) {
		e.preventDefault();
		var fb = $("#flipbook");
		var fb_pos = fb.position();
		var fb_offset = fb_pos.top;
		$('html, body').animate({scrollTop: fb_offset}, 500, 'swing');
	});

});

function showChallengeSection(section){
	var $ = jQuery;
	var validSections = ['#the-challenge','#about-lcoh','#our-services','#patient-stories'];
	if(validSections.indexOf(section) != -1){
		$('.cpgn-home-section').not(section).slideUp(500);
		$('.cpgn-home-section'+section).slideDown(500);
		var scroll_pos = 521;
		if ($(window).width() < 820) {
			scroll_pos = 422;
		}
		$('html, body').animate({scrollTop: scroll_pos}, 500, 'swing');
		$('.cpgn-secondary-menu').addClass('fixed');
		$('#header').addClass('secondary-fixed');
		$('#the-challenge').addClass('secondary-fixed');
		$('#about-lcoh').addClass('secondary-fixed');
		$('#our-services').addClass('secondary-fixed');
		$('#patient-stories').addClass('secondary-fixed');
		$('#menu-secondary-campaign-menu li').removeClass('active');
		$('#menu-secondary-campaign-menu li a[href="'+section+'"]').parent('li').addClass('active');
	}
}

function showStorySection(section){
	var $ = jQuery;
	var validSections = ['#make-waves','#story-prompts','#submit-your-story','#hear-stories'];
	if(validSections.indexOf(section) != -1){
		$('.cpgn-story-section').not(section).slideUp(500);
		$('.cpgn-story-section'+section).slideDown(500);
		var scroll_pos = 521;
		if ($(window).width() < 820) {
			scroll_pos = 273;
		}
		$('html, body').animate({scrollTop: scroll_pos}, 500, 'swing');
		$('.cpgn-secondary-menu').addClass('fixed');
		$('#header').addClass('secondary-fixed');
		$('#make-waves').addClass('secondary-fixed');
		$('#story-prompts').addClass('secondary-fixed');
		$('#submit-your-story').addClass('secondary-fixed');
		$('#hear-stories').addClass('secondary-fixed');
		$('#menu-share-your-story-menu li').removeClass('active');
		$('#menu-share-your-story-menu li a[href="'+section+'"]').parent('li').addClass('active');
	}
}

function scrollActions() {
	"use strict";
	var secondary_nav_pos = 520;
	var $ = jQuery;
	if ($(document).scrollTop() > 100) {
		$('body').addClass("scrolled");
		if(!$('body').hasClass('campaign')){
			$('#desktop-menu').fadeOut();
		}
	}
	else {
		$('body').removeClass("scrolled");
		if(!$('body').hasClass('campaign')){
			$('#desktop-menu').slideDown();
		}
	}
	if ($(window).width() < 820) {
		if($('body').hasClass('page-share-your-story')){
			secondary_nav_pos = 272;
		} else {
			secondary_nav_pos = 422;
		}
	}
	if ($(document).scrollTop() > secondary_nav_pos) {
		if($('body').hasClass('campaign')){
			$('.cpgn-secondary-menu').addClass('fixed');
			$('#header').addClass('secondary-fixed');
			$('#the-challenge').addClass('secondary-fixed');
			$('#about-lcoh').addClass('secondary-fixed');
			$('#our-services').addClass('secondary-fixed');
			$('#patient-stories').addClass('secondary-fixed');
			$('#make-waves').addClass('secondary-fixed');
			$('#story-prompts').addClass('secondary-fixed');
			$('#submit-your-story').addClass('secondary-fixed');
			$('#hear-stories').addClass('secondary-fixed');
		}
	} else {
		if($('body').hasClass('campaign')){
			$('.cpgn-secondary-menu').removeClass('fixed');
			$('#header').removeClass('secondary-fixed');
			$('#the-challenge').removeClass('secondary-fixed');
			$('#about-lcoh').removeClass('secondary-fixed');
			$('#our-services').removeClass('secondary-fixed');
			$('#patient-stories').removeClass('secondary-fixed');
			$('#make-waves').removeClass('secondary-fixed');
			$('#story-prompts').removeClass('secondary-fixed');
			$('#submit-your-story').removeClass('secondary-fixed');
			$('#hear-stories').removeClass('secondary-fixed');
		}
	}

}


function menu_open() {
	"use strict";
	var $ = jQuery;
	$('#mobile-nav').fadeIn();
}


function menu_close() {
	"use strict";
	var $ = jQuery;
	$('#mobile-nav').fadeOut();
}

//Home Page Video
function bannerVideo() {
  var body = document.querySelector('body');
  var playBttn = document.getElementById('lcoh-video-1');

  var options = {
    id: 327332335,
    background: true
  }
  if(body.classList.contains("page-id-29862")) {

    playBttn.addEventListener('click', function(e) {
      var video = document.querySelector('video');
      video.muted = false;
      console.log('video', video)
    })

  }
}

function vimeoVideo() {
  var body = document.querySelector('body');
  var frame = document.querySelector('iframe');
  frame.setAttribute('allow', 'autoplay');

}

// bannerVideo();
vimeoVideo()
