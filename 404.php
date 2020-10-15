<?php get_header(); ?>
<section id="content" class="spaced" role="main">
	<div class="container">
		<!--<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php echo $breadcrumbs; ?>
			</div>
		</div>-->
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<header class="header">
				<?php the_post(); ?>
				<h1 class="entry-title"><?php _e( 'Oops.', 'blankslate' ); ?></h1>
				</header>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<h2>We couldn't find 	what you were looking for.</h2>
				<p>We recently redesigned our website and the page you're looking for may have moved, so try the search box below.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>