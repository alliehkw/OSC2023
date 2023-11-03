<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">
					<div class="grid-container">
						<div class="inner-footer form grid-x grid-padding-x">
							<div class="small-12 cell">
								<h2>Subscribe to receive updates from OSC!</h2>
								<?php the_widget( 'Footer Form' ); ?>
								<?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]'); ?>
							</div>
						</div>
					</div>
					<div class="grid-container">
						<div class="inner-footer grid-x grid-padding-x">
		    				<div class="small-12 medium-4 cell">
								<div class="sm-links">
									<?php $fb = get_field('facebook_link', 'options'); $twitter = get_field('twitter_link', 'options'); $insta = get_field('instagram_link', 'options'); $linkedin = get_field('linkedin_link', 'options'); ?>
									<?php if($linkedin) : ?>
										<a href="<?php echo $linkedin ?>" title="linkedin" target="_blank">LinkedIn</a>
									<?php endif; ?>
									<?php if($twitter) : ?>
										<a href="<?php echo $twitter ?>" title="twitter" target="_blank">Twitter</a>
									<?php endif; ?>
									<?php if($fb) : ?>
										<a href="<?php echo $fb ?>" title="facebook" target="_blank">Facebook</a>
									<?php endif; ?>
									<?php if($insta) : ?>
										<a href="<?php echo $insta ?>" title="instagram" target="_blank">Instagram</a>
									<?php endif; ?>
								</div>
								
		    				</div>
							
							<div class="small-12 medium-12 large-12 cell">
								<div class="footer-image">
									<a href="<?php echo home_url(); ?>"><img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-2.svg ?>"/></a>
								</div>
								<nav role="navigation" class="footer-nav">
									<div class="left-footer">
										<!-- TO DO : add in contact info into footer under Theme Settings -->
										<?php $contact_info = get_field('contact_info', 'options'); 
										echo $contact_info; ?>
									</div>
									<div class="right-footer">
										<div class="footer-right-column">
											<?php joints_footer_right_1_links(); ?>
											<?php joints_footer_right_2_links(); ?>
											<?php joints_footer_right_3_links(); ?>
											<?php joints_footer_right_4_links(); ?>
										</div>
									</div>
		    					</nav>
								<div class="bottom-footer">
									<!-- TO DO : hook up privacy policy link!!! -->
									<div class="fine-print">
										<p class="source-org copyright">&copy; <?php echo date('Y'); ?> Spokane Orthopedic Care | Orthopedic Specialists in Spokane.</p>
									</div>
									<div class="privacy-policy">
										<?php $privacy_policy = get_field('privacy_policy', 'options'); 
										echo '<a target="_blank" href=' . $privacy_policy['url'] . ')>Privacy Policy</a>' ?>
									</div>
								</div>
							</div>
						
						</div> <!-- end #inner-footer -->
					</div>
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->