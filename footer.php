<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kwixlee_simple_2025
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="content-container">
			<div class="site-info">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="footer-logo" src="/wp-content/uploads/2025/02/kwixlee-digital-logo-bw.png" alt="Kwixlee Digital Logo" />
				</a>
			</div>
			<div class="footer-nav">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</div><!-- .footer-nav -->
			<div class="copyright">
				<p>&copy; <?php echo date('Y'); ?> Kwixlee Digital</p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
