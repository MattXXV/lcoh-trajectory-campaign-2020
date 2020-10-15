<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section id="clinicianhead" >
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
				<div class="col-sm-offset-1 col-sm-2 col-sm-3 clinicianphotocol">
					<div class="photo-wrap"><img src="<?php the_field('clinician_photo'); ?>" alt="<?php the_title(); ?>" class="clinician_photo" /></div>
				</div>
				<div class="col-sm-9 cliniciantextcol">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<p><?php the_field('clinician_summary'); ?></p>
				</div>
			</div>
		</div>
	</div>
	
</section>
<section id="content" class="" role="main">
	<div class="container clinician-container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php echo $breadcrumbs; ?>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<?php get_template_part( 'entry','clinician' ); ?>
				<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
			</div>
			<div class="col-md-4 sidebar">
				<?php the_field('right_side_content'); ?>
			</div>
			
		</div>
		
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php //get_template_part( 'nav', 'below-single' ); ?>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>