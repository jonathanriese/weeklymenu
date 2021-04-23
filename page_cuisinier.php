<?php
/*
Template Name: Cook Page
*/

get_header(); ?>

<main class="cuisinier">
    <div class=image>
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="content">
    <?php while(have_posts()) {
        the_post();
        the_content();
    } ?>
    </div>
</main>

<?php get_footer(); ?>