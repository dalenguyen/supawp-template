# SupaWP Template

A WordPress plugin template for extending the [SupaWP plugin](https://techcater.com) with custom JavaScript and CSS functionality.

## Description

This template provides a foundation for creating extensions to the SupaWP plugin, which integrates Supabase features with WordPress. The SupaWP plugin can be found at [https://techcater.com](https://techcater.com).

## Features

- **JavaScript Extension**: Add custom JavaScript functionality that integrates with SupaWP's authentication system
- **CSS Customization**: Add custom styles to enhance the user interface
- **Admin Integration**: Seamless integration with SupaWP's admin dashboard
- **Hook System**: Utilizes SupaWP's `supawp_init` hook for proper initialization
- **Clean Architecture**: Simple, maintainable code structure

## Installation

1. Download the template files
2. Place them in your WordPress plugins directory: `/wp-content/plugins/supawp-template/`
3. Activate the plugin through WordPress admin
4. Ensure the main SupaWP plugin is installed and activated

## Usage

### JavaScript Customization

Edit `js/supawp-template.js` to add your custom functionality:

```javascript
function initSupaWPTemplate(supabaseClient) {
    // Your custom code here
    supabaseClient.auth.onAuthStateChange((event, session) => {
        if (event === 'SIGNED_IN') {
            // Handle user sign in
        }
    });
}
```

### CSS Customization

Edit `css/supawp-template.css` to add your custom styles:

```css
/* Your custom styles here */
.my-custom-class {
    background-color: #f0f0f0;
    padding: 10px;
}
```

## File Structure

```
supawp-template/
├── init.php                          # Main plugin file
├── includes/
│   ├── public/
│   │   └── class.supawp-template.php # Frontend functionality
│   └── dashboard/
│       └── class.supawp-template.php # Admin functionality
├── js/
│   ├── supawp-template.js            # Frontend JavaScript
│   └── dashboard-supawp-template.js  # Admin JavaScript
├── css/
│   └── supawp-template.css           # Custom styles
├── README.md                         # This file
└── CHANGELOG.md                      # Version history
```

## Requirements

- WordPress 5.0 or higher
- SupaWP plugin (available at [https://techcater.com](https://techcater.com))
- PHP 7.4 or higher

## Support

For support with the main SupaWP plugin, visit [https://techcater.com](https://techcater.com).

## Version

Current version: 1.0.0

## License

This template is provided as-is for extending the SupaWP plugin functionality.
