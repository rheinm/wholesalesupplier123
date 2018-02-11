jQuery(document).ready(function ($) {

	// Spoiler
	$('body:not(.ts-other-shortcodes-loaded)').on('click', '.ts-spoiler-title', function (e) {
		var $title = $(this),
			$spoiler = $title.parent(),
			bar = ($('#wpadminbar').length > 0) ? 28 : 0;
		// Open/close spoiler
		$spoiler.toggleClass('ts-spoiler-closed');
		// Close other spoilers in accordion
		$spoiler.parent('.ts-accordion').children('.ts-spoiler').not($spoiler).addClass('ts-spoiler-closed');
		// Scroll in spoiler in accordion
		if ($(window).scrollTop() > $title.offset().top) $(window).scrollTop($title.offset().top - $title.height() - bar);
		e.preventDefault();
	});
	$('.ts-spoiler-content').removeAttr('style');
	// Tabs
	$('body:not(.ts-other-shortcodes-loaded)').on('click', '.ts-tabs-nav span', function (e) {
		var $tab = $(this),
			data = $tab.data(),
			index = $tab.index(),
			is_disabled = $tab.hasClass('ts-tabs-disabled'),
			$tabs = $tab.parent('.ts-tabs-nav').children('span'),
			$panes = $tab.parents('.ts-tabs').find('.ts-tabs-pane'),
			$gmaps = $panes.eq(index).find('.ts-gmap:not(.ts-gmap-reloaded)');
		// Check tab is not disabled
		if (is_disabled) return false;
		// Hide all panes, show selected pane
		$panes.hide().eq(index).show();
		// Disable all tabs, enable selected tab
		$tabs.removeClass('ts-tabs-current').eq(index).addClass('ts-tabs-current');
		// Reload gmaps
		if ($gmaps.length > 0) $gmaps.each(function () {
			var $iframe = $(this).find('iframe:first');
			$(this).addClass('ts-gmap-reloaded');
			$iframe.attr('src', $iframe.attr('src'));
		});
		// Set height for vertical tabs
		tabs_height();
		// Open specified url
		if (data.url !== '') {
			if (data.target === 'self') window.location = data.url;
			else if (data.target === 'blank') window.open(data.url);
		}
		e.preventDefault();
	});

	// Activate tabs
	$('.ts-tabs').each(function () {
		var active = parseInt($(this).data('active')) - 1;
		$(this).children('.ts-tabs-nav').children('span').eq(active).trigger('click');
		tabs_height();
	});

	// Activate anchor nav for tabs and spoilers
	anchor_nav();

	// Lightbox
	$('.ts-lightbox').each(function () {
		$(this).on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			if ($(this).parent().attr('id') === 'ts-generator-preview') $(this).html(ts_other_shortcodes.no_preview);
			else {
				var type = $(this).data('mfp-type');
				$(this).magnificPopup({
					type: type,
					tClose: ts_magnific_popup.close,
					tLoading: ts_magnific_popup.loading,
					gallery: {
						tPrev: ts_magnific_popup.prev,
						tNext: ts_magnific_popup.next,
						tCounter: ts_magnific_popup.counter
					},
					image: {
						tError: ts_magnific_popup.error
					},
					ajax: {
						tError: ts_magnific_popup.error
					}
				}).magnificPopup('open');
			}
		});
	});
	// Tables
	$('.ts-table tr:even').addClass('ts-even');
	// Frame
	$('.ts-frame-align-center, .ts-frame-align-none').each(function () {
		var frame_width = $(this).find('img').width();
		$(this).css('width', frame_width + 12);
	});
	// Tooltip
	$('.ts-tooltip').each(function () {
		var $tt = $(this),
			$content = $tt.find('.ts-tooltip-content'),
			is_advanced = $content.length > 0,
			data = $tt.data(),
			config = {
				style: {
					classes: data.classes
				},
				position: {
					my: data.my,
					at: data.at,
					viewport: $(window)
				},
				content: {
					title: '',
					text: ''
				}
			};
		if (data.title !== '') config.content.title = data.title;
		if (is_advanced) config.content.text = $content;
		else config.content.text = $tt.attr('title');
		if (data.close === 'yes') config.content.button = true;
		if (data.behavior === 'click') {
			config.show = 'click';
			config.hide = 'click';
			$tt.on('click', function (e) {
				e.preventDefault();
				e.stopPropagation();
			});
			$(window).on('scroll resize', function () {
				$tt.qtip('reposition');
			});
		} else if (data.behavior === 'always') {
			config.show = true;
			config.hide = false;
			$(window).on('scroll resize', function () {
				$tt.qtip('reposition');
			});
		} else if (data.behavior === 'hover' && is_advanced) {
			config.hide = {
				fixed: true,
				delay: 600
			}
		}
		$tt.qtip(config);
	});

	// Expand
	$('.ts-expand').each(function () {
		var $this = $(this),
			$content = $this.children('.ts-expand-content'),
			$more = $this.children('.ts-expand-link-more'),
			$less = $this.children('.ts-expand-link-less'),
			data = $this.data(),
			col = 'ts-expand-collapsed';

		$more.on('click', function (e) {
			$content.css('max-height', 'none');
			$this.removeClass(col);
		});
		$less.on('click', function (e) {
			$content.css('max-height', data.height + 'px');
			$this.addClass(col);
		});
	});

	function is_transition_supported() {
		var thisBody = document.body || document.documentElement,
			thisStyle = thisBody.style,
			support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;

		return support;
	}

	// Animations is supported
	if (is_transition_supported()) {
		// Animate
		$('.ts-animate').each(function () {
			$(this).one('inview', function (e) {
				var $this = $(this),
					data = $this.data();
				window.setTimeout(function () {
					$this.addClass(data.animation);
					$this.addClass('animated');
					$this.css('visibility', 'visible');
				}, data.delay * 1000);
			});
		});
	}
	// Animations isn't supported
	else {
		$('.ts-animate').css('visibility', 'visible');
	}

	function tabs_height() {
		$('.ts-tabs-vertical').each(function () {
			var $tabs = $(this),
				$nav = $tabs.children('.ts-tabs-nav'),
				$panes = $tabs.find('.ts-tabs-pane'),
				height = 0;
			$panes.css('min-height', $nav.outerHeight(true));
		});
	}

	function anchor_nav() {
		// Check hash
		if (document.location.hash === '') return;
		// Go through tabs
		$('.ts-tabs-nav span[data-anchor]').each(function () {
			if ('#' + $(this).data('anchor') === document.location.hash) {
				var $tabs = $(this).parents('.ts-tabs'),
					bar = ($('#wpadminbar').length > 0) ? 28 : 0;
				// Activate tab
				$(this).trigger('click');
				// Scroll-in tabs container
				window.setTimeout(function () {
					$(window).scrollTop($tabs.offset().top - bar - 10);
				}, 100);
			}
		});
		// Go through spoilers
		$('.ts-spoiler[data-anchor]').each(function () {
			if ('#' + $(this).data('anchor') === document.location.hash) {
				var $spoiler = $(this),
					bar = ($('#wpadminbar').length > 0) ? 28 : 0;
				// Activate tab
				if ($spoiler.hasClass('ts-spoiler-closed')) $spoiler.find('.ts-spoiler-title:first').trigger('click');
				// Scroll-in tabs container
				window.setTimeout(function () {
					$(window).scrollTop($spoiler.offset().top - bar - 10);
				}, 100);
			}
		});
		
		// Go through spoilers
		
	}

	if ('onhashchange' in window) $(window).on('hashchange', anchor_nav);

	$('body').addClass('ts-other-shortcodes-loaded');
});