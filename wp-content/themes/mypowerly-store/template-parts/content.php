<?php
/**
 * Template part for displaying posts
 *
 * @package MyPowerly_Store
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>

        <div class="entry-meta">
            <span class="posted-on">
                <?php echo get_the_date(); ?>
            </span>
            <span class="byline">
                <?php esc_html_e('by', 'mypowerly-store'); ?> <?php the_author(); ?>
            </span>
        </div>
    </header>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
        endif;
        ?>
    </div>

    <?php if (!is_singular()) : ?>
        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="button">
                <?php esc_html_e('Read More', 'mypowerly-store'); ?>
            </a>
        </footer>
    <?php endif; ?>
</article>
