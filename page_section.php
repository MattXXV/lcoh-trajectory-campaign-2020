<?php
/**
 * Template Name: Section Page with Subnav
 */ ?>
<?php
global $post;
$page_title = get_the_title();

$image_path = false;
$image = lcoh_get_field('header_photo'); //get_field('header_photo');
$section_title= lcoh_get_field('section_title'); //get_field('header_photo');
if ($section_title == html_entity_decode($page_title)) {
	$section_title = false;
}
if ($image) {
	$image_path = $image['url'];
}

$subnav = lcoh_subnav();
$breadcrumbs = lcoh_breadcrumbs();

?>
<?php get_header(); ?>
<?php if ($image_path) { ?>
<section id="sectionhead" style="background-image: url('<?php echo $image_path; ?>')">
<?php } else { ?>
<section id="sectionhead">
<?php } ?>
	<h1 class="entry-title"><?php if ($section_title) { ?><span><?php echo $section_title; ?></span><?php } ?><?php echo $page_title; ?></h1>
	<?php if ($subnav) { ?>
	<div class="subnav">
		<ul class="nav nav-tabs">
			<?php echo $subnav; ?>
		</ul>
	</div>
	<?php } ?>
	
	
</section>

<!-- Mobile tabs -->
<section id="mobile-tabs">
	<div class="container"
		<div class="row">
			<div class="mobile-tabs-col col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<ul class="nav nav-pills nav-stacked">
					<?php echo $subnav; ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php echo $breadcrumbs; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
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