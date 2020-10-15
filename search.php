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
				<header class="header">
				<?php the_post(); ?>
				<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h1>
				<?php rewind_posts(); ?>
				</header>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
				<?php endwhile; ?>
				<?php get_template_part( 'nav', 'below' ); ?>
			</div>
		</div>
	</div>
	
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>