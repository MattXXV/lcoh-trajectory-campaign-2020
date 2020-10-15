<?php
/**
 * Template Name: Wider Content
 */ ?>
<?php get_header(); ?>
<section id="content" role="main" class="spaced">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!--<header class="header">
						<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
					</header>-->
					<section class="entry-content">
						<?php the_content(); ?>
					</section>
				</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>