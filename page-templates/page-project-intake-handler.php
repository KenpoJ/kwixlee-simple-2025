<?php /* Template Name: Project Intake Handler */ ?>

<?php get_header(); ?>

<!--
https://wpmudev.com/blog/handling-form-submissions/
-->

<main id="main" class="site-main" role="main">

<section class="intro">
    <div class="content-container">
        <?php the_content(); ?>
    </div>
</section>

<section class="submitted-intake">
    <div class="content-container">
        <?php
        project_intake_handler();
        //Handle the form in the functions.php file
        echo $name;
        ?>
    </div>
</section>

</main>

<?php get_footer(); ?>