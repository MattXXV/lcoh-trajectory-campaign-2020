<?php
/**
 * Template Name: Homepage 2018
 */ ?>
<?php get_header(); ?>
<section id="over-banner"></section>
<!--<section id="home-banner">
	<div class="banner-text">
	<?php if (function_exists('the_field')) {
			the_field('masthead_box'); 
		  } ?>
	</div>
</section>-->

<!-- Home text content -->
<section id="content" role="main">
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

<footer id="home-footer" class="bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<div class="contact">
					There is HOPE. <br />
					<strong><a href="tel:15135364673">513-536-HOPE (4673)</a></strong><br />
					4075 Old Western Row Rd, Mason, OH 45040
				</div>
			</div>
            <div class="col-sm-2">
                <div class="text-center review">
                    <!-- Review Us -->
                    <a href="https://reviewlead.com/lindnercenter/" class="reviewmgr-button" data-content="Review Us" data-replace="true">Review Us</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.reviewmgr.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "reviewmgr-wjs");</script>
                </div>
            </div>
			<div class="col-sm-5">
				<div class="logos">
					<div class="row">
						<div class="col-xs-4 col-md-3 col-md-offset-3">
							<a href="https://www.cincinnatichildrens.org/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-cchmc.png" class="footer-logo" alt="Cincinnati Children's Hospital Medical Center" /></a>
						</div>
						<div class="col-xs-4 col-md-3">
							<a href="http://uc.edu" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-uc.png" class="footer-logo" alt="University of Cincinnati" /></a>
						</div>
						<div class="col-xs-4 col-md-3">
							<a href="http://nndc.org/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-nndc.png" class="footer-logo" alt="National Network of Depression Centers" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="modal fade" tabindex="-1" id="tourmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Virtual Tour</h4>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode("[metaslider id=2416]"); ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php get_footer(); ?>