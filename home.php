<?php get_header(); ?>

<div class="home-custom">
    <?php if (have_posts()) : ?>
        <div class="home-posts">
            <?php while (have_posts()) : ?>
            <div class="home-post">
                <?php the_post(); ?>
                <?php get_template_part('template-parts/content/content', 'custom'); ?>
            </div>
            <?php endwhile; ?>
        </div>

        <?php twenty_twenty_one_the_posts_navigation(); ?>
    <?php else : ?>
        <?php get_template_part('template-parts/content/content-none'); ?>
    <?php endif; ?>
</div>

<?php get_footer();
