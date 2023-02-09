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

	<?php if( get_theme_mod( 'global_preload', 'yes' ) == 'yes' ){ ?>
		<div class="loader">
	        <div class="animationload">
	            <svg id="page-loader">
	                <circle cx="75" cy="75" r="20" />
	                <circle cx="75" cy="75" r="35" />
	                <circle cx="75" cy="75" r="50" />
	                <circle cx="75" cy="75" r="65" />
	            </svg>
	        </div>
	    </div>
    <?php } ?>

<?php echo apply_filters( 'hozing_render_header', '' ); ?>