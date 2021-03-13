<?php get_header(); ?>

<main class="pages landing">
    <?php while(have_posts()) {
        the_post();?>
        <div class="featured_img"><?php the_post_thumbnail('large'); ?></div>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    <?php } ?>
</main>

<?php get_footer(); ?>