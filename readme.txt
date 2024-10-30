=== Custom Product in Woo Order ===  
Contributors: wizbee  
Tags: custom product, custom order, custom item, woocommerce custom item, woocommerce custom product  
Requires at least: 6.6  
Tested up to: 6.6  
Requires PHP: 7.2  
Stable tag: 1.3  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

When manually editing orders from admin dashboard, add custom products directly to orders without adding them to the product catalog.

== Description ==

**Custom Product in Woo Order** is the perfect solution for WooCommerce store owners who need to add one-time custom products to customer orders without cluttering their product catalog.

This plugin lets shop admins seamlessly add multiple custom items to an order from the admin "Edit Order" page, and these items behave exactly like regular products in WooCommerce, with support for metadata, tax, and more. The added custom items will also be included in any invoice, packing slip, or email generated for the order.

### Features:
* Add custom products directly from the WooCommerce admin "Edit Order" page.
* No need to save custom products in the WooCommerce product catalog.
* Add multiple custom items per order.
* Custom items behave like regular products, with full WooCommerce functionality (e.g., metadata, tax settings).
* Custom items are included in invoices, packing slips, and emails, just like standard WooCommerce products.
* Perfect for orders involving special requests or one-time custom items.

**This is ideal for scenarios where customers request products not listed in the store catalog, and the store owner does not want to permanently add them for the sake of a single order.**

### How to Use:

**Go to Edit Order Page:** Access the "Orders" section from the WooCommerce dashboard and select the order you want to edit.
   
**Make the Order Editable:** Ensure the order is in an editable state. If necessary, change the order status to allow modifications.

**Click “Add item(s)”:** To begin adding a custom item, click the “Add item(s)” button, which will open up the section for adding products.
   
**Add Custom Product:** Once the item section is open, you’ll see the button "Add Custom Item(s)". After click, it will add fields to input custom item details. Enter the product name, price, and quantity for the custom product.
   
**Add Multiple Custom Products:** Click "Add Custom Item(s)" button again to input more products. Each time click on the button will add fields to add a new custom item.
   
**Remove Custom Product:** If needed, remove any custom items by clicking the "X" next to the custom product fields.
   
**Save Order:** Once you have added all the necessary custom products, click Save to update the order. It will show an alert about recalculating, click OK.

See the FAQ for more information.

### Enjoying the Plugin?
If you find **Easy Duplicate Woo Order** helpful, please consider leaving a positive [review on WordPress.org](https://wordpress.org/plugins/custom-product-in-woo-order/#reviews). Your feedback helps us improve and reach more users.

### Other Usefull and absulutly free plugin from wizbee IT
>[Easy Duplicate Woo Order](https://wordpress.org/plugins/easy-duplicate-woo-order/). Adds a custom action to duplicate WooCommerce orders easily.


For more information, visit our website at [wizbee IT](https://www.wizbeeit.com/)


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/custom-product-in-woo-order` directory, or install the plugin directly through the WordPress plugin repository.
2. Make sure that woocommerce is installed and active. 
3. Activate the plugin through the 'Plugins' screen in WordPress.
4. Navigate to the WooCommerce "Edit Order" page and start adding custom products to any order.

== Frequently Asked Questions ==

= Can I use this plugin to create a custom product for multiple orders? =  
No, the plugin is designed to add custom products to individual orders. The products are not saved in the product catalog and only exist in the context of the order they are added to.

= Are custom products included in WooCommerce emails, invoices, and packing slips? =  
Yes, custom products added through this plugin are treated like regular products, so they will appear in invoices, packing slips, and customer emails as normal products do.

= Do custom items support taxes, shipping, and other product-specific metadata? =  
Yes, once a custom item is added to the order, it supports all the settings and options of a normal WooCommerce product, including taxes, metadata, shipping, and other product-specific features.

= Can I add multiple custom items to an order? =  
Yes, you can add multiple custom items to an order. Each custom item will behave like a separate product in the order.

== Screenshots ==

1. Add unlimited custom item(s) to any order.

== Changelog ==

= 1.1 =
* Initial release

= 1.3 =
* Added support for custom code execution on both wc-orders and shop_order admin URLs.

== Upgrade Notice ==

= 1.3 =
* Added support for custom code execution on both wc-orders and shop_order admin URLs.

== License ==

This plugin is licensed under the GPLv2 or later license. For more information, see https://www.gnu.org/licenses/gpl-2.0.html.
