<article id="post-<?php the_ID(); ?>" <?php post_class('post--custom'); ?>>
    <a class="entry-anchor" href="<?php echo esc_url(get_permalink()); ?>">
        <div
            class="entry-thumbnail-background"
            <?php if ($thumbnail_id = get_post_thumbnail_id()) : ?>
            style="background-image: url('<?php echo wp_get_attachment_image_url($thumbnail_id, 'post-thumbnail'); // phpcs:ignore ?>');"
            <?php endif; ?>
        >
            <div class="entry-thumbnail-overlay"></div><!-- .entry-thumbnail-overlay -->

            <div class="entry-container">
                <header class="entry-header">
                    <?php if (is_singular()) : ?>
                        <?php the_title('<h1 class="entry-title default-max-width">', '</h1>'); ?>
                    <?php else : ?>
                        <?php the_title('<h2 class="entry-title default-max-width">', '</h2>'); ?>
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content(twenty_twenty_one_continue_reading_text());

                    wp_link_pages(
                        array(
                            'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">', // phpcs:ignore
                            'after'    => '</nav>',
                            /* translators: %: Page number. */
                            'pagelink' => esc_html__('Page %', 'twentytwentyone'),
                        )
                    );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer default-max-width">
                    <?php // twenty_twenty_one_entry_meta_footer(); // Breaks main link. ?>
                </footer><!-- .entry-footer -->
            </div><!-- .entry-container -->
        </div><!-- .entry-thumbnail-background -->
    </a><!-- .entry-anchor -->
</article><!-- #post-<?php the_ID(); ?> -->
