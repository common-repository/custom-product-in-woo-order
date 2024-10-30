<?php
if (!defined('ABSPATH')) {
    exit;
}

// Handle the button actions
add_action('woocommerce_order_item_add_action_buttons', 'wb_cpwo_run_the_function_on_button_event', 10, 1);
function wb_cpwo_run_the_function_on_button_event() {
    ?>
<script type="text/javascript">
    jQuery(document).ready(function($) { 

		if (!$('.add_custom_item').length) {
                var button = $('<button type="button" class="button add_custom_item"><?php esc_html_e('Add Custom Item(s)', 'custom-product-in-woo-order'); ?></button>');
                $('.add-order-item').after(button);
            }
        // Save clicked
        $('.save-action').off('click').on('click', function(event) {
            if (!wb_cpwo_call_ajax_to_add_custom_items()) {
                event.preventDefault(); 
                return false;
            }
            if ($('#order_line_items .custom_item_row').length > 0) {
                $('.calculate-action').trigger('click');
            }
        });

        // Remove on X
        $('#order_line_items').on('click', '.remove_custom_item', function() {
            $(this).closest('tr').remove();
        });

        // Clear on cancel
        $('.cancel-action').off('click').on('click', function() {
            $('#order_line_items .custom_item_row').remove();
        });

        // AJAX
        function wb_cpwo_call_ajax_to_add_custom_items() {
            var custom_items = [];
            var incompleteRow = false;
            $('#order_line_items .custom_item_row').each(function() {
                var row = $(this);
                var custom_product_name = row.find('.product_name_in').val();
                var custom_quantity = row.find('.custom_quantity').val();
                var custom_price = row.find('.custom_price_in').val();
                if (!custom_product_name) {
                    incompleteRow = true; 
                    return false;
                }
                custom_items.push({
                    custom_product_name: custom_product_name,
                    custom_quantity: custom_quantity,
                    custom_price: custom_price
                });
            });

            if (incompleteRow) {
                alert('Please add the custom product name or remove empty fields before proceeding.');
                return false;
            }

            if (custom_items.length > 0) {
                var order_id = $('#post_ID').val();

                $.post(cpwo_ajax_obj.ajax_url, {  
                    _ajax_nonce: cpwo_ajax_obj.nonce,
                    action: 'save_all_custom_items',
                    order_id: order_id,
                    custom_items: custom_items,
                    add_order_note: true
                }, function(response) { 
                    if (response.success) {
                        
                    } else {
                        alert('Error: ' + response.data);
                    }
                });
            }

            return true;
        }
    });
</script>
    <?php
}
