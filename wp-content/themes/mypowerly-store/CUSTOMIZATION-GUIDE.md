# 🎨 MyPowerly Store - Customization Guide

Complete guide to customizing your MyPowerly Store theme to match your brand perfectly.

## 📋 Table of Contents

1. [Colors & Branding](#colors--branding)
2. [Typography](#typography)
3. [Button Styles](#button-styles)
4. [Homepage Sections](#homepage-sections)
5. [Header & Navigation](#header--navigation)
6. [Footer](#footer)
7. [Product Pages](#product-pages)
8. [Custom CSS](#custom-css)
9. [Advanced Customization](#advanced-customization)

---

## 🎨 Colors & Branding

### Method 1: Using WordPress Customizer (Recommended)

1. Go to **Appearance → Customize → Colors**
2. Adjust the following:
   - **Primary Color**: Main brand color (buttons, links, headers)
   - **Secondary Color**: Accent color (hover states, highlights)
3. Click **Publish** to save changes

### Method 2: Editing CSS Variables

Edit `style.css` and modify the `:root` section:

```css
:root {
  /* Primary Colors */
  --primary-color: #1569A6;        /* Your main brand color */
  --primary-hover: #0f5280;        /* Darker shade for hover */
  --primary-light: #e3f2fd;        /* Light background tint */
  --secondary-color: #4B9CD7;      /* Secondary accent */
  --secondary-hover: #3a8bc4;      /* Secondary hover state */
  
  /* Accent Colors */
  --accent-teal: #14b8a6;          /* Additional accent */
  --accent-gradient-start: #1569A6; /* Gradient start */
  --accent-gradient-end: #4B9CD7;   /* Gradient end */
}
```

### Creating a Color Scheme

**Example: Purple Theme**
```css
:root {
  --primary-color: #7C3AED;
  --primary-hover: #6D28D9;
  --primary-light: #EDE9FE;
  --secondary-color: #A78BFA;
  --secondary-hover: #8B5CF6;
}
```

**Example: Green Theme**
```css
:root {
  --primary-color: #10B981;
  --primary-hover: #059669;
  --primary-light: #D1FAE5;
  --secondary-color: #34D399;
  --secondary-hover: #10B981;
}
```

---

## ✍️ Typography

### Changing Fonts

**Step 1: Add Google Font**

Edit `functions.php` and modify the font enqueue:

```php
wp_enqueue_style(
    'mypowerly-fonts',
    'https://fonts.googleapis.com/css2?family=YOUR_FONT:wght@300;400;600;700&display=swap',
    array(),
    null
);
```

**Step 2: Update CSS Variable**

Edit `style.css`:

```css
:root {
  --font-primary: 'Your Font Name', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}
```

### Popular Font Combinations

**Modern & Clean:**
```css
--font-primary: 'Inter', sans-serif;
```

**Elegant & Professional:**
```css
--font-primary: 'Playfair Display', serif;
```

**Bold & Friendly:**
```css
--font-primary: 'Poppins', sans-serif;
```

### Adjusting Font Sizes

```css
h1 { font-size: 2.5rem; }  /* Adjust as needed */
h2 { font-size: 2rem; }
h3 { font-size: 1.75rem; }
body { font-size: 1rem; }
```

---

## 🔘 Button Styles

### Customizing Button Hover Effects

The theme includes smooth button hover effects. Customize them in `style.css`:

```css
.button:hover {
  background-color: var(--primary-hover);
  transform: translateY(-2px);           /* Lift effect */
  box-shadow: var(--shadow-lg), var(--shadow-glow); /* Shadow + glow */
}
```

### Adjusting Hover Animation

**More Subtle:**
```css
.button:hover {
  transform: translateY(-1px);
  box-shadow: var(--shadow-md);
}
```

**More Dramatic:**
```css
.button:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: var(--shadow-xl), 0 0 30px rgba(21, 105, 166, 0.4);
}
```

### Changing Transition Speed

```css
.button {
  transition: all 0.3s ease; /* Change from 0.2s to 0.3s for slower */
}
```

### Creating Custom Button Styles

Add to `style.css`:

```css
/* Gradient Button */
.button-gradient {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
}

.button-gradient:hover {
  background: linear-gradient(135deg, var(--primary-hover), var(--secondary-hover));
}

/* Rounded Button */
.button-rounded {
  border-radius: 50px;
}

/* Ghost Button */
.button-ghost {
  background: transparent;
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
}

.button-ghost:hover {
  background: var(--primary-color);
  color: white;
}
```

---

## 🏠 Homepage Sections

### Editing Hero Section

**Via Customizer:**
1. Go to **Appearance → Customize → Hero Section**
2. Edit:
   - Hero Title
   - Hero Subtitle
   - Button Text
   - Button URL

**Via Code:**

Edit `front-page.php`:

```php
<section class="hero-section">
    <div class="container">
        <div class="hero-content fade-in">
            <h1 class="hero-title">Your Custom Title</h1>
            <p class="hero-subtitle">Your custom subtitle text</p>
            <div class="hero-cta">
                <a href="/shop" class="button button-large">Shop Now</a>
            </div>
        </div>
    </div>
</section>
```

### Changing Hero Background

**Solid Color:**
```css
.hero-section {
  background: #1569A6;
}
```

**Gradient:**
```css
.hero-section {
  background: linear-gradient(135deg, #1569A6, #4B9CD7);
}
```

**Image Background:**
```css
.hero-section {
  background: url('path/to/image.jpg') center/cover;
  position: relative;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(21, 105, 166, 0.8); /* Overlay */
}
```

### Adding New Sections

Add to `front-page.php`:

```php
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Your Section Title</h2>
            <p class="section-subtitle">Your section description</p>
        </div>
        
        <div class="section-content">
            <!-- Your content here -->
        </div>
    </div>
</section>
```

### Removing Sections

Simply delete or comment out the section in `front-page.php`:

```php
<?php /* 
<section class="testimonials-section">
    ...
</section>
*/ ?>
```

---

## 🧭 Header & Navigation

### Customizing Header Style

Edit `style.css`:

```css
.site-header {
  background: linear-gradient(135deg, var(--accent-gradient-start), var(--accent-gradient-end));
  padding: var(--spacing-lg) 0;
  box-shadow: var(--shadow-md);
}
```

**Transparent Header:**
```css
.site-header {
  background: transparent;
  position: absolute;
  width: 100%;
  z-index: 1000;
}
```

**Solid Color Header:**
```css
.site-header {
  background: var(--white);
  border-bottom: 1px solid var(--gray-200);
}

.site-header .main-navigation a {
  color: var(--gray-800);
}
```

### Adding Logo

1. Go to **Appearance → Customize → Site Identity**
2. Click **Select Logo**
3. Upload logo (recommended: 200x60px PNG with transparent background)
4. Adjust logo size in `style.css`:

```css
.custom-logo {
  max-height: 60px;
  width: auto;
}
```

### Sticky Header

Already included! Customize behavior:

```css
.site-header.scrolled {
  background: rgba(21, 105, 166, 0.95);
  backdrop-filter: blur(10px);
  box-shadow: var(--shadow-lg);
}
```

---

## 👣 Footer

### Editing Footer Content

1. Go to **Appearance → Widgets**
2. Add widgets to Footer 1-4 areas
3. Common widgets:
   - Text (for about section)
   - Custom Menu (for links)
   - Recent Posts
   - Contact information

### Customizing Footer Style

Edit `style.css`:

```css
.site-footer {
  background-color: var(--gray-900);
  color: var(--gray-300);
  padding: var(--spacing-2xl) 0 var(--spacing-lg);
}
```

**Light Footer:**
```css
.site-footer {
  background-color: var(--gray-100);
  color: var(--gray-800);
}

.footer-widget h3 {
  color: var(--gray-900);
}
```

### Adding Social Media Icons

Add to footer widget:

```html
<div class="social-icons">
  <a href="https://facebook.com/yourpage" target="_blank">
    <svg><!-- Facebook icon --></svg>
  </a>
  <a href="https://twitter.com/yourhandle" target="_blank">
    <svg><!-- Twitter icon --></svg>
  </a>
  <a href="https://instagram.com/yourhandle" target="_blank">
    <svg><!-- Instagram icon --></svg>
  </a>
</div>
```

Add CSS:

```css
.social-icons {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
}

.social-icons a {
  display: inline-flex;
  width: 40px;
  height: 40px;
  align-items: center;
  justify-content: center;
  background: var(--primary-color);
  border-radius: 50%;
  color: white;
  transition: var(--transition-fast);
}

.social-icons a:hover {
  background: var(--primary-hover);
  transform: translateY(-2px);
}
```

---

## 🛍️ Product Pages

### Customizing Product Grid

Change number of columns in `functions.php`:

```php
function mypowerly_products_per_page() {
    return 12; // Change to 8, 16, etc.
}
add_filter('loop_shop_per_page', 'mypowerly_products_per_page', 20);
```

### Product Card Hover Effect

Customize in `style.css`:

```css
.woocommerce ul.products li.product:hover {
  box-shadow: var(--shadow-xl);
  transform: translateY(-8px); /* Adjust lift amount */
}
```

### Product Image Hover

Add image swap effect in `js/main.js` (already included):

```javascript
// Automatically swaps to second gallery image on hover
```

### Customizing Product Single Page

Edit `style.css`:

```css
.woocommerce div.product {
  display: grid;
  grid-template-columns: 1fr 1fr; /* Change to 2fr 1fr for larger images */
  gap: var(--spacing-2xl);
}
```

---

## 💅 Custom CSS

### Adding Custom CSS via Customizer

1. Go to **Appearance → Customize → Additional CSS**
2. Add your custom CSS
3. Click **Publish**

### Common Customizations

**Change Container Width:**
```css
.container {
  max-width: 1400px; /* Default is 1200px */
}
```

**Adjust Section Spacing:**
```css
.section {
  padding: 5rem 0; /* Default is 4rem */
}
```

**Rounded Product Images:**
```css
.woocommerce ul.products li.product img {
  border-radius: 1rem;
}
```

**Custom Sale Badge:**
```css
.woocommerce span.onsale {
  background: var(--error);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 2rem;
  font-weight: bold;
}
```

---

## 🚀 Advanced Customization

### Creating Child Theme

1. Create folder: `wp-content/themes/mypowerly-store-child/`
2. Create `style.css`:

```css
/*
Theme Name: MyPowerly Store Child
Template: mypowerly-store
*/
```

3. Create `functions.php`:

```php
<?php
function mypowerly_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'mypowerly_child_enqueue_styles');
```

4. Activate child theme

### Custom Page Templates

Create file `template-custom.php`:

```php
<?php
/*
Template Name: Custom Page
*/
get_header();
?>

<main class="custom-page">
    <div class="container">
        <!-- Your custom content -->
    </div>
</main>

<?php get_footer(); ?>
```

### Adding Custom Widgets

Add to `functions.php`:

```php
class Custom_Widget extends WP_Widget {
    // Widget code here
}

function register_custom_widget() {
    register_widget('Custom_Widget');
}
add_action('widgets_init', 'register_custom_widget');
```

### Custom Post Types

Add to `functions.php`:

```php
function create_portfolio_post_type() {
    register_post_type('portfolio',
        array(
            'labels' => array(
                'name' => __('Portfolio'),
                'singular_name' => __('Portfolio Item')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_portfolio_post_type');
```

---

## 📱 Mobile Customization

### Adjusting Mobile Breakpoints

Edit `style.css`:

```css
@media (max-width: 768px) {
  /* Your mobile styles */
  .hero-title {
    font-size: 2rem;
  }
}
```

### Mobile Menu

Customize mobile navigation:

```css
@media (max-width: 768px) {
  .main-navigation {
    position: fixed;
    top: 0;
    right: -100%;
    width: 80%;
    height: 100vh;
    background: white;
    transition: right 0.3s ease;
  }
  
  .main-navigation.active {
    right: 0;
  }
}
```

---

## 🎯 Performance Tips

1. **Optimize Images**: Use WebP format, compress before upload
2. **Minify CSS/JS**: Use plugin like Autoptimize
3. **Enable Caching**: Install WP Super Cache
4. **Use CDN**: Cloudflare for faster delivery
5. **Lazy Load**: Already included in theme

---

## 🆘 Troubleshooting

**Changes not showing?**
- Clear browser cache (Ctrl+Shift+R)
- Clear WordPress cache
- Check if custom CSS is overriding theme styles

**Buttons not hovering?**
- Ensure JavaScript is enabled
- Check browser console for errors
- Verify CSS is loading correctly

**Layout broken?**
- Check for unclosed HTML tags
- Validate CSS syntax
- Disable other plugins to test conflicts

---

## 📞 Need More Help?

- **Documentation**: README.md
- **Setup Guide**: SETUP-GUIDE.md
- **Support**: support@mypowerly.com

---

**Happy Customizing! 🎨**
