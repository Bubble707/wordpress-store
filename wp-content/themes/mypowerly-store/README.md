# MyPowerly Store - WordPress WooCommerce Theme

A modern, elegant WooCommerce theme inspired by MyPowerly's brand design, featuring clean typography, smooth transitions, and a professional blue color palette.

## 🎨 Design Features

- **Brand Colors**: MyPowerly's signature blue (#1569A6) and secondary accent (#4B9CD7)
- **Typography**: Lato font family for clean, modern readability
- **Button Hover Effects**: Smooth transitions with lift effect and glow shadows
- **Responsive Design**: Mobile-optimized layout for all devices
- **Modern UI**: Rounded corners, soft shadows, and gradient backgrounds

## 📦 Installation

1. **Upload Theme**
   - Download the theme folder
   - Go to WordPress Admin → Appearance → Themes → Add New → Upload Theme
   - Select the theme ZIP file and click "Install Now"
   - Activate the theme

2. **Install Required Plugins**
   - WooCommerce (required for e-commerce functionality)
   - Recommended: Contact Form 7, Yoast SEO

3. **Import Demo Content** (optional)
   - Go to Tools → Import
   - Import the demo-products.xml file to get sample products

## ⚙️ Configuration

### Initial Setup

1. **WooCommerce Setup**
   - Go to WooCommerce → Settings
   - Configure store location, currency, and tax settings
   - Set up payment gateways (Stripe, PayPal)
   - Configure shipping options

2. **Theme Customization**
   - Go to Appearance → Customize
   - **Hero Section**: Edit title, subtitle, and button text/URL
   - **Colors**: Adjust primary and secondary colors if needed
   - **Site Identity**: Upload logo and set site icon

3. **Create Menus**
   - Go to Appearance → Menus
   - Create a "Primary Menu" and assign it to "Primary Menu" location
   - Add pages: Home, Shop, About, Contact
   - Create a "Footer Menu" for footer links

4. **Configure Widgets**
   - Go to Appearance → Widgets
   - Add widgets to Footer 1-4 areas
   - Suggested widgets: Text, Recent Posts, Categories, Custom HTML

### Pages to Create

1. **Home** (set as Front Page in Settings → Reading)
2. **Shop** (automatically created by WooCommerce)
3. **About Us**
4. **Contact**
5. **Privacy Policy**
6. **Terms & Conditions**

## 🛍️ Adding Products

1. Go to Products → Add New
2. Enter product details:
   - Title
   - Description
   - Short description
   - Product images (featured image + gallery)
   - Price
   - Categories
   - Tags
3. Set as "Featured Product" to show on homepage
4. Publish

### Demo Products Included

The theme comes with sample product data:
- Electronics
- Fashion
- Home & Garden
- Sports & Outdoors

## 🎨 Customizing Colors

### Via Customizer (Easy)
1. Go to Appearance → Customize → Colors
2. Change Primary Color (default: #1569A6)
3. Change Secondary Color (default: #4B9CD7)

### Via CSS (Advanced)
Edit the `:root` variables in `style.css`:

```css
:root {
  --primary-color: #1569A6;
  --secondary-color: #4B9CD7;
  /* Add more custom colors */
}
```

## 🔧 Theme Customization

### Editing Hero Section

**Via Customizer:**
- Go to Appearance → Customize → Hero Section
- Edit title, subtitle, button text, and button URL

**Via Code:**
Edit `front-page.php` to modify the hero section HTML.

### Modifying Button Styles

All button styles are in `style.css` under the "BUTTONS" section. The hover effects include:
- Background color shift
- Lift animation (translateY)
- Shadow enhancement
- Glow effect

### Adding Custom Sections

1. Open `front-page.php`
2. Add new section using this template:

```php
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Your Title</h2>
            <p class="section-subtitle">Your subtitle</p>
        </div>
        <!-- Your content here -->
    </div>
</section>
```

## 📱 Responsive Breakpoints

- Mobile: < 480px
- Tablet: 481px - 768px
- Desktop: 769px - 1024px
- Large Desktop: > 1024px

## 🚀 Performance Optimization

The theme includes:
- Minified CSS and JS (in production)
- Lazy loading for images
- Deferred JavaScript loading
- Optimized database queries
- Removed unnecessary WordPress features

### Additional Optimization Tips

1. **Use a Caching Plugin**: WP Super Cache or W3 Total Cache
2. **Image Optimization**: Install Smush or ShortPixel
3. **CDN**: Use Cloudflare for faster global delivery
4. **Minification**: Use Autoptimize plugin

## 🎯 SEO Best Practices

1. Install Yoast SEO or Rank Math
2. Set up XML sitemap
3. Configure meta descriptions
4. Use proper heading hierarchy (H1, H2, H3)
5. Add alt text to all images
6. Create SEO-friendly URLs

## 🔒 Security

The theme includes:
- Sanitized inputs and outputs
- Nonce verification for AJAX
- Escaped data
- No hardcoded credentials
- Removed WordPress version info

## 🛠️ Troubleshooting

### Products Not Showing
- Ensure WooCommerce is installed and activated
- Check if products are published (not draft)
- Verify product visibility settings

### Styles Not Loading
- Clear browser cache
- Clear WordPress cache (if using caching plugin)
- Check if `style.css` is properly enqueued in `functions.php`

### Images Not Displaying
- Regenerate thumbnails: Plugins → Add New → "Regenerate Thumbnails"
- Check file permissions on uploads folder

### Button Hover Not Working
- Clear browser cache
- Check if custom CSS is overriding theme styles
- Ensure JavaScript is enabled

## 📚 File Structure

```
mypowerly-store/
├── style.css                 # Main stylesheet
├── functions.php             # Theme functions
├── header.php               # Header template
├── footer.php               # Footer template
├── index.php                # Main template
├── front-page.php           # Homepage template
├── woocommerce.php          # WooCommerce template
├── js/
│   └── main.js              # JavaScript functionality
├── template-parts/
│   ├── content.php          # Post content template
│   └── content-none.php     # No content template
└── README.md                # This file
```

## 🎨 Color Palette Reference

| Color Name | Hex Code | Usage |
|------------|----------|-------|
| Primary Blue | #1569A6 | Buttons, links, headers |
| Secondary Blue | #4B9CD7 | Accents, hover states |
| White | #FFFFFF | Backgrounds, text on dark |
| Gray 50 | #F9FAFB | Section backgrounds |
| Gray 900 | #111827 | Text, footer |

## 🌐 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📞 Support

For theme support and customization:
- Documentation: [Your documentation URL]
- Support Forum: [Your support URL]
- Email: support@mypowerly.com

## 📝 Changelog

### Version 1.0.0 (2024)
- Initial release
- MyPowerly brand design implementation
- WooCommerce integration
- Responsive layout
- Button hover effects
- Homepage with hero section
- Product grid and single product pages
- Cart and checkout styling
- Footer widgets
- Customizer options

## 📄 License

This theme is licensed under the GPL v2 or later.

## 🙏 Credits

- Font: Lato by Google Fonts
- Icons: Custom SVG icons
- Framework: WordPress & WooCommerce
- Design inspiration: MyPowerly brand

---

**Made with ❤️ for MyPowerly**
