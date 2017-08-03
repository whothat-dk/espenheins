<?php 
/*
Element Description: VC info Box
*/
 
// Element Class 
class vc_infobox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_infobox_mapping' ) );
        add_shortcode( 'vc_infobox', array( $this, 'vc_render_infobox' ) );
    }
     
    // Element Mapping
    public function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Info box', 'info_box'),
                'base' => 'vc_infobox',
                'description' => __('WHOTHAT infobox', 'info_box'), 
                'category' => __('WHOTHAT elements', 'info_box'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(




                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'heading' => __( 'Title', 'info_box' ),
                        'param_name' => 'title',
                        'value' => __( 'Input title', 'info_box' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   

                    array(
                        'type' => 'textfield',
                        'holder' => 'a',
                        'heading' => __( 'Phone', 'info_box' ),
                        'param_name' => 'phone',
                        'value' => __( '+45 00 00 00 00', 'info_box' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   

                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'Choose page', 'image_box' ),
                        'param_name' => 'target_link',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),     
                          


                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'info_box' ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', 'info_box' ),
                    ),         
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_render_infobox( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'phone'   => '',
                    'css' => '',
                    'target_link' => '',
                ), 
                $atts
            )
        );

        $href = vc_build_link( $target_link );
         
        // Fill $html var with data
        $html = '
        <style>

        </style>
        <div class="vc_infobox_wrap ' . esc_attr( $css ) . '">
            <div class="vc_infobox_container">
                    <h2 class="vc_infobox_title">' . $title . '</h2>
                    <a href="tel:'.$phone.'" class="vc_infobox_phone">' . $phone . '</a>
            </div>
            <div class="vc_infobox_container_bottom">
                <a href="'. $href[url] .'" target="'.$href[target].'" >'.$href[title].'</a>
            </div>
        </div>';      
         
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vc_infobox();    
?>