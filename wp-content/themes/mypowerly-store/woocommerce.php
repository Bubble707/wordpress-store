<?php
/**
 * The template for displaying WooCommerce pages
 *
 * @package MyPowerly_Store
 */

get_header();
?>

<main id="primary" class="site-main woocommerce-page">
    <div class="container">
        <?php
        if (function_exists('mypowerly_breadcrumbs')) {
            mypowerly_breadcrumbs();
        }
        ?>
        
        <div class="woocommerce-content">
            <?php woocommerce_content(); ?>
        </div>
    </div>
</main>

<?php
get_footer();
?>
