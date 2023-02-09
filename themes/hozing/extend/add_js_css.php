<?php
add_action('wp_enqueue_scripts', 'hozing_theme_scripts_styles');
add_action('wp_enqueue_scripts', 'hozing_theme_script_default');


function hozing_theme_scripts_styles() {

    // enqueue the javascript that performs in-link comment reply fanciness
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' ); 
    }
    
    /* Add Javascript  */
    wp_enqueue_script('bootstrap', HOZING_URI.'/assets/libs/bootstrap/js/bootstrap.bundle.min.js', array('jquery'),null,true);

    wp_enqueue_script('select2', HOZING_URI.'/assets/libs/select2/select2.min.js', array('jquery'),null,true);

    if( is_ssl() ){
      wp_enqueue_script('prettyphoto', HOZING_URI.'/assets/libs/prettyphoto/jquery.prettyPhoto_https.js', array('jquery'),null,true);  
    }else{
      wp_enqueue_script('prettyphoto', HOZING_URI.'/assets/libs/prettyphoto/jquery.prettyPhoto.js', array('jquery'),null,true);
    }
    wp_enqueue_script('owl-carousel', HOZING_URI.'/assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'),null,true);

     
    
    wp_enqueue_script('hozing_script', HOZING_URI.'/assets/js/script.js', array('jquery'),null,true);
   


    /* Add Css  */
    wp_enqueue_style('bootstrap', HOZING_URI.'/assets/libs/bootstrap/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('select2', HOZING_URI.'/assets/libs/select2/select2.min.css', array(), null);
    wp_enqueue_style('v4-shims', HOZING_URI.'/assets/libs/fontawesome/css/v4-shims.min.css', array(), null);
    
    wp_enqueue_style('fontawesome', HOZING_URI.'/assets/libs/fontawesome/css/all.min.css', array(), null);
    wp_enqueue_style('elegant_font', HOZING_URI.'/assets/libs/elegant_font/style.css', array(), null);
    wp_enqueue_style('prettyphoto', HOZING_URI.'/assets/libs/prettyphoto/css/prettyPhoto.css', array(), null);
    wp_enqueue_style('owl-carousel', HOZING_URI.'/assets/libs/owl-carousel/assets/owl.carousel.min.css', array(), null);

    

    wp_enqueue_style('owl-carousel-theme-default', HOZING_URI.'/assets/libs/owl-carousel/assets/owl.theme.default.css', array(), null);
    wp_enqueue_style('hozing_theme', HOZING_URI.'/assets/css/theme.css', array(), null);

    

}

function hozing_theme_script_default(){

    if ( is_child_theme() ) {
      wp_enqueue_style( 'parent_style', trailingslashit( get_template_directory_uri() ) . 'style.css', array(), null );
    }

    wp_enqueue_style( 'hozing_style', get_stylesheet_uri(), array(), null );
}