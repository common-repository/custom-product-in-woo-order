<?php
if (!defined('ABSPATH')) {
    exit;
}
add_action('wp_ajax_save_all_custom_items', 'wb_cpwo_save_all_custom_items_to_order');
function wb_cpwo_save_all_custom_items_to_order() {
    
    if (!isset($_POST['_ajax_nonce']) || !wp_verify_nonce($_POST['_ajax_nonce'], 'cpwo_save_custom_items_nonce')) {
        wp_send_json_error('Invalid nonce, cannot process request.');
    }

    if (isset($_POST['order_id']) && isset($_POST['custom_items'])) {
        $order_id = intval($_POST['order_id']);
        $custom_items = $_POST['custom_items'];

        if ($order_id && !empty($custom_items)) {
            $order = wc_get_order($order_id);

            if ($order) {
                foreach ($custom_items as $item_data) {
                    $custom_product_name = sanitize_text_field($item_data['custom_product_name']);
                    $custom_quantity = intval($item_data['custom_quantity']);
                    $custom_price = floatval($item_data['custom_price']);

                    if (!empty($custom_product_name)) {
                        $item = new WC_Order_Item_Product();
                        $item->set_name($custom_product_name);
                        $item->set_quantity($custom_quantity);
                        $item->set_subtotal($custom_price * $custom_quantity);
                        $item->set_total($custom_price * $custom_quantity);
                        $order->add_item($item);
                        $order->add_order_note('Custom item added: ' . $custom_product_name);
                    }
                }
                $order->save();
                wp_send_json_success('All custom items added successfully.');
            } else {
                wp_send_json_error('Order not found.');
            }
        }
    } else {
        wp_send_json_error('Missing order ID or custom items.');
    }
}
