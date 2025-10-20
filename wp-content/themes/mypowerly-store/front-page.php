<?php
/**
 * The template for displaying the homepage
 *
 * @package MyPowerly_Store
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content fade-in">
            <h1 class="hero-title">
                <?php echo esc_html(get_theme_mod('hero_title', 'Welcome to MyPowerly Store')); ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('hero_subtitle', 'Discover amazing products with modern design and exceptional quality')); ?>
            </p>
            <div class="hero-cta">
                <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '/shop')); ?>" class="button button-large">
                    <?php echo esc_html(get_theme_mod('hero_button_text', 'Shop Now')); ?>
                </a>
                <a href="#featured-products" class="button button-large button-outline">
                    <?php esc_html_e('Explore Products', 'mypowerly-store'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<?php if (class_exists('WooCommerce')) : ?>
<section id="featured-products" class="section section-gray">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Featured Products', 'mypowerly-store'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Check out our handpicked selection of premium products', 'mypowerly-store'); ?></p>
        </div>
        
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ),
            ),
        );
        
        $featured_query = new WP_Query($args);
        
        if ($featured_query->have_posts()) :
            echo '<ul class="products">';
            while ($featured_query->have_posts()) : $featured_query->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        else :
            // If no featured products, show latest products
            echo do_shortcode('[products limit="8" columns="4" orderby="date" order="DESC"]');
        endif;
        ?>
        
        <div class="text-center mt-4">
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="button button-large">
                <?php esc_html_e('View All Products', 'mypowerly-store'); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Categories Section -->
<?php if (class_exists('WooCommerce')) : ?>
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Shop by Category', 'mypowerly-store'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Browse our carefully curated product categories', 'mypowerly-store'); ?></p>
        </div>
        
        <div class="categories-grid">
            <?php
            $product_categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'number'     => 6,
                'parent'     => 0,
            ));
            
            if (!empty($product_categories) && !is_wp_error($product_categories)) :
                foreach ($product_categories as $category) :
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
                    ?>
                    <div class="category-card card">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                            <h3><?php echo esc_html($category->name); ?></h3>
                            <p><?php echo esc_html($category->count); ?> <?php esc_html_e('Products', 'mypowerly-store'); ?></p>
                        </a>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- About/Brand Story Section -->
<section class="section section-gradient">
    <div class="container">
        <div class="about-content" style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
            <div class="about-text slide-in-left">
                <h2 class="section-title" style="text-align: left;"><?php esc_html_e('Our Story', 'mypowerly-store'); ?></h2>
                <p><?php esc_html_e('At MyPowerly, we believe in delivering exceptional quality and modern design. Our carefully curated collection brings together the best products to enhance your lifestyle.', 'mypowerly-store'); ?></p>
                <p><?php esc_html_e('With a focus on customer satisfaction and innovative solutions, we strive to provide an unparalleled shopping experience that combines style, functionality, and value.', 'mypowerly-store'); ?></p>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="button">
                    <?php esc_html_e('Learn More About Us', 'mypowerly-store'); ?>
                </a>
            </div>
            <div class="about-image slide-in-right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-placeholder.jpg" 
                     alt="<?php esc_attr_e('About MyPowerly', 'mypowerly-store'); ?>" 
                     style="width: 100%; border-radius: 1rem; box-shadow: var(--shadow-xl);"
                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22600%22 height=%22400%22%3E%3Crect fill=%22%231569A6%22 width=%22600%22 height=%22400%22/%3E%3Ctext fill=%22%23ffffff%22 font-family=%22Arial%22 font-size=%2224%22 x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22%3EMyPowerly Store%3C/text%3E%3C/svg%3E'">
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('What Our Customers Say', 'mypowerly-store'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Real feedback from our valued customers', 'mypowerly-store'); ?></p>
        </div>
        
        <div class="testimonials-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <?php
            $testimonials = new WP_Query(array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 3,
            ));
            
            if ($testimonials->have_posts()) :
                while ($testimonials->have_posts()) : $testimonials->the_post();
                    ?>
                    <div class="testimonial-card card">
                        <div class="testimonial-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="testimonial-author">
                            <strong><?php the_title(); ?></strong>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default testimonials if none exist
                ?>
                <div class="testimonial-card card">
                    <div class="testimonial-content">
                        <p>"<?php esc_html_e('Excellent quality products and outstanding customer service. Highly recommended!', 'mypowerly-store'); ?>"</p>
                    </div>
                    <div class="testimonial-author">
                        <strong><?php esc_html_e('Sarah Johnson', 'mypowerly-store'); ?></strong>
                    </div>
                </div>
                <div class="testimonial-card card">
                    <div class="testimonial-content">
                        <p>"<?php esc_html_e('Fast shipping and beautiful packaging. The products exceeded my expectations!', 'mypowerly-store'); ?>"</p>
                    </div>
                    <div class="testimonial-author">
                        <strong><?php esc_html_e('Michael Chen', 'mypowerly-store'); ?></strong>
                    </div>
                </div>
                <div class="testimonial-card card">
                    <div class="testimonial-content">
                        <p>"<?php esc_html_e('Amazing shopping experience from start to finish. Will definitely shop here again!', 'mypowerly-store'); ?>"</p>
                    </div>
                    <div class="testimonial-author">
                        <strong><?php esc_html_e('Emma Williams', 'mypowerly-store'); ?></strong>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="section section-gray">
    <div class="container">
        <div class="newsletter-content" style="max-width: 600px; margin: 0 auto; text-align: center;">
            <h2 class="section-title"><?php esc_html_e('Stay Updated', 'mypowerly-store'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Subscribe to our newsletter for exclusive offers and updates', 'mypowerly-store'); ?></p>
            
            <form class="newsletter-form" style="display: flex; gap: 1rem; margin-top: 2rem;">
                <input type="email" 
                       placeholder="<?php esc_attr_e('Enter your email', 'mypowerly-store'); ?>" 
                       required
                       style="flex: 1;">
                <button type="submit" class="button">
                    <?php esc_html_e('Subscribe', 'mypowerly-store'); ?>
                </button>
            </form>
        </div>
    </div>
</section>

<style>
.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.category-card {
    text-align: center;
    overflow: hidden;
}

.category-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: var(--transition-slow);
}

.category-card:hover img {
    transform: scale(1.1);
}

.category-card h3 {
    margin: 1rem 0 0.5rem;
    color: var(--gray-900);
}

.category-card p {
    color: var(--gray-600);
    margin: 0;
}

.category-card a {
    text-decoration: none;
    color: inherit;
}

.testimonial-card {
    text-align: center;
}

.testimonial-content {
    font-style: italic;
    color: var(--gray-700);
    margin-bottom: 1rem;
}

.testimonial-author {
    color: var(--primary-color);
    font-weight: var(--font-weight-semibold);
}

@media (max-width: 768px) {
    .about-content {
        grid-template-columns: 1fr !important;
    }
    
    .newsletter-form {
        flex-direction: column !important;
    }
}
</style>

<?php
get_footer();
?>
