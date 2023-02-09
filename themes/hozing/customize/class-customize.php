<?php

if (!defined( 'ABSPATH' )) {
    exit;
}
if (!class_exists( 'Hozing_Customize' )){

class Hozing_Customize {
	
	public function __construct() {
        add_action( 'customize_register', array( $this, 'hozing_customize_register' ) );
    }

    public function hozing_customize_register($wp_customize) {
        
        $this->hozing_init_remove_setting( $wp_customize );
        $this->hozing_init_ova_typography( $wp_customize );
        $this->hozing_init_ova_layout( $wp_customize );
        $this->hozing_init_ova_header( $wp_customize );
        $this->hozing_init_ova_footer( $wp_customize );
        $this->hozing_init_ova_blog( $wp_customize );
        $this->hozing_init_ova_countdown( $wp_customize );
        $this->hozing_init_ova_calendar( $wp_customize );
        $this->hozing_init_ova_event_calendar( $wp_customize );

        do_action( 'hozing_customize_register', $wp_customize );
    }

    public function hozing_init_remove_setting( $wp_customize ){
    	/* Remove Colors &  Header Image Customize */
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');
    }

    
    
    /* Typo */
    public function hozing_init_ova_typography($wp_customize){
    	
    	


    		/* Body Pane ******************************/
			$wp_customize->add_section( 'typo_general' , array(
			    'title'      => esc_html__( 'Typography', 'hozing' ),
			    'priority'   => 1,
			   
			) );


				/* General Typo */
				$wp_customize->add_setting( 'general_heading', array(
				  'default' => '',
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control(
					new Hozing_Customize_Control_Heading( 
					$wp_customize, 
					'general_heading', 
					array(
						'label'          => esc_html__('General Typo','hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'general_heading',
					) )
				);


				/* General Font */
				$wp_customize->add_setting( 'primary_font',
					array(
						'default' => hozing_default_primary_font(),
						'sanitize_callback' => 'hozing_google_font_sanitization'
					)
				);
				$wp_customize->add_control( new Hozing_Google_Font_Select_Custom_Control( $wp_customize, 'primary_font',
					array(
						'label' => __( 'Primary Font', 'hozing' ),
						'section' => 'typo_general',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'popular',
						),
					)
				) );
				

				/* Font Size */
				$wp_customize->add_setting( 'general_font_size', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '16px',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				
				$wp_customize->add_control('general_font_size', array(
					'label' => esc_html__('Font Size','hozing'),
					'description' => esc_html__('Example: 16px, 1.2em','hozing'),
					'section' => 'typo_general',
					'settings' => 'general_font_size',
					'type' 		=>'text'
				));

				/* Line Height */
				$wp_customize->add_setting( 'general_line_height', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '23px',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				
				$wp_customize->add_control('general_line_height', array(
					'label' => esc_html__('Line height','hozing'),
					'description' => esc_html__('Example: 23px, 1.5em','hozing'),
					'section' => 'typo_general',
					'settings' => 'general_line_height',
					'type' 		=>'text'
				));


				/* Letter Space */
				$wp_customize->add_setting( 'general_letter_space', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '0px',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				
				$wp_customize->add_control('general_letter_space', array(
					'label' => esc_html__('Letter Spacing','hozing'),
					'description' => esc_html__('Example: 0px, 0.5em','hozing'),
					'section' => 'typo_general',
					'settings' => 'general_letter_space',
					'type' 		=>'text'
				));


				$wp_customize->add_setting( 'general_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '#343434',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'general_color', 
					array(
						'label'          => esc_html__("Content Color",'hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'general_color',
					) ) 
				);
						

				/* Message */
				$wp_customize->add_setting( 'second_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Hozing_Customize_Control_Heading( 
					$wp_customize, 
					'second_font_message', 
					array(
						'label'          => esc_html__('Second Font','hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'second_font_message',
					) )
				);

				/* Heading Font */
				$wp_customize->add_setting( 'second_font',
					array(
						'default' => hozing_default_second_font(),
						'sanitize_callback' => 'hozing_google_font_sanitization'
					)
				);
				$wp_customize->add_control( new Hozing_Google_Font_Select_Custom_Control( $wp_customize, 'second_font',
					array(
						'label' => __( 'Font', 'hozing' ),
						'section' => 'typo_general',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'popular',
						),
					)
				) );



				$wp_customize->add_setting( 'color_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control(
					new Hozing_Customize_Control_Heading( 
					$wp_customize, 
					'color_message', 
					array(
						'label'          => esc_html__('General Color','hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'color_message',
					) )
				);


				$wp_customize->add_setting( 'primary_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '#b9a271',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'primary_color', 
					array(
						'label'          => esc_html__("Primary color",'hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'primary_color',
					) ) 
				);

				


				
				

				



				/* Custom Font */
				/* Message */
				$wp_customize->add_setting( 'custom_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Hozing_Customize_Control_Heading( 
					$wp_customize, 
					'custom_font_message', 
					array(
						'label'          => esc_html__('Custom Font','hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'custom_font_message',
					) )
				);


				$wp_customize->add_control(
					new Hozing_Customize_Control_Heading( 
					$wp_customize, 
					'custom_font_message', 
					array(
						'label'          => esc_html__('Custom Font','hozing'),
			            'section'        => 'typo_general',
			            'settings'       => 'custom_font_message',
					) )
				);

				$wp_customize->add_setting( 'ova_custom_font', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control('ova_custom_font', array(
					'label' => esc_html__('Custom Font','hozing'),
					'description' => esc_html__('Step 1: Insert font-face in style.css file: Refer https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp. Step 2: Insert font-family and font-weight like format: 
						["Perpetua", "Regular:Bold:Italic:Light"]. Step 3: Refresh customize page to display new font in dropdown font field.','hozing'),
					'section' => 'typo_general',
					'settings' => 'ova_custom_font',
					'type' =>'textarea'
				));

		
			

    }


    /* Layout */
    public function hozing_init_ova_layout( $wp_customize ){

    	$wp_customize->add_section( 'layout_section' , array(
		    'title'      => esc_html__( 'Global Layout', 'hozing' ),
		    'priority'   => 2,
		) );


    		$wp_customize->add_setting( 'global_preload', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'yes',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_preload', array(
				'label' => esc_html__('Preload','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_preload',
				'type' =>'select',
				'choices' => array(
					'yes' => esc_html__('Yes', 'hozing'),
					'no' => esc_html__('No', 'hozing')
				)
			));

			$wp_customize->add_setting( 'global_layout', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'layout_2r',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_layout', array(
				'label' => esc_html__('Layout','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_layout',
				'type' =>'select',
				'choices' => apply_filters( 'hozing_define_layout', '' )
			));

			$wp_customize->add_setting( 'global_sidebar_width', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '320',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_sidebar_width', array(
				'label' => esc_html__('Sidebar Width (px)','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_sidebar_width',
				'type' =>'number'
			));
			

			$wp_customize->add_setting( 'global_width_content', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '1170',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_width_content', array(
				'label' => esc_html__('Width Content (px)','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_width_content',
				'type' =>'number',
				'default' => '1170'
			));

			$wp_customize->add_setting( 'global_width_site', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'wide',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_width_site', array(
				'label' => esc_html__('Width Site','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_width_site',
				'type' =>'select',
				'choices' => apply_filters('hozing_define_wide_boxed', '')
			));

			$wp_customize->add_setting( 'global_boxed_container_width', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '1170',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_boxed_container_width', array(
				'label' => esc_html__('Boxed Container Width (px)','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_boxed_container_width',
				'type' =>'number',
				'default' => '1170'
			));
			$wp_customize->add_setting( 'global_boxed_offset', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '20',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_boxed_offset', array(
				'label' => esc_html__('Boxed Offset (px)','hozing'),
				'section' => 'layout_section',
				'settings' => 'global_boxed_offset',
				'type' =>'number',
				'default' => '20'
			));

    }

    /* Header */
    public function hozing_init_ova_header( $wp_customize ){

    	$wp_customize->add_section( 'header_section' , array(
		    'title'      => esc_html__( 'Header', 'hozing' ),
		    'priority'   => 3,
		) );

			$wp_customize->add_setting( 'global_header', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_header', array(
				'label' => esc_html__('Header Default','hozing'),
				'description' => esc_html__('This isn\'t effect in Blog' ,'hozing'),
				'section' => 'header_section',
				'settings' => 'global_header',
				'type' =>'select',
				'choices' => apply_filters('hozing_list_header', '')
			));

    }

    /* Footer */
    public function hozing_init_ova_footer( $wp_customize ){

    	$wp_customize->add_section( 'footer_section' , array(
		    'title'      => esc_html__( 'Footer', 'hozing' ),
		    'priority'   => 4,
		) );

			$wp_customize->add_setting( 'global_footer', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_footer', array(
				'label' => esc_html__('Footer Default','hozing'),
				'description' => esc_html__('This isn\'t effect in Blog' ,'hozing'),
				'section' => 'footer_section',
				'settings' => 'global_footer',
				'type' =>'select',
				'choices' => apply_filters('hozing_list_footer', '')
			));

    }


    /* Blog */
    public function hozing_init_ova_blog( $wp_customize ){

    	$wp_customize->add_panel( 'blog_panel', array(
		    'title'      => esc_html__( 'Blog', 'hozing' ),
		    'priority' => 7,
		) );

			$wp_customize->add_section( 'blog_section' , array(
			    'title'      => esc_html__( 'Archive', 'hozing' ),
			    'priority'   => 30,
			    'panel' => 'blog_panel',
			) );

				$wp_customize->add_setting( 'blog_type', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_type', array(
					'label' => esc_html__('Type','hozing'),
					'section' => 'blog_section',
					'settings' => 'blog_type',
					'type' =>'select',
					'choices' => array(
						'default' => esc_html__('Default', 'hozing'),
						'version1' => esc_html__('Version 1', 'hozing'),
						'version2' => esc_html__('Version 2', 'hozing'),
						'version3' => esc_html__('Version 3', 'hozing'),
						'three_column' => esc_html__('Three Column', 'hozing'),
						'blog_sidebar' => esc_html__('Blog Sidebar', 'hozing'),
					)
				));

				$wp_customize->add_setting( 'blog_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'layout_2r',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_layout', array(
					'label' => esc_html__('Layout','hozing'),
					'section' => 'blog_section',
					'settings' => 'blog_layout',
					'type' =>'select',
					'choices' => apply_filters( 'hozing_define_layout', '' )
				));

				$wp_customize->add_setting( 'blog_sidebar_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '320',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_sidebar_width', array(
					'label' => esc_html__('Sidebar Width (px)','hozing'),
					'section' => 'blog_section',
					'settings' => 'blog_sidebar_width',
					'type' =>'number'
				));


				$wp_customize->add_setting( 'show_title', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'yes',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('show_title', array(
					'label' => esc_html__('Show Title','hozing'),
					'section' => 'blog_section',
					'settings' => 'show_title',
					'type' =>'radio',
					'choices' => array(
						'yes' => esc_html__('Yes', 'hozing'),
						'no' => esc_html__('No', 'hozing'),
					)
				));

				$wp_customize->add_setting( 'show_date', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'yes',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control('show_date', array(
					'label' => esc_html__('Show Date','hozing'),
					'section' => 'blog_section',
					'settings' => 'show_date',
					'type' =>'radio',
					'choices' => array(
						'yes' => esc_html__('Yes', 'hozing'),
						'no' => esc_html__('No', 'hozing'),
					)
				));

				$wp_customize->add_setting( 'show_excerpt', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'yes',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control('show_excerpt', array(
					'label' => esc_html__('Show Exerpt','hozing'),
					'section' => 'blog_section',
					'settings' => 'show_excerpt',
					'type' =>'radio',
					'choices' => array(
						'yes' => esc_html__('Yes', 'hozing'),
						'no' => esc_html__('No', 'hozing'),
					)
				));

				$wp_customize->add_setting( 'show_readmore', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'yes',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control('show_readmore', array(
					'label' => esc_html__('Show Readmore','hozing'),
					'section' => 'blog_section',
					'settings' => 'show_readmore',
					'type' =>'radio',
					'choices' => array(
						'yes' => esc_html__('Yes', 'hozing'),
						'no' => esc_html__('No', 'hozing'),
					)
				));



				

				$wp_customize->add_setting( 'blog_header', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_header', array(
					'label' => esc_html__('Header','hozing'),
					'section' => 'blog_section',
					'settings' => 'blog_header',
					'type' =>'select',
					'choices' => apply_filters('hozing_list_header', '')
				));

				$wp_customize->add_setting( 'blog_footer', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_footer', array(
					'label' => esc_html__('Footer','hozing'),
					'section' => 'blog_section',
					'settings' => 'blog_footer',
					'type' =>'select',
					'choices' => apply_filters('hozing_list_footer', '')
				));


			$wp_customize->add_section( 'single_section' , array(
			    'title'      => esc_html__( 'Single', 'hozing' ),
			    'priority'   => 30,
			    'panel' => 'blog_panel',
			) );	

				$wp_customize->add_setting( 'single_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'layout_2r',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_layout', array(
					'label' => esc_html__('Layout','hozing'),
					'section' => 'single_section',
					'settings' => 'single_layout',
					'type' =>'select',
					'choices' => apply_filters( 'hozing_define_layout', '' )
				));

				$wp_customize->add_setting( 'single_sidebar_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '320',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_sidebar_width', array(
					'label' => esc_html__('Sidebar Width (px)','hozing'),
					'section' => 'single_section',
					'settings' => 'single_sidebar_width',
					'type' =>'number'
				));


				

				$wp_customize->add_setting( 'single_header', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_header', array(
					'label' => esc_html__('Header','hozing'),
					'section' => 'single_section',
					'settings' => 'single_header',
					'type' =>'select',
					'choices' => apply_filters('hozing_list_header', '')
				));

				$wp_customize->add_setting( 'single_footer', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_footer', array(
					'label' => esc_html__('Footer','hozing'),
					'section' => 'single_section',
					'settings' => 'single_footer',
					'type' =>'select',
					'choices' => apply_filters('hozing_list_footer', '')
				));

    }

   
	/* Countdown */
    public function hozing_init_ova_countdown( $wp_customize ){

    	$wp_customize->add_section( 'countdown_language', array(
		    'title'      => esc_html__( 'Countdown Language', 'hozing' ),
		    'priority' => 10,
		) );
		$wp_customize->add_setting( 'choice_language', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('choice_language', array(
				'label' => esc_html__('Language','hozing'),
				'section' => 'countdown_language',
				'settings' => 'choice_language',
				'type' =>'select',
				'choices' => array(
					''   => 'English',
					'ar' => 'Arabic',
					'bg' => 'Bulgarian',
					'bn' => 'Bengali/Bangla',
					'bs' => 'Bosnian',
					'ca' => 'Catalan',
					'cs' => 'Czech',
					'cy' => 'Welsh',
					'da' => 'Danish',
					'de' => 'German',
					'el' => 'Greek',
					'es' => 'Spanish',
					'et' => 'Estonian',
					'fa' => 'Farsi/Persian',
					'fi' => 'Finnish',
					'fo' => 'Faroese',
					'fr' => 'French',
					'gl' => 'Galician',
					'gu' => 'Gujarati',
					'he' => 'Hebrew',
					'hr' => 'Croatian',
					'hu' => 'Hungarian',
					'hy' => 'Armenian',
					'id' => 'Indonesian',
					'is' => 'Icelandic',
					'it' => 'Italian',
					'ja' => 'Japanese',
					'kn' => 'Kannada',
					'ko' => 'Korean',
					'lt' => 'Lithuanian',
					'lv' => 'Latvian',
					'mk' => 'Macedonian',
					'ml' => 'Malayalam',
					'ms' => 'Malaysian',
					'my' => 'Burmese',
					'nb' => 'Norwegian',
					'nl' => 'Dutch',
					'pl' => 'Polish',
					'pt-BR' => 'Portuguese/Brazilian',
					'ro' => 'Romanian',
					'ru' => 'Russian',
					'sk' => 'Slovak',
					'sl' => 'Slovenian',
					'sq' => 'Albanian',
					'sr-SR' => 'Serbian Latin',
					'sr' => 'Serbian Cyrillic',
					'sv' => 'Swedish',
					'th' => 'Thai',
					'tr' => 'Turkish',
					'uk' => 'Ukrainian',
					'ur' => 'Urdu',
					'uz' => 'Uzbek',
					'vi' => 'Vietnamese',
					'zh-CN' => 'Chinese/Simplified',
					'zh-TW' => 'Chinese/Traditional',
				),
			));
    }

    /* Popup Calendar */
    public function hozing_init_ova_calendar( $wp_customize ){

    	$wp_customize->add_section( 'calendar_language', array(
		    'title'      => esc_html__( 'Popup Calendar Language', 'hozing' ),
		    'priority' => 10,
		) );
		$wp_customize->add_setting( 'choice_cal_lang', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('choice_cal_lang', array(
				'label' => esc_html__('Language','hozing'),
				'section' => 'calendar_language',
				'settings' => 'choice_cal_lang',
				'type' =>'select',
				'choices' => array(
					''   => 'English',
					'af' => 'Afrikaans',
					'ar-DZ' => 'Algerian Arabic',
					'ar' => 'Arabic',
					'az' => 'Azerbaijani',
					'be' => 'Belarusian',
					'bg' => 'Bulgarian',
					'bn' => 'Bengali/Bangla',
					'bs' => 'Bosnian',
					'ca' => 'Catalan',
					'cs' => 'Czech',
					'cy-GB' => 'Welsh/UK',
					'da' => 'Danish',
					'de' => 'German',
					'el' => 'Greek',
					'en-AU' => 'English/Australia',
					'en-GB' => 'English/UK',
					'en-NZ' => 'English/New Zealand',
					'eo' => 'Esperanto',
					'es' => 'Spanish',
					'et' => 'Estonian',
					'eu' => 'Basque',
					'fa' => 'Farsi/Persian',
					'fi' => 'Finnish',
					'fo' => 'Faroese',
					'fr-CA' => 'Canadian-French',
					'fr-CH' => 'Swiss-French',
					'fr' => 'French',
					'gl' => 'Galician',
					'he' => 'Hebrew',
					'hi' => 'Hindi',
					'hr' => 'Croatian',
					'hu' => 'Hungarian',
					'hy' => 'Armenian',
					'id' => 'Indonesian',
					'is' => 'Icelandic',
					'it-CH' => 'Italian CH',
					'it' => 'Italian',
					'ja' => 'Japanese',
					'ka' => 'Georgian',
					'kk' => 'Kazakh',
					'km' => 'Khmer',
					'ko' => 'Korean',
					'ky' => 'Kyrgyz',
					'lb' => 'Luxembourgish',
					'lt' => 'Lithuanian',
					'lv' => 'Latvian',
					'mk' => 'Macedonian',
					'ml' => 'Malayalam',
					'ms' => 'Malaysian',
					'nb' => 'Norwegian',
					'nl-BE' => 'Dutch (Belgium)',
					'nl' => 'Dutch',
					'nn' => 'Norwegian Nynorsk',
					'no' => 'Norwegian',
					'pl' => 'Polish',
					'pt-BR' => 'Portuguese/Brazilian',
					'pt' => 'Portuguese',
					'rm' => 'Romansh',
					'ro' => 'Romanian',
					'ru' => 'Russian',
					'sk' => 'Slovak',
					'sl' => 'Slovenian',
					'sq' => 'Albanian',
					'sr-SR' => 'Serbian Latin',
					'sr' => 'Serbian Cyrillic',
					'sv' => 'Swedish',
					'ta' => 'Tamil',
					'th' => 'Thai',
					'tj' => 'Tajiki',
					'tr' => 'Turkish',
					'uk' => 'Ukrainian',
					'vi' => 'Vietnamese',
					'zh-CN' => 'Chinese/Simplified',
					'zh-HK' => 'Chinese HK',
					'zh-TW' => 'Chinese/Traditional',
				),
			));
    }

    /* Calendar */
    public function hozing_init_ova_event_calendar( $wp_customize ){

    	$wp_customize->add_section( 'avai_event_calendar_language', array(
		    'title'      => esc_html__( 'Avaiable Event Calendar Language', 'hozing' ),
		    'priority' => 10,
		) );
		$wp_customize->add_setting( 'event_calendar_language', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('event_calendar_language', array(
				'label' => esc_html__('Language','hozing'),
				'section' => 'avai_event_calendar_language',
				'settings' => 'event_calendar_language',
				'type' =>'select',
				'choices' => array(
					''   => 'English',
					'af' => 'Afrikaans',
					'ar-dz' => 'Algerian Arabic',
					'ar-kw' => 'Arabic kw',
					'ar-ly' => 'Arabic ly',
					'ar-ma' => 'Arabic ma',
					'ar-sa' => 'Arabic sa',
					'ar-tn' => 'Arabic tn',
					'ar' => 'Arabic',
					'bg' => 'Bulgarian',
					'bs' => 'Bosnian',
					'ca' => 'Catalan',
					'cs' => 'Czech',
					'da' => 'Danish',
					'de-at' => 'German at',
					'de-ch' => 'German ch',
					'de' => 'German',
					'el' => 'Greek',
					'en-au' => 'English/Australia',
					'en-ca' => 'English ca',
					'en-gb' => 'English/UK',
					'en-ie' => 'English ie',
					'en-nz' => 'English/New Zealand',
					'es-do' => 'Spanish do',
					'es-us' => 'Spanish us',
					'es' => 'Spanish',
					'et' => 'Estonian',
					'eu' => 'Basque',
					'fa' => 'Farsi/Persian',
					'fi' => 'Finnish',
					'fr-ca' => 'Canadian-French',
					'fr-ch' => 'Swiss-French',
					'fr' => 'French',
					'gl' => 'Galician',
					'he' => 'Hebrew',
					'hi' => 'Hindi',
					'hr' => 'Croatian',
					'hu' => 'Hungarian',
					'id' => 'Indonesian',
					'is' => 'Icelandic',
					'it' => 'Italian',
					'ja' => 'Japanese',
					'ka' => 'Georgian',
					'kk' => 'Kazakh',
					'ko' => 'Korean',
					'lb' => 'Luxembourgish',
					'lt' => 'Lithuanian',
					'lv' => 'Latvian',
					'mk' => 'Macedonian',
					'ms-my' => 'Malaysian my',
					'ms' => 'Malaysian',
					'nb' => 'Norwegian',
					'nl-be' => 'Dutch (Belgium)',
					'nl' => 'Dutch',
					'nn' => 'Norwegian Nynorsk',
					'pl' => 'Polish',
					'pt-br' => 'Portuguese/Brazilian',
					'pt' => 'Portuguese',
					'ro' => 'Romanian',
					'ru' => 'Russian',
					'sk' => 'Slovak',
					'sl' => 'Slovenian',
					'sq' => 'Albanian',
					'sr-cyrl' => 'Serbian Cyrl',
					'sr' => 'Serbian Cyrillic',
					'sv' => 'Swedish',
					'th' => 'Thai',
					'tr' => 'Turkish',
					'uk' => 'Ukrainian',
					'vi' => 'Vietnamese',
					'zh-cn' => 'Chinese/Simplified',
					'zh-tw' => 'Chinese/Traditional',
				),
			));
    }

}

}

new Hozing_Customize();