<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */
/**Load ACF form head, important*/
acf_form_head();
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
	

	<header id="masthead" class="site-header">




<div class="row">

  		<div class="col-sm-4">
			<!--Logo + Site title + Site description-->
			<div class="site-branding">


				<?php the_custom_logo(); ?>
				
				
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$test_description = get_bloginfo( 'description', 'display' );
				if ( $test_description || is_customize_preview() ) :
					?>
					<p class="site-description hvr-grow"><?php echo $test_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->


		</div>

		<div class="col-sm-8">
			<div id="menu-container">
				<!--  Mon menu  -->
				<div class="nav-mobile" id="navmobile">
					<nav id="site-navigation" class="main-navigation" role="navigation">
					            <button class="menu-toggle">Menu</button>
					            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'nav-menu' ) ); ?>
					</nav>
				</div>
				<div class="nav-desktop" id="navdesktop">
					<nav id="site-navigation" class="main-navigation" role="navigation">
					            <button class="menu-toggle">Menu</button>
					            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'nav-menu' ) ); ?>
					</nav>
				</div>
			

			</div>
		</div>

	</div><!-- fermeture row -->

	</header><!-- #masthead -->

