<?php 
$show_page_heading = get_post_meta(hozing_get_current_id(), "hozing_met_page_heading", true)?get_post_meta(hozing_get_current_id(), "hozing_met_page_heading", true):'yes';
 ?>
<?php if($show_page_heading == 'yes'){ ?>
    <h1 class="post-title second_font">
    	<?php the_title();?>
    </h1>
<?php } ?>

<?php 
	the_content();
?>
<div class="page-links">
	<?php
		wp_link_pages( array(
			'before'      => '<span class="page-links-title">' . __( 'Pages:', 'hozing' ) . '</span>',
			'after'       => '',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'hozing' ) . ' </span>%',
			'separator'   => '',
		) );
	?>

</div>