<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kwixlee_simple_2025
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kwixlee_simple_2025' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="content-container">
			<div class="site-branding">
				<?php
				// the_custom_logo();
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else { ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php }
				
				$kwixlee_simple_2025_description = get_bloginfo( 'description', 'display' );
				if ( $kwixlee_simple_2025_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $kwixlee_simple_2025_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onClick="myFunction(this)">
					<span class="bar1"></span>
					<span class="bar2"></span>
					<span class="bar3"></span>
				</div>
				<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '&mdash;&nbsp;&mdash;&nbsp;&mdash;', 'kwixlee_simple_2025' ); ?></button> -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
		<script>
			function myFunction(x) {
				x.classList.toggle("change");
				jQuery('.menu-primary-menu-container').slideToggle();
			}
		</script>
	</header><!-- #masthead -->
