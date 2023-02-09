<?php get_header(); ?>
<?php $single_type = get_theme_mod( 'single_layout', 'layout_2r' );
?>

	<div class="wrap_site">
		<div id="main-content" class="main <?php echo esc_attr($single_type); ?>">

			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
					
					get_template_part( 'content/content', 'post' );

			    if ( comments_open() || get_comments_number() ) {
			    	comments_template();
			    }
				
			endwhile; else :
			    get_template_part( 'content/content', 'none' );
			endif;

			 ?>
			
		</div> <!-- #main-content -->
		<?php get_sidebar(); ?>
	</div> <!-- .wrap_site -->

<?php get_footer(); ?>