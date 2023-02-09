<?php get_header(); ?>
<?php $blog_layout = get_theme_mod( 'blog_layout', 'layout_2r' ); ?>
	<div class="wrap_site">
		<div id="main-content" class="main <?php echo esc_attr($blog_layout); ?>">
			<?php 
				$blog_type_url = isset( $_GET['blog_type_url'] ) ? $_GET['blog_type_url'] : '';

				$blog_type = ( $blog_type_url != '' ) ? $blog_type_url : get_theme_mod( 'blog_type', 'default' ); 

				switch ($blog_type) {
					case 'version1':
						get_template_part( 'content/content', 'version1' );
						break;

					case 'version2':
						get_template_part( 'content/content', 'version2' );
						break;

					case 'version3':
						get_template_part( 'content/content', 'version3' );
						break;
					case 'three_column':
						get_template_part( 'content/content', 'three-column' );
						break;

					case 'blog_sidebar':
						get_template_part( 'content/content', 'blog-sidebar' );
						break;
					
					default:
						get_template_part( 'content/content', 'default' );
						break;
				}
			?>
		</div> <!-- #main-content -->
		<?php get_sidebar(); ?>
	</div> <!-- .wrap_site -->

<?php get_footer(); ?>