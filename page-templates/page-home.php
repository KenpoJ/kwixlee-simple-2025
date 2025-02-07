<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<main id="main" class="site-main" role="main">

<section class="page-hero">
    <?php echo do_shortcode('[qcld_hero id=1]'); ?>
    <!-- Hero here!!! -->
</section>

<section class="video-showcase-home">
    <div class="content-container">
    <?php echo do_shortcode('[video_samples_display classes="samples-list" post_type="video-sample" limit=3]'); ?>
</section>

<?php echo do_shortcode('[testimonials post_type="testimonial" title="What Our Clients are Saying" limit=3]'); ?>

<section class="cta cta-home">
    <div class="content-container">
        <h2>Submitting to Festivals?</h2>
        <h3>Need a trailer to help promote your film?</h3>
        <h4>Need marketing materials for your film?</h4>
    </div>
</section>

<section class="about">
    <div class="content-container">
        <h2>About</h2>
        <div class="about-content">
            <div class="about-content_image">
                <?php echo get_the_post_thumbnail($post_ID = 59, 'medium'); ?>
            </div>
            <div class="about-content_text">
                <?php $excerpt = get_the_excerpt($post_ID = 59); ?>
                <?php echo $excerpt; ?>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>