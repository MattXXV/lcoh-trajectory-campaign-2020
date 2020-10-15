<?php
/** Renders a button **/
function lcoh_button($atts,$content) {
	extract( shortcode_atts( array(
		'class' => '',
		'href' => '#',
		'target' => '_self',
	), $atts ) );

	return '<a class="btn btn-lcoh '.$class.'" href="'.$href.'" target="'.$target.'">'.$content.'</a>';
}
add_shortcode('lcoh_button','lcoh_button');
add_shortcode('lcoh_btn','lcoh_button');

/** Renders a masonry-style menu **/
function lcoh_masonry($atts) {
	extract( shortcode_atts( array(
		'option' => 'What We Treat'
	), $atts ) );
	$html = '<div class="lcoh_masonry">';
	//return '<p>This is where we will render the masonry grid: '.$atts['option'].'</p>';
	if ($atts['option'] == 'What We Treat') {
		// Hardcoding the IDs of the pages that appear in this menu
		$page_list = array(153,80,154,150,151,152,25339,807,28511);

		// First a row of 3
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[2]).'</div>';
		$html .= '<!-- /masonry row 1 -->';

		// Then a row of
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[3]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[4]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[5]).'</div>';
		$html .= '<!-- /masonry row 2 -->';

		// Finally another row of 3
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[6]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[7]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[8]).'</div>';
		$html .= '<!-- /masonry row 3 -->';
	}
	else if ($atts['option'] == "Treatment Options") {
		// Hardcoding the treatment page ids
		$page_list = array(804,10,23088,805,25313,649,86, 32063, 83);
		// Row of 2
		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0]).'</div>';
		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1]).'</div>';
        $html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[7]).'</div>';
		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[3]).'</div>';
		$html .= '<!-- /masonry row 2 -->';

		// Row of 3
		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[4]).'</div>';
		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[5]).'</div>';
		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[6]).'</div>';
		$html .= '<div class="col-sm-12 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[8]).'</div>';
		$html .= '<!-- /masonry row 3 -->';
	}
	else if ($atts['option'] == "Age Groups") {
		$page_list = array(26212,26213,26214);
		// Row of 3
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1]).'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[2]).'</div>';
		$html .= '<!-- /masonry row 3 -->';
	}
	else if ($atts['option'] == "Treatment Options Secondary") {
		// Hardcoding the treatment page ids
		$page_list = array(811,812,83,29168);
		// Row of 2
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0],'secondary').'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1],'secondary').'</div>';
//		$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[2],'secondary').'</div>';
		$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[3],'secondary').'</div>';
//		$html .= '<div class="col-sm-6 col-md-6 lcoh_masonry_col">'.lcoh_masonry_box($page_list[4],'secondary').'</div>';
		$html .= '<!-- /masonry row 2 -->';
	}
	else if ($atts['option'] == "Child Pages") {
		// Hardcoding the treatment page ids
		global $post;
		$exclude_ids = lcoh_get_exlcluded_pages();
		$children = get_posts(array(
				'post_type' => 'page',
				'posts_per_page' => -1,
				'post_parent' => $post->ID,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'exclude' => implode(',',$exclude_ids),
			));
		$page_list = array();
		foreach($children as $c) {
			$page_list[] = $c->ID;
		}
		$count = count($page_list);

		if ($count == 2) {
			$html .= '<div class="col-sm-6 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0],'children').'</div>';
			$html .= '<div class="col-sm-6 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1],'children').'</div>';
		}
		else if ($count == 4) {
			$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0],'children').'</div>';
			$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1],'children').'</div>';
			$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[2],'children').'</div>';
			$html .= '<div class="col-sm-6 col-md-3 lcoh_masonry_col">'.lcoh_masonry_box($page_list[3],'children').'</div>';
		}
		else if ($count==5) {
			$html .= '<div class="col-sm-6 lcoh_masonry_col">'.lcoh_masonry_box($page_list[0],'children').'</div>';
			$html .= '<div class="col-sm-6 lcoh_masonry_col">'.lcoh_masonry_box($page_list[1],'children').'</div>';
			$html .= '<div class="col-sm-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[2],'children').'</div>';
			$html .= '<div class="col-sm-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[3],'children').'</div>';
			$html .= '<div class="col-sm-4 lcoh_masonry_col">'.lcoh_masonry_box($page_list[4],'children').'</div>';
		}
		else {
			foreach($page_list as $p) {
				$html .= '<div class="col-sm-6 col-md-4 lcoh_masonry_col">'.lcoh_masonry_box($p,'children').'</div>';
			}
		}
	}
	$html .= '</div><!-- /end masonry -->';
	return $html;
}
add_shortcode('lcoh_masonry','lcoh_masonry');


// Utility used by masonry shortcode
function lcoh_masonry_box($post_id,$class='') {
	$page = get_post($post_id);
	$link = get_permalink($post_id);

	$image_id = get_post_thumbnail_id( $post_id );
	if (!empty($image_id)) {
		$image_url = wp_get_attachment_image_src($image_id,'full');
	}
	else {
		$image_url = array(get_stylesheet_directory_uri().'/images/lcoh-header-default.jpg');
	}

	$title = $page->post_title;
	if ($title=='HOPE Center North') {
		$title = $title.' - Addictions Treatment';
	}

	return '<a class="lcoh_masonry_item '.$class.'" href="'.$link.'" style="background-image:url(\''.$image_url[0].'\');"><span>'.$title.'</span></a>';
}


/** Display a Top of Mind Feature **/
function lcoh_top_of_mind_feature($atts) {
	extract( shortcode_atts( array(
		'background' => '',
		'link' => '/',
		'target' => '_self',
		'text' => 'Lindner Center of HOPE',
	), $atts ) );

	if (!empty($atts['image']))
	{
		$image = wp_get_attachment_image_src($atts['image'], 'full', false);
		$image = $image[0];
	}

	$html = '<div class="padded-container"><div class="top-of-mind-feature" style="background-image:url('.$image.')">';
	$html .= '<a href="'.$atts['link'].'" target="'.$atts['target'].'">'.$atts['text'].'</a>';
	$html .= '</div></div>';
	return $html;
}
add_shortcode('lcoh_feature','lcoh_feature');

/** Display Feature **/
function lcoh_feature($atts = [], $content = null, $tag = '') {
	extract( shortcode_atts( array(
		'background' => '',
		'link' => '/',
		'target' => '_self',
		'title' => '',
	), $atts ) );

	$href = $atts['lcoh_link'];
	$href = vc_build_link( $href );

	$title = $atts['title'];

	if (!empty($atts['image']))
	{
		$image = wp_get_attachment_image_src($atts['image'], 'lcoh-feature', false);
		$image = $image[0];
	}

	$html  = '<div class="lcoh-feature">';
	$html .= '<img src="'.$image.'" class="feature-image" />';
	$html .= '<div class="padded-container">';
	$html .= '<h2>'.$title.'</h2>';
	$html .= '<div class="content">'.$content.'</div>';
	$html .= '<a href="'.$href['url'].'" target="'.$href['target'].'">read more&nbsp;<i class="fa fa-angle-double-right"></i></a>';
	$html .= '</div></div>';
	return $html;
}
add_shortcode('lcoh_top_of_mind_feature','lcoh_top_of_mind_feature');



/** Disorder argument is the page ID of a disorder **/
function lcoh_get_clinicians($atts) {
	$atts = shortcode_atts(
	array(
		'disorder' => '',
//		'sibcy' => false,
        'sibcyprimary' => false,
//		'williams' => false,
        'williams_house_team' => false,
		'sibcyspecial' => false,
		'williamsspecial' => false,
		'sibcywilliams' => false,
		'residentialfeatured' => false,
	), $atts );

	$args = array(
		'post_type' => 'lcoh_clinician',
		'posts_per_page' => -1,
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_key' => 'last_name',
	);

	if (!empty($atts['disorder'])) {
		$args['meta_query'] = array(array('key' => 'lcoh_disorder', 'value' => $atts['disorder'],));
	}
//	else if (!empty($atts['sibcy'])) {
//		$args['meta_query'] = array(
//			array(
//				'key' => 'sibcy_house',
//				'value' => 'adultservices',
//				'compare' => 'LIKE'
//				),
//			);
//	}
    else if (!empty($atts['sibcyprimary'])) {
        $args['meta_query'] = array(
            array(
                'key' => 'sibcy_house',
                'value' => 'sibcyprimary',
                'compare' => 'LIKE'
            ),
        );
    }
//	else if (!empty($atts['williams'])) {
//		$args['meta_query'] = array(
//			array(
//				'key' => 'sibcy_house',
//				'value' => 'adolescentservices',
//				'compare' => 'LIKE'
//				),
//			);
//	}
    else if (!empty($atts['williams_house_team'])) {
        $args['meta_query'] = array(
            array(
                'key' => 'williams_house',
                'value' => 'williamsprimary',
                'compare' => 'LIKE'
            ),
        );
    }
//	else if (!empty($atts['sibcyspecial'])) {
//		$args['meta_query'] = array(
//			array(
//				'key' => 'sibcy_house',
//				'value' => 'adultspecialconsultant',
//				'compare' => 'LIKE'
//				),
//			);
//	}
    else if (!empty($atts['sibcyspecial'])) {
        $args['meta_query'] = array(
            array(
                'key' => 'sibcy_house',
                'value' => 'sibcyspecialconsultant',
                'compare' => 'LIKE'
            ),
        );
    }
//	else if (!empty($atts['williamsspecial'])) {
//		$args['meta_query'] = array(
//			array(
//				'key' => 'sibcy_house',
//				'value' => 'adolescentspecialconsultant',
//				'compare' => 'LIKE'
//				),
//			);
//	}
    else if (!empty($atts['williamsspecial'])) {
        $args['meta_query'] = array(
            array(
                'key' => 'williams_house',
                'value' => 'williamsspecialconsultant',
                'compare' => 'LIKE'
            ),
        );
    }
	else if (!empty($atts['residentialfeatured'])) {
		$args['meta_query'] = array(
			array(
				'key' => 'sibcy_house',
				'value' => 'featured',
				'compare' => 'LIKE'
				),
			);
	}


	$clinicians = get_posts($args);

	if (!empty($clinicians)) {
		$output .= '<div class="clinician-container">';
		foreach($clinicians as $c) {
			$output .= lcoh_format_clinician($c);
		}
		$output .= '</div>';
		return $output;
	}
	else {
		return 'no clinicians found';
	}
}
add_shortcode('lcoh_team','lcoh_get_clinicians');


/** Formats a clinician listing for display **/
function lcoh_format_clinician($cpost) {
	$id = $cpost->ID;
	$permalink = get_permalink($id);
	$clinicianphoto = get_field('clinician_photo',$id);
	if (empty($clinicianphoto)) {
		$clinicianphoto = get_stylesheet_directory_uri().'/images/mystery-man.jpg';
	}
	$cliniciansummary = get_field('clinician_summary',$id);

	$output = '<div class="row clinician clinician-mini">';

	$output .= '<div class="col-md-offset-1 col-md-2 col-sm-3 clinicianphotocol"><div class="photo-wrap"><a href="'.$permalink.'"><img src="'.$clinicianphoto.'" alt="'.esc_attr(get_the_title($id)).'" class="clinician_thumbnail" /></a></div>';
	$output .= '</div>';

	$output .= '<div class="col-sm-9 cliniciantextcol">';
	$output .= '<h4><a href="'.$permalink.'">'.get_the_title($id).'</a></h4>';
	$output .= '<p><div class="cliniciansummary">'.$cliniciansummary.'</div></p>';
	$output .= '</div>';
	$output .= '</div><!-- /clinician -->';
	return $output;
}
// Support for old shortcode to list all clinicians
add_shortcode('clinicians_list','lcoh_get_clinicians');


/** List LCOH videos **/
function lcoh_full_video_list($atts,$content){
	$videos = get_posts(array(
		'post_type' => 'lcoh_video',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	));
	if (!empty($videos)) {
		$html = '<div class="video-list-container"><ul class="list-unstyled">';
		foreach($videos as $v) {
			$permalink = get_permalink($v->ID);
  			$html .= '<li><a href="'.$permalink.'">'.$v->post_title.'</a></li>';
		}
		$html .= '</ul></div>';
		return $html;
	}
	else {
		return 'no videos';
	}
}
add_shortcode('video_list','lcoh_full_video_list');


/** Site Search **/
