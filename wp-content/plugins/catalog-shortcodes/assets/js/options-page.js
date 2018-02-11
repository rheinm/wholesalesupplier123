// Wait DOM
jQuery(document).ready(function($) {
	// ########## About screen ##########
	$('.ts-demo-video').magnificPopup({
		type: 'iframe',
		callbacks: {
			open: function() {
				// Change z-index
				$('body').addClass('ts-mfp-shown');
			},
			close: function() {
				// Change z-index
				$('body').removeClass('ts-mfp-shown');
			}
		}
	});
	// ########## Custom CSS screen ##########
	$('.ts-custom-css-originals a').magnificPopup({
		type: 'iframe',
		callbacks: {
			open: function() {
				// Change z-index
				$('body').addClass('ts-mfp-shown');
			},
			close: function() {
				// Change z-index
				$('body').removeClass('ts-mfp-shown');
			}
		}
	});
	// Enable ACE editor
	if ($('#sunrise-field-custom-css-editor').length > 0) {
		var editor = ace.edit('sunrise-field-custom-css-editor'),
			$textarea = $('#sunrise-field-custom-css').hide();
		editor.getSession().setValue($textarea.val());
		editor.getSession().on('change', function() {
			$textarea.val(editor.getSession().getValue());
		});
		editor.getSession().setMode('ace/mode/css');
		editor.setTheme('ace/theme/monokai');
		editor.getSession().setUseWrapMode(true);
		editor.getSession().setWrapLimitRange(null, null);
		editor.renderer.setShowPrintMargin(null);
		editor.session.setUseSoftTabs(null);
	}
	// ########## Add-ons screen ##########
	var addons_timer = 0;
	$('.ts-addons-item').each(function() {
		var $item = $(this),
			delay = 300;
		$item.click(function(e) {
			window.open($(this).data('url'));
			e.preventDefault();
		});
		addons_timer = addons_timer + delay;
		window.setTimeout(function() {
			$item.addClass('animated bounceIn').css('visibility', 'visible');
		}, addons_timer);
	});
	// ########## Examples screen ##########
	// Disable all buttons
	$('#ts-examples-preview').on('click', '.ts-button', function(e) {
		if ($(this).hasClass('ts-example-button-clicked')) alert(ts_options_page.not_clickable);
		else $(this).addClass('ts-example-button-clicked');
		e.preventDefault();
	});
	var open = $('#ts_open_example').val(),
		nonce = $('#ts_examples_nonce').val(),
		$example_window = $('#ts-examples-window'),
		$example_preview = $('#ts-examples-preview');
	$('.ts-examples-group-title, .ts-examples-item').each(function() {
		var $item = $(this),
			delay = 200;
		if ($item.hasClass('ts-examples-item')) {
			$item.on('click', function(e) {
				var code = $(this).data('code'),
					id = $(this).data('id');
				$item.magnificPopup({
					type: 'inline',
					alignTop: true,
					callbacks: {
						open: function() {
							// Change z-index
							$('body').addClass('ts-mfp-shown');
						},
						close: function() {
							// Change z-index
							$('body').removeClass('ts-mfp-shown');
							$example_preview.html('');
						}
					}
				});
				var ts_example_preview = $.ajax({
					url: ajaxurl,
					type: 'get',
					dataType: 'html',
					data: {
						action: 'ts_example_preview',
						code: code,
						id: id,
						nonce: nonce
					},
					beforeSend: function() {
						if (typeof ts_example_preview === 'object') ts_example_preview.abort();
						$example_window.addClass('ts-ajax');
						$item.magnificPopup('open');
					},
					success: function(data) {
						$example_preview.html(data);
						$example_window.removeClass('ts-ajax');
					}
				});
				e.preventDefault();
			});
			// Open preselected example
			if ($item.data('id') === open) $item.trigger('click');
		}
	});
	$('#ts-examples-window').on('click', '.ts-examples-get-code', function(e) {
		$(this).hide();
		$(this).parent('.ts-examples-code').children('textarea').slideDown(300);
		e.preventDefault();
	});
	// ########## Cheatsheet screen ##########
	$('.ts-cheatsheet-switch').on('click', function(e) {
		$('body').toggleClass('ts-print-cheatsheet');
		e.preventDefault();
	});
});