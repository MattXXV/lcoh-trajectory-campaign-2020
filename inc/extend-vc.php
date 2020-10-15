<?php
if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}


if (function_exists('vc_remove_element'))
{
	//vc_remove_element("vc_widget_sidebar");
	vc_remove_element("vc_wp_search");
	vc_remove_element("vc_wp_meta");
	vc_remove_element("vc_wp_recentcomments");
	vc_remove_element("vc_wp_calendar");
	vc_remove_element("vc_wp_pages");
	vc_remove_element("vc_wp_tagcloud");
	//vc_remove_element("vc_wp_custommenu");
	vc_remove_element("vc_wp_text");
	//vc_remove_element("vc_wp_posts");
	vc_remove_element("vc_wp_links");
	vc_remove_element("vc_wp_categories");
	vc_remove_element("vc_wp_archives");
	vc_remove_element("vc_wp_rss");
	vc_remove_element("vc_teaser_grid");
	vc_remove_element("vc_button");
	vc_remove_element("vc_cta_button");
	vc_remove_element("vc_cta_button2");
	vc_remove_element("vc_message");
	vc_remove_element("vc_tour");
	vc_remove_element("vc_progress_bar");
	vc_remove_element("vc_pie");
	vc_remove_element("vc_posts_slider");
	vc_remove_element("vc_toggle");
	vc_remove_element("vc_images_carousel");
	vc_remove_element("vc_posts_grid");
	vc_remove_element("vc_carousel");
	//vc_remove_element("vc_gmaps");
	vc_remove_element("vc_btn");
	vc_remove_element("vc_cta");
	vc_remove_element("vc_facebook");
	vc_remove_element("vc_twitter");
	vc_remove_element("vc_tweetmeme");
	vc_remove_element("vc_googleplus");
	vc_remove_element("vc_pinterest");
	vc_remove_element("vc_gallery");
	vc_remove_element("vc_flickr");
	vc_remove_element("vc_basic_grid");
	vc_remove_element("vc_media_grid");
	vc_remove_element("vc_masonry_grid");
	vc_remove_element("vc_masonry_media_grid");
	vc_remove_element("vc_icon");
	vc_remove_element("vc_round_chart");
	vc_remove_element("vc_line_chart");
	vc_remove_element("vc_tour");
}



// Map Shortcodes

if (function_exists('vc_map')):

$lcoh_masonry_params = array(
	"name" => "LCOH Masonry Menu",
	"base" => "lcoh_masonry",
	"description" => "Large photo menu with offset menu buttons.",
	"category" => "LCOH",
	"params" => array(
		array(
			"param_name" => "option",
			"type" => "dropdown",
			"heading" => "Which Menu?",
			"value" => array(
				"" => "default",
				"What We Treat" => "What We Treat",
				"Treatment Options" => "Treatment Options",
				"Treatment Options Secondary" => "Treatment Options Secondary",
				"Age Groups" => "Age Groups",
				"Child Pages" => "Child Pages",
			),
		),
	),
);
vc_map( $lcoh_masonry_params );

	
$top_of_mind_params = array(
"name" => "LCOH Top of Mind Feature",
"base" => "lcoh_top_of_mind_feature",
"description" => "Top of Mind box for homepage",
"category" => "Content",
"params" => array(
	array(
		"param_name" => "text",
		"type" => "textfield",
		"holder" => "p",
		"heading" => "Text",
		"value" => "",
	),
	array(
		"param_name" => "link",
		"type" => "textfield",
		"heading" => "Link",
		"value" => "",
	),
	array(
		"param_name" => "image",
		"type" => "attach_image",
		"holder" => "img",
		"heading" => "Image",
		"value" => "",
	),
	array(
		"param_name" => "target",
		"type" => "dropdown",
		"heading" => "Link Target",
		"value" => array(
			"_self" => "_self",
			"_blank" => "_blank",
		),
	),
),
);
vc_map( $top_of_mind_params );

$lcoh_feature_params = array(
"name" => "LCOH Feature",
"base" => "lcoh_feature",
"description" => "LCOH Feature",
"category" => "Content",
"params" => array(
	array(
		'param_name' => 'title',
		'type' => 'textfield',
		'heading' => 'Title',
		'value' => __( '', ''),
		'admin_label' => true,
	),
	array(
		'type' => 'textarea_html',
		'class' => '',
		'heading' => __( 'Short Description', ''),
		'param_name' => 'content',
		'value' => __( '', '')
	),
	array(
		'param_name' => 'image',
		'type' => 'attach_image',
		'heading' => __( 'Image', ''),
		'value' => __( '', '')
	),
	array(
        'type' => 'vc_link',
        'class' => '',
        'heading' => __( 'Post Link', ''),
        'param_name' => 'lcoh_link',
        'value' => __( '', ''),
        'description' => __( 'Link to post', '' ),
     ),
),
);
vc_map( $lcoh_feature_params );


endif; // end shortcode mapping