	<?php
			$footer_version = get_theme_mod( 'rd_footer', 'default' );
			$footer_split = explode(',', $footer_version);

			if( has_filter( 'hozing_render_footer' ) ){

				if ( hozing_is_elementor_active() && isset( $footer_split[1] ) ) {

					$post_id_footer = hozing_get_id_by_slug( $footer_split[1] );
					echo  Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_footer );

				}else if ( hozing_is_elementor_active() && !isset( $footer_split[1] ) ) {

					echo   get_template_part( 'footer/footer', $footer_version );

				}else if ( !hozing_is_elementor_active()  ) {

					echo   get_template_part( 'footer/footer', 'default' );

				}	
			}else{
				echo   get_template_part( 'footer/footer', 'default' );
			}

		?>

			
		</div> <!-- Ova Wrapper -->	
		<?php wp_footer(); ?>
	</body><!-- /body -->
</html>