<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kwixlee_simple_2025
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="content-container">

			<?php

			if($post_type == 'video-sample') {
				$return_btn = '<section>';
				$return_btn .= '<a class="btn btn-primary" href="/video-showcase">Return to Video Showcase</a>';
				$return_btn .= '</section>';
				echo $return_btn;
			}

			?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( '&#x21A9;', 'kwixlee_simple_2025' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( '&#x21AA;', 'kwixlee_simple_2025' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
