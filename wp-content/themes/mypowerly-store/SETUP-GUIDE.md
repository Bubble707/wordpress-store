# 🚀 MyPowerly Store - Complete Setup Guide

This guide will walk you through setting up your MyPowerly WooCommerce store from start to finish.

## 📋 Prerequisites

Before you begin, ensure you have:
- WordPress 6.0 or higher installed
- PHP 7.4 or higher
- MySQL 5.6 or higher
- Admin access to your WordPress site

## 🎯 Step-by-Step Setup

### Step 1: Install WordPress (if not already installed)

1. Download WordPress from wordpress.org
2. Upload to your web server
3. Create a MySQL database
4. Run the WordPress installation wizard
5. Complete the 5-minute installation

### Step 2: Install WooCommerce Plugin

1. Log in to WordPress Admin
2. Go to **Plugins → Add New**
3. Search for "WooCommerce"
4. Click **Install Now** on the WooCommerce plugin
5. Click **Activate**
6. Follow the WooCommerce Setup Wizard:
   - Set your store location
   - Choose currency (USD, EUR, etc.)
   - Select industry (General)
   - Choose product types (Physical products)
   - Configure business details
   - Select theme (skip this, we'll use MyPowerly Store)
   - Skip Jetpack and other extensions (optional)

### Step 3: Install MyPowerly Store Theme

1. Go to **Appearance → Themes → Add New → Upload Theme**
2. Upload the `mypowerly-store.zip` file
3. Click **Install Now**
4. Click **Activate**

**Alternative Method:**
1. Upload the `mypowerly-store` folder to `/wp-content/themes/`
2. Go to **Appearance → Themes**
3. Activate **MyPowerly Store**

### Step 4: Configure WooCommerce Settings

#### General Settings
1. Go to **WooCommerce → Settings → General**
2. Set **Store Address**
3. Set **Currency** (e.g., USD - United States dollar)
4. Set **Currency Position** (Left with space: $ 99.99)

#### Product Settings
1. Go to **WooCommerce → Settings → Products**
2. **Shop Page**: Select or create "Shop" page
3. **Add to cart behavior**: Check "Redirect to cart page"
4. **Measurements**: Set weight and dimension units

#### Shipping Settings
1. Go to **WooCommerce → Settings → Shipping**
2. Add shipping zones (e.g., United States, International)
3. Add shipping methods (Flat rate, Free shipping, Local pickup)
4. Set shipping costs

#### Payment Settings
1. Go to **WooCommerce → Settings → Payments**
2. Enable payment methods:
   - **Stripe**: Install Stripe plugin and connect account
   - **PayPal**: Enter PayPal email address
   - **Direct Bank Transfer**: Enable for manual payments
   - **Cash on Delivery**: Enable if applicable

#### Tax Settings (if applicable)
1. Go to **WooCommerce → Settings → Tax**
2. Enable taxes if required
3. Set tax rates based on your location

### Step 5: Customize Theme Settings

#### Set Homepage
1. Go to **Settings → Reading**
2. Select **A static page**
3. Choose **Home** as Front page
4. Choose **Shop** as Posts page (or create a Blog page)
5. Click **Save Changes**

#### Customize Hero Section
1. Go to **Appearance → Customize → Hero Section**
2. **Hero Title**: "Welcome to MyPowerly Store"
3. **Hero Subtitle**: "Discover amazing products with modern design and exceptional quality"
4. **Hero Button Text**: "Shop Now"
5. **Hero Button URL**: "/shop"
6. Click **Publish**

#### Customize Colors (Optional)
1. Go to **Appearance → Customize → Colors**
2. **Primary Color**: #1569A6 (MyPowerly Blue)
3. **Secondary Color**: #4B9CD7 (Light Blue)
4. Click **Publish**

#### Upload Logo
1. Go to **Appearance → Customize → Site Identity**
2. Click **Select Logo**
3. Upload your logo (recommended size: 200x60px)
4. Set **Site Icon** (favicon, 512x512px)
5. Click **Publish**

### Step 6: Create Navigation Menus

#### Primary Menu
1. Go to **Appearance → Menus**
2. Click **Create a new menu**
3. Name it "Primary Menu"
4. Add pages:
   - Home
   - Shop
   - About
   - Contact
5. Check **Primary Menu** under Menu Settings
6. Click **Save Menu**

#### Footer Menu
1. Create another menu named "Footer Menu"
2. Add pages:
   - Privacy Policy
   - Terms & Conditions
   - Shipping & Returns
   - Contact Us
3. Check **Footer Menu** under Menu Settings
4. Click **Save Menu**

### Step 7: Create Essential Pages

#### About Page
1. Go to **Pages → Add New**
2. Title: "About Us"
3. Add content about your store
4. Publish

#### Contact Page
1. Go to **Pages → Add New**
2. Title: "Contact"
3. Add contact information
4. Optional: Install Contact Form 7 plugin for contact form
5. Publish

#### Privacy Policy
1. Go to **Settings → Privacy**
2. Create or select Privacy Policy page
3. Add your privacy policy content
4. Publish

#### Terms & Conditions
1. Go to **Pages → Add New**
2. Title: "Terms & Conditions"
3. Add your terms and conditions
4. Publish

### Step 8: Add Products

#### Create Product Categories
1. Go to **Products → Categories**
2. Add categories:
   - Electronics
   - Fashion
   - Home & Garden
   - Sports & Outdoors
   - Beauty & Health

#### Add Your First Product
1. Go to **Products → Add New**
2. **Product Title**: "Premium Wireless Headphones"
3. **Product Description**: Full description with features and benefits
4. **Short Description**: Brief overview (2-3 sentences)
5. **Product Data**:
   - Regular Price: $99.99
   - Sale Price: $79.99 (optional)
6. **Inventory**:
   - SKU: WH-001
   - Stock: In stock
   - Stock quantity: 50
7. **Shipping**:
   - Weight: 0.5 kg
   - Dimensions: 20 x 15 x 8 cm
8. **Product Categories**: Check "Electronics"
9. **Product Tags**: wireless, headphones, audio
10. **Product Image**: Upload main product image (800x800px recommended)
11. **Product Gallery**: Upload 3-5 additional images
12. **Featured Product**: Check this box to show on homepage
13. Click **Publish**

#### Add More Products
Repeat the process to add at least 6-8 products for a good showcase.

### Step 9: Configure Widgets

#### Footer Widgets
1. Go to **Appearance → Widgets**
2. **Footer 1** - About:
   - Add **Text** widget
   - Title: "About MyPowerly"
   - Content: Brief description of your store
3. **Footer 2** - Quick Links:
   - Add **Custom Menu** widget
   - Select "Footer Menu"
4. **Footer 3** - Contact:
   - Add **Text** widget
   - Title: "Contact Us"
   - Content: Email, phone, address
5. **Footer 4** - Newsletter:
   - Add **Text** widget
   - Title: "Stay Connected"
   - Content: Social media links

### Step 10: Test Your Store

#### Test Product Purchase Flow
1. Visit your shop page
2. Add a product to cart
3. View cart
4. Proceed to checkout
5. Fill in billing details
6. Complete test order (use test payment gateway)

#### Test Responsive Design
1. Open your site on mobile device
2. Test navigation
3. Test product browsing
4. Test checkout process

#### Test Button Hover Effects
1. Hover over buttons throughout the site
2. Verify smooth transitions
3. Check glow effect on primary buttons

### Step 11: Performance Optimization

#### Install Caching Plugin
1. Go to **Plugins → Add New**
2. Search for "WP Super Cache" or "W3 Total Cache"
3. Install and activate
4. Configure basic caching

#### Optimize Images
1. Install "Smush" or "ShortPixel" plugin
2. Optimize existing images
3. Enable automatic optimization for new uploads

#### Enable Lazy Loading
1. Go to **Settings → Media**
2. Enable lazy loading (WordPress 5.5+)

### Step 12: SEO Setup

#### Install SEO Plugin
1. Go to **Plugins → Add New**
2. Search for "Yoast SEO" or "Rank Math"
3. Install and activate
4. Run the configuration wizard

#### Configure SEO Settings
1. Set up XML sitemap
2. Configure meta descriptions
3. Set up social media integration
4. Enable breadcrumbs

### Step 13: Security Hardening

#### Install Security Plugin
1. Install "Wordfence Security" or "Sucuri Security"
2. Run security scan
3. Enable firewall
4. Set up two-factor authentication

#### Basic Security Steps
1. Use strong passwords
2. Keep WordPress and plugins updated
3. Regular backups (use UpdraftPlus)
4. Disable file editing in wp-config.php:
   ```php
   define('DISALLOW_FILE_EDIT', true);
   ```

### Step 14: Launch Checklist

Before going live, verify:

- [ ] All pages are created and published
- [ ] Products are added with images and descriptions
- [ ] Payment gateways are configured and tested
- [ ] Shipping methods are set up
- [ ] Tax settings are correct (if applicable)
- [ ] Menus are created and assigned
- [ ] Logo and favicon are uploaded
- [ ] Footer widgets are configured
- [ ] Contact information is correct
- [ ] Privacy policy and terms are published
- [ ] SSL certificate is installed (HTTPS)
- [ ] Test orders are completed successfully
- [ ] Mobile responsiveness is verified
- [ ] SEO plugin is configured
- [ ] Analytics tracking is set up (Google Analytics)
- [ ] Backup system is in place

## 🎨 Customization Tips

### Change Colors
Edit `style.css` and modify the `:root` variables:
```css
:root {
  --primary-color: #YOUR_COLOR;
  --secondary-color: #YOUR_COLOR;
}
```

### Modify Button Hover Effects
In `style.css`, find the button hover section:
```css
.button:hover {
  background-color: var(--primary-hover);
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg), var(--shadow-glow);
}
```

### Add Custom CSS
1. Go to **Appearance → Customize → Additional CSS**
2. Add your custom CSS
3. Click **Publish**

## 🆘 Troubleshooting

### Issue: Products not showing
**Solution**: Go to **Settings → Permalinks** and click **Save Changes** to flush rewrite rules.

### Issue: Images not displaying
**Solution**: Check file permissions on `/wp-content/uploads/` folder (should be 755).

### Issue: Payment gateway not working
**Solution**: Verify API keys are correct and test mode is disabled for live site.

### Issue: Slow loading
**Solution**: Install caching plugin, optimize images, and enable CDN.

### Issue: Button hover not working
**Solution**: Clear browser cache and check if custom CSS is overriding theme styles.

## 📞 Need Help?

- **Documentation**: README.md file
- **Support**: support@mypowerly.com
- **Video Tutorials**: [Your YouTube channel]

## 🎉 Congratulations!

Your MyPowerly Store is now set up and ready to start selling! Remember to:
- Regularly update WordPress, theme, and plugins
- Monitor your analytics
- Engage with customers
- Add new products regularly
- Optimize based on user feedback

**Happy Selling! 🛍️**
