<?php
// REMOVE WP STUFF
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head', 10 );
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10 );
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');


//CSS Control
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
wp_enqueue_style( 'woocommerce-layout', plugins_url() .'/woocommerce/assets/css/woocommerce-layout.css' );
wp_enqueue_style( 'woocommerce', plugins_url() .'/woocommerce/assets/css/woocommerce.css' );
wp_enqueue_style( 'woocommerce-custom', get_template_directory_uri() .'/css/woocommerce-custom.css' );
wp_enqueue_style( 'fonts', get_template_directory_uri() .'/css/fonts/fonts.css' );
wp_enqueue_style( 'responsive', get_template_directory_uri() .'/css/responsive.css' );
wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.css' );

// Javascript
wp_enqueue_script( 'main', get_template_directory_uri() . '/js/scripts.js', array ( 'jquery' ), 1.1, true);

// ADD SUPPORT FOR NAV_MENUS.

function main_nav() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu-1' => __( 'Footer Menu 1' ),
      'footer-menu-2' => __( 'Footer Menu 2' ),
      'footer-menu-3' => __( 'Footer Menu 3' ),
      'information-menu' => __( 'Information menu' ),
    )
  );
}
add_action( 'init', 'main_nav' );

//Add featured image

add_theme_support( 'post-thumbnails', array( 'testimonials' ) );


//ADD SUPPORT FOR THEME CUSTOMIZATION
add_action( 'customize_register', 'theme_options' );



// Wp Customize
function theme_options( $wp_customize ) {
    //Header settings
    $wp_customize->add_section( 'header_options', 
        array(
            'title'       => __( 'Header Settings', 'priisholm' ),
            'priority'    => 100,
            'description' => __('Change header options here.', 'priisholm'), 
        ) 
    );

    //footer settings
    $wp_customize->add_section( 'footer_options', 
        array(
            'title'       => __( 'Footer Settings', 'espenheins' ),
            'priority'    => 100,
            'description' => __('Change footer options here.', 'espenheins'), 
        ) 
    );

    //Header
    $wp_customize->add_setting( 'header_logo' );
    $wp_customize->add_setting( 'resp_logo' );
    $wp_customize->add_setting( 'header_phone' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
        'label'    => __( 'Logo', 'espenheins' ),
        'section'  => 'header_options',
        'settings' => 'header_logo',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'resp_logo', array(
        'label'    => __( 'Mobile menu logo', 'espenheins' ),
        'section'  => 'header_options',
        'settings' => 'resp_logo',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_phone', array(
        'label'    => __( 'Døgnvagt telefon', 'espenheins' ),
        'section'  => 'header_options',
        'settings' => 'header_phone',
        'type'     => 'text',
    ) ) );


    //Footer
    $wp_customize->add_setting( 'footer_logo' );
    $wp_customize->add_setting( 'footer_company' );
    $wp_customize->add_setting( 'footer_address' );
    $wp_customize->add_setting( 'footer_city' );
    $wp_customize->add_setting( 'footer_cvr' );
    $wp_customize->add_setting( 'footer_tel' );
    $wp_customize->add_setting( 'footer_email' );
    $wp_customize->add_setting( 'footer_logo_1' );
    $wp_customize->add_setting( 'footer_logo_2' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
        'label'    => __( 'Logo', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_logo',
    ) ) );


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_company', array(
        'label'    => __( 'Company', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_company',
        'type'     => 'text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_address', array(
        'label'    => __( 'Address', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_address',
        'type'     => 'text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_city', array(
        'label'    => __( 'City', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_city',
        'type'     => 'text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_cvr', array(
        'label'    => __( 'CVR', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_cvr',
        'type'     => 'text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_tel', array(
        'label'    => __( 'Telephone', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_tel',
        'type'     => 'text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_email', array(
        'label'    => __( 'Email', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_email',
        'type'     => 'text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_1', array(
        'label'    => __( 'Footer logoer 1', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_logo_1',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_2', array(
        'label'    => __( 'Footer logoer 2', 'espenheins' ),
        'section'  => 'footer_options',
        'settings' => 'footer_logo_2',
    ) ) );


}


require_once( get_template_directory().'/woocommerce/woocommerce-settings.php' ); 

// Visual composer settings

// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );
 
function vc_before_init_actions() {
     
    // Require new custom Element
    require_once( get_template_directory().'/composer/imageviewer.php' ); 
    require_once( get_template_directory().'/composer/header_box.php' ); 
    require_once( get_template_directory().'/composer/infobox.php' ); 
    require_once( get_template_directory().'/composer/employee_box.php' ); 
    require_once( get_template_directory().'/composer/fa_iconbox.php' ); 
     
}
// WooCommerce
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {
  global $woocommerce, $post;
  echo '<div class="options_group">';
woocommerce_wp_text_input( 
	array( 
		'id'          => '_EAN', 
		'label'       => 'EAN nr.', 
		'placeholder' => 'EAN nummer her',
		'desc_tip'    => 'true'
	)
);

woocommerce_wp_text_input( 
	array( 
		'id'          => '_typebeskrivelse', 
		'label'       => 'Typebeskrivelse', 
		'placeholder' => 'Skriv typebeskrivelse her',
		'desc_tip'    => 'true'
	)
);
  echo '</div>';
}

// Text Field



function woo_add_custom_general_fields_save( $post_id ){
	
	// Text Field
	$woocommerce_text_field = $_POST['_EAN'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, '_EAN', esc_attr( $woocommerce_text_field ) );

	$woocommerce_text_field = $_POST['_typebeskrivelse'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, '_typebeskrivelse', esc_attr( $woocommerce_text_field ) );

	
}

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 21px 24px 27px 28px 32px 36px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );


?>