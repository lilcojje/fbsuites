<?php
	$show_title = get_theme_mod( 'show_title', 'default' ) === 'yes' ? true : false ; 
	$show_date = get_theme_mod( 'show_date', 'default' ) === 'yes' ? true : false; 
	$show_excerpt = get_theme_mod( 'show_excerpt', 'default' ) === 'yes' ? true : false; 
	$show_readmore = get_theme_mod( 'show_readmore', 'default' ) === 'yes' ? true : false; 
?>
<?php $i = 1; ?>
	<div class="blog-hoz-style-3 blog-hoz-style">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
			//create odd, even to style
			$i++;
			$class_post_odd = ($i % 2 == 1) ? ' flex-row-reverse blog-odd ' : ' blog-even ';
			$class_post_odd_row = ($i % 2 == 1) ? ' flex-row-reverse ' : '';
		?>
		
		<?php $sticky_class = is_sticky()?'sticky':''; ?>
		<?php if( has_post_format('link') ){ ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class.$class_post_odd ); ?>  >
				
				<?php
			        $link = get_post_meta( $post->ID, 'format_link_url', true );
			        $link_description = get_post_meta( $post->ID, 'format_link_description', true );
			        
			        if ( is_single() ) {
		                printf( '<h1 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h1>',
	                        $link,
	                        get_the_title()
		                );
			        } else {
		                printf( '<h2 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h2>',
	                        $link,
	                        get_the_title()
		                );
			        }
				?>
				<?php
			        printf( '<a href="%1$s" target="blank">%2$s</a>',
		                $link,
		                $link_description
			        );
				?>
			</article>

		<?php }elseif ( has_post_format('aside') ){ ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
				<div class="post-body">
			           <?php the_content(''); /* Display content  */ ?>
			    </div>
			</article>

		<?php }else{ ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'. $sticky_class.$class_post_odd ); ?>  >
			<div class="row row-mg-0 <?php echo esc_attr($class_post_odd_row) ?>">
				<div class="col-md-6">
					<?php if( has_post_format('audio') ){ ?>

						 <div class="post-media">
				        	<?php hozing_postformat_audio(); /* Display video of post */ ?>
				        </div>

					<?php }elseif(has_post_format('gallery')){ ?>

						<?php hozing_content_gallery(); /* Display gallery of post */ ?>

					<?php }elseif(has_post_format('video')){ ?>

						 <div class="post-media">
				        	<?php hozing_postformat_video(); /* Display video of post */ ?>
				        </div>

					<?php }elseif(has_post_thumbnail()){ ?>
						
				        <div class="post-media" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');">
				        	<div class="overlay">
							    <a href="<?php echo get_permalink() ?>" class="icon" title="<?php the_title_attribute(); ?>">
							    	<i class="far fa-image"></i>
							    </a>
							</div>
				        </div>

			        <?php } ?>
				</div>
				<!-- end col-6 -->

					<div class="col-md-6">
						<div class="post-sub-wrap">
					        <?php if ($show_title) : ?>
						        <div class="post-title">
						            <?php hozing_content_title(); /* Display title of post */ ?>
							    </div>
						    <?php endif ?>

							<?php if ($show_date) : ?>
						        <div class="post-meta">
							        <?php hozing_content_meta(); /* Display Date, Author, Comment */ ?>
							    </div>
						    <?php endif ?>

							<?php if ($show_excerpt) : ?>
							    <div class="post-body">
							    	<div class="post-excerpt">
							            <?php hozing_content_body(); /* Display content of post or intro in category page */ ?>
							        </div>
							    </div>
						    <?php endif ?>
						    <?php if(!is_single()){ ?> 
						    	<?php if ($show_readmore) : ?>
					            	<?php hozing_content_readmore(); /* Display read more button in category page */ ?>
				            	<?php endif ?>
						    <?php }?>

						    <?php if(is_single()){ ?>
						    	<?php hozing_content_tag(); /* Display tags, category */ ?>
						    <?php } ?>
						</div>
				    </div>
				    <!-- end col-6 -->
				</div>
				<!-- end row -->
			</article>
		<?php } ?>
		

			
<?php endwhile; ?>
		</div>
		<!-- end container -->
    <div class="pagination-wrapper">
        <?php hozing_pagination_theme(); ?>
	</div>
<?php else : ?>
        <?php get_template_part( 'content/content', 'none' ); ?>
<?php endif; ?>