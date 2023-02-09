<?php get_header(); 
do_action('hozing_open_layout');
?>

<div class="hozing_404_page" style="background: url(<?php echo get_template_directory_uri() . '/assets/img/404.jpg';?>); background-repeat: no-repeat; background-size:cover;)">
	<div class="content">
		<div class="text_404 second_font"><?php esc_html_e( '404', 'hozing' ); ?></div>
		<div class="title second_font"><?php esc_html_e( 'WE\'RE SORRY','hozing' ); ?></div>
		<div class="sub_title second_font"><?php esc_html_e( 'BUT WE CAN\'T FIND THE PAGE YOU WERE LOOKING FOR','hozing' ) ?></div>
		<div class="des">
			<p><?php esc_html_e( 'It\'s probably some thing we\'ve done wrong but now we know about it and we\'ll try to fix it.', 'hozing' ) ?></p>
			<p><?php esc_html_e( 'Go Home or try to search:', 'hozing' ); ?></p>
		</div>
		
		<?php get_search_form(); ?>
	</div>
	<div class="overlay"></div>
</div>


<?php 
do_action('hozing_close_layout');
get_footer();
?>