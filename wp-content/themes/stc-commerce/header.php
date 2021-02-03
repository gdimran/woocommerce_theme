<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SevenThree_Commerce
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'stc-commerce' ); ?></a>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="site-wrap">
			
				<header id="masthead" class="site-header">
					<div class="header-top">
						<div class="row">
							<div class="col">
								<i class="fa fa-phone"></i> Hotline: 804-377-3580 - 804-399-3580
							</div>
							<div class="col col-auto">
								<div class="top-right-menu">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'top-menu',
											)
										);
									?>
								</div>
							</div>
						</div>
					</div>
					

					<div class="main-header">
						<div class="row">
							<div class="col-lg-2">
								<div class="site-branding">
									<?php 
										$custom_logo_id=get_theme_mod('custom_logo');
										if(!empty($custom_logo_id)) : the_custom_logo(); else :?>
										<h2><?php echo bloginfo(); ?></h1>
									<?php endif;?>
								</div><!-- .site-branding -->
							</div>
							<div class="col-lg-8">
								<div class="main-menu">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
											)
										);
									?>
								</div>
							</div>
							<div class="col-lg-2 text-right">
								<div class="header-right-icons">
									<span class="search-trigger"><i class="fa fa-search"></i></span>
									<a href="" class="cart-icon"><i class="fa fa-shopping-cart"></i></a>	
								</div>
							</div>
						</div>
					
					</div>

				</header><!-- #masthead -->
