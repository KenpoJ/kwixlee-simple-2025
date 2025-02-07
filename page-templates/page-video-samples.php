<?php /* Template Name: Video Samples */ ?>

<?php get_header(); ?>

<div class="video-samples">
    <div class="content-container">
        <?php 
        // Get current page number
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // The Query Arguments.
        $args = array(
            'post_type'      => 'video-sample',
            'posts_per_page' => 6,
            'paged'          => $paged
        );

        // The Query.
        $video_samples = new WP_Query($args);
        $card_markup = '';

        if ($video_samples->have_posts()) {
            while ($video_samples->have_posts()) {
                $video_samples->the_post();
                
                $image_link = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $image_link = wp_make_link_relative($image_link);

                $posttags = get_the_tag_list('', ', ');

                $card_markup .= '<div class="video-samples-blog-card">';
                $card_markup .= '<a href="'.get_permalink().'">';
                $card_markup .= '<div class="card-image">';
                $card_markup .= '<img src="'.esc_url($image_link).'" alt="'.get_the_title().'">';
                $card_markup .= '</div>';
                $card_markup .= '</a>';
                $card_markup .= '<div class="card-content">';
                $card_markup .= '<div class="title">';
                $card_markup .= '<h3>'.get_the_title().'</h3>';
                $card_markup .= '</div>';
                $card_markup .= '<div class="tags">';
                $card_markup .= '<div class="tags">'.$posttags.'</div>';
                $card_markup .= '</div>';
                $card_markup .= '</div>';
                $card_markup .= '</div>';
            }
        } else {
            $card_markup .= '<p>No video samples found.</p>';
        }

        // Pagination
        $pagination = paginate_links(array(
            'total'   => $video_samples->max_num_pages,
            'current' => $paged,
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        ));

        wp_reset_postdata();

        $markup = '<section class="video-samples-blog">';
        $markup .= $card_markup;
        $markup .= '</section>';
        $markup .= '<div class="pagination">'.$pagination.'</div>';

        echo $markup;
        ?>
    </div>
</div>

<?php get_footer(); ?>
