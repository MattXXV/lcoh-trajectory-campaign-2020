<?php
class Breadcrumbs
{
	public static function get_breadcrumbs($echo=true)
	{
		global $post;
		
		// handle non standard pages first
		if (!is_page() &&! is_single())
			return '';
			
		// open and add home link		
		$html = '<ol class="breadcrumb hidden-xs">';
		$html .= '<li><a href="/">UC Health</a></li>';
		
		// If not on main site, add a link to site root
		// echo get_current_blog_id();
		global $blog_id;
		if( $blog_id!==1 ) {
		   $html .= '<li><a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a></li>';
		}
		// handle news
		// handle location
		// handle physician
		
		// handle post
		
		// handle page
		// Simple page based structure
		if (is_page() && !is_front_page())
		{
			$ancestors = get_ancestors($post->ID,'page');
			if (!empty($ancestors))
			{
				for ($i = count($ancestors)-1; $i>=0; $i--)
				{
					$link = get_permalink($ancestors[$i]);
					$title = get_the_title($ancestors[$i]);
					$html .= '<li><a href="'.$link.'">'.$title.'</a></li>';
				}
			}
			
			$title = get_the_title($post->ID);
			$html .= '<li class="active">'.$title.'</li>';
		}
		
		$html .= '</ol>';
		
		if ($echo) echo $html;
		else return $html;
	}
	
}