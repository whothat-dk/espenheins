<?php 
/*
Element Description: VC Image Box
*/
 
// Element Class 
class vc_imagebox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_imagebox_mapping' ) );
        add_shortcode( 'vc_imagebox', array( $this, 'vc_render_imagebox' ) );
    }
     
    // Element Mapping
    public function vc_imagebox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Image box', 'image_box'),
                'base' => 'vc_imagebox',
                'description' => __('WHOTHAT imagebox', 'image_box'), 
                'category' => __('WHOTHAT elements', 'image_box'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(


                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'heading' => __( 'Title', 'image_box' ),
                        'param_name' => 'title',
                        'value' => __( 'Input title', 'image_box' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   
                         
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'heading' => __( 'Image', 'image_box' ),
                        'param_name' => 'image',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),  
                     

                    array(
                        'type' => 'colorpicker',
                        'heading' => __( 'Hover color', 'image_box' ),
                        'param_name' => 'hover_color',
                        'value' => __( 'Hover color', 'image_box' ),
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
                        'type' => 'textfield',
                        'heading' => __( 'Font size', 'image_box' ),
                        'param_name' => 'font_size',
                        'value' => __( '24', 'image_box' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Text style',
                    ),   

                    array(
                        'type' => 'colorpicker',
                        'heading' => __( '', 'image_box' ),
                        'param_name' => 'font_color',
                        'value' => __( '#ffffff', 'image_box' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Text style',
                    ),   


                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'image_box' ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', 'image_box' ),
                    ),         
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_render_imagebox( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'image' => '',
                    'css' => '',
                    'hover_color' => '',
                    'font_color' => '#ffffff',
                    'font_size' => '24',
                    'target_link' => '',
                ), 
                $atts
            )
        );

        $img = wp_get_attachment_image_src($image, "large");
        $href = vc_build_link( $target_link );
        if(strlen($href[url]) > 1) { 
            $anchor =  '<a href="'. $href[url] .'" target="'.$href[target].'" >';
            $anchor_end =  '</a>';
        } else {

            $anchor =  '';
            $anchor_end =  '';
        }
        // Fill $html var with data
        $html = '
        <style>
            .vc_imagebox_image{
                background-image: url('. $img[0] .');
                transition: all 0.3s ease;
            }
            .vc_imagebox_hover:hover{
                background: '. $hover_color .';
            }
            .vc_imagebox_title{
                font-size: '.$font_size.'px;
                color: '. $font_color .';
            }
        </style>
        <div class="vc_imagebox_wrap ' . esc_attr( $css ) . '">
            '. $anchor .'
                <div class="vc_imagebox_image" >
                    <div class="vc_imagebox_hover">
                        <h2 class="vc_imagebox_title">' . $title . '</h2>
                    </div>
                </div>
            '. $anchor_end .'
        </div>';      
         
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vc_imagebox();    
?>