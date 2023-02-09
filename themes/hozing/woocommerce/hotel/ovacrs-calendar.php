<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$post_id = $product->get_id(); 
$translated_ids = get_arr_product_ids( $post_id );

?>

<?php if( get_theme_mod( 'rd_show_calendar', 'true' ) == 'true' ){ ?>
	<?php 
	$statuses = array( 'wc-completed', 'wc-processing', 'wc-on-hold' );
	$order_date = get_order_rent_time( $translated_ids, $statuses );


	if( $order_date ){
			wp_localize_script( 'ova_hotel', 'order_time', $order_date );
			wp_enqueue_script( 'ova_hotel' );
	}



	$nav_month = get_theme_mod( 'rd_ca_nav_month', 'true' ) == 'true' ? 'month' : '';
	$nav_week = get_theme_mod( 'rd_ca_nav_week', 'true' ) == 'true' ? 'agendaWeek' : '';
	$nav_day = get_theme_mod( 'rd_ca_nav_day', 'true' ) == 'true' ? 'agendaDay' : '';
	$nav_list = get_theme_mod( 'rd_ca_nav_list', 'true' ) == 'true' ? 'listWeek' : '';
	$nav =  $nav_month.','.$nav_week.','.$nav_day.','.$nav_list;

	$default_view = ( get_theme_mod( 'rd_ca_default_view', 'month' ) != '' ) ? get_theme_mod( 'rd_ca_default_view', 'month' ) : 'month';
	?>

	<div class="title-calendar">
		<h3><span><?php echo esc_html__( 'Calendar', 'hozing'); ?></span></h3>
	</div>
	<div id="calendar" class="hotel_product_calendar" data-nav="<?php echo esc_attr( $nav ); ?>" data-default_view="<?php echo esc_attr( $default_view ); ?>" data-more_text="<?php esc_html_e( 'more', 'hozing' ); ?>">
	
		<ul class="intruction">
			<li>
				<span class="pink"></span>
				<span class="white"></span>
				<span><?php esc_html_e( 'Available','hozing' ) ?></span>		
			</li>
			
			<li>
				<span class="yellow"></span>
				<span><?php esc_html_e( 'Booked','hozing' ) ?></span>		
			</li>
		</ul>

	</div>

<?php } ?>