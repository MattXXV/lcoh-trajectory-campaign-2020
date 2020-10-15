<!-- Display for a post summary/excerpt -->
<article id="post-<?php the_ID(); ?>" <?php post_class("excerpt-container"); ?> >
	<div class="row">
		<div class="col-md-5 hidden-sm hidden-xs imagecol" style="background:url('<?php if (has_post_thumbnail()) { the_post_thumbnail_url('large'); } else { echo get_stylesheet_directory_uri().'/images/hope-featured-image.jpg'; } ?>'); background-size:cover; background-position:center center;">
		</div>	
		<div class="col-md-7 textcol">
			<header>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>
			<?php get_template_part( 'entry', ( is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
			<?php //if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
			<?php //if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
		</div>
	</div>
</article>