<?php
$fields  = get_field('home', 'options');
$video   = $fields['video']   ?? null;
$welcome = $fields['welcome'] ?? null;
$events  = $fields['events']  ?? null;
?>

<?php get_header(); ?>

<div class="home-custom">
    <!-- <pre><?php // var_dump($fields); ?></pre> -->

    <?php if (!isset($video['show']) || $video['show']) : ?>
    <section class="home-video">
        <?php
        $attrs = parse_html($video['url'] ?? null, 'iframe');
        $videoUrl = $attrs['src'] ?? '';
        $videoUrl = add_query_arg([
            'controls'       => '0',
            'showinfo'       => '0',
            'rel'            => '0',
            'autoplay'       => '1',
            'loop'           => '1',
            'mute'           => '1',
            'playlist'       => wp_parse_url(basename($videoUrl), PHP_URL_PATH),
        ], $videoUrl);
        ?>

        <div class="home-video-wrap">
            <iframe
                src="<?php echo esc_url($videoUrl); ?>"
                title="<?php echo $attrs['title'] ?? null; ?>"
                allow="<?php echo $attrs['allow'] ?? 'autoplay'; ?>"
                frameborder="0"
                allowfullscreen
            ></iframe>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!isset($welcome['show']) || $welcome['show']) : ?>
    <section class="home-welcome">
        <div class="home-container">
            <?php if ($welcomeTitle = $welcome['title'] ?? null) : ?>
            <h2 class="home-welcome-title"><?php echo $welcomeTitle; ?></h2>
            <?php endif; ?>

            <?php if ($welcomeSubtitle = $welcome['subtitle'] ?? null) : ?>
            <h4 class="home-welcome-subtitle"><?php echo $welcomeSubtitle; ?></h4>
            <?php endif; ?>

            <?php if ($welcomeReasons = $welcome['reasons'] ?? null) : ?>
            <h2 class="home-welcome-title-alt"><?php echo sprintf(__('%d reasons to party with us', 'drinkngo'), count($welcomeReasons)); // phpcs:ignore ?></h2>

            <div class="home-welcome-reasons">
                <?php foreach ($welcomeReasons as $welcomeReason) : ?>
                <div class="home-welcome-reasons-item">
                    <?php if ($welcomeReasonIcon = $welcomeReason['icon'] ?? null) : ?>
                    <div class="home-welcome-reasons-item-icon-wrapper">
                        <img
                            class="home-welcome-reasons-item-icon"
                            src="<?php echo wp_get_attachment_url($welcomeReasonIcon); ?>"
                            alt="<?php echo $welcomeReason['label'] ?? null; ?>"
                        />
                    </div>
                    <?php endif; ?>

                    <?php if ($welcomeReasonLabel = $welcomeReason['label'] ?? null) : ?>
                    <p class="home-welcome-reasons-item-label"><?php echo $welcomeReasonLabel; ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

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
