		<div class="clear"></div>
		</div>

		<footer id="footer" role="contentinfo">
			<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-push-8">
							<?php wp_nav_menu(array('theme_location'=>'social-menu','depth'=>1,'container_id'=>'sociallinks')); ?>
<!--                            <div class="lgbtq-flag"><img src="/wp-content/uploads/2019/10/lgbtq-mini.jpg"></div>-->
						</div>
						<div class="col-md-4 col-md-pull-4"><?php wp_nav_menu(array('theme_location'=>'legal-menu','depth'=>1,'container_id'=>'legallinks')); ?></div>
                        <div class="col-md-4 col-md-pull-4 copyright">
                            <p style=""><a href="https://lindnercenterofhope.org/contact-us/#maincampus">Mason, OH 45040</a></p>
                        <br/>
                            <div class="custom-footer-icons">
                            <script src="https://static.legitscript.com/seals/3510554.js"></script>
                                <a class="rehab-logo-link" href="https://www.help.org/drug-and-alcohol-rehab-centers-cleveland-oh/#lin ">  <img class="rehab-logo" src="/wp-content/uploads/2020/03/rehab-logo.png"/></a>
                            </div>
                            <br/>
                            <br/>
                            &copy; <?php echo date( 'Y' ); ?> Lindner Center of HOPE. All rights reserved.
                        </div>
					</div>
			</div>
		</footer>
	</div>

	<div class="modal fade" tabindex="-1" id="searchmodal" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header" style="padding-bottom:0; border-bottom:none;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" style="padding-bottom:0;">Search For</h4>
		  </div>
		  <div class="modal-body">
			<?php get_search_form(); ?>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<?php wp_footer(); ?>
</body>
</html>
