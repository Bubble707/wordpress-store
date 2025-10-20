<?php
/**
 * MyPowerly Store Theme Functions
 * 
 * @package MyPowerly_Store
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function mypowerly_store_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 800, true);
    
    // Add custom image sizes
    add_image_size('mypowerly-product-thumb', 400, 400, true);
    add_image_size('mypowerly-product-large', 800, 800, true);
    add_image_size('mypowerly-hero', 1920, 800, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mypowerly-store'),
        'footer' => __('Footer Menu', 'mypowerly-store'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for Block Styles
    add_theme_support('wp-block-styles');
    
    // Add support for full and wide align images
    add_theme_support('align-wide');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'mypowerly_store_setup');

/**
 * Set the content width in pixels
 */
function mypowerly_store_content_width() {
    $GLOBALS['content_width'] = apply_filters('mypowerly_store_content_width', 1200);
}
add_action('after_setup_theme', 'mypowerly_store_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function mypowerly_store_scripts() {
    // Google Fonts - Lato
    wp_enqueue_style(
        'mypowerly-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap',
        array(),
        null
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'mypowerly-store-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
    
    // Custom JavaScript
    wp_enqueue_script(
        'mypowerly-store-script',
        get_template_directory_uri() . '/js/main.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('mypowerly-store-script', 'mypowerlyAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mypowerly-nonce')
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mypowerly_store_scripts');

/**
 * Register widget areas
 */
function mypowerly_store_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'mypowerly-store'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'mypowerly-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 1', 'mypowerly-store'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'mypowerly-store'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'mypowerly-store'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'mypowerly-store'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 3', 'mypowerly-store'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'mypowerly-store'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 4', 'mypowerly-store'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in your footer.', 'mypowerly-store'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mypowerly_store_widgets_init');

/**
 * WooCommerce Customizations
 */

// Remove default WooCommerce styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Change number of products per page
function mypowerly_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'mypowerly_products_per_page', 20);

// Change number of related products
function mypowerly_related_products_args($args) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'mypowerly_related_products_args');

// Customize Add to Cart button text
function mypowerly_custom_cart_button_text() {
    return __('Add to Cart', 'mypowerly-store');
}
add_filter('woocommerce_product_single_add_to_cart_text', 'mypowerly_custom_cart_button_text');
add_filter('woocommerce_product_add_to_cart_text', 'mypowerly_custom_cart_button_text');

// Add wrapper to products for better styling
function mypowerly_product_wrapper_start() {
    echo '<div class="product-wrapper">';
}
add_action('woocommerce_before_shop_loop_item', 'mypowerly_product_wrapper_start', 5);

function mypowerly_product_wrapper_end() {
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'mypowerly_product_wrapper_end', 15);

/**
 * Customizer additions
 */
function mypowerly_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('mypowerly_hero', array(
        'title'    => __('Hero Section', 'mypowerly-store'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Welcome to MyPowerly Store',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'mypowerly-store'),
        'section'  => 'mypowerly_hero',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Discover amazing products with modern design and exceptional quality',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'mypowerly-store'),
        'section'  => 'mypowerly_hero',
        'type'     => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Shop Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label'    => __('Hero Button Text', 'mypowerly-store'),
        'section'  => 'mypowerly_hero',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('hero_button_url', array(
        'default'           => '/shop',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_button_url', array(
        'label'    => __('Hero Button URL', 'mypowerly-store'),
        'section'  => 'mypowerly_hero',
        'type'     => 'url',
    ));
    
    // Colors
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#1569A6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'mypowerly-store'),
        'section'  => 'colors',
    )));
    
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#4B9CD7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'mypowerly-store'),
        'section'  => 'colors',
    )));
}
add_action('customize_register', 'mypowerly_customize_register');

/**
 * Output customizer CSS
 */
function mypowerly_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#1569A6');
    $secondary_color = get_theme_mod('secondary_color', '#4B9CD7');
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'mypowerly_customizer_css');

/**
 * Custom template tags
 */

// Display navigation to next/previous post
function mypowerly_post_navigation() {
    the_post_navigation(array(
        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'mypowerly-store') . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'mypowerly-store') . '</span> <span class="nav-title">%title</span>',
    ));
}

// Display breadcrumbs
function mypowerly_breadcrumbs() {
    if (function_exists('woocommerce_breadcrumb')) {
        woocommerce_breadcrumb();
    } else {
        echo '<div class="breadcrumbs">';
        echo '<a href="' . home_url() . '">' . __('Home', 'mypowerly-store') . '</a>';
        if (is_category() || is_single()) {
            echo ' / ';
            the_category(' / ');
            if (is_single()) {
                echo ' / ' . get_the_title();
            }
        } elseif (is_page()) {
            echo ' / ' . get_the_title();
        }
        echo '</div>';
    }
}

/**
 * AJAX handlers for enhanced functionality
 */

// Quick view product
function mypowerly_quick_view() {
    check_ajax_referer('mypowerly-nonce', 'nonce');
    
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    
    if ($product_id) {
        global $post, $product;
        $post = get_post($product_id);
        $product = wc_get_product($product_id);
        
        if ($product) {
            wc_get_template_part('content', 'single-product');
        }
    }
    
    wp_die();
}
add_action('wp_ajax_mypowerly_quick_view', 'mypowerly_quick_view');
add_action('wp_ajax_nopriv_mypowerly_quick_view', 'mypowerly_quick_view');

/**
 * Security enhancements
 */

// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Performance optimizations
 */

// Remove emoji scripts
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Defer JavaScript loading
function mypowerly_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('mypowerly-store-script');
    
    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'mypowerly_defer_scripts', 10, 3);

/**
 * Custom post types (if needed for future expansion)
 */

// Example: Testimonials post type
function mypowerly_register_testimonials() {
    $labels = array(
        'name'               => __('Testimonials', 'mypowerly-store'),
        'singular_name'      => __('Testimonial', 'mypowerly-store'),
        'add_new'            => __('Add New', 'mypowerly-store'),
        'add_new_item'       => __('Add New Testimonial', 'mypowerly-store'),
        'edit_item'          => __('Edit Testimonial', 'mypowerly-store'),
        'new_item'           => __('New Testimonial', 'mypowerly-store'),
        'view_item'          => __('View Testimonial', 'mypowerly-store'),
        'search_items'       => __('Search Testimonials', 'mypowerly-store'),
        'not_found'          => __('No testimonials found', 'mypowerly-store'),
        'not_found_in_trash' => __('No testimonials found in Trash', 'mypowerly-store'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'testimonials'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-testimonial',
        'supports'            => array('title', 'editor', 'thumbnail'),
        'show_in_rest'        => true,
    );
    
    register_post_type('testimonial', $args);
}
add_action('init', 'mypowerly_register_testimonials');

/**
 * Admin customizations
 */

// Custom admin footer text
function mypowerly_admin_footer_text($text) {
    return 'Thank you for using <strong>MyPowerly Store</strong> theme!';
}
add_filter('admin_footer_text', 'mypowerly_admin_footer_text');

// Add theme options page
function mypowerly_add_admin_page() {
    add_theme_page(
        __('MyPowerly Store Options', 'mypowerly-store'),
        __('Theme Options', 'mypowerly-store'),
        'manage_options',
        'mypowerly-options',
        'mypowerly_options_page'
    );
}
add_action('admin_menu', 'mypowerly_add_admin_page');

function mypowerly_options_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div class="card">
            <h2>Welcome to MyPowerly Store Theme</h2>
            <p>This theme is designed to create a beautiful, modern WooCommerce store with MyPowerly's brand aesthetic.</p>
            <h3>Quick Start Guide:</h3>
            <ol>
                <li>Install and activate WooCommerce plugin</li>
                <li>Go to Appearance → Customize to configure your hero section and colors</li>
                <li>Create your products in WooCommerce → Products</li>
                <li>Set up your menus in Appearance → Menus</li>
                <li>Configure payment gateways in WooCommerce → Settings</li>
            </ol>
            <h3>Features:</h3>
            <ul>
                <li>✓ MyPowerly brand colors and typography</li>
                <li>✓ Smooth button hover effects</li>
                <li>✓ Responsive design</li>
                <li>✓ WooCommerce integration</li>
                <li>✓ SEO optimized</li>
                <li>✓ Fast loading performance</li>
            </ul>
        </div>
    </div>
    <?php
}
?>
