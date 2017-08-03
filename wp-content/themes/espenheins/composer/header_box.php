<?php 
/*
Element Description: VC Header Box
*/
 
// Element Class 
class vc_headerbox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_headerbox_mapping' ) );
        add_shortcode( 'vc_headerbox', array( $this, 'vc_render_headerbox' ) );
    }
     
    // Element Mapping
    public function vc_headerbox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Header box', 'header_box'),
                'base' => 'vc_headerbox',
                'description' => __('WHOTHAT Headerbox', 'header_box'), 
                'category' => __('WHOTHAT elements', 'header_box'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(


                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'heading' => __( 'Page title', 'header_box' ),
                        'param_name' => 'title',
                        'value' => __( 'Input page title', 'header_box' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   

                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'header_box' ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', 'header_box' ),
                    ),         
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_render_headerbox( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'css' => ''
                ), 
                $atts
            )
        );
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
        // Fill $html var with data
        $html = '
        <div class="vc_headerbox_wrap ' . esc_attr( $css_class ) . '">
            <div class="gc" >
                <div class="col12" >
                    <div class="vc_headerbox_title" >
                        <h1>' . $title . '</h1>
                    </div>
                </div>
            </div>
        </div>';      
         
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vc_headerbox();    
?>