<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ><div class="ova-wrapp">
	
<?php

	$header_version = get_theme_mod( 'rd_header', 'default' );
	$header_split = explode(',', $header_version);

	if( has_filter( 'hozing_render_header' ) ){

		if ( hozing_is_elementor_active() && isset( $header_split[1] ) ) {

			$post_id_header = hozing_get_id_by_slug( $header_split[1] );
			echo  Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_header );

		}else if ( hozing_is_elementor_active() && !isset( $header_split[1] ) ) {

			echo   get_template_part( 'header/header', $header_version );

		}else if ( !hozing_is_elementor_active()  ) {

			echo   get_template_part( 'header/header', 'default' );

		}	
	}else{
		echo   get_template_part( 'header/header', 'default' );
	}

?>