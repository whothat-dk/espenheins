<?php 
/*
Element Description: VC employee Box
*/
 
// Element Class 
class vc_employeebox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_employeebox_mapping' ) );
        add_shortcode( 'vc_employeebox', array( $this, 'vc_render_employeebox' ) );
    }
     
    // Element Mapping
    public function vc_employeebox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Quote box', 'employee_box'),
                'base' => 'vc_employeebox',
                'description' => __('WHOTHAT infobox', 'employee_box'), 
                'category' => __('WHOTHAT elements', 'employee_box'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'heading' => __( 'fontawesome logo', 'employee_box' ),
                        'param_name' => 'fa_logo',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   


                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'employee_box' ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', 'employee_box' ),
                    ),         
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_render_employeebox( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'css' => '',
                ), 
                $atts
            )
        );


        $params = array( 
            'limit' => 1,
            'orderby' => 'RAND()'
        ); 

        // Run the find 
        $quotes = pods( 'testimonials', $params ); 

        // Loop through the records returned 
        while ( $quotes->fetch() ) { 
            $name = $quotes->display('quote_name');
            $position = $quotes->display('quote_stilling');
            $testimonial = $quotes->display('post_content');
            $testimonial = strip_tags($testimonial, "<br>");
            $img = get_the_post_thumbnail($quotes->field('id'));
        }
        // Fill $html var with data
        $html = '
        <div class="vc_employeebox_wrap ' . esc_attr( $css ) . '">
            <div class="vc_employeebox_container">
                <p class="vc_employeebox_testimonial">"'.$testimonial.'"</p>
                <span class="vc_employeebox_name">'.$name.'</span>
                <span class="vc_employeebox_position">'.$position.'</span>
                <div class="vc_employeebox_image">'.$img.'</div>
            </div>
        </div>';      
         
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vc_employeebox();    
?>