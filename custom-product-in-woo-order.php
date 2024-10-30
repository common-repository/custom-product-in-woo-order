<?php
/*
Plugin Name: Custom Product in Woo Order
Description: Add custom products directly to orders without adding them to the product catalog.
Version: 1.3
Plugin URI: https://www.wizbeeit.com/custom-product-in-woo-order
Author: wizbee IT
Author URI: https://www.wizbeeit.com/
Text Domain: custom-product-in-woo-order
License: GPLv2 or later
Tags: custom product, custom order, custom item, woocommerce custom item, woocommerce custom product
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function wb_cpwo_check_woocommerce_active() {
    if (!class_exists('WooCommerce')) {
        add_action('admin_notices', 'wb_cpwo_woocommerce_inactive_notice');
        deactivate_plugins(plugin_basename(__FILE__));
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}
add_action('admin_init', 'wb_cpwo_check_woocommerce_active');

function wb_cpwo_woocommerce_inactive_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php esc_html_e('Custom Product in Woo Order requires WooCommerce to be installed and active. The plugin has been deactivated.', 'custom-product-in-woo-order'); ?></p>
    </div>
    <?php
}

function wb_cpwo_woocommerce_plugin_deactivated($plugin, $network_deactivating) {
    if ($plugin === 'woocommerce/woocommerce.php') {
        // Deactivate this plugin
        deactivate_plugins(plugin_basename(__FILE__));
        add_action('admin_notices', 'wb_cpwo_woocommerce_inactive_notice');
    }
}
add_action('deactivated_plugin', 'wb_cpwo_woocommerce_plugin_deactivated', 10, 2);

require_once plugin_dir_path(__FILE__) . 'includes/add-elements-to-order.php';
require_once plugin_dir_path(__FILE__) . 'includes/handle-action-button-event.php';
require_once plugin_dir_path(__FILE__) . 'includes/save-item-to-the-order.php';

add_action('admin_enqueue_scripts', 'wb_cpwo_enqueue_custom_order_scripts');
function wb_cpwo_enqueue_custom_order_scripts() {
    wp_enqueue_script('jquery');
    wp_localize_script('jquery', 'cpwo_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('cpwo_save_custom_items_nonce')
    ));
}
