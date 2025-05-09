<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kwixlee_simple_2025
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="content-container">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! Looks like this page didn&rsquo;t make the final cut.', 'kwixlee_simple_2025' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Maybe the link took a wrong turn at the script read-through?
Try heading back to the homepage or check out the cast of links below to find your way!', 'kwixlee_simple_2025' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Categories', 'kwixlee_simple_2025' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					/*$kwixlee_simple_2025_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'kwixlee_simple_2025' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$kwixlee_simple_2025_archive_content" );*/

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->


	</main><!-- #main -->

<?php
get_footer();
