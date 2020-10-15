		<div class="clear"></div>
		</div>

		<footer id="footer" role="contentinfo">
			<div class="container">
				
				<!-- Removing default footer menu with 'reviews' link -->
				<?php /* wp_nav_menu(array('theme_location'=>'legal-menu','depth'=>1,'container_id'=>'legallinks')); */ ?>
				
				<div id="legallinks" class="menu-legal-links-container"><ul id="menu-legal-links" class="menu"><li id="menu-item-25233" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25233"><a href="/disclaimer/">Disclaimer</a></li>
<li id="menu-item-25235" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25235"><a href="/rights-policies/">Rights &#038; Policies</a></li>
<li id="menu-item-25832" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25832"><a href="/details/residential-mental-health-addiction-treatment/">Residential Guide</a></li>
<li id="menu-item-25833" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25833"><a href="/details/drug-treatment-cincinnati/">Drug Treatment</a></li>
</ul></div>
				
				<br>
				&copy; <?php echo date( 'Y' ); ?> Lindner Center of HOPE. All rights reserved.&nbsp;&nbsp;&bull;&nbsp;&nbsp;4075 Old Western Row Rd, Mason, OH 45040
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