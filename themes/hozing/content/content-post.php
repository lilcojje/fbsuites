<?php $sticky_class = is_sticky()?'sticky':'';?>

<?php 
	$is_single_post = is_single() ? " hoz-single-post " : "";
	$no_social = '';
?>
<?php if( has_filter('ova_share_social') ){ ?>
	<div class="share_social hide-991">
		<?php $link = get_the_permalink();
			$title = get_the_title(); ?>
			        			
		<?php echo apply_filters( 'ova_share_social', $link, $title  ); ?>
	</div>
<?php }else{ $no_social = 'no_social'; } ?>
<?php if( has_post_format('link') ){ ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class . $is_single_post.' '.$no_social ); ?>  >
		
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

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class . $is_single_post.' '.$no_social); ?>  >
			<div class="post-body">
		           <?php the_content(''); /* Display content  */ ?>
		    </div>
	</article>

<?php }else{ ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class . $is_single_post.' '.$no_social); ?>  >

			
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

		        <div class="post-media">
		        	<?php hozing_content_thumbnail('full'); ?>
		        </div>

	        <?php } ?>

			<?php if( has_filter('ova_share_social') ) : ?>
				<div class="share_social visible-991">
					<?php $link = get_the_permalink();
						$title = get_the_title(); ?>
						        			
					<?php echo apply_filters( 'ova_share_social', $link, $title  ); ?>
				</div>
			<?php endif ?>


	        <div class="post-title">
		            <?php hozing_content_title(); /* Display title of post */ ?>
		    </div>

	        <div class="post-meta">
		        <?php hozing_content_meta(); /* Display Date, Author, Comment */ ?>
		    </div>

		    <div class="post-body">
		    	<div class="post-excerpt">
		            <?php hozing_content_body(); /* Display content of post or intro in category page */ ?>
		        </div>
		    </div>

		    <?php if(!is_single()){ ?> 
		            <?php hozing_content_readmore(); /* Display read more button in category page */ ?>
		    <?php }?>

		    <?php if(is_single()){ ?>
		    <?php hozing_content_tag(); /* Display tags, category */ ?>
		    <?php $author_id = get_the_author_meta( 'ID' ); ?>
		    	<?php if( get_the_author_meta( 'user_description' ) != '' ){ ?>
			    	<div class="author_meta">
			    		<div class="img">
			    			<?php echo get_avatar($author_id, $size='150', $default = 'mysteryman' ); ?>	
			    		</div>
			    		<div class="info">
			    			<label class="second_font"><?php esc_html_e( 'Posted by', 'hozing' ); ?></label>
			    			<a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?> ">
			    				<?php echo get_the_author_meta( 'display_name' ); ?>
			    			</a>
			    			<div class="desc"><?php echo get_the_author_meta( 'user_description' ); ?> </div>
			    		</div>
			    		
			    	</div>
		    	<?php } ?>
		    	<!-- end get_the_author_meta -->


		    	<!-- You also like -->
		    	<?php if( class_exists( 'OvaFramework' ) ){ ?>
			    	<?php 
		    			$cat = get_the_category();
		    			$args_base = array(
		    				'post_type' => 'post',
		    				'post_status' => 'publish',
		    				'posts_per_page' => 5,
		    				'cat' => $cat[0]->term_id
		    			);
		    			$cat_arr = isset( $cat[0] ) ? array( 'cat' => $cat[0]->term_id ) : array();

		    			$args = array_merge($args_base, $cat_arr);
		    			$post_recommend = new WP_Query( $args );
	    			?>
	    			<?php if( $post_recommend->post_count > 0 ){ ?>
				    	<div class="post_recommend">
				    		<h3 class="heading-post-title">
				    			<span class="second_font"><?php esc_html_e( 'You may also like', 'hozing' ); ?></span>
				    		</h3>
				    		<div class="row">
				    			<div class="ova_blog owl-carousel">
					    			<?php if ( $post_recommend->have_posts() ) : while ( $post_recommend->have_posts() ) : $post_recommend->the_post(); ?>
					    					<div class="related-post">
						    					<div class="content">
							    					<div class="ova_media">
							    						<a href="<?php echo get_permalink() ?>">
								    						<?php  
										    					$img_hozing_m = '';
										    					if( has_post_thumbnail() ){
										    						$img_hozing_m  = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );	
										    					}
									    					?>
									    					<?php if( $img_hozing_m ){ ?>
									    						<img src="<?php echo esc_url( $img_hozing_m ); ?>" alt="<?php the_title_attribute(); ?>" />
									    					<?php } ?>
								    					</a>
							    					</div>
							    				</div>

						    					<div class="bottom">
						    						<h3 class="post-title second_font"><a href="<?php the_permalink(); ?>">
						    						<?php the_title(); ?> </a></h3>
						    						<div class="post_date"><span class="month"><?php echo the_time( get_option( 'date_format' )); ?></span></div>
						    						<div class="hozing-excerpt">
						    							<p><?php echo get_the_excerpt() ?></p>
						    						</div>
						    						<div class="readmore">
						    							<a href="<?php echo get_permalink() ?>"><?php esc_html_e( 'Read more', 'hozing' ) ?></a>
						    						</div>
						    					</div>
					    					</div>
					    			<?php endwhile; endif; wp_reset_postdata(); ?>
			    				</div>
			    			</div>
				    			
				    		
				    	</div>
			    	<?php } ?>

		    	<?php } ?>
		    	<!-- end relate post -->

		    <?php } ?>
		    <!-- end is_single -->

	</article>

<?php } ?>