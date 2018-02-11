(function($) {
	"use strict";
	$(window).load(function() {
		$('#carousel_woo').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: false,
			animationLoop: true,
			slideshow: true,
			itemWidth: 92,
			itemMargin: 0,
			asNavFor: '#slider_woo'
		});
   
		$('#slider_woo').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: true,
			sync: "#carousel_woo"
		});
	});
	})(jQuery);

jQuery(document).ready(function( $ ) {
	"use strict";	
	
	$('p').each(function() {
        var $this = jQuery(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0) {
            $this.remove();
        }
    });
	
	//var url = $('.slim-wrap').data('image');
	//var homelink = $('.slim-wrap').data('homelink');
	//var imagealt = $('.slim-wrap').data('imagealt');
	$('.slim-wrap ul.menu-items').slimmenu({
        resizeWidth: '1000',
        collapserTitle: '',
        easingEffect:'easeInOutQuint',
        animSpeed:'medium',
        indentChildren: true,
        childrenIndenter: '&raquo;'
    });
	
	$('.ts-button').each(function () {
		var hoverback = $(this).data('hoverback');
		var currentbg = $(this).data('currentbg');
		var currentbor = $(this).data('currentbor');
		$(this).on('mouseenter',function() {
			$(this).css({'background': hoverback, 'border-color': hoverback});
		});
		$(this).on('mouseleave',function() {
			$(this).css({'background': currentbg, 'border-color': currentbor});
		});
	});
	
	$(".stat-count").each(function() {
		$(this).data('count', parseInt($(this).html(), 10));
		$(this).html('0');
		count($(this));
	});
	
	$(".content").fitVids();
	
	$("#datatime").each(function() {
		var date = $('#datatime').data('date');	
	$('#datatime').countdown({
		 date: date,
		 offset: -8,
		 day: 'Day',
		 days: 'Days'
		 }, function () {
		 alert('Done!');
	});
	});
	
	$('#contact_email_box').on('click',function() {
	  $('#email_box').toggle('fast', function() {
	  });
	});
	
	$('#emailcontactform').validate({
		rules: {				  
		  comment: {
			required: true,
			minlength: 10
		  }
		},
		messages: {
		  comment: "Please fill the message field."
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
		  element.after(error);
		}
	});
	/* CONFIG */
		
		var xOffset = 100;
		var yOffset = 30;
		
		$('a[data-gal]').each(function() {
	$(this).attr('rel', $(this).data('gal')); });     
	$("a[data-rel^='screenshot']").on('hover');
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.screenshot").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='screenshot'><img src='"+ this.rel +"' alt='' />"+ c +"</p>");								 
		$("#screenshot")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		$("#screenshot").remove();
    });	
	$("a.screenshot").mousemove(function(e){
		$("#screenshot")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});
	
	 $('.header_sticky').affix({
		offset: {
		top: 100,
		bottom: function () {
		return (this.bottom = $('.footer').outerHeight(true))
		}
		}
	});
	
    $('.product-fields-photo-version').hide(); 
    $('#product_upload_type').change(function(){
        if($('#product_upload_type').val() == 'type_photo_stock') {
            $('.product-fields-photo-version').show();
			$('.product-fields-app-version').hide();
        } else {
            $('.product-fields-app-version').show(); 
			$('.product-fields-photo-version').hide();
        } 
    });

});
