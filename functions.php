<?php

function weeklymenu_files() {
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css2?family=Piazzolla:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');
    wp_enqueue_script('feather_icons', '//unpkg.com/feather-icons');
    wp_enqueue_script('lottie_svg', '//cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.3/lottie_svg.min.js',array(), '1', true);
    wp_enqueue_script('custom_script', get_theme_file_uri() . '/script.js', array(), '1', true);
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts','weeklymenu_files' );

function weeklymenu_features() {
    add_theme_support( 'title-tag' );
}
add_action('after_setup_theme','weeklymenu_features');

function weeklymenu_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'weeklymenu_add_woocommerce_support' );

//disable woocommerce css
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// shop page

add_action( 'woocommerce_after_shop_loop_item_title', 'product_tags', 7 );
add_action( 'woocommerce_after_shop_loop_item_title', 'product_weight', 6 );
add_action( 'woocommerce_after_shop_loop_item_title', 'product_stock_quantity', 20 );

function product_weight () {
    global $product;
    $weight = $product->get_attribute( 'weight' );
    echo '<div class="weight">' . $weight . '</div>';
}

function product_stock_quantity () {
    global $product;
    $stock = $product->get_stock_quantity();
    echo '<div class="stock">' . $stock . ' plats restantes</div>';
}

// remove breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// remove content before shop (result count and ordering selection)
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// change product archive link location
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );


// remove sidebar globally
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// product page

// remove meta (sku, categories, tags)
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// disbable woocommerce css
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}


// single product page

// remove product tabs and related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// replace stock wording

add_filter( 'woocommerce_get_availability_text', 'bbloomer_custom_get_availability_text', 99, 2 );

function bbloomer_custom_get_availability_text( $availability, $product ) {
   $stock = $product->get_stock_quantity();
   if ( $product->is_in_stock() && $product->managing_stock() ) $availability = $stock . ' plats restants';
   return $availability;
}

// add day information

add_action( 'woocommerce_single_product_summary', 'product_day', 2 );

function product_day () {
    global $product;
    $day = $product->get_attribute( 'jour' );
    echo '<div class="jour">' . $day . '</div>';
}

// add description

add_action('woocommerce_single_product_summary', 'add_description', 20);

function add_description () {
    echo '<div class="description"><h2>Ingrédients</h2>';
    the_content();
    echo '</div>';
}

// add tags

add_action('woocommerce_single_product_summary', 'product_tags', 15);

function product_tags () {
    global $product;
    echo '<div class="tags">' . wc_get_product_tag_list( $product->get_id(), ', ' ) . '</div>';
}


?>