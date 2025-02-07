<?php
/**
 * Video Samples Display shortcode
 *
 * @package Kwixlee_Digital_2025
 */


function video_showcase_home_shortcode ( $atts, $content = null ) {

    //add whatever 'props' you'd like to add here. 
    //Note: I usually have the option for the content creator to include an ID, title, and classes. At least title and classes
    extract(shortcode_atts(array(
        'id'                 => '',
        'classes'            => '',
        'title'              => '',
        'description'        => '',
        'background_image'   => '',
        'cta'                => '',
        'url'                => '',
        'limit'              => '',
        'post_type'          => ''
    ), $atts));

    (strlen($id) > 0) ? $id = 'id="'.$id.'"' : '';
    (strlen($classes) > 0) ? $classes = 'class="'.$classes.'"' : '';
    (strlen($title) > 0) ? $title = '<h2 class="video-samples-display-title">'.$title.'</h2>' : '';
    (strlen($description) > 0) ? $description = '<p class="video-samples-display-description">'.$description.'</p>' : '';
    (strlen($background_image) > 0) ? $background_markup = 'style="background-image: url('.$background_image.');"' : '';
    (strlen($cta) > 0) ? $cta_markup = '<a href="'.$url.'" class="btn btn-primary">'.$cta.'</a>' : '';
    (strlen($limit) > 0) ? $limit = $limit : 3;
    (strlen($post_type) > 0) ? $post_type = $post_type : 'video-sample';


    // The Query Arguments.
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $limit
    );
    // The Query.
    $video_samples = new WP_Query( $args );

    // The Loop.
    if ( $video_samples->have_posts() ) {
        while ( $video_samples->have_posts() ) {
            $video_samples->the_post();
            // $video_url = get_field('video_link', true, false, false);
            $image_link = get_the_post_thumbnail_url($post_id, 'medium');
            $image_link = wp_make_link_relative($image_link);

            $posttags = get_the_tags();
            $tag_markup = '';
            if ($posttags) {
                foreach($posttags as $tag) {
                    $tag_markup .= '<h4 class="tag">'.$tag->name.'</h4>'; 
                }
            }

            $samples_markup .= '<div class="video-samples-display-card">';
            $samples_markup .= '<a href="'.get_post_permalink().'">';
            $samples_markup .= '<div class="card-image">';
            $samples_markup .= '<img src="'.esc_url($image_link).'" alt="'.get_the_title().'">';
            $samples_markup .= '</div>';
            $samples_markup .= '<div class="card-overlay">';
            $samples_markup .= '<div class="card-titles">';
            $samples_markup .= '<h3 class="card-title">'.get_the_title().'</h3>';
            $samples_markup .= '</div>';
            $samples_markup .= '<div class="card-tags">'.$tag_markup.'</div>'; /* Make an H4 tag for this */
            $samples_markup .= '</a>';
            $samples_markup .= '</div></div>';
        }
    } else {
        esc_html_e( 'Sorry, no posts matched your criteria.' );
    }
    // Restore original Post Data.
    wp_reset_postdata();

    $markup = '';

    $markup .= '<div id="'.$id.'" class="'.$classes.'"'. $background_markup.'>';
    $markup .= '<div class="video-samples-display-content">';
    $markup .= '<div class="video-samples-display-titles">';
    $markup .= $title;
    $markup .= $description;
    $markup .= $cta_markup;
    $markup .= '</div>';
    $markup .= '<div class="video-samples-display-media">';
    $markup .= $samples_markup;
    $markup .= '</div>';
    $markup .= '<a class="btn btn-primary" href="/video-editing-samples">View Video Showcase</a>';
    $markup .= '</div></div>';

    return $markup;

}
?>