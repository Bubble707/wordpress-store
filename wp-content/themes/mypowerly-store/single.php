<?php
/**
 * The template for displaying all single posts
 *
 * @package MyPowerly_Store
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    
                    <div class="entry-meta">
                        <span class="posted-on">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <?php the_author(); ?>
                        </span>
                        <span class="category">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                            <?php the_category(', '); ?>
                        </span>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'mypowerly-store'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $tags_list = get_the_tag_list('', ', ');
                    if ($tags_list) {
                        printf('<div class="tags-links"><strong>' . esc_html__('Tags:', 'mypowerly-store') . '</strong> %s</div>', $tags_list);
                    }
                    ?>
                </footer>
            </article>

            <?php
            // Post navigation
            mypowerly_post_navigation();

            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
?>
