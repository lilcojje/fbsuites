(function($){
	"use strict";
	
	$(window).on('load', function () {
        $(".loader").delay(100).fadeOut();
        $(".animationload").delay(100).fadeOut("fast");
    });

	$(document).ready(function(){

		/* Scroll to top */
		hozing_scrollUp();
		function hozing_scrollUp(options) {
		           
		    var defaults = {
		        scrollName: 'scrollUp', 
		        topDistance: 600, 
		        topSpeed: 800, 
		        animation: 'fade', 
		        animationInSpeed: 200, 
		        animationOutSpeed: 200, 
		        scrollText: '<i class="fas fa fa-angle-up"></i>', 
		        scrollImg: false, 
		        activeOverlay: false 
		    };

		    var o = $.extend({}, defaults, options),
		            scrollId = '#' + o.scrollName;


		    $('<a/>', {
		        id: o.scrollName,
		        href: '#top',
		        title: o.scrollText
		    }).appendTo('body');


		    if (!o.scrollImg) {

		        $(scrollId).html(o.scrollText);
		    }


		    $(scrollId).css({'display': 'none', 'position': 'fixed', 'z-index': '2147483647'});


		    if (o.activeOverlay) {
		        $("body").append("<div id='" + o.scrollName + "-active'></div>");
		        $(scrollId + "-active").css({'position': 'absolute', 'top': o.topDistance + 'px', 'width': '100%', 'border-top': '1px dotted ' + o.activeOverlay, 'z-index': '2147483647'});
		    }


		    $(window).scroll(function () {
		        switch (o.animation) {
		            case "fade":
		                $(($(window).scrollTop() > o.topDistance) ? $(scrollId).fadeIn(o.animationInSpeed) : $(scrollId).fadeOut(o.animationOutSpeed));
		                break;
		            case "slide":
		                $(($(window).scrollTop() > o.topDistance) ? $(scrollId).slideDown(o.animationInSpeed) : $(scrollId).slideUp(o.animationOutSpeed));
		                break;
		            default:
		                $(($(window).scrollTop() > o.topDistance) ? $(scrollId).show(0) : $(scrollId).hide(0));
		        }
		    });

		    
		    $(scrollId).on( "click", function (event) {
		        $('html, body').animate({scrollTop: 0}, o.topSpeed);
		        event.preventDefault();
		    });

		}

		/* Fix empty menu in test_uni_data */
		if( $( '.widget_nav_menu ul li' ).length > 0 ){
			$( '.widget_nav_menu ul li a:empty' ).parent().css('display','none');
		}


		

		/* Popup Image - PrettyPhoto */
		if( $("a[data-gal^='prettyPhoto']").length > 0 ){
		 	$("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal', theme: 'facebook',slideshow:5000, autoplay_slideshow:true});
	    }


	    /* Caousel Thumbnail Woo */
	    if( $('.woo-thumbnails').length > 0 ){
	        $('.woo-thumbnails').each(function(){

	        	var rtl = false;
			 	if( $('body').hasClass('rtl') ){
			 		rtl = true;
			 	}

	            $(this).owlCarousel({
	                autoplay: true,
	                autoplayHoverPause: true,
	                loop: false,
	                margin: 30,
	                dots: true,
	                nav: true,
	                rtl: rtl,
	                responsive: {
	                    0:    {items: 2},
	                    479:  {items: 2},
	                    768:  {items: 3},
	                    1024: {items: 4}
	                }
	            });
	        });
	    }

	    
	    $('.ova_blog').owlCarousel({
		    loop:true,
		    margin:30,
		    nav:true,
		    items: 2,
		    dots: false,
		    responsive:{
		    	0: {
		    		items: 1,
		    	},
		        991: {
		        	items:2,
		        }
		    }
		});


		

		$('select').each(function(){
			$(this).select2({ dropdownAutoWidth : true }); 
		});
		

	    if ($('.row').hasClass('row-mg-0')) {
	    	$('.row.row-mg-0').children().addClass('col-pd-0');
	    }
	    if ($('#blog-hoz-three-col').hasClass('blog-hoz-three-col')) {
	    	$('.blog').css({"background-color": "#f3f3f3"});
	    }

	    //add class to style for pagination each blog type.
	    if ($('div').hasClass('blog-hoz-has-sidebar')) {
	    	$('.pagination-wrapper').addClass('pag-style-has-sidebar');
	    }

	    if ($('div').hasClass('blog-hoz-style-1')) {
	    	$('.pagination-wrapper').addClass('pag-style-1-blog');
	    }

	    if ($('div').hasClass('blog-hoz-style-2')) {
	    	$('.pagination-wrapper').addClass('pag-style-2-blog');
	    }

	    if ($('div').hasClass('blog-hoz-style-3')) {
	    	$('.pagination-wrapper').addClass('pag-style-3-blog');
	    }

	    if ($('#blog-hoz-three-col').hasClass('blog-hoz-three-col')) {
	    	$('.pagination-wrapper').addClass('pag-hoz-three-col');
	    }

	    
	    $('.pag-style-1-blog .blog_pagination .pagination li').remove('.prev').remove('.next');   


	    $( '.ovatheme_header_default li.menu-item button.dropdown-toggle').off('click').on( 'click', function() {
		    $(this).parent().toggleClass('active_sub');
		});
		

	});	




})(jQuery);
