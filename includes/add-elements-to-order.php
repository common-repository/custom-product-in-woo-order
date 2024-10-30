<?php
if (!defined('ABSPATH')) {
    exit;
}
add_action('admin_enqueue_scripts', 'wb_cpwo_enqueue_custom_admin_scripts');
function wb_cpwo_enqueue_custom_admin_scripts($hook_suffix) {
    if (
    (isset($_GET['page']) && $_GET['page'] === 'wc-orders') || 
    (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['post']) && get_post_type($_GET['post']) === 'shop_order') || 
    (isset($_GET['post_type']) && $_GET['post_type'] === 'shop_order')
) {
       
        wp_register_script('wb_cpwo_custom_script', plugins_url('add-element.js', __FILE__), array('jquery'), '1.0', true);
        wp_enqueue_script('wb_cpwo_custom_script');

        $inline_js = "
        function sanitizePriceInput(element) {
            var input = element;
            input.value = input.value.replace(/[^0-9.]/g, '');
            input.value = input.value.replace(/(\..*)\./g, '\$1');
        }

        jQuery(document).ready(function($) {
            var counter = 0;
            $(document).off('click', '.add_custom_item').on('click', '.add_custom_item', function() {
                counter++;
                var row = '<tr class=\"custom_item_row\">' +
                    '<td class=\"product_thum\"></td>' +
                    '<td class=\"product_name\">' +
                        '<input type=\"text\" class=\"input-text product_name_in\" name=\"custom_product_name[' + counter + ']\" placeholder=\"Custom Product Name\" style=\"width:100%\" />' +
                    '</td>' +
                    '<td class=\"custom_price\">' +
                        '<input type=\"text\" class=\"input-text custom_price_in\" name=\"custom_price[' + counter + ']\" placeholder=\"Price\" style=\"width:100px\" oninput=\"sanitizePriceInput(this)\"/>' +
                    '</td>' +
                    '<td class=\"quantity\">' +
                        '<input type=\"number\" class=\"input-text custom_quantity\" name=\"custom_quantity[' + counter + ']\" placeholder=\"Quantity\" value=\"1\" min=\"1\" step=\"1\"/>' +
                    '</td>' +
                    '<td>' +
                        '<button type=\"button\" class=\"button remove_custom_item\">X</button>' +
                    '</td>' +
                    '</tr>';
                $('#order_line_items').append(row);
            });
        });
        ";
        wp_add_inline_script('wb_cpwo_custom_script', $inline_js);
    }
}