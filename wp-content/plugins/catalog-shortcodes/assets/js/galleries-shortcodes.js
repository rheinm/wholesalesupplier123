jQuery(document).ready(function ($) {
	// Prepare items arrays for lightbox
	$('.ts-lightbox-gallery').each(function () {
		var slides = [];
		$(this).find('.ts-slider-slide, .ts-carousel-slide, .ts-custom-gallery-slide').each(function (i) {
			$(this).attr('data-index', i);
			slides.push({
				src: $(this).children('a').attr('href'),
				title: $(this).children('a').attr('title')
			});
		});
		$(this).data('slides', slides);
	});
	// Enable sliders
	$('.ts-slider').each(function () {
		// Prepare data
		var $slider = $(this);
		// Apply Swiper
		var $swiper = $slider.swiper({
			wrapperClass: 'ts-slider-slides',
			slideClass: 'ts-slider-slide',
			slideActiveClass: 'ts-slider-slide-active',
			slideVisibleClass: 'ts-slider-slide-visible',
			pagination: '#' + $slider.attr('id') + ' .ts-slider-pagination',
			autoplay: $slider.data('autoplay'),
			paginationClickable: true,
			grabCursor: true,
			mode: 'horizontal',
			mousewheelControl: $slider.data('mousewheel'),
			speed: $slider.data('speed'),
			calculateHeight: $slider.hasClass('ts-slider-responsive-yes'),
			loop: true
		});
		// Prev button
		$slider.find('.ts-slider-prev').click(function (e) {
			$swiper.swipeNext();
		});
		// Next button
		$slider.find('.ts-slider-next').click(function (e) {
			$swiper.swipePrev();
		});
	});
	// Enable carousels
	$('.ts-carousel').each(function () {
		// Prepare data
		var $carousel = $(this),
			$slides = $carousel.find('.ts-carousel-slide');
		// Apply Swiper
		var $swiper = $carousel.swiper({
			wrapperClass: 'ts-carousel-slides',
			slideClass: 'ts-carousel-slide',
			slideActiveClass: 'ts-carousel-slide-active',
			slideVisibleClass: 'ts-carousel-slide-visible',
			pagination: '#' + $carousel.attr('id') + ' .ts-carousel-pagination',
			autoplay: $carousel.data('autoplay'),
			paginationClickable: true,
			grabCursor: true,
			mode: 'horizontal',
			mousewheelControl: $carousel.data('mousewheel'),
			speed: $carousel.data('speed'),
			slidesPerView: ($carousel.data('items') > $slides.length) ? $slides.length : $carousel.data('items'),
			slidesPerGroup: $carousel.data('scroll'),
			calculateHeight: $carousel.hasClass('ts-carousel-responsive-yes'),
			loop: true
		});
		// Prev button
		$carousel.find('.ts-carousel-prev').click(function (e) {
			$swiper.swipeNext();
		});
		// Next button
		$carousel.find('.ts-carousel-next').click(function (e) {
			$swiper.swipePrev();
		});
	});
	// Enable lightbox
	$('.ts-lightbox-gallery').on('click', '.ts-slider-slide, .ts-carousel-slide, .ts-custom-gallery-slide', function (e) {
		e.preventDefault();
		var slides = $(this).parents('.ts-lightbox-gallery').data('slides');
		$.magnificPopup.open({
			items: slides,
			type: 'image',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1],
				tPrev: ts_magnific_popup.prev,
				tNext: ts_magnific_popup.next,
				tCounter: ts_magnific_popup.counter
			},
			tClose: ts_magnific_popup.close,
			tLoading: ts_magnific_popup.loading
		}, $(this).data('index'));
	});
});