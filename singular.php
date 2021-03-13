<?php get_header(); ?>

<main class="pages">
    <?php while(have_posts()) {
        the_post();?>
        <div class="featured_img"><?php the_post_thumbnail('large'); ?></div>
        <h2><?php the_title(); ?></h2>
        <?php the_content();
    } ?>
</main>

<?php get_footer(); ?>