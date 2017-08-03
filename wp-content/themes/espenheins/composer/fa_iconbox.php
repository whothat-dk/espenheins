<?php 
/*
Element Description: VC fa icon_Box
*/
 
// Element Class 
class vc_fa_iconbox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_fa_iconbox_mapping' ) );
        add_shortcode( 'vc_fa_iconbox', array( $this, 'vc_render_fa_iconbox' ) );
    }
     
    // Element Mapping
    public function vc_fa_iconbox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('FA icon box', 'fa_icon_box'),
                'base' => 'vc_fa_iconbox',
                'description' => __('WHOTHAT icon box', 'vc_fa_iconbox'), 
                'category' => __('WHOTHAT elements', 'vc_fa_iconbox'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(



                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'heading' => __( 'fontawesome logo', 'vc_fa_iconbox' ),
                        'param_name' => 'fa_logo',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   


                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'Choose page', 'vc_fa_iconbox' ),
                        'param_name' => 'target_link',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),     
                          


                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'vc_fa_iconbox' ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', 'vc_fa_iconbox' ),
                    ),         
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_render_fa_iconbox( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'fa_logo'   => '',
                    'css' => '',
                    'target_link' => '',
                ), 
                $atts
            )
        );

        $href = vc_build_link( $target_link );
        if(strlen($href[url]) > 1) { 
            $anchor =  '<a href="'. $href[url] .'" target="'.$href[target].'" class="vc_fa_iconbox_link" >';
            $anchor_end =  '</a>';
        } else {

            $anchor =  '';
            $anchor_end =  '';
        }
         
        // Fill $html var with data
        $html = '

        <div class="vc_fa_iconbox_wrap ' . esc_attr( $css ) . '">
            <div class="vc_fa_iconbox_container">
                '.$anchor.'
                <i class="fa '.$fa_logo.' vc_fa_icon" aria-hidden="true"></i>
                '.$href[title].'
                '.$anchor_end.'
            </div>
        </div>';      
         
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vc_fa_iconbox();    
?>