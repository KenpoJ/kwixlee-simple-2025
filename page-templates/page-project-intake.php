<?php /* Template Name: Project Intake */ ?>

<?php get_header(); ?>

<main id="main" class="site-main" role="main">

<section class="intro">
    <div class="content-container">
        <?php the_content(); ?>
    </div>
</section>

<section class="project-form">
    <?php echo do_shortcode('[project_intake_form]'); ?>
</section>

</main>

<?php get_footer(); ?>