<?php
	if(defined('HOZING_URL') 	== false) 	define('HOZING_URL', get_template_directory());
	if(defined('HOZING_URI') 	== false) 	define('HOZING_URI', get_template_directory_uri());

	load_theme_textdomain( 'hozing', HOZING_URL . '/languages' );
	
	// require libraries, function
	require( HOZING_URL.'/inc/init.php' );

	// Add js, css
	require( HOZING_URL.'/extend/add_js_css.php' );
	
	// require walker menu
	require_once (HOZING_URL.'/inc/ova_walker_nav_menu.php');
	

	// register menu, widget
	require( HOZING_URL.'/extend/register_menu_widget.php' );

	// require content
	require_once (HOZING_URL.'/content/define_blocks_content.php');

	// require breadcrumbs
	require_once( HOZING_URL.'/extend/breadcrumbs.php' );

	// Hooks
	require( HOZING_URL.'/inc/class_hook.php' );

	/* Customize */
	if( current_user_can('customize') ){
		require_once HOZING_URL.'/customize/custom-control/google-font.php';
	    require_once HOZING_URL.'/customize/custom-control/heading.php';
	}
	require_once HOZING_URL.'/customize/class-customize.php';
    require_once HOZING_URL.'/customize/render-style.php';
    
	
	// Require metabox
	if( is_admin() ){
		// Require TGM
		require_once ( HOZING_URL.'/install_resource/active_plugins.php' );		
	}