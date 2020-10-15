<?php
$breadcrumbs = lcoh_breadcrumbs();
?>
<?php get_header(); ?>
<section id="content" class="spaced" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php echo $breadcrumbs; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
			</div>
		</div>
	</div><!-- /.container -->
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>