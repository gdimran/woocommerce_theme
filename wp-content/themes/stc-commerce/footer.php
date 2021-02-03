<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SevenThree_Commerce
 */

?>

					<footer id="colophon" class="site-footer">
						<div class="row">
							<div class="col-lg-2">
								<?php 
									$custom_logo_id=get_theme_mod('custom_logo');
									if(!empty($custom_logo_id)) : the_custom_logo(); else :?>
									<h2><?php echo bloginfo(); ?></h1>
								<?php endif;?>

							</div>
							<div class="col">
								<div class="footer-left-menu">
									<?php
											wp_nav_menu(
												array(
													'theme_location' => 'footer-left-menu',
												)
											);
										?>
								</div>
							</div>
							<div class="col-lg-1">
								<button class="btn btn-dark btn-got-top"><i class="fas fa-chevron-up"></i></button>
							</div>
							<div class="col">
								<div class="footer-right-menu">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-right-menu',
											)
										);
									?>
								</div>
							</div>
						</div>
						
					</footer><!-- #colophon -->
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
