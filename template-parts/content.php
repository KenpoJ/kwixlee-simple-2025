<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kwixlee_simple_2025
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				kwixlee_simple_2025_posted_on();
				kwixlee_simple_2025_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php
	if ( $post_type != 'video-sample' ) { 
		$the_excerpt = get_the_excerpt();
		?>
		<div class="entry-content">
			<!-- post thumbnail -->
			<a href="<?php get_post_permalink(); ?>">
				<?php echo get_the_post_thumbnail($post_ID, 'thumbnail'); ?>
			</a>
			<!-- post excerpt -->
			 <div class="post-excerpt">
				<?php echo $the_excerpt; ?>
				<a class="btn btn-primary" href="<?php echo get_post_permalink(); ?>">Read More</a>
			</div>
		</div><!-- .entry-content -->
	<?php	
	} else {
	?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kwixlee_simple_2025' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kwixlee_simple_2025' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php
	}
	?>

	<footer class="entry-footer">
		<?php kwixlee_simple_2025_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
