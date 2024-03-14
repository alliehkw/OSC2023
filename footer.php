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
							<div class="small-12 medium-12 large-12 cell">
								<div class="footer-image">
									<a href="<?php echo home_url(); ?>"><img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-2.svg ?>"/></a>
								</div>
								<nav role="navigation" class="footer-nav">
									<div class="left-footer">
										<?php $contact_info = get_field('contact_info', 'options'); 
										echo $contact_info; ?>
											<div class="sm-links">
												<?php $fb = get_field('facebook_link', 'options'); $twitter = get_field('twitter_link', 'options'); $insta = get_field('instagram_link', 'options'); $linkedin = get_field('linkedin_link', 'options'); ?>
												<?php if($linkedin) : ?>
													<a href="<?php echo $linkedin ?>" title="linkedin" target="_blank">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#003028" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="-31 -31 372.00 372.00" xml:space="preserve" stroke="#003028">
															<g id="SVGRepo_bgCarrier" stroke-width="0">
																<rect x="-31" y="-31" width="372.00" height="372.00" rx="45" fill="#fcfcfc" strokewidth="0"/>
															</g>
															<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
															<g id="SVGRepo_iconCarrier"> <g id="XMLID_801_"> <path id="XMLID_802_" d="M72.16,99.73H9.927c-2.762,0-5,2.239-5,5v199.928c0,2.762,2.238,5,5,5H72.16c2.762,0,5-2.238,5-5V104.73 C77.16,101.969,74.922,99.73,72.16,99.73z"/> <path id="XMLID_803_" d="M41.066,0.341C18.422,0.341,0,18.743,0,41.362C0,63.991,18.422,82.4,41.066,82.4 c22.626,0,41.033-18.41,41.033-41.038C82.1,18.743,63.692,0.341,41.066,0.341z"/> <path id="XMLID_804_" d="M230.454,94.761c-24.995,0-43.472,10.745-54.679,22.954V104.73c0-2.761-2.238-5-5-5h-59.599 c-2.762,0-5,2.239-5,5v199.928c0,2.762,2.238,5,5,5h62.097c2.762,0,5-2.238,5-5v-98.918c0-33.333,9.054-46.319,32.29-46.319 c25.306,0,27.317,20.818,27.317,48.034v97.204c0,2.762,2.238,5,5,5H305c2.762,0,5-2.238,5-5V194.995 C310,145.43,300.549,94.761,230.454,94.761z"/> </g> </g>
														</svg>
													</a>
												<?php endif; ?>
												<?php if($twitter) : ?>
													<a href="<?php echo $twitter ?>" title="twitter" target="_blank">
														<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" width="288" height="288"><g clip-path="url(#a)"><rect width="512" height="512" fill="#ffffff" rx="60" class="color000 svgShape"/><path fill="#003028" d="M355.904 100H408.832L293.2 232.16L429.232 412H322.72L239.296 302.928L143.84 412H90.8805L214.56 270.64L84.0645 100H193.28L268.688 199.696L355.904 100ZM337.328 380.32H366.656L177.344 130.016H145.872L337.328 380.32Z" class="colorfff svgShape"/></g><defs><clipPath id="a"><rect width="512" height="512" fill="#003028" class="colorfff svgShape"/></clipPath></defs></svg>
													</a>
												<?php endif; ?>
												<?php if($fb) : ?>
													<a href="<?php echo $fb ?>" title="facebook" target="_blank">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#003028" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="-31 -31 372.00 372.00" xml:space="preserve" stroke="#003028">
															<g id="SVGRepo_bgCarrier" stroke-width="0">
																<rect x="-31" y="-31" width="372.00" height="372.00" rx="45" fill="#ffffff" strokewidth="0"/>
															</g>
															<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
															<g id="SVGRepo_iconCarrier"> <g id="XMLID_834_"> <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064 c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996 V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545 C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703 c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"/> </g> </g>
														</svg>
													</a>
												<?php endif; ?>
												<?php if($insta) : ?>
													<a href="<?php echo $insta ?>" title="instagram" target="_blank">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="-143 145 512 512" xml:space="preserve" stroke="#ffffff">
															<g id="SVGRepo_bgCarrier" stroke-width="0"/>
															<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
															<g id="SVGRepo_iconCarrier"> <g> <path d="M113,446c24.8,0,45.1-20.2,45.1-45.1c0-9.8-3.2-18.9-8.5-26.3c-8.2-11.3-21.5-18.8-36.5-18.8s-28.3,7.4-36.5,18.8 c-5.3,7.4-8.5,16.5-8.5,26.3C68,425.8,88.2,446,113,446z"/> <polygon points="211.4,345.9 211.4,308.1 211.4,302.5 205.8,302.5 168,302.6 168.2,346 "/> <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z M241,374.7v104.8c0,27.3-22.2,49.5-49.5,49.5h-157C7.2,529-15,506.8-15,479.5V374.7v-52.3c0-27.3,22.2-49.5,49.5-49.5h157 c27.3,0,49.5,22.2,49.5,49.5V374.7z"/> <path d="M183,401c0,38.6-31.4,70-70,70c-38.6,0-70-31.4-70-70c0-9.3,1.9-18.2,5.2-26.3H10v104.8C10,493,21,504,34.5,504h157 c13.5,0,24.5-11,24.5-24.5V374.7h-38.2C181.2,382.8,183,391.7,183,401z"/> </g> </g>
														</svg>
													</a>
												<?php endif; ?>
											</div>
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
									<div class="fine-print">
										<p class="source-org copyright">&copy; <?php echo date('Y'); ?> Spokane Orthopaedic Care | Orthopaedic Specialists in Spokane.</p>
									</div>
									<div class="privacy-policy">
										<?php $privacy_policy = get_field('privacy_policy', 'options'); 
										echo '<a target="_blank" href=' . $privacy_policy['url'] . '">Privacy Policy</a>' ?>
									</div>
								</div>
							</div>
						
						</div> <!-- end #inner-footer -->
					</div>
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->