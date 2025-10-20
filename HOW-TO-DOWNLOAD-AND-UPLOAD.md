# 🎯 How to Download and Upload MyPowerly Theme

## ⚠️ IMPORTANT: Download Method

**DO NOT** use GitHub's "Download ZIP" button! It creates a double-nested structure that WordPress rejects.

---

## ✅ Correct Download Method

### **Option 1: Direct Download Link (RECOMMENDED)**

Use this direct link to download the WordPress-ready ZIP:

```
https://github.com/Bubble707/wordpress-store/raw/main/mypowerly-theme.zip
```

**Steps:**
1. Right-click the link above
2. Select "Save Link As..." or "Download Linked File"
3. Save as `mypowerly-theme.zip`
4. Upload to WordPress

---

### **Option 2: From Your Desktop**

The correct ZIP file is already on your desktop:

```
c:\Users\Administrator\Desktop\mypowerly-theme.zip
```

**Just use this file directly!**

---

## ❌ WRONG Method (Don't Do This!)

**DON'T** click the green "Code" button → "Download ZIP" on GitHub!

This creates:
```
wordpress-store-main.zip
 └── wordpress-store-main/
      └── mypowerly-theme.zip
           └── mypowerly-theme/
                └── [theme files]
```

WordPress will reject this with: **"File type not allowed for security reasons"**

---

## 🚀 Upload to WordPress

### Step 1: Get the ZIP File
- **From Desktop**: `c:\Users\Administrator\Desktop\mypowerly-theme.zip`
- **From GitHub**: https://github.com/Bubble707/wordpress-store/raw/main/mypowerly-theme.zip

### Step 2: Upload to WordPress
1. Log in to WordPress Admin
2. Go to: **Appearance → Themes**
3. Click: **Add New**
4. Click: **Upload Theme**
5. Click: **Choose File**
6. Select: `mypowerly-theme.zip` (27.19 KB)
7. Click: **Install Now**
8. Wait for installation
9. Click: **Activate**

### Step 3: Verify Installation
- ✅ Theme activates without errors
- ✅ Homepage displays with hero section
- ✅ MyPowerly colors (#1569A6) are visible
- ✅ Button hover effects work

---

## 🔧 If You Still Get Errors

### Error: "File type not allowed for security reasons"

**Cause**: You downloaded the wrong ZIP file from GitHub

**Solution**:
1. Delete the downloaded ZIP
2. Use the direct download link:
   ```
   https://github.com/Bubble707/wordpress-store/raw/main/mypowerly-theme.zip
   ```
3. Or use the ZIP from your Desktop

### Error: "Missing style.css stylesheet"

**Cause**: Wrong folder structure in ZIP

**Solution**: 
1. Use the correct ZIP file (see above)
2. The ZIP must contain:
   ```
   mypowerly-theme.zip
    └── mypowerly-theme/
         ├── style.css
         ├── index.php
         └── [other files]
   ```

### Error: "The uploaded file exceeds upload_max_filesize"

**Cause**: PHP upload limit too low

**Solution**:
1. Contact your hosting provider
2. Ask them to increase `upload_max_filesize` to at least 10MB
3. Or use FTP method (see below)

---

## 📁 Alternative: FTP Upload

If ZIP upload doesn't work:

### Step 1: Extract ZIP
1. Extract `mypowerly-theme.zip`
2. You'll get a folder: `mypowerly-theme`

### Step 2: Upload via FTP
1. Connect to your server via FTP (FileZilla, etc.)
2. Navigate to: `/wp-content/themes/`
3. Upload the entire `mypowerly-theme` folder
4. Go to WordPress: **Appearance → Themes**
5. Activate "MyPowerly Theme"

---

## 📊 Verify ZIP Structure

### Correct Structure ✅
```
mypowerly-theme.zip (27.19 KB)
 └── mypowerly-theme/
      ├── style.css
      ├── index.php
      ├── functions.php
      ├── header.php
      ├── footer.php
      ├── front-page.php
      ├── page.php
      ├── single.php
      ├── archive.php
      ├── search.php
      ├── 404.php
      ├── woocommerce.php
      ├── searchform.php
      ├── js/
      │    └── main.js
      ├── template-parts/
      │    ├── content.php
      │    └── content-none.php
      └── README.md
```

### Wrong Structure ❌
```
wordpress-store-main.zip
 └── wordpress-store-main/
      └── [multiple files and folders]
```

---

## 🎨 After Installation

### 1. Install WooCommerce
```
Plugins → Add New → Search "WooCommerce" → Install → Activate
```

### 2. Configure Theme
```
Appearance → Customize → Hero Section
- Title: "Welcome to MyPowerly Store"
- Subtitle: "Discover amazing products"
- Button: "Shop Now"
```

### 3. Upload Logo
```
Appearance → Customize → Site Identity → Select Logo
```

### 4. Create Menu
```
Appearance → Menus
- Create "Primary Menu"
- Add: Home, Shop, About, Contact
```

### 5. Add Products
```
Products → Add New
- Check "Featured Product" for homepage display
```

---

## 🔗 Quick Links

**Direct Download**: https://github.com/Bubble707/wordpress-store/raw/main/mypowerly-theme.zip

**GitHub Repository**: https://github.com/Bubble707/wordpress-store

**Desktop Location**: `c:\Users\Administrator\Desktop\mypowerly-theme.zip`

---

## ✅ Checklist

Before uploading:
- [ ] Downloaded from correct link (raw GitHub link)
- [ ] File size is approximately 27 KB
- [ ] File name is `mypowerly-theme.zip`
- [ ] NOT using GitHub's "Download ZIP" button

After uploading:
- [ ] Theme installs without errors
- [ ] Theme activates successfully
- [ ] Homepage displays correctly
- [ ] MyPowerly colors visible
- [ ] Button hover effects work

---

## 📞 Still Having Issues?

1. **Check file size**: Should be ~27 KB
2. **Verify file name**: Must be `mypowerly-theme.zip`
3. **Try FTP method**: Upload folder directly
4. **Contact hosting**: Ask about upload limits

---

## 🎉 Success!

Once uploaded and activated:
- ✅ MyPowerly branding (#1569A6, #4B9CD7)
- ✅ Smooth button hover effects
- ✅ WooCommerce integration
- ✅ Responsive design
- ✅ Ready to add products!

---

**Your theme is ready to use! Follow the correct download method and enjoy your MyPowerly store!** 🛍️

*Theme Version: 1.0*  
*Author: Shaista Fareed*
