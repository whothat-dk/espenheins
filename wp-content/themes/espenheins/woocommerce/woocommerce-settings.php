<?

// Woocommerce settings

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );

function jk_change_breadcrumb_home_text( $defaults ) {
    $defaults['home'] = 'Forside';
    return $defaults;
}
function jk_change_breadcrumb_delimiter( $defaults ) {
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
    return $defaults;
}


function woocommerce_template_loop_product_thumbnail() { 
    echo "<div class=\"thumb_container \" >";
    echo woocommerce_get_product_thumbnail();
    echo "</div>";
}
function woocommerce_template_loop_add_to_cart() {
	
}   


?>