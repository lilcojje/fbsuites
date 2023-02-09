<?php 
$general_css = '';

/* Primary Font */
$default_primary_font = json_decode( hozing_default_primary_font() );
$primary_font = json_decode( get_theme_mod( 'primary_font' ) ) ? json_decode( get_theme_mod( 'primary_font' ) ) : $default_primary_font;
$primary_font_family = $primary_font->font;



$general_font_size = get_theme_mod( 'general_font_size', '16px' );
$general_line_height = get_theme_mod( 'general_line_height', '23px' );
$general_letter_space = get_theme_mod( 'general_letter_space', '0px' );
$general_color = get_theme_mod( 'general_color', '#343434' );


/* General Color */
$primary_color = get_theme_mod( 'primary_color', '#b9a271' );



/* Second Font */
$default_second_font = json_decode( hozing_default_second_font() );
$second_font = json_decode( get_theme_mod( 'second_font' ) ) ? json_decode( get_theme_mod( 'second_font' ) ) : $default_second_font;
$second_font_family = $second_font->font;


$rd_header_margin_top = get_theme_mod('rd_header_margin_top', '-180');

$rd_room_cat_margin_top = get_theme_mod( 'rd_room_cat_margin_top', '0' );


$general_css .= <<<CSS

body{
	font-family: {$primary_font_family};
	font-weight: 400;
	font-size: {$general_font_size};
	line-height: {$general_line_height};
	letter-spacing: {$general_letter_space};
	color: {$general_color};
}
.editor-styles-wrapper{
	font-family: {$primary_font_family}!important;
}
p{
	line-height: {$general_line_height}px;
	color: {$general_color};
}

article.post-wrap.hoz-single-post .post-body p{
	font-family: {$primary_font_family};
	font-weight: 400;
	font-size: {$general_font_size};
	line-height: {$general_line_height};
	letter-spacing: {$general_letter_space};
	color: {$general_color};	
}

/*---------------------------------------
			Archive && Search Room Woo 
----------------------------------------*/
.ovahotel_search .wrap-check-form .hotel_field label,
.ovahotel_search .wrap-check-form .hotel_field .hotel_field_date .show_date .day_digit,
.ovahotel_search .wrap-check-form .hotel_field .hotel_field_date .show_date .month_year,
.ovahotel_search .wrap-check-form .hotel_field.btn_search .btn_tran,
.archive_rental .rental_item .border-box .wrap_img .price_night .wrap_content,
.archive_rental .rental_item .border-box .content ul.specical-infor li span,
.archive_rental .rental_item .border-box .content p,
.archive_rental .rental_item .border-box .content .discorver .discover-now,
.archive_rental .woocommerce-pagination ul.page-numbers li span.current,
.archive_rental .rental_item.colums_no_sidebar_2v2 .border-box .wrap_img .discorver a,
.archive_rental .sidebar.woo-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount .price_label,
ul.commentlists li.pingback .author-name a
{
	font-family: {$primary_font_family};
}
.ovahotel_search .wrap-check-form .hotel_field .hotel_field_date .show_date .month_year .day_name,
.archive_rental .rental_item .border-box .wrap_img .price_night .wrap_content .amount,
.archive_rental .woocommerce-pagination ul.page-numbers li span.current,
.archive_rental .woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
.archive_rental .rental_item.colums_no_sidebar_3v2 .border-box:hover .content .discorver .discover-now, .archive_rental .rental_item.columns_sidebar_v1 .border-box:hover .content .discorver .discover-now,
.archive_rental .rental_item.colums_no_sidebar_2v1 .border-box .content .discorver .discover-now:hover,
.ovahotel_search.checking_side .wrap-check-form .hotel_field .room_infor .people,
.archive_rental .room-grid-3-columns-v1 .woocommerce-pagination ul.page-numbers li span.current, .archive_rental .room-grid-2-columns-with-sidebar .woocommerce-pagination ul.page-numbers li span.current,
.archive_rental .rental_item.colums_no_sidebar_3v2 .border-box .wrap_img .price_night .wrap_content .amount, .archive_rental .rental_item.columns_sidebar_v1 .border-box .wrap_img .price_night .wrap_content .amount,
.archive_rental .room-list .woocommerce-pagination ul.page-numbers li span.current, .archive_rental .room-list-with-sidebar .woocommerce-pagination ul.page-numbers li span.current, .archive_rental .room-grid-3-columns-v2 .woocommerce-pagination ul.page-numbers li span.current,
.archive_rental .rental_item .border-box .content h3.title a:hover,
.archive_rental .rental_item.room_life_style .border-box .content .general_font a:hover,
.main-room-details .sticky-nav-tabs ul.sticky-nav-tabs-container li.active:before,
.woocommerce p.stars a

{
	color: {$primary_color};
}
.ovahotel_search .wrap-check-form .hotel_field.btn_search .btn_tran,
.archive_rental .rental_item.colums_no_sidebar_2v2 .border-box .wrap_img .price_night .wrap_content,
.archive_rental .rental_item.product_room_list .border-box:hover .content .discorver .discover-now, .archive_rental .rental_item.room_list_with_sidebar .border-box:hover .content .discorver .discover-now,
.archive_rental .rental_item.colums_no_sidebar_2v2 .border-box .wrap_img .discorver a:hover,
form.search-form input.search-submit
{
	background-color: {$primary_color}; 
}

.archive_rental .rental_item .border-box .content h3.title,
.archive_rental .sidebar.woo-sidebar .widget h4.widget-title,
.archive_rental .sidebar.woo-sidebar .widget_text h4.widget-title

{
	font-family: {$second_font_family};
}

/*---------Boder---------*/
.archive_rental .rental_item.product_room_list .border-box .content .discorver .discover-now, .archive_rental .rental_item.room_list_with_sidebar .border-box .content .discorver .discover-now,
.archive_rental .room-grid-2-columns-v2 .woocommerce-pagination ul.page-numbers li span.current,

.archive_rental .rental_item.colums_no_sidebar_3v2 .border-box:hover .content, .archive_rental .rental_item.columns_sidebar_v1 .border-box:hover .content,
.archive_rental .room-grid-3-columns-v1 .woocommerce-pagination ul.page-numbers li span.current, .archive_rental .room-grid-2-columns-with-sidebar .woocommerce-pagination ul.page-numbers li span.current,
.select2-container--default .select2-selection--single,
form.search-form .search-field,
form.search-form input.search-submit

{
	border-color: {$primary_color} !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: {$primary_color} transparent transparent transparent;	
}

@media(max-width: 575px){
	.main-room-details .hotel_details .right-infor-detail .info-room-detail .buttons .hozing_btn_img{
		background: {$primary_color};
	}
}

/*==================== Detail Room Woo ====================*/

.main-room-details .hotel_details .left-infor-detail .desc p,
.main-room-details .hotel_details .left-infor-detail .service ul.wrap_resources li span,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .price .time-night-details,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .price .amount,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .buttons .hozing_btn_img,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .buttons .hozing_btn_video,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .amenities .features .feature-item span.label,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .amenities .services .feature-item span.label,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-view-container .fc-view table .fc-body .fc-scroller .fc-day-grid .fc-row .fc-content-skeleton .fc-day-top .fc-day-number,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .intruction li span,
.main-room-details .other-room .room-other .product_list_widget .item-room .wrap_img .price_night .wrap_content,
.main-room-details .other-room .room-other .product_list_widget .item-room .content ul.specical-infor li span
{
	font-family: {$primary_font_family};
}

.main-room-details .sticky-nav-tabs ul.sticky-nav-tabs-container li a.sticky-nav-tab,

.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .title-calendar h3,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-toolbar .fc-center h2,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-view-container .fc-view table .fc-head .fc-head-container .fc-row table .fc-day-header span,
.main-room-details #booking .title-booking h3,
.main-room-details .other-room .room-other .product_list_widget .item-room .content h3.title,
.related.products h2,
.woocommerce.single-product .product .woocommerce-tabs ul.tabs li a
{
	font-family: {$second_font_family};
}

.main-room-details .hotel_details .left-infor-detail .desc h3.second_font span,
.main-room-details .hotel_details .left-infor-detail .service h3.second_font span,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .buttons .hozing_btn_img,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .title-calendar h3 span,
.main-room-details .other-room .title-other h3 span,
.main-room-details .other-room .room-other .product_list_widget .owl-dots button,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-toolbar .fc-left .fc-button-group .fc-prev-button:hover, .main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-toolbar .fc-left .fc-button-group .fc-next-button:hover
{
	border-color: {$primary_color} !important;
}
.main-room-details .hotel_details .right-infor-detail .info-room-detail .price .amount,
.main-room-details .other-room .room-other .product_list_widget .item-room .wrap_img .price_night .wrap_content .amount,
.main-room-details .hotel_details .left-infor-detail .service ul.wrap_resources li:before,
.main-room-details .other-room .title-other h2:hover,
.main-room-details .other-room .room-other .product_list_widget .item-room .content h3.title a:hover,
.ovahotel_search .wrap-check-form .hotel_field label.error
{
	color: {$primary_color} !important;
}

.main-room-details .hotel_details .right-infor-detail .info-room-detail .buttons .hozing_btn_img:hover,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .buttons .hozing_btn_video:hover,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-toolbar .fc-left .fc-button-group .fc-prev-button:hover, .main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .hotel_product_calendar .fc-toolbar .fc-left .fc-button-group .fc-next-button:hover,
.main-room-details .hotel_details .right-infor-detail .info-room-detail .calendar .intruction li span.yellow,
.main-room-details .other-room .room-other .product_list_widget .owl-dots button.active,
.main-room-details #gallery .list-image .owl-nav .owl-prev, .main-room-details #gallery .list-image .owl-nav .owl-next,
.main-room-details #gallery .list-image .owl-dots .owl-dot span
{
	background: {$primary_color};
}

.general_font{
	font-family: {$primary_font_family};
}
h1,h2,h3,h4,h5,h6,
.cart-collaterals h2,
#review_form  #reply-title,
.second_font{
	font-family: {$second_font_family};
}

/* =================== Cart && Checkout Page */

.woocommerce-cart .woocommerce .cart-collaterals .cart_totals .shop_table,
.woocommerce-cart .woocommerce .woocommerce-cart-form .shop_table tbody .actions .coupon .button,
.woocommerce-checkout .checkout_coupon .button,
.checkout .woocommerce-checkout-payment .place-order .button,
.woocommerce-order .woocommerce-order-details h2:before
{
	background: {$primary_color};
}
.woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info a,
.woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info:before,
.checkout .hotel_billing .woocommerce-billing-fields p.form-row label .required,
.woocommerce-privacy-policy-text a.woocommerce-privacy-policy-link,
.validate-required a.woocommerce-terms-and-conditions-link,
.checkout .woocommerce-checkout-payment .place-order .woocommerce-terms-and-conditions-wrapper .validate-required .required{
	color: {$primary_color} !important;
}

.woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info,
.woocommerce-checkout .checkout_coupon .button
{
	border-color: {$primary_color} !important;
}
form.checkout.woocommerce-checkout h3:after{
	background: {$primary_color} !important;
}

/* =============== My Account*/

.woocommerce .lost_reset_password .form-row button,
.woocommerce .woocommerce-form-login .form-row button,
.woocommerce .woocommerce-MyAccount-content .edit-account button,
.woocommerce .edit-account .form-row button, 
.woocommerce .login .form-row button, 
.woocommerce .register .form-row button,
.woocommerce .woocommerce-MyAccount-content .woocommerce-address-fields button{
	background: {$primary_color} !important; 
}
.woocommerce .lost_reset_password .form-row button,
.woocommerce .woocommerce-form-login .form-row button,
.woocommerce .woocommerce-MyAccount-content .edit-account button,
.woocommerce .woocommerce-MyAccount-content .woocommerce-address-fields button{
	border-color: {$primary_color} !important;
}
.woocommerce .woocommerce-form-login p.lost_password a,
.woocommerce-MyAccount-content p a{
	color: {$primary_color};
}
/*==================== Room Element ====================*/
.hozing_product_slider .rental_item.room_suits .border-box .content .price_night .wrap_content .amount{
	font-family: {$second_font_family};
}

.hozing_product_slider .rental_item .border-box .wrap_img .price_night .wrap_content .amount,
.hozing_product_slider .owl-dots .owl-dot span:hover,
.hozing_product_slider.style1 .owl-dots .owl-dot.active span,
.hozing_product_slider.style2 .owl-dots .owl-dot.active span,
.hozing_product_slider.style3 .owl-dots .owl-dot.active span,
.hozing_product_slider.style4 .owl-dots .owl-dot.active span,
.hozing_product_slider.style5 .owl-dots .owl-dot.active span,
.hozing_product_slider.style6 .owl-dots .owl-dot.active span,
.hozing_product_slider .rental_item.colums_no_sidebar_3v2 .border-box:hover .content .discorver .discover-now,
.hozing_product_slider .rental_item.room_suits .border-box .content .price_night .wrap_content .amount,
.hozing_wrap_product_grid .rental_item .border-box .wrap_img .price_night .wrap_content .amount,
.hozing_wrap_product_grid .view_all_room .view-all:hover,
.hozing_product_slider .rental_item .border-box .content h3.second_font a:hover,
.hozing_product_slider .rental_item .border-box .content .discorver .discover-now:hover,
.hozing_product_slider .rental_item.room_style7 .border-box .content .wrap-content,
.hozing_wrap_product_grid .rental_item_grid .border-box .content .second_font a:hover,
.hozing_wrap_product_grid .rental_item_grid .border-box .wrap_img .price_night .wrap_content .amount,
.woocommerce.single-product .product .price,
.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__price
{
	color: {$primary_color};
}

.hozing_product_slider .rental_item.colums_no_sidebar_2v2 .border-box .wrap_img .price_night .wrap_content,
.hozing_product_slider .rental_item.product_room_list .border-box:hover .content .discorver .discover-now,
.hozing_product_slider .rental_item.room_suits .border-box .content .enjoy_now,
.hozing_product_slider .rental_item.room_suits .border-box .wrap_img .enjoy_now,
.hozing_product_slider .rental_item.colums_no_sidebar_2v2 .border-box .wrap_img .discorver a:hover,
.hozing_product_slider.style7 .owl-dots .owl-dot.active span,
.woocommerce.single-product .product .onsale
{
	background: {$primary_color};
}

.hozing_product_slider.style2 .owl-dots .owl-dot.active span,
.hozing_product_slider.style3 .owl-dots .owl-dot.active span,
.hozing_product_slider.style4 .owl-dots .owl-dot.active span,
.hozing_product_slider.style5 .owl-dots .owl-dot.active span,
.hozing_product_slider.style6 .owl-dots .owl-dot.active span,
.hozing_product_slider.style7 .owl-dots .owl-dot span,
.hozing_product_slider .rental_item.colums_no_sidebar_3v2 .border-box:hover .content,
.hozing_product_slider .rental_item.room_suits .border-box .content .discorver .discover-now,
.hozing_product_slider .rental_item.product_room_list .border-box .content .discorver .discover-now,
.hozing_wrap_product_grid .view_all_room .view-all:hover,
.main-room-details #gallery .list-image .owl-dots .owl-dot.active span:before

{
	border-color: {$primary_color};
}

@media(max-width: 480px){
	.hozing_product_slider.style6 .owl-nav .owl-prev, .hozing_product_slider.style6 .owl-nav .owl-next,
	.hozing_product_slider.style6 .owl-nav .owl-prev:hover, .hozing_product_slider.style6 .owl-nav .owl-next:hover{
		background: {$primary_color};
	}
}

/*-------- Menu Elementor ------------*/
.ova_nav ul li.active a,
.ova_nav ul li a:hover{
	color: {$primary_color};
}


/*-------- Blog  ------------*/
/** font-family **/
.sidebar .widget h4.widget-title,
.sidebar .widget.recent-posts-widget-with-thumbnails li a span,
h1.page-title,
.second_font,
.woocommerce.single-product .product .product_title
{
	font-family: {$second_font_family};
}


.blog-hoz-style article.post-wrap .post-sub-wrap h2.post-title a:hover, 
.blog-hoz-style article.post-wrap .post-sub-wrap .post-readmore a:hover,
.blog-hoz-style.blog-hoz-style-2 article.post-wrap .post-sub-wrap .post-readmore a:hover,
.pagination-wrapper.pag-style-3-blog ul.pagination li.active a,
.pagination-wrapper.pag-style-3-blog ul.pagination li:hover a,
.pagination-wrapper.pag-style-1-blog ul.pagination li.active a,
.pagination-wrapper.pag-style-1-blog ul.pagination li:hover a,
.pagination-wrapper.pag-style-2-blog ul.pagination li.active a,
.pagination-wrapper.pag-style-2-blog ul.pagination li:hover a,
.pagination-wrapper.pag-style-has-sidebar ul.pagination li.active a,
.pagination-wrapper.pag-style-has-sidebar ul.pagination li:hover a,
.pagination-wrapper.pag-style-2-blog ul.pagination li.next a:hover,
.pagination-wrapper.pag-style-2-blog ul.pagination li.prev a:hover,
.pagination-wrapper.pag-style-has-sidebar ul.pagination li.next a:hover,
.pagination-wrapper.pag-style-has-sidebar ul.pagination li.prev a:hover, 
.blog-hoz-has-sidebar article.post-wrap .post-sub-wrap h2.post-title a:hover,
.blog-hoz-has-sidebar article.post-wrap .post-sub-wrap .post-readmore a:hover,
.blog-hoz-has-sidebar article.post-wrap:first-child.blog-odd .post-sub-wrap .post-readmore a:hover,
.blog-hoz-three-col article.post-wrap .post-sub-wrap h2.post-title a:hover,
.blog-hoz-three-col article.post-wrap .post-sub-wrap .post-readmore a:hover,
.pagination-wrapper.pag-hoz-three-col ul.pagination li.active a,
.pagination-wrapper.pag-hoz-three-col ul.pagination li:hover a,
.sidebar .widget.widget_categories ul li:hover a,
.sidebar .widget ul.hoz-contac-us li i,
.sidebar .widget.widget_recent_comments ul li span.comment-author-link,
.sidebar .widget.widget_recent_comments ul li span.comment-author-link a,
article.post-wrap.hoz-single-post .post-meta .post-meta-content .post-date span.right:before,
article.post-wrap.hoz-single-post .post-meta .post-meta-content .post-author span.right:before,
article.post-wrap.hoz-single-post .post-meta .post-meta-content .comment span.right:before,
article.post-wrap.hoz-single-post .author_meta .info a.author_link,
article.post-wrap.hoz-single-post .post_recommend .ova_blog .related-post .bottom h3.post-title a:hover,
article.post-wrap.hoz-single-post .post_recommend .ova_blog .related-post .bottom .readmore a:hover,
.single-post .content_comments .comments ul.commentlists li.comment .comment-details .author-name .date,
.single-post .content_comments .comments .comment-form .form-submit:after,
.sidebar .widget.recent-posts-widget-with-thumbnails li a span:hover,
.single-post .content_comments .comments .comment-form .form-submit #submit:hover,
.post-meta .post-meta-content .left i
{
	color: {$primary_color};
}


.pagination-wrapper.pag-style-1-blog ul.pagination li.active a,
.pagination-wrapper.pag-style-1-blog ul.pagination li:hover a,
.pagination-wrapper.pag-style-2-blog ul.pagination li.active a,
.pagination-wrapper.pag-style-2-blog ul.pagination li:hover a,
.pagination-wrapper.pag-style-has-sidebar ul.pagination li.active a,
.pagination-wrapper.pag-style-has-sidebar ul.pagination li:hover a,
.blog-hoz-has-sidebar article.post-wrap:first-child.blog-even .post-sub-wrap .post-readmore a,
.blog-hoz-has-sidebar article.post-wrap:first-child.blog-odd .post-sub-wrap .post-readmore a,
.sidebar .widget h4.widget-title,
.single-post .content_comments .comments h4.number-comments,
.single-post .content_comments .comments .wrap_comment_form h4.title-comment,
.ova-blog-element.blog_version_4 .ova-button-view-all a,
.ova-blog-element.blog_version_4 .ova-button-view-all a:hover,
.pagination-wrapper .pagination li.active a
{
	border-color: {$primary_color};
}

.blog-hoz-style.blog-hoz-style-1 article.post-wrap.blog-even .post-sub-wrap h2.post-title:hover:before,
.blog-hoz-style.blog-hoz-style-1 article.post-wrap.blog-odd .post-sub-wrap .post-readmore a:hover:after,
.blog-hoz-style.blog-hoz-style-2 article.post-wrap .post-sub-wrap .post-readmore a:before,
.blog-hoz-has-sidebar article.post-wrap .post-sub-wrap .post-readmore a:before,
.blog-hoz-three-col article.post-wrap .post-sub-wrap .post-readmore a:hover:after,
article.post-wrap.hoz-single-post .post_recommend h3.heading-post-title div:after,
article.post-wrap.hoz-single-post .post_recommend .ova_blog .related-post .bottom .readmore a:hover:after,
.single-post .content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-reply-link:hover,
.single-post .content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-edit-link:hover,
.ova-blog-element.blog_version_4 .post-item .info-item .post-excerpt:after,
.pagination-wrapper .pagination li.active a
{
	background-color: {$primary_color};
}


/* Detail */
.product-type-ovacrs_car_rental{
	margin-top: {$rd_header_margin_top}px;
	z-index: 1;
}

/* Room Category */

.wrap_site.archive_rental .hozing_wd_search,
.archive_rental .sidebar.woo-sidebar{
	margin-top: {$rd_room_cat_margin_top}px !important;
	z-index: 1;
}

/******** menu canvas *****/
.ova_menu_canvas .ova_nav_canvas .check-room .wrap-check-form .hotel_field.btn_search .btn_tran:hover
{
	color: {$primary_color};
}
.ova_menu_canvas .ova_nav_canvas .check-room .wrap-check-form .hotel_field.btn_search .btn_tran,
.ova_menu_canvas .ova_nav_canvas .wp-title .title-menu
{
	border-color: {$primary_color}!important;
}
@media( max-width: 1024px ){
	.product-type-ovacrs_car_rental{
		margin-top: 0;
	}
}

CSS;



return $general_css;