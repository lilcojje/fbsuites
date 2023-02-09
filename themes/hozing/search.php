<?php get_header(); ?>
<?php $global_layout = get_theme_mod( 'global_layout', 'layout_2r' ); ?>
	<div class="wrap_site">
		<div id="main-content" class="main <?php echo esc_attr($global_layout ); ?>">

			<header class="page-header">
				<h2 class="page-title">
					<?php esc_html_e('Search Results for: ','hozing'); printf( '<span>%s</span>', get_search_query() ); ?>
				</h2>
			</header>
			<?php get_template_part( 'content/content', 'default' ); ?>
			

			
		</div> <!-- #main-content -->
		<?php get_sidebar(); ?>
	</div> <!-- .wrap_site -->

<?php get_footer(); ?>