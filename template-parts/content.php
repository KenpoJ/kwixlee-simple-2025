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
		// display post categories
		$categories = get_the_category();
		$stripped_categories = array_map(function($category) {
			return $category->name;
		}, $categories);
		?>
		<div class="categories">
			<span>Categories: </span>
			<?php
			if ($categories) {
				foreach($categories as $category) {
					// $featuredClass = '';
					// ($category->name != 'Featured') ? $featuredClass = 'featuredClass' : $featuredClass = '';
					// echo '<span class="category '.$featuredClass.'">'.$category->name.'</span>'; 
					echo '<span class="category">'.$category->name.'</span>'; 
				}
			}
			?>
		</div>
		<?php
		// display post tags
		$posttags = get_the_tag_list('', ' ');
		?>
		<div class="post-tags">
			<?php
			echo $posttags;
			?>
		</div>
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

		// display custom fields
		$project_name = get_field('project_name');
		$genre = get_field('genre');
		$notes = get_field('notes');
		$starring = get_field('starring');
		$year_released = get_field('year_released');
		$print_year = '';
		($year_released) ? $print_year = ' ('.$year_released.')' : $print_year = '';

		if ($project_name) {
			echo '<div class="project-name"><strong>Project Name</strong>: '.$project_name.''.$print_year.'</div>';
		}
		if ($genre) {
			echo '<div class="genre"><strong>Genre</strong>: '.$genre.'</div>';
		}
		if ($starring) {
			echo '<div class="starring"><strong>Starring</strong>: '.$starring.'</div>';
		}
		if ($notes) {
			echo '<div class="notes"><strong>Notes</strong>: '.$notes.'</div>';
		}

		$variable_cta = '';

		if (in_array('Trailer', $stripped_categories)) {
			$variable_cta = '<section class="video-cta">';
			$variable_cta .= 'This is the content of the trailer cta section.';
			$variable_cta .= '</section>';
		} else if (in_array('Short Film', $stripped_categories)) {
			$variable_cta = '<section class="video-cta">';
			$variable_cta .= 'This is the content of the short film cta section.';
			$variable_cta .= '</section>';
		} else {
			$variable_cta = '<section class="video-cta">';
			$variable_cta .= 'This is the content of the general cta section.';
			$variable_cta .= '</section>';
		}
		echo $variable_cta;

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
