<?php
/**
 * Testimonials shortcode
 *
 * @package Kwixlee_Digital_2025
 */


function testimonal_posts_display_shortcode ( $atts, $content = null ) {

    //add whatever 'props' you'd like to add here. 
    //Note: I usually have the option for the content creator to include an ID, title, and classes. At least title and classes
    extract(shortcode_atts(array(
        'id'                 => '',
        'classes'            => '',
        'title'              => '',
        'description'        => '',
        'limit'              => '',
        'post_type'          => ''
    ), $atts));

    ($id) ? $id = 'id="'.$id.'"' : $id = '';
    ($classes) ? $classes = 'testimonials-container '.$classes : $classes = 'testimonials-container';
    ($limit) ? $limit = $limit : $limit = 3;
    ($post_type) ? $post_type = $post_type : $post_type = 'testimonial';
    ($title) ? $title = $title : $title = 'Testimonials';
    ($description) ? $description = $description : $description = '';

    // The Query Arguments.
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $limit
    );
    // The Query.
    $testimonal_posts = new WP_Query( $args );

    // The Loop.
    if ( $testimonal_posts->have_posts() ) {
        while ( $testimonal_posts->have_posts() ) {
            $testimonal_posts->the_post();
            $image_link = get_field('photo');
            ($image_link) ? $image_link = wp_make_link_relative($image_link['url']) : $image_link = '/wp-content/uploads/2025/02/film-avatar.jpg';
            // $image_link = wp_make_link_relative($image_link['url']);

            $testimonial_markup .= '<div class="testimonial-card">';
            $testimonial_markup .= '<div class="testimonial-card-image">';
            $testimonial_markup .= '<img src="'.$image_link.'" alt="'.get_the_title().'">';
            $testimonial_markup .= '</div>';
            $testimonial_markup .= '<div class="testimonial-card-copy">';
            $testimonial_markup .= '<p class="testimonial-card-description">'.get_field('testimonial_copy').'</p>';
            $testimonial_markup .= '<p class="testimonial-card-name">'.get_field('name').'</p>';
            $testimonial_markup .= '<p class="testimonial-card-company">'.get_field('company').'</p>';
            $testimonial_markup .= '</div>';
            $testimonial_markup .= '</div>';
        }
    } else {
        esc_html_e( 'Sorry, no posts matched your criteria.' );
    }
    // Restore original Post Data.
    wp_reset_postdata();

    $markup = '';

    $markup .= '<section id="'.$id.'" class="'.$classes.'"'. $background_markup.'>';
    $markup .= '<div class="content-container">';
    $markup .= '<div class="testimonials-content">';
    $markup .= '<div class="testimonials-titles">';
    $markup .= '<h2 class="testimonials-title">'.$title.'</h2>';
    $markup .= '<h3 class="testimonials-description">'.$description.'</h3>';
    $markup .= '</div>';
    $markup .= '<div class="testimonials-media">';
    $markup .= $testimonial_markup;
    $markup .= '</div></div></section>';

    return $markup;

}
?>