<?php
define('LCOH_PHONE_TEXT','513-536-HOPE (4673)');
define('LCOH_PHONE_DIGITS','15135364673');
define('RECAPTCHA_PRIVATE_KEY','6Lf9Y0YUAAAAAKGEhEzL2-dXb6bgQy3u_6cwL7Ms');
define('RECAPTCHA_PUBLIC_KEY','6Lf9Y0YUAAAAAGG2YQLk_Kow8_SjoBK-uaUMgxDW');

/** Theme Setup **/
function lcoh_setup()
{
	load_theme_textdomain( 'lcoh', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;

	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'lcoh' ),
			   'utility-menu' => __( 'Utility Menu', 'lcoh' ),
			   'social-menu' => __( 'Social Menu', 'lcoh' ),
			   'legal-menu' => __( 'Legal Menu', 'lcoh' ),

			   'campaign-menu' => __( 'Campaign Menu', 'lcoh' ),
			   'campaign-secondary-menu' => __( 'Campaign Secondary Menu', 'lcoh' ), )
	);

	add_image_size( 'lcoh-feature', 360, 260 );
}
add_action( 'after_setup_theme', 'lcoh_setup' );


/** Enqueue Scripts and CSS **/
function lcoh_load_scripts()
{
	wp_enqueue_script( 'jquery' );
//	wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '2016', true );
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '2020', true );
	wp_enqueue_script( 'lity-js', get_template_directory_uri() . '/js/lity.min.js', array('jquery'), '2019', true );
	wp_enqueue_script( 'custominit', get_template_directory_uri() . '/js/init.js', array('jquery'), '201904', true);
    wp_enqueue_script( 'gsap', "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js", array('jquery'), '201904', false);
    wp_enqueue_script( 'campaign-2020', get_template_directory_uri() . '/js/campaign-2020.js', array('jquery'), '201904', true);
	//wp_enqueue_script( 'captcha', 'https://www.google.com/recaptcha/api.js', array(), '2016', true );

	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array() );
	// Campaign Trajectory 2020 campaign styles
	wp_enqueue_style('campaign-2020', get_template_directory_uri() . '/css/campaign_2020.css');
	wp_enqueue_script( 'typekit', '//use.typekit.net/eeb6qnm.js' );


	$prerequisites = array('bootstrap','fontawesome');
	if (function_exists('vc_map')) {
		$prerequisites[] = 'js_composer_front';
	}
	wp_enqueue_style( 'lcohcss', get_template_directory_uri().'/css/lcoh.css', $prerequisites, '2018.6' );
	wp_enqueue_style( 'lity-css', get_template_directory_uri() . '/css/lity.min.css', array(), '2019');

}

add_action( 'wp_enqueue_scripts', 'lcoh_load_scripts' );


/** Enqueue Admin scripts **/
function lcoh_admin_scripts() {
	//wp_enqueue_style( 'lcoh-admin', get_template_directory_uri().'/css/admin.css', array() );
}
add_action( 'admin_enqueue_scripts', 'lcoh_admin_scripts' );


/** Filter Body Class **/
function lcoh_body_class($classes) {
	if (function_exists('get_field')) {
		if (get_field('short_header')) {
			$classes[] = "lcoh_short_header";
		}
	}
	return $classes;
}
add_filter( 'body_class', 'lcoh_body_class' );


/** Add page slug to body classes 8**/

//Page Slug Body Class
function lcoh_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'lcoh_slug_body_class' );


/** Filter Title Tag **/
function lcoh_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_filter( 'wp_title', 'lcoh_filter_wp_title' );


/** Set Up Widgets **/
function lcoh_widgets_init()
{
	register_sidebar( array (
	'name' => __( 'Sidebar Widget Area', 'lcoh' ),
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'lcoh_widgets_init' );


/** Renders sub-navigation for a page. Shows page's children, if it has children. Otherwise shows its siblings **/
/** Used in some page templates **/
/*function lcoh_subnav() {
	global $post;
	if (!is_page($post)) {
		return false;
	}
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&depth=1");
	if (empty($children) && $post->post_parent) {
		$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&depth=1");
	}
	return $children;
}*/


/** Renders sub-navigation for a page. Shows page's children, if it has children. Otherwise shows its siblings **/
/** Used in some page templates **/
function lcoh_subnav() {
	global $post;
	// Find out which post to use as the subnav root
	if (!function_exists('get_field')) return "";
	$root_id = $post->ID;

	if (!get_field('section_root',$post->ID)) {
		$ancestors = get_ancestors($post->ID,'page');
		foreach($ancestors as $ancestor_id) {
			if (get_field('section_root',$ancestor_id)) {
				$root_id = $ancestor_id;
				break;
			}
		}
	}

	$exclude_ids = lcoh_get_exlcluded_pages();

	return wp_list_pages("title_li=&child_of=".$root_id."&echo=0&depth=1&exclude=".implode(',',$exclude_ids));
}


// Get a list of pages to exclude from auto-generated child lists
function lcoh_get_exlcluded_pages() {
	// Get exclusion list
	$exclude_posts = get_posts(array(
		'numberposts'	=> -1,
		'post_type'		=> 'page',
		'meta_key'		=> 'tab_exclude',
		'meta_value'	=> '1'
	));
	//print_r($exclude_posts);
	$exclude_ids = array();
	foreach($exclude_posts as $p) {
		$exclude_ids[] = $p->ID;
	}
	return $exclude_ids;
}


/** Renders Breadcrumbs **/
function lcoh_breadcrumbs($show_current_page = true) {
	global $post;
	$html = '<ol class="breadcrumb">';
	$html .= '<li><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>';
	if (is_page($post)) {
		$ancestors = get_ancestors($post->ID,'page');
		//print_r($ancestors);
		for($i=count($ancestors)-1; $i>=0; $i--) {
			$ancestor_post = get_post($ancestors[$i]);
			$link = get_permalink($ancestors[$i]);
			$title = $ancestor_post->post_title;
			$html .= '<li><a href="'.$link.'">'.$title.'</a></li>';
		}
	}
	else if (is_home() || is_archive()) {
		$show_current_page = false;
		$posts_page_id = get_option('page_for_posts');
  		$posts_page = get_post($posts_page_id);

		$html .= '<li><a href="/resources/">Resources</a></li>';

		if (is_home()) {
			$html .= '<li class="active">'.$posts_page->post_title.'</li>';
		}
		else if (is_archive()) {
			$html .= '<li class="active">'.get_the_archive_title().'</li>';
		}
	}
	if ($show_current_page) {
		$html .= '<li class="active">'.$post->post_title.'</li>';
	}
	$html .= '</ol>';
	return $html;
}

/** Looks for a custom field. If not found in the current page, looks through ancestors. **/
function lcoh_get_field($field_id,$post_id=false) {
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	if (!function_exists('get_field')) {
		return false;
	}
	$value = get_field($field_id,$post_id);
	if (empty($value)) {
		$looppost = get_post($post_id);
		while ( !empty($looppost->post_parent) && $value == null)
		{
			$value = get_field($field_id,$looppost->post_parent);
			if (empty($value))
				$looppost = get_post($looppost->post_parent);
		}
	}
	return $value;
}

function lcoh_get_phone($numbersonly=false) {
	$override_phone = lcoh_get_field('override_phone');
	if ($numbersonly) {
		if (!empty($override_phone)) {
			return str_replace( array('(',')','-',' ') ,'',$override_phone);
		}
		else {
			return LCOH_PHONE_DIGITS;
		}
	}
	else {
		if (!empty($override_phone)) {
			return $override_phone;
		}
		else {
			return LCOH_PHONE_TEXT;
		}
	}

}

// Restyle the search form
function lcoh_search_form($content) {
	return '<form role="search" method="get" class="search-form" action="'.get_bloginfo('url').'">
				<!--<label for="s">
					<span class="screen-reader-text">Search for:</span>
				</label>-->
				<div class="input-group">
				  <input type="search" class="form-control search-field" placeholder="Search for …" value="" id="s" name="s">
				  <span class="input-group-btn">
					<input type="submit" class="btn btn-primary search-submit" value="Search">
				  </span>
				</div><!-- /input-group -->
			</form>';
}
add_filter('get_search_form','lcoh_search_form');

#Populate Hidden Field
add_filter( 'gform_field_value_initialTrafficSource', 'populate_initialTrafficSource' );
function populate_initialTrafficSource( $value ) {
   return $_COOKIE['initialTrafficSource'];
}

//Send specified Contact Forms to Salesforce
add_action( 'gform_after_submission', 'post_to_salesforce', 10, 2 );

function post_to_salesforce( $entry, $form ) {
    $post_url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8&oid=00DA0000000Yyw4';

	// Initiate vars
	$formId = $form['id'];

	// Array of integrated Contact form IDs
	$integratedContactFormArray = array( 5, 6, 7, 8 );
	$researchContactFormArray = array( 8 );

	if ( in_array($formId, $integratedContactFormArray)){

		if ( in_array($formId, $researchContactFormArray)){
        	// Append Research Interest to the Description/Comments field
          	$formDescription = 'Research Interest: ' . rgar( $entry, '9' ) . ' - Comments: ' . rgar( $entry, '6' );
        }
        else
          $formDescription = rgar( $entry, '6' );

		$body = array(
			'first_name' => rgar( $entry, '1' ),
			'last_name' => rgar( $entry, '2' ),
			'email' => rgar( $entry, '3' ),
			'phone' => rgar( $entry, '4' ),
			'description' => $formDescription,
			'00N0f00000FpfPH' => rgar( $entry, '8' ),
			'00N0f00000FpfTn' => $form['title'],
			);
		GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );

		$request = new WP_Http();
		$response = $request->post( $post_url, array( 'body' => $body ) );
		GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );

	}
}

function campaign_menu() {
    register_nav_menu('campaign-2020',__( 'campaign-2020' ));
}
add_action( 'init', 'campaign_menu' );

require_once 'inc/breadcrumbs.php';
require_once 'inc/recaptcha.php';
require_once 'inc/shortcodes.php';
require_once 'inc/contactform.php';
require_once 'inc/researchform.php';
require_once 'inc/extend-vc.php';
require_once 'inc/mail.php';
