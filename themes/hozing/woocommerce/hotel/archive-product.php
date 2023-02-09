<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

global $count;

$count = 0;

get_header( 'archive-hotel' );

?>

<div class="wrap_site archive_rental">

		<?php
			$show_search = get_theme_mod( 'rl_show_search', 'true' );
			$show_search = isset( $_GET['show_search'] ) ? $_GET['show_search'] : $show_search;
		?>
		<?php  if( $show_search == 'true') { ?>
			
			<div class="hozing_wd_search">
				<?php echo do_shortcode( '[ovahotel_search /]' ); ?>
			</div> <!-- End hozing_wd_search -->
			
		<?php } ?>

		<?php /**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		

		?>
		
		<div id="main-content-woo" class="main">
			<?php
				$rl_type = isset( $_GET['rl_type'] ) ? $_GET['rl_type'] : get_theme_mod( 'rl_type', '2columns_no_sidebar1' ); ?>
				<div class="row row-m10 <?php if( $rl_type == '2columns_no_sidebar1' ){echo 'room-grid-2-columns-v1';} elseif ( $rl_type == '2columns_no_sidebar2' ){echo 'room-grid-2-columns-v2';} elseif ( $rl_type == '2columns_sidebar'){echo 'room-grid-2-columns-with-sidebar';} elseif( $rl_type == 'room_list_with_sidebar'){echo 'room-list-with-sidebar';} elseif( $rl_type == '3columns_no_sidebar1'){echo 'room-grid-3-columns-v1';}elseif( $rl_type == '3columns_no_sidebar2'){echo 'room-grid-3-columns-v2';}elseif( $rl_type == 'room_list'){echo 'room-list';}elseif($rl_type == 'room_lifestyle'){ echo 'room-life';}?>">
				<?php 
				if ( woocommerce_product_loop() ) { ?>
				
						<?php if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'hotel/content', 'product_'.$rl_type );

								$count++;
							}
						}
						
						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php
				
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}

				/**
				 * Hook: woocommerce_after_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
		 	?>
	
		</div></div>

		<?php get_sidebar('shop'); ?>

</div><!-- End archive_rental -->

<?php /**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */


get_footer( 'archive-hotel' );