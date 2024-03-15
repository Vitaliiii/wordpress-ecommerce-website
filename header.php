<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online Market
 */


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="theme-color" content="#085151">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<?php wp_head(); ?>
</head>
	
	
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- NOSCRIPT -->
	<noscript>
		Your Browser Does Not Support JavaScript. Please Update Your Browser and reload page. Have a nice day!
	</noscript>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'hcl-actian'); ?></a>
		
		<header id="masthead" class="site-header">
			<div class="container">
				<div class="header-wrapper">
					<?php the_custom_logo();?>
					<?php
					$theme_location = 'header-menu';
					if ( has_nav_menu( $theme_location ) ) { 
						wp_nav_menu(
							array(
								'theme_location' => $theme_location,
								'menu_id'        => 'primary-menu',
								'container'        => 'nav',
								'container_class'  => 'header-menu',
								'menu_class'       => 'header-menu-list', 
							)
						);
					} ?>
					<div class="button-box">
						<nav class="lang-nav">
							<div class="current-lang"><?php echo pll_current_language(); ?></div>
							<ul>
								<?php pll_the_languages( array( 'show_flags' => 0,'show_names' => 1, 'display_names_as' => 'slug', 'hide_current'=> 1 ) ); ?>
							</ul>
						</nav>
						<button class="menu-toggle" type="button" aria-label="toggle menu">
							<span aria-hidden="true"></span>
						</button>
					</div>
				</div>
			</div>
		</header>
		