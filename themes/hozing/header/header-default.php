<div class="wp-inner">
<header class=" ovatheme_header_default" id="ovatheme_header_default">
	

			<nav class="navbar navbar-expand-lg px-0 py-0">
			  
				<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
					<?php if( get_theme_mod( 'logo', '' ) != '' ) { ?>
						<img src="<?php  echo esc_url( get_theme_mod('logo', '') ); ?>" alt="<?php bloginfo('name');  ?>" width="130" height="41">
					<?php }else { ?> <span class="blogname"><?php bloginfo('name');  ?></span><?php } ?>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header_menu" aria-controls="header_menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'hozing' ); ?>">
				<i class="fas fa-bars"></i>
				</button>

				<div class="collapse navbar-collapse justify-content-end" id="header_menu">

					<?php
	                	wp_nav_menu( array(
		                    'menu'              => '',
		                    'theme_location'    => 'primary',
		                    'depth'             => 3,
		                    'container'         => '',
		                    'container_class'   => '',
		                    'container_id'      => '',
		                    'menu_class'        => 'nav navbar-nav navbar-right',
		                    'fallback_cb'       => 'hozing_wp_bootstrap_navwalker::fallback',
		                    'walker'            => new hozing_wp_bootstrap_navwalker()
	                	));
	                ?>

				</div>

			</nav>
		
</header>
</div>

<div class="ovatheme_breadcrumbs ovatheme_breadcrumbs_default">
	<!-- change container to wp-inner -->
	<div class="wp-inner">
		<?php hozing_breadcrumbs_header(); ?>
	</div>
</div>