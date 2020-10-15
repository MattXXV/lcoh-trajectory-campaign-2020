<?php
/**
 * Template Name: Trajectory of Mental Healthcare
 */ ?>
<?php get_header('campaign_2020'); ?>
<section id="content" role="main" class="spaced">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
<?php get_footer('campaign_2020'); ?>
