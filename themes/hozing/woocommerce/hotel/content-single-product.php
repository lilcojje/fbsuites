<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_id = $product->get_id();
$post_slug = $product->get_slug();
$post_thumbnail_id = $product->get_image_id();

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

?>


<div class="main-room-details">
	
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
		<div id="tab_section" class="sticky-nav-tabs">	
			<div class="container woo_single_notice" style="padding-left: 15px; padding-right: 15px;">
				<div class="row">
					<?php 
						/**
						 * Hook: woocommerce_before_single_product.
						 *
						 * @hooked wc_print_notices - 10
						 */
						do_action( 'woocommerce_before_single_product' );

					?>
				</div>	
			</div>

			<div class="container">
				<ul class="sticky-nav-tabs-container">
					<li class="active"><a class="sticky-nav-tab active" href="#detail"><?php esc_html_e( 'Detail', 'hozing' ); ?></a></li>
					<?php if( get_theme_mod( 'rd_show_booking_form', 'true' ) == 'true' ){ ?>
						<li><a class="sticky-nav-tab" href="#booking"><?php esc_html_e( 'Booking Form', 'hozing' ); ?></a></li>
					<?php } ?>
					<li><a class="sticky-nav-tab" href="#gallery"><?php esc_html_e( 'Gallery', 'hozing' ); ?></a></li>					
				</ul>
			</div>
		</div>
		<div id="detail" class="hotel_details tabs-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 left-infor-detail">
						<div class="desc">
							<?php if( get_theme_mod( 'rd_show_title', 'true' ) == 'true') : ?>
						 		<h3 class="second_font"><span href="<?php the_permalink(); ?>"><?php echo esc_html_e( 'OverView', 'hozing' );?></span></h3><?php endif; ?>
							 	<div class="content">
							 		<?php the_content(); ?>
							 	</div>
						</div>
						<?php ?>
						<?php if( get_theme_mod( 'rd_show_services', 'true' ) == 'true') : ?>
						<div class="service">
							<h3 class="second_font"><span><?php echo esc_html_e( 'Services', 'hozing' );?></span></h3>

							<ul class="wrap_resources">

								<?php if( $ovacrs_resource_name = get_post_meta( $post_id, 'ovacrs_resource_name', true ) ){ 
										
										$ovacrs_resource_price = get_post_meta( $post_id, 'ovacrs_resource_price', true );
																					
										for( $i = 0 ; $i < count( $ovacrs_resource_name ); $i++ ) {
								?>
								<li>
									<span><?php echo esc_html($ovacrs_resource_name[$i]); ?><?php echo esc_html($ovacrs_resource_price[$i]); ?></span>	
								</li>
									    					
								<?php } } ?>

							</ul>
						</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-6 col-md-6 right-infor-detail">
						<div class="info-room-detail">
							<?php if( get_theme_mod( 'rd_show_price', 'true' ) == 'true' ){  ?>
								<div class="price">
									<?php
										$price_day = 	get_post_meta( $post_id, '_regular_price', true ); ?>
					                    <span class='time-night-details'><?php esc_html_e( 'From:', 'hozing' );?></span>
				                    	<?php echo wc_price( $price_day ); ?>
	                    				<span class='time-night-details'><?php esc_html_e( '/ Night', 'hozing' );?></span>
								</div>
							<?php } ?>
							<div class="buttons">
								<div class="row">
									<?php if( get_theme_mod( 'rd_show_gallery_btn', 'true' ) == 'true') : ?>
										<div class="col-lg-6 col-md-12 col-sm-6">
											<a href="#gallery" class="hozing_btn_img booking_btn scrollUp"><?php esc_html_e( 'Gallery image', 'hozing' ); ?> <span class="icon_image"></span></a>
										</div>
									<?php endif; ?>
									<?php
										if( get_theme_mod( 'rd_show_video_btn', 'truee' ) == 'true' ){ 
											$video_url = get_post_meta( $post_id, 'ovacrs_video_link', true );
											if( $video_url != '' ){ ?>
											<div class="col-lg-6 col-md-12 col-sm-6">
												<a href="<?php echo esc_url($video_url); ?>" data-rel="videoprettyPhoto" class="hozing_btn_video booking_btn"><?php esc_html_e( 'Video Popup', 'hozing' );?> <span class="arrow_triangle-right_alt2"></span></a>
											</div>
										<?php }
										}
								 	?>							
								</div>
							</div>
							<div class="amenities">
								<?php wc_get_template_part( 'hotel/ovacrs-detail-amenities' ); ?>
							</div>
							<div class="calendar">
								<?php wc_get_template_part( 'hotel/ovacrs-calendar' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		if( get_theme_mod( 'rd_show_booking_form', 'true' ) == 'true' ){ ?>				
		<div id="booking" class="tabs-section">
			<div class="container">					
				<div class="title-booking">
					<h3><?php echo esc_html_e( 'Booking form', 'hozing'); ?></h3>
				</div>
				<?php
					// Show/Hide field in Form
					$booking_show_check_in  = get_theme_mod( 'booking_show_check_in', false );
					$booking_show_check_out = get_theme_mod( 'booking_show_check_out', false );
					$booking_show_adults    = get_theme_mod( 'booking_show_adults', false );
					$booking_show_childrens = get_theme_mod( 'booking_show_childrens', false );
					$booking_show_rooms     = get_theme_mod( 'booking_show_rooms', false );
					$booking_show_night     = get_theme_mod( 'booking_show_night', false );
						
					$booking_max_adults =  intval( get_theme_mod( 'booking_max_adults', '5' )) ;
					$booking_max_childrens =  intval( get_theme_mod( 'booking_max_childrens', '5' )) ;
					$booking_max_rooms = intval( get_theme_mod( 'booking_max_rooms', '10' )) ;

					// Check Field requirement

					$req_input_adults    = get_theme_mod( 'booking_req_input_adults' );
					$req_input_childrens = get_theme_mod( 'booking_req_input_childrens' );

					// Get data 

					$ovacrs_car_count         = get_post_meta( $post_id, 'ovacrs_car_count', true );
					$ovacrs_car_max_adults    = get_post_meta( $post_id, 'ovacrs_car_max_adults', true );
					$ovacrs_car_max_childrens = get_post_meta( $post_id, 'ovacrs_car_max_childrens', true );

					echo do_shortcode( '[ovahotel_search type="booking" show_check_in="'.$booking_show_check_in.'" show_check_out="'.$booking_show_check_out.'" show_adults="'.$booking_show_adults.'" show_childrens="'.$booking_show_childrens.'" show_rooms="'.$booking_show_rooms.'" show_night="'.$booking_show_night.'" show_night_ipad="false" req_input_adults="'.$req_input_adults.'" req_input_childrens="'.$req_input_childrens.'" max_rooms="'.$ovacrs_car_count.'" max_adults="'.$ovacrs_car_max_adults.'" max_childrens="'.$ovacrs_car_max_childrens.'"
						

					button_text="'.esc_html__( 'Booking Now', 'hozing' ).'" slug_product="'.$post_slug.'" /]' ); ?>
			</div>	
		</div>
		<?php }
		?>
		<div id="gallery" class="tabs-section">
			<div class="list-image owl-carousel">
				<?php
					if ( has_post_thumbnail() ) {
						$img_url = wp_get_attachment_image_url ($post_thumbnail_id,'full' );
						$image_title 	= esc_attr( get_the_title( $post_thumbnail_id ) );
						printf($html = '<div class="item-slider"><img src="'.esc_url( $img_url ).'" alt="'.esc_attr( $image_title ).'"></div>') ;
					}
					$attachment_ids = $product->get_gallery_image_ids();
					if ( $attachment_ids ) {
						foreach ( $attachment_ids as $attachment_id ) {

							$image_link = wp_get_attachment_url( $attachment_id );

							if ( ! $image_link )
								continue;

							$image_title 	= esc_attr( get_the_title( $attachment_id ) );

							
						printf($html = '<div class="item-slider"><img src="'.esc_url( $image_link ).'" alt="'.esc_attr( $image_title ).'"></div>');
										
						}
					}
				?>
			</div>	
		</div>
		<?php if(get_theme_mod( 'rd_show_related', 'true' ) == 'true') : ?>	
		<div class="other-room">
			<div class="container">
				<div class="row">
					<div class="title-other">
						<h2 class="second_font"><span><?php echo esc_html__( 'Other Rooms', 'hozing'); ?></span></h2>
					</div>
					<div class="room-other">
						<?php
							if ( is_singular('product') ) {
							  global $post;

							  $is_produc_type = $product->is_type('ovacrs_car_rental') ? true : false ;
							  $terms = wp_get_post_terms( $post->ID, 'product_cat' );
							  foreach ( $terms as $term ) $cats_array[] = $term->term_id;
							  $number_room_related = absint( get_theme_mod( 'rd_room_number_related', 6 ) );
							  $query_args = array( 'post__not_in' => array( $post->ID ), 'posts_per_page' => $number_room_related, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'tax_query' => array( 
								    array(
								      'taxonomy' => 'product_cat',
								      'field' => 'id',
								      'terms' => $cats_array
								    )));
							  $r = new WP_Query($query_args);
									
							  if ($r->have_posts()) {
							    ?>
							    <div class="product_list_widget owl-carousel">
							      <?php while ($r->have_posts()) : $r->the_post(); global $product; ?>

							      	<?php $post_id = get_the_id(); ?>
							      	
							        <div class="item-room">
							        	<div class="wrap_img">
							        		<div class="images_thumb">
												<?php if (has_post_thumbnail()) the_post_thumbnail('hozing_room_grid_m');  ?>
											</div>
											<div class="price_night">               
								                <span class="wrap_content">
								                    <span class="time-night"><?php esc_html_e( 'From:', 'hozing' ); ?></span>
								                    <?php echo wp_kses_post( $product->get_price_html() ); ?>
								                    <span class="time-night"><?php esc_html_e( '/ Night', 'hozing' ); ?></span>
								                </span>              
								            </div>
							        	</div>
							        	
							        	<div class="content ">

								            <h3 class="title">
								            	<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : $post_id); ?>">
							    	
							    					<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
							        			</a>
						        			</h3>

								            <?php 
								                $ovacrs_car_acreage = get_post_meta( $post_id, 'ovacrs_car_acreage', true );
								                $ovacrs_car_max_adults = get_post_meta( $post_id, 'ovacrs_car_max_adults', true );
								                $ovacrs_car_max_childrens = get_post_meta( $post_id, 'ovacrs_car_max_childrens', true );

								                $ovacrs_specials_featured = get_post_meta( $post_id, 'ovacrs_specials_featured', true );
								                $ovacrs_specials_icon  = get_post_meta( $post_id, 'ovacrs_specials_icon', true );
								                $ovacrs_specials_label = get_post_meta( $post_id, 'ovacrs_specials_label', true );
								            ?>
								            <ul class="specical-infor">
								                <?php if( get_theme_mod( 'rl_type_show_acreage', 'true' ) == 'yes'){
								                    if ( $ovacrs_car_acreage != '') : ?>
								                    <li class="d-inline-flex"><span>
								                        <?php echo esc_html($ovacrs_car_acreage);?></span></li><?php endif;} ?>
								                <?php if( get_theme_mod( 'rl_type_show_adults_max', 'true' ) == 'yes'){ 
								                    if ( $ovacrs_car_max_adults != '' ) : ?>
								                    <li class="d-inline-flex"><span>
								                        <?php echo esc_html($ovacrs_car_max_adults);?>
								                        <?php esc_html_e( 'Adults', 'hozing' ); ?></span></li><?php endif;} ?>
								                <?php if( get_theme_mod( 'rl_type_show_children_max', 'true' ) == 'yes'){
								                    if ( $ovacrs_car_max_childrens != '' ) : ?>
								                    <li class="d-inline-flex"><span>
								                        <?php echo esc_html($ovacrs_car_max_childrens);?>
								                        <?php esc_html_e( 'Childrens', 'hozing' ); ?></span></li><?php endif;} ?>
								                <?php
								                if( get_theme_mod( 'rl_type_show_special_info', 'true' ) == 'yes' ) : 
								                    if( $ovacrs_specials_featured ){
								                        foreach ($ovacrs_specials_featured as $key => $value) {
								                            if( $value == 'yes' && trim( $ovacrs_specials_label[$key] ) != '' ){
								                            ?>
								                                <li class="d-inline-flex">
								                                    <span class="label"><?php echo esc_attr( $ovacrs_specials_label[$key] ); ?></span>
								                                </li>
								                            <?php                                     
								                            }
								                        }
								                    }
								                endif;
								                ?>
								            </ul>

								            <p><?php echo wp_trim_words( get_the_excerpt(),20,'' ); ?></p>
								            
								        </div> <!-- End content --> 

							    	</div>
							      <?php endwhile; ?>
							    </div>
							    <?php
							    wp_reset_query();
							  }
							}
							?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>