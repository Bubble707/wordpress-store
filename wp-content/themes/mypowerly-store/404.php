<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package MyPowerly_Store
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <div class="error-content" style="text-align: center; padding: 4rem 0;">
                <div class="error-icon" style="font-size: 8rem; color: var(--primary-color); margin-bottom: 2rem;">
                    404
                </div>
                
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! Page Not Found', 'mypowerly-store'); ?></h1>
                </header>

                <div class="page-content">
                    <p style="font-size: 1.25rem; color: var(--gray-600); margin-bottom: 2rem;">
                        <?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'mypowerly-store'); ?>
                    </p>

                    <div class="error-actions" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="button button-large">
                            <?php esc_html_e('Go to Homepage', 'mypowerly-store'); ?>
                        </a>
                        <?php if (class_exists('WooCommerce')) : ?>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="button button-large button-secondary">
                                <?php esc_html_e('Browse Shop', 'mypowerly-store'); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="search-form-wrapper" style="max-width: 500px; margin: 0 auto;">
                        <h3><?php esc_html_e('Try searching for what you need:', 'mypowerly-store'); ?></h3>
                        <?php get_search_form(); ?>
                    </div>

                    <?php if (class_exists('WooCommerce')) : ?>
                        <div class="popular-products" style="margin-top: 4rem;">
                            <h3><?php esc_html_e('Popular Products', 'mypowerly-store'); ?></h3>
                            <?php echo do_shortcode('[products limit="4" columns="4" orderby="popularity"]'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
?>
