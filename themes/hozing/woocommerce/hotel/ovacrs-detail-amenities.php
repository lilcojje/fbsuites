<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product; 

$post_id = $product->get_id();

$total = array();

if( get_theme_mod( 'rd_show_adults_max', 'true' ) == 'true' ){ 
	$adults = get_post_meta( $post_id, 'ovacrs_car_max_adults', true ).esc_html__(' Adults ', 'hozing');
}else{
	$adults = '';
}

if( get_theme_mod( 'rd_show_childrens_max', 'true' ) == 'true'  ){
	$children = get_post_meta( $post_id, 'ovacrs_car_max_childrens', true ).esc_html__(' Children ', 'hozing');
} else{
	$children = '';
}

if(  get_theme_mod( 'rd_show_adults_max', 'true' ) == 'false' &&  get_theme_mod( 'rd_show_childrens_max', 'true' ) == 'false' ){
	$adults_children_arr = array();
} else{	
	$adults_children_arr = array( array( 'icon' => 'icon_group', 'label' => $adults.$children ) );
}

$ovacrs_car_acreage = get_post_meta( $post_id, 'ovacrs_car_acreage', true );

if( get_theme_mod( 'rd_show_acreage', 'true' ) == 'true' ){
	$ovacrs_car_acreage_arr = array( array( 'icon' => 'icon_map', 'label' => $ovacrs_car_acreage ) );
}else{
	$ovacrs_car_acreage_arr = array();
}


$ovacrs_specials_featured = get_post_meta( $post_id, 'ovacrs_specials_featured', true );

$ovacrs_specials_featured_arr = array();

if( $ovacrs_specials_featured ){                        
    foreach ($ovacrs_specials_featured as $key => $value) {
    	if( $value == 'yes'){
	    	$ovacrs_specials_icon  = get_post_meta( $post_id, 'ovacrs_specials_icon', true );
			$ovacrs_specials_label = get_post_meta( $post_id, 'ovacrs_specials_label', true );
			if( get_theme_mod( 'rd_show_special_info', 'true' ) == 'true'){
				$ovacrs_specials_featured_arr[] = array('icon' => $ovacrs_specials_icon[$key], 'label' => $ovacrs_specials_label[$key]);
			} else{
				$ovacrs_specials_featured_arr = array();
			}
			
		}
	}
}

$features = get_post_meta( $post_id, 'ovacrs_features_special', true );

$features_arr = array();

if( $features ){
	foreach ($features as $key => $value) {
		if( $value == 'yes'){
		 	$icon = get_post_meta( $post_id, 'ovacrs_features_icons', true );
	     	$label = get_post_meta( $post_id, 'ovacrs_features_label', true );
	     	if( get_theme_mod( 'rd_show_amenities', 'true' ) == 'true'){
				$features_arr[] = array( 'icon' => $icon[$key], 'label' => $label[$key] );
			} else {
				$features_arr = array();
			}
		}
	}
}

$total_arr = array_merge( $adults_children_arr, $ovacrs_car_acreage_arr, $features_arr, $ovacrs_specials_featured_arr );
echo '<div class="row">';
$d = 0;
foreach ($total_arr as $key_total => $value_total) {
	$class = ($d%2) ? 'eve' : 'odd';
	?>
	<div class="col-lg-6 col-6">
		<div class="features">
	 		<div class="feature-item <?php echo esc_attr( $class ); ?>">
	            <i class="<?php echo esc_attr($value_total['icon']); ?>"> </i>
	            <span class="label <?php if( $value_total['icon'] == ''){?> pl_63 <?php } ?>"><?php echo esc_html($value_total['label']); ?></span>
	        </div>
        </div>
    </div>
	<?php 
	$d++;
}
echo '</div>';
?>