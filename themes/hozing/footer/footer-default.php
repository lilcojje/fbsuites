<?php if( is_active_sidebar('footer') ){ ?>

	<footer class="footer">
		<!-- change container to wp-inner -->
		<div class="wp-inner">
			<?php dynamic_sidebar('footer'); ?>	
		</div>	
	</footer>
	
<?php } ?>