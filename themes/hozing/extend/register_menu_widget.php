<?php
/* Register Menu */
add_action( 'init', 'hozing_register_menus' );
function hozing_register_menus() {
  register_nav_menus( array(
    'primary'   => esc_html__( 'Primary Menu', 'hozing' )

  ) );
}



/* Register Widget */
add_action( 'widgets_init', 'hozing_second_widgets_init' );
function hozing_second_widgets_init() {
 

  $args_blog = array(
    'name' => esc_html__( 'Main Sidebar', 'hozing'),
    'id' => "main-sidebar",
    'description' => esc_html__( 'Display at sidebar of Blog', 'hozing' ),
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => "</h4>",
  );
  register_sidebar( $args_blog );
    
  $footer = array(
    'name' => esc_html__( 'Footer', 'hozing'),
    'id' => "footer",
    'description' => esc_html__( 'Display at Footer of site', 'hozing' ),
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => "</h4>",
  );
  register_sidebar( $footer );

  $args_woo = array(
    'name' => esc_html__( 'Woocommerce Sidebar', 'hozing'),
    'id' => "woo-sidebar",
    'description' => esc_html__( 'Display at sidebar in Woocommerce Page', 'hozing' ),
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget woo_widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => "</h4>",
  );
  register_sidebar( $args_woo );


  
}
