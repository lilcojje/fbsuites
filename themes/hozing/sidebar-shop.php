<?php
$sidebar = apply_filters( 'hozing_hotel_theme_sidebar', '' );
if ($sidebar == 'layout_1c' || $sidebar == ''){
    return;
}
?>
<?php if(is_active_sidebar('woo-sidebar')){ ?>
        <aside id="sidebar-woo" class="sidebar woo-sidebar">
            <?php  dynamic_sidebar('woo-sidebar'); ?>
        </aside>
<?php } ?>