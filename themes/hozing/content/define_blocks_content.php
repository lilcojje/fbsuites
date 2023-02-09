<?php

/* This is functions define blocks to display post */

if ( ! function_exists( 'hozing_content_thumbnail' ) ) {
  function hozing_content_thumbnail( $size ) {
    if ( has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image') )  :
      the_post_thumbnail( $size, array('class'=> 'img-responsive' ));
    endif;
  }
}

if ( ! function_exists( 'hozing_postformat_video' ) ) {
  function hozing_postformat_video( ) { ?>
    <?php if(has_post_format('video') && wp_oembed_get(get_post_meta(get_the_id(), "hozing_met_embed_media", true))){ ?>
	    <div class="js-video postformat_video">
	        <?php echo wp_oembed_get(get_post_meta(get_the_id(), "hozing_met_embed_media", true)); ?>
	    </div>
    <?php } ?>
  <?php }
}

if ( ! function_exists( 'hozing_postformat_audio ') ) {
  function hozing_postformat_audio( ) { ?>
    <?php if(has_post_format('audio') && wp_oembed_get(get_post_meta(get_the_id(), "hozing_met_embed_media", true))){ ?>
	    <div class="js-video postformat_audio">
	        <?php echo wp_oembed_get(get_post_meta(get_the_id(), "hozing_met_embed_media", true)); ?>
	    </div>
    <?php } ?>
  <?php }
}

if ( ! function_exists( 'hozing_content_title' ) ) {
  function hozing_content_title() { ?>

    <?php if ( is_single() ) : ?>
      <h1 class="post-title second_font">
          <?php the_title(); ?>
          <?php if( is_sticky() ){ ?>
        	<span><?php esc_html_e( 'Featured', 'hozing' ); ?></span>
        	<?php } ?>
      </h1>
    <?php else : ?>
      <h2 class="post-title">
        <a class="second_font" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
        <?php if( is_sticky() ){ ?>
        	<span><?php esc_html_e( 'Featured', 'hozing' ); ?></span>
        <?php } ?>
      </h2>
      <?php endif; ?>

 <?php }
}


if ( ! function_exists( 'hozing_content_meta' ) ) {
  function hozing_content_meta( ) { ?>
	    <span class="post-meta-content">
		    <span class=" post-date">
		        <span class="left"><i class="icon_calendar"></i></span>
		        <span class="right"><?php the_time( get_option( 'date_format' ));?></span>
		    </span>
		    
		    <span class=" post-author">
		        <span class="left"><i class="icon_folder-add_alt"></i></span>
		        <span class="right"><?php the_category(', ') ?></span>
		    </span>
		    
		    <span class=" comment">
		        <span class="left"><i class="icon_comment_alt"></i></span>
		        <span class="right">                   
		            <?php comments_popup_link(
		            	esc_html__(' 0 comment', 'hozing'), 
		            	esc_html__(' 1 comment', 'hozing'), 
		            	' % '.esc_html__('comments', 'hozing'),
		            	'',
                  		esc_html__( 'Comment off', 'hozing' )
		            ); ?>
		        </span>                
		    </span>
		</span>
  <?php } }

if ( ! function_exists( 'hozing_content_body' ) ) {
  function hozing_content_body( ) { ?>
  	<div class="post-excerpt">
		<?php if(is_single()){
		    the_content();
		    wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'hozing' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '%',
				'separator'   => '',
			) );             
		}else{
			the_excerpt();
		} ?>
		
	</div>

<?php } }

if ( ! function_exists( 'hozing_content_readmore' ) ) {
  function hozing_content_readmore( ) { ?>
  	<div class="post-footer">
		<div class="post-readmore">
		    <a class="btn btn-theme btn-theme-transparent" href="<?php the_permalink(); ?>"><?php  esc_html_e('Read more', 'hozing'); ?></a>
		</div>
	</div>
 <?php }
}

if ( ! function_exists( 'hozing_content_tag' ) ) {
  function hozing_content_tag( ) { ?>
	
	    <footer class="post-tag">
	        <?php if(has_tag()){ ?>
	            <span class="post-tags">
	            	<span class="ovatags second_font"><?php esc_html_e('Tags: ', 'hozing'); ?></span>
	                <?php the_tags('','&nbsp;&nbsp;',''); ?>
	            </span>
	        <?php } ?>
	        <div class="clearboth"></div>
	        <?php if(has_category( )){ ?>
	            <span class="post-categories">
	            	<span class="ovacats"><?php esc_html_e('Categories: ', 'hozing'); ?></span>
	                <?php the_category('&nbsp;&nbsp;'); ?>
	            </span>
	        <?php } ?>

	        <?php if( has_filter( 'hozing_share_social' ) ){ ?>
		        <div class="share_social">
		        	<span class="ova_label"><?php esc_html_e('Share: ', 'hozing'); ?></span>
		        	<?php echo apply_filters('hozing_share_social', get_the_permalink(), get_the_title() ); ?>
		        </div>
	        <?php } ?>
	    </footer>
	
 <?php } }

if ( ! function_exists( 'hozing_content_gallery' ) ) {
 	function hozing_content_gallery( ) {
			
			$gallery = get_post_meta(get_the_ID(), 'hozing_met_file_list', true)?get_post_meta(get_the_ID(), 'hozing_met_file_list', true):'';

		    $k = 0;

		    if($gallery){ $i=0; ?>

		        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php foreach ($gallery as $key => $value) { ?>
				  		$active = ($i == 0) ? ' active ' : '';
				    	<li data-target="#carousel-example-generic" data-slide-to="<?php echo esc_attr($i); ?>" class="<?php echo esc_attr($active); ?>"></li>
				    <?php $i++; } ?>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php foreach ($gallery as $key => $value) { ?>
					    <div class="item <?php echo esc_attr($k==0)?'active':'';$k++; ?>">
					      <img class="img-responsive" src="<?php  echo esc_attr($value); ?>" alt="<?php the_title_attribute(); ?>">
					    </div>
				   	<?php } ?>
				   </div>

				</div>
<?php } } }

if ( ! function_exists( 'hozing_theme_comment' ) ) {
function hozing_theme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <article class="comment_item" id="comment-<?php comment_ID(); ?>">

         <header class="comment-author">
         	<?php echo get_avatar($comment,$size='70', $default = 'mysteryman' ); ?>
         </header>

         <section class="comment-details">

            <div class="author-name">

            	<div class="name second_font">
            		<?php printf('%s', get_comment_author_link()) ?>	
            	</div>

            	<div class="date">
            		<?php printf(get_comment_date()) ?>	
            	</div>

                
	        </div> 

            <div class="comment-body clearfix comment-content">
			    <?php comment_text() ?>
			    <div class="ova_reply">
		            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		            <?php edit_comment_link( __( 'Edit', 'hozing' ), '  ', '' );?>
	            </div>
			</div>

        </section>

          <?php if ($comment->comment_approved == '0') : ?>
             <em><?php esc_html_e('Your comment is awaiting moderation.', 'hozing') ?></em>
             <br />
          <?php endif; ?>
        
     </article>
<?php } 
}