<?php

  
// Plus Minus Quantity Buttons @ WooCommerce Product Page & Carts
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
   
}

// Display Sorting 

add_shortcode('wc_sorting','woocommerce_catalog_ordering');


// Automatically Delete Woocommerce Images After Deleting a Product
add_action( 'before_delete_post', 'delete_product_images', 10, 1 );

function delete_product_images( $post_id )
{
    $product = wc_get_product( $post_id );

    if ( !$product ) {
        return;
    }

    $featured_image_id = $product->get_image_id();
    $image_galleries_id = $product->get_gallery_image_ids();

    if( !empty( $featured_image_id ) ) {
        wp_delete_post( $featured_image_id );
    }

    if( !empty( $image_galleries_id ) ) {
        foreach( $image_galleries_id as $single_image_id ) {
            wp_delete_post( $single_image_id );
        }
    }
}




// Variable Product Price Range: "From: $$$min_price'
 
add_filter( 'woocommerce_variable_price_html', 'bbloomer_variation_price_format_min', 9999, 2 );
  
function bbloomer_variation_price_format_min( $price, $product ) {
   $prices = $product->get_variation_prices( true );
   $min_price = current( $prices['price'] );
   $price = sprintf( __( 'From %1$s', 'woocommerce' ), wc_price( $min_price ) );
   return $price;
}




 //Change the add to cart text on single product

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );



function woo_custom_cart_button_text() { 

                global $woocommerce; 

                foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {

                                $_product = $values['data']; 

                                if( get_the_ID() == $_product->id ) {

                                                return __('ADD AGAIN', 'woocommerce');
                  
                


                                }
                }
 
                return __('ADD TO BASKET', 'woocommerce');
}





//Change the add to cart text on product archives

add_filter( 'woocommerce_product_add_to_cart_text', 'already_in_cart_archive_product', 99, 2 );

function already_in_cart_archive_product( $label, $product ) {
  
   if ( $product->get_type() == 'simple' && $product->is_purchasable() && $product->is_in_stock() ) {
     
      foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
      
         $_product = $values['data'];
      
         if( get_the_ID() == $_product->get_id() ) {
       
            $label = __('ADD AGAIN', 'woocommerce');
         }
      }
   }
  
   return $label;
}



// Hide Shipping when Free is Available

function my_hide_shipping_when_free_is_available( $rates ) {
  $free = array();

  foreach ( $rates as $rate_id => $rate ) {
    if ( 'free_shipping' === $rate->method_id ) {
      $free[ $rate_id ] = $rate;
      break;
    }
  }

  return ! empty( $free ) ? $free : $rates;
}

add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );



// Change number of products that are displayed per page (shop page)

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 40);

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 40;
  return $cols;
}


// Ajax add to cart Button

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {

            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
            $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
            $variation_id = absint($_POST['variation_id']);
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
            $product_status = get_post_status($product_id);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

                do_action('woocommerce_ajax_added_to_cart', $product_id);

                if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                    wc_add_to_cart_message(array($product_id => $quantity), true);
                }

                WC_AJAX :: get_refreshed_fragments();
            } else {

                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);
            }

            wp_die();
        }
