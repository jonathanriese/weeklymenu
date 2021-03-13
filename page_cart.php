<?php
/*
Template Name: Cart Page
*/

get_header(); ?>

<main>
    <?php while(have_posts()) {
        the_post();?>
        <?php the_content();
    } ?>
</main>

<?php get_footer(); ?>