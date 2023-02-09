<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

global $count;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

$hozing_room_list  = wp_get_attachment_image_url( get_post_thumbnail_id(), 'hozing_room_list' );
$img  = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' );

?>

<div class="rental_item item product_room_list item-<?php echo esc_attr($count); ?>">
    <?php $class_room = ($count %2 == 0) ? 'flex-row-reverse' : 'flex-row'; ?>
    <div class="border-box d-lg-inline-flex d-xl-inline-flex <?php echo esc_attr($class_room);?>" >
    
        <div class="wrap_img col-lg-6 col-md-12">
            <div class="images_thumb">
               <img src="<?php echo esc_url($hozing_room_list);?>" />
            </div>
            <?php if( get_theme_mod( 'rl_type_show_price', 'true' ) == 'yes' ): ?>
            <div class="price_night">               
                <span class="wrap_content">
                    <span class="time-night"><?php esc_html_e( 'From:', 'hozing' ); ?></span>
                    <?php echo wp_kses_post( $product->get_price_html() ); ?>
                    <span class="time-night"><?php esc_html_e( '/ Night', 'hozing' ); ?></span>
                </span>              
            </div>
            <?php endif; ?>
        </div> <!-- End wrap_img -->
                
        <div class="content col-lg-6 col-md-12">

            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php 
                $ovacrs_car_acreage = get_post_meta( get_the_id(), 'ovacrs_car_acreage', true );
                $ovacrs_car_max_adults = get_post_meta( get_the_id(), 'ovacrs_car_max_adults', true );
                $ovacrs_car_max_childrens = get_post_meta( get_the_id(), 'ovacrs_car_max_childrens', true );

                $ovacrs_specials_featured = get_post_meta( get_the_id(), 'ovacrs_specials_featured', true );
                $ovacrs_specials_label = get_post_meta( get_the_id(), 'ovacrs_specials_label', true );
                $number_special = absint( get_theme_mod( 'rl_type_show_special_info_number', 2 ) );
            ?>
            <ul class="specical-infor">
                <?php if( get_theme_mod( 'rl_type_show_acreage', 'true' ) == 'yes'){
                    if ( $ovacrs_car_acreage != '') : ?>
                    <li class="d-inline"><span>
                        <?php echo esc_html($ovacrs_car_acreage);?></span></li><?php endif;} ?>
                <?php if( get_theme_mod( 'rl_type_show_adults_max', 'true' ) == 'yes'){ 
                    if ( $ovacrs_car_max_adults != '' ) : ?>
                    <li class="d-inline"><span>
                        <?php echo esc_html($ovacrs_car_max_adults);?>
                        <?php esc_html_e( 'Adults', 'hozing' ); ?></span></li><?php endif;} ?>
                <?php if( get_theme_mod( 'rl_type_show_children_max', 'true' ) == 'yes'){
                    if ( $ovacrs_car_max_childrens != '' ) : ?>
                    <li class="d-inline"><span>
                        <?php echo esc_html($ovacrs_car_max_childrens);?>
                        <?php esc_html_e( 'Childrens', 'hozing' ); ?></span></li><?php endif;} ?>
                <?php
                $item_special = 0;
                if( get_theme_mod( 'rl_type_show_special_info', 'true' ) == 'yes' ) : 
                    if( $ovacrs_specials_featured ){
                        foreach ($ovacrs_specials_featured as $key => $value) {
                            if( $value == 'yes' && trim( $ovacrs_specials_label[$key] ) != '' ){
                            ?>
                                <li class="d-inline">
                                    <span class="label"><?php echo esc_html( $ovacrs_specials_label[$key] ); ?></span>
                                </li>
                            <?php $item_special ++;                                     
                            }
                            if( $item_special >= $number_special ){
                                break;
                            }
                        }
                    }
                endif;
                ?>
            </ul>

            <p><?php echo wp_trim_words( get_the_excerpt(),20,'' ); ?></p>
            <?php if( get_theme_mod( 'rl_type_show_amenities_featured', 'true' ) == 'yes' ) : ?>
            <div class="features">
                <div class="container-fluid">
                    <div class="row">

                        <?php
                        $features = get_post_meta( get_the_id(), 'ovacrs_features_special', true );
                        $icon = get_post_meta( get_the_id(), 'ovacrs_features_icons', true );
                        $label = get_post_meta( get_the_id(), 'ovacrs_features_label', true );
                        $amenities_featured_number = absint( get_theme_mod( 'rl_type_show_amenities_featured_number', 4 ));
                        $d = 0;
                        
                        if( $features ){
                            foreach ($features as $key => $value) {
                                if( $value == 'yes' && trim( $icon[$key] ) != '' && trim( $label[$key] ) != '' ){
                                    $class = ($d%2) ? 'eve' : 'odd'; ?>
                                    <div class="feature-item <?php echo esc_attr( $class ); ?> ">
                                        <i class="<?php echo esc_attr( $icon[$key] ); ?>"> </i>
                                        <span class="label-tooltip"><?php echo esc_html( $label[$key] ); ?></span>
                                    </div>
                                    <?php $d++;
                                }
                                if( $d >= $amenities_featured_number ){
                                    break;
                                }
                            }
                        } ?>
                    
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if( get_theme_mod( 'rl_type_show_button', 'true' ) == 'yes') : ?>
            <div class="discorver">
                <a href="<?php the_permalink(); ?> " class="discover-now">
                    <span class="text"><?php esc_html_e( 'Book Now', 'hozing' ); ?></span>
                </a>
            </div> 
            <?php endif; ?>         
        </div> <!-- End content -->
    </div>
</div>