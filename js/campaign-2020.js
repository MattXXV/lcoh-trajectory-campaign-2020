function startImgRotator() {
  // var imgs = document.querySelectorAll('.rotate-wrap img');
  var rotateTL = gsap.timeline({ repeat: -1});

  rotateTL.to('.r-0', {opacity: 0, duration: .75}, 3.25)
  rotateTL.to('.r-1', {opacity: 1, duration: .75}, 3.25)

  rotateTL.to('.r-1', {opacity: 0, duration: .75}, 6.5)
  rotateTL.to('.r-2', {opacity: 1, duration: .75}, 6.5)

  rotateTL.to('.r-2', {opacity: 0, duration: .75}, 9.75)
  rotateTL.to('.r-3', {opacity: 1, duration: .75}, 9.75)

  rotateTL.to('.r-3', {opacity: 0, duration: .75}, 13)
  rotateTL.to('.r-4', {opacity: 1, duration: .75}, 13)

  rotateTL.to('.r-4', {opacity: 0, duration: .75}, 16.25)
  rotateTL.to('.r-5', {opacity: 1, duration: .75}, 16.25)

  rotateTL.to('.r-5', {opacity: 0, duration: .75}, 19.50)
  rotateTL.to('.r-0', {opacity: 1, duration: .75}, 19.50)

}

var bodyClass = document.querySelector('body');

if(bodyClass.classList.contains('page-id-33014')) {
  startImgRotator();
}


function headerDOM() {
  var body = document.querySelector('body');
  var header = document.querySelector('header');
  var fullHeaderWidth = header.getBoundingClientRect().width;
  var screenWidth = body.getBoundingClientRect().width;
  var siteContainer = 1170;
  var overSpace = screenWidth - 1170;
  var leftHeaderWidth = 0;
  var rightHeaderWidth = 0;
  var leftBanner = document.querySelector('.left-banner.col-xs-5');
  var rightBanner = document.querySelector('.right-banner.col-xs-7');

  if(overSpace > 0) {
    overSpace = overSpace / 2;

    leftHeaderWidth = (1170 * .30) + overSpace + 60;
    rightHeaderWidth = (fullHeaderWidth - leftHeaderWidth) + 30;

    if(leftBanner) {
      console.log('leftBanner True')
      leftBanner.style.width = leftHeaderWidth + 'px';
      rightBanner.style.width = rightHeaderWidth + 'px';
    } else {
      console.log('leftBanner False')
    }


  } else {

  }

}

window.onresize = headerDOM;
headerDOM();
