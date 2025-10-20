<?php
/**
 * The template for displaying search results pages
 *
 * @package MyPowerly_Store
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('Search Results for: %s', 'mypowerly-store'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>

            <div class="search-results">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'search');
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation();

        else :
            ?>
            <div class="no-results card">
                <h2><?php esc_html_e('Nothing Found', 'mypowerly-store'); ?></h2>
                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mypowerly-store'); ?></p>
                <?php get_search_form(); ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>

<style>
.search-results {
    display: grid;
    gap: 2rem;
    margin-top: 2rem;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-header span {
    color: var(--primary-color);
}
</style>

<?php
get_footer();
?>
