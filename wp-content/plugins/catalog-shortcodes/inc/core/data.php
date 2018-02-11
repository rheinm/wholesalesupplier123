<?php
/**
 * Class for managing plugin data
 */
class Ts_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'ts/data/groups', array(
				'all'     => __( 'All', 'catalog' ),
				'content' => __( 'Content', 'catalog' ),
				'box'     => __( 'Box', 'catalog' ),
				'media'   => __( 'Media', 'catalog' ),
				'gallery' => __( 'Gallery', 'catalog' ),
				'data'    => __( 'Data', 'catalog' ),
				'catalog'    => __( 'Catalog', 'catalog' ),
				'other'   => __( 'Other', 'catalog' )
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'ts/data/borders', array(
				'none'   => __( 'None', 'catalog' ),
				'solid'  => __( 'Solid', 'catalog' ),
				'dotted' => __( 'Dotted', 'catalog' ),
				'dashed' => __( 'Dashed', 'catalog' ),
				'double' => __( 'Double', 'catalog' ),
				'groove' => __( 'Groove', 'catalog' ),
				'ridge'  => __( 'Ridge', 'catalog' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'ts/data/icons', array( 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'ambulance', 'anchor', 'android', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asterisk', 'automobile', 'backward', 'ban', 'bank', 'bar-chart-o', 'barcode', 'bars', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bitbucket', 'bitbucket-square', 'bitcoin', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'cab', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'comments', 'comments-o', 'compass', 'compress', 'copy', 'credit-card', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'database', 'dedent', 'delicious', 'desktop', 'deviantart', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'dropbox', 'drupal', 'edit', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'facebook', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'forward', 'foursquare', 'frown-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'glass', 'globe', 'google', 'google-plus', 'google-plus-square', 'graduation-cap', 'group', 'h-square', 'hacker-news', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'history', 'home', 'hospital-o', 'html5', 'image', 'inbox', 'indent', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'leaf', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-ring', 'life-saver', 'lightbulb-o', 'link', 'linkedin', 'linkedin-square', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map-marker', 'maxcdn', 'medkit', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'mobile-phone', 'money', 'moon-o', 'mortar-board', 'music', 'navicon', 'openid', 'outdent', 'pagelines', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'phone', 'phone-square', 'photo', 'picture-o', 'pied-piper', 'pied-piper-alt', 'pied-piper-square', 'pinterest', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'ra', 'random', 'rebel', 'recycle', 'reddit', 'reddit-square', 'refresh', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 'save', 'scissors', 'search', 'search-minus', 'search-plus', 'send', 'send-o', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'sitemap', 'skype', 'slack', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'stop', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'suitcase', 'sun-o', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-right', 'toggle-up', 'trash-o', 'tree', 'trello', 'trophy', 'truck', 'try', 'tumblr', 'tumblr-square', 'turkish-lira', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usd', 'user', 'user-md', 'users', 'video-camera', 'vimeo-square', 'vine', 'vk', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'wheelchair', 'windows', 'won', 'wordpress', 'wrench', 'xing', 'xing-square', 'yahoo', 'yen', 'youtube', 'youtube-play', 'youtube-square', 'line-chart' ) );
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return apply_filters( 'ts/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Examples section
	 */
	public static function examples() {
		return apply_filters( 'ts/data/examples', array(
				'basic' => array(
					'title' => __( 'Basic examples', 'catalog' ),
					'items' => array(
						array(
							'name' => __( 'Accordions, spoilers, different styles, anchors', 'catalog' ),
							'id'   => 'spoilers',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/spoilers.example',
							'icon' => 'tasks'
						),
						array(
							'name' => __( 'Tabs, vertical tabs, tab anchors', 'catalog' ),
							'id'   => 'tabs',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/tabs.example',
							'icon' => 'folder'
						),
						array(
							'name' => __( 'Column layouts', 'catalog' ),
							'id'   => 'columns',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/columns.example',
							'icon' => 'th-large'
						),
						array(
							'name' => __( 'Media elements, YouTube, Vimeo, Screenr and self-hosted videos, audio player', 'catalog' ),
							'id'   => 'media',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/media.example',
							'icon' => 'play-circle'
						),
						array(
							'name' => __( 'Unlimited buttons', 'catalog' ),
							'id'   => 'buttons',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/buttons.example',
							'icon' => 'heart'
						),
						array(
							'name' => __( 'Animations', 'catalog' ),
							'id'   => 'animations',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/animations.example',
							'icon' => 'bolt'
						),
					)
				),
				'advanced' => array(
					'title' => __( 'Advanced examples', 'catalog' ),
					'items' => array(
						array(
							'name' => __( 'Interacting with posts shortcode', 'catalog' ),
							'id' => 'posts',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/posts.example',
							'icon' => 'list'
						),
						array(
							'name' => __( 'Nested shortcodes, shortcodes inside of attributes', 'catalog' ),
							'id' => 'nested',
							'code' => plugin_dir_path( TS_PLUGIN_FILE ) . '/inc/examples/nested.example',
							'icon' => 'indent'
						),
					)
				),
			) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		$shortcodes = apply_filters( 'ts/data/shortcodes', array(
				// heading
				'heading' => array(
					'name' => __( 'Heading', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'style_2' => __( 'Style 2', 'catalog' ),
							),
							'default' => 'style_2',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Choose style for this heading', 'catalog' ) . '%ts_skins_link%'
						),
						'tag' => array(
							'type' => 'select',
							'values' => array(
								'h1' => __( 'H1', 'catalog' ),
								'h2' => __( 'H2', 'catalog' ),
								'h3' => __( 'H3', 'catalog' ),
								'h4' => __( 'H4', 'catalog' ),
								'h5' => __( 'H5', 'catalog' ),
								'h6' => __( 'H6', 'catalog' ),
							),
							'default' => 'h2',
							'name' => __( 'Select Tag', 'catalog' ),
							'desc' => __( 'Choose heading tag for this heading', 'catalog' ) 
						),
						'size' => array(
							'type' => 'slider',
							'min' => 7,
							'max' => 90,
							'step' => 1,
							'default' => 48,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Select heading size (pixels)', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'catalog' ),
							'desc' => __( 'Select heading color', 'catalog' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'catalog' ),
								'center' => __( 'Center', 'catalog' ),
								'right' => __( 'Right', 'catalog' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'catalog' ),
							'desc' => __( 'Heading text alignment', 'catalog' )
						),
						'margin_top' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 20,
							'name' => __( 'Margin Top', 'catalog' ),
							'desc' => __( 'Top margin (pixels)', 'catalog' )
						),
						'margin_bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 20,
							'name' => __( 'Margin Bottom', 'catalog' ),
							'desc' => __( 'Bottom margin (pixels)', 'catalog' )
						),
						'text_transform' => array(
							'type' => 'select',
							'values' => array(
								'uppercase' => __( 'Uppercase', 'catalog' ),
								'lowercase' => __( 'Lowercase', 'catalog' ),
								'capitalize' => __( 'Capitalize', 'catalog' ),
							),
							'default' => 'uppercase',
							'name' => __( 'Text Tranform', 'catalog' ),
							'desc' => __( 'Choose a text transform style', 'catalog' )
						),
						'letter_spacing' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 28,
							'name' => __( 'Letter Spacing', 'catalog' ),
							'desc' => __( 'Letter Spacing (pixels)', 'catalog' )
						),
						'text_typed' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Typed Text', 'catalog' ),
							'desc' => __( 'Is text typed or not', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Heading text', 'catalog' ),
					'desc' => __( 'Styled heading', 'catalog' ),
					'icon' => 'h-square'
				),
				// tabs
				'tabs' => array(
					'name' => __( 'Tabs', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'style_2' => __( 'Style 2', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Choose style for this tabs', 'catalog' ) . '%ts_skins_link%'
						),
						'active' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Active tab', 'catalog' ),
							'desc' => __( 'Select which tab is open by default', 'catalog' )
						),
						'vertical' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Vertical', 'catalog' ),
							'desc' => __( 'Show tabs vertically', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( "[%prefix_tab title=\"Title 1\"]Content 1[/%prefix_tab]\n[%prefix_tab title=\"Title 2\"]Content 2[/%prefix_tab]\n[%prefix_tab title=\"Title 3\"]Content 3[/%prefix_tab]", 'catalog' ),
					'desc' => __( 'Tabs container', 'catalog' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// tab
				'tab' => array(
					'name' => __( 'Tab', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'catalog' ),
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Enter tab name', 'catalog' )
						),
						'disabled' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Disabled', 'catalog' ),
							'desc' => __( 'Is this tab disabled', 'catalog' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'catalog' ),
							'desc' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'catalog' )
						),
						'url' => array(
							'default' => '',
							'name' => __( 'URL', 'catalog' ),
							'desc' => __( 'You can link this tab to any webpage. Enter here full URL to switch this tab into link', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self'  => __( 'Open link in same window/tab', 'catalog' ),
								'blank' => __( 'Open link in new window/tab', 'catalog' )
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'catalog' ),
							'desc' => __( 'Choose how to open the custom tab link', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Tab content', 'catalog' ),
					'desc' => __( 'Single tab', 'catalog' ),
					'note' => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'catalog' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// spoiler
				'spoiler' => array(
					'name' => __( 'Spoiler', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Spoiler title', 'catalog' ),
							'name' => __( 'Title', 'catalog' ), 'desc' => __( 'Text in spoiler title', 'catalog' )
						),
						'open' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Open', 'catalog' ),
							'desc' => __( 'Is spoiler content visible by default', 'catalog' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'fancy' => __( 'Fancy', 'catalog' ),
								'simple' => __( 'Simple', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Choose style for this spoiler', 'catalog' ) . '%ts_skins_link%'
						),
						'icon' => array(
							'type' => 'select',
							'values' => array(
								'plus'           => __( 'Plus', 'catalog' ),
								'plus-circle'    => __( 'Plus circle', 'catalog' ),
								'plus-square-1'  => __( 'Plus square 1', 'catalog' ),
								'plus-square-2'  => __( 'Plus square 2', 'catalog' ),
								'arrow'          => __( 'Arrow', 'catalog' ),
								'arrow-circle-1' => __( 'Arrow circle 1', 'catalog' ),
								'arrow-circle-2' => __( 'Arrow circle 2', 'catalog' ),
								'chevron'        => __( 'Chevron', 'catalog' ),
								'chevron-circle' => __( 'Chevron circle', 'catalog' ),
								'caret'          => __( 'Caret', 'catalog' ),
								'caret-square'   => __( 'Caret square', 'catalog' ),
								'folder-1'       => __( 'Folder 1', 'catalog' ),
								'folder-2'       => __( 'Folder 2', 'catalog' )
							),
							'default' => 'plus',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( 'Icons for spoiler', 'catalog' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'catalog' ),
							'desc' => __( 'You can use unique anchor for this spoiler to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This spoiler will be open and scrolled in', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Hidden content', 'catalog' ),
					'desc' => __( 'Spoiler with hidden content', 'catalog' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'catalog' ),
					'example' => 'spoilers',
					'icon' => 'list-ul'
				),
				// accordion
				'accordion' => array(
					'name' => __( 'Accordion', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( "[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]", 'catalog' ),
					'desc' => __( 'Accordion with spoilers', 'catalog' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'catalog' ),
					'example' => 'spoilers',
					'icon' => 'list'
				),
				// divider
				'divider' => array(
					'name' => __( 'Divider', 'catalog' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'top' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show TOP link', 'catalog' ),
							'desc' => __( 'Show link to top of the page or not', 'catalog' )
						),
						'text' => array(
							'values' => array( ),
							'default' => __( 'Go to top', 'catalog' ),
							'name' => __( 'Link text', 'catalog' ), 'desc' => __( 'Text for the GO TOP link', 'catalog' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'dotted'  => __( 'Dotted', 'catalog' ),
								'dashed'  => __( 'Dashed', 'catalog' ),
								'double'  => __( 'Double', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Choose style for this divider', 'catalog' )
						),
						'divider_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Divider color', 'catalog' ),
							'desc' => __( 'Pick the color for divider', 'catalog' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Link color', 'catalog' ),
							'desc' => __( 'Pick the color for TOP link', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Height of the divider (in pixels)', 'catalog' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 15,
							'name' => __( 'Margin', 'catalog' ),
							'desc' => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Content divider with optional TOP link', 'catalog' ),
					'icon' => 'ellipsis-h'
				),
				// spacer
				'spacer' => array(
					'name' => __( 'Spacer', 'catalog' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 800,
							'step' => 10,
							'default' => 20,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Height of the spacer in pixels', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Empty space with adjustable height', 'catalog' ),
					'icon' => 'arrows-v'
				),
				// highlight
				'highlight' => array(
					'name' => __( 'Highlight', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#DDFF99',
							'name' => __( 'Background', 'catalog' ),
							'desc' => __( 'Highlighted text background color', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Text color', 'catalog' ), 'desc' => __( 'Highlighted text color', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Highlighted text', 'catalog' ),
					'desc' => __( 'Highlighted text', 'catalog' ),
					'icon' => 'pencil'
				),
				// color_overlay
				'color_overlay' => array(
					'name' => __( 'Background Overlay', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Background', 'catalog' ),
							'desc' => __( 'Overlay background color', 'catalog' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0.5,
							'name' => __( 'Opacity', 'catalog' ),
							'desc' => __( 'Choose opacity', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( '', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'pencil'
				),
				
				// angle_background_shape
				'angle_background_shape' => array(
					'name' => __( 'Angle bg Shape', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#fcc71f',
							'name' => __( 'Background', 'catalog' ),
							'desc' => __( 'Angle background color', 'catalog' )
						),
						'position' => array(
							'type' => 'select',
							'values' => array(
								'left_top' => __( 'Left Top', 'catalog' ),
								'left_bottom' => __( 'Left Bottom', 'catalog' ),
								'right_top' => __( 'Right Top', 'catalog' ),
								'right_bottom' => __( 'Right Bottom', 'catalog' ),
							),
							'default' => 'left_top',
							'name' => __( 'Position', 'catalog' ),
							'desc' => __( 'Position of angle background', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 110,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Choose height', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 220,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Choose width', 'catalog' )
						),
					),
					'content' => __( '', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'pencil'
				),
				// background_video
				'background_video' => array(
					'name' => __( 'Background Video', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'videoid' => array(
							'default' => 'TwIEOkZ-e7I',
							'name' => __( 'Video Id', 'catalog' ),
							'desc' => __( 'Youtube video id', 'catalog' )
						),
						'video_title' => array(
							'default' => 'Video Background Section',
							'name' => __( 'Video Title', 'catalog' ),
							'desc' => __( 'Video title', 'catalog' )
						),
						'video_des' => array(
							'default' => '',
							'name' => __( 'Video Description', 'catalog' ),
							'desc' => __( 'Description of video', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#f3b723',
							'name' => __( 'Background', 'catalog' ),
							'desc' => __( 'Overlay background color', 'catalog' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0.8,
							'name' => __( 'Opacity', 'catalog' ),
							'desc' => __( 'Choose opacity', 'catalog' )
						),
						'playvideo' => array(
							'default' => 'PLAY / STOP',
							'name' => __( 'Play Text', 'catalog' ),
							'desc' => __( 'play or stop video button text', 'catalog' )
						),
						'opensound' => array(
							'default' => 'SOUND / MUTE',
							'name' => __( 'Sound Text', 'catalog' ),
							'desc' => __( 'On or off sound button text', 'catalog' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Image', 'catalog' ),
							'desc' => __( 'Upload Image', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( '', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'pencil'
				),
				// label
				'label' => array(
					'name' => __( 'Label', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'success' => __( 'Success', 'catalog' ),
								'warning' => __( 'Warning', 'catalog' ),
								'important' => __( 'Important', 'catalog' ),
								'black' => __( 'Black', 'catalog' ),
								'info' => __( 'Info', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Type', 'catalog' ),
							'desc' => __( 'Style of the label', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Label', 'catalog' ),
					'desc' => __( 'Styled label', 'catalog' ),
					'icon' => 'tag'
				),
				// quote
				'quote' => array(
					'name' => __( 'Quote', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Choose style for this quote', 'catalog' ) . '%ts_skins_link%'
						),
						'cite' => array(
							'default' => '',
							'name' => __( 'Cite', 'catalog' ),
							'desc' => __( 'Quote author name', 'catalog' )
						),
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Cite url', 'catalog' ),
							'desc' => __( 'Url of the quote author. Leave empty to disable link', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Quote', 'catalog' ),
					'desc' => __( 'Blockquote alternative', 'catalog' ),
					'icon' => 'quote-right'
				),
				// pullquote
				'pullquote' => array(
					'name' => __( 'Pullquote', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'catalog' ),
								'right' => __( 'Right', 'catalog' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'catalog' ), 'desc' => __( 'Pullquote alignment (float)', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Pullquote', 'catalog' ),
					'desc' => __( 'Pullquote', 'catalog' ),
					'icon' => 'quote-left'
				),
				// dropcap
				'dropcap' => array(
					'name' => __( 'Dropcap', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'flat' => __( 'Flat', 'catalog' ),
								'light' => __( 'Light', 'catalog' ),
								'simple' => __( 'Simple', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ), 'desc' => __( 'Dropcap style preset', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 5,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Choose dropcap size', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'D', 'catalog' ),
					'desc' => __( 'Dropcap', 'catalog' ),
					'icon' => 'bold'
				),
				// frame
				'frame' => array(
					'name' => __( 'Frame', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'catalog' ),
								'center' => __( 'Center', 'catalog' ),
								'right' => __( 'Right', 'catalog' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'catalog' ),
							'desc' => __( 'Frame alignment', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => '<img src="http://lorempixel.com/g/400/200/" />',
					'desc' => __( 'Styled image frame', 'catalog' ),
					'icon' => 'picture-o'
				),
				// row
				'row' => array(
					'name' => __( 'Row', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( "[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]", 'catalog' ),
					'desc' => __( 'Row for flexible columns', 'catalog' ),
					'icon' => 'columns'
				),
				// column
				'column' => array(
					'name' => __( 'Column', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'size' => array(
							'type' => 'select',
							'values' => array(
								'1/1' => __( 'Full width', 'catalog' ),
								'1/2' => __( 'One half', 'catalog' ),
								'1/3' => __( 'One third', 'catalog' ),
								'2/3' => __( 'Two third', 'catalog' ),
								'1/4' => __( 'One fourth', 'catalog' ),
								'3/4' => __( 'Three fourth', 'catalog' ),
								'1/5' => __( 'One fifth', 'catalog' ),
								'2/5' => __( 'Two fifth', 'catalog' ),
								'3/5' => __( 'Three fifth', 'catalog' ),
								'4/5' => __( 'Four fifth', 'catalog' ),
								'1/6' => __( 'One sixth', 'catalog' ),
								'5/6' => __( 'Five sixth', 'catalog' )
							),
							'default' => '1/2',
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Select column width. This width will be calculated depend page width', 'catalog' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'catalog' ),
							'desc' => __( 'Is this column centered on the page', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Column content', 'catalog' ),
					'desc' => __( 'Flexible and responsive columns', 'catalog' ),
					'note' => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'catalog' ),
					'example' => 'columns',
					'icon' => 'columns'
				),
				// list
				'list' => array(
					'name' => __( 'List', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'catalog' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( "<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>", 'catalog' ),
					'desc' => __( 'Styled unordered list', 'catalog' ),
					'icon' => 'list-ol'
				),
				// button
				'button' => array(
					'name' => __( 'Button', 'catalog' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => get_option( 'home' ),
							'name' => __( 'Link', 'catalog' ),
							'desc' => __( 'Button link', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'catalog' ),
								'blank' => __( 'New tab', 'catalog' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'catalog' ),
							'desc' => __( 'Button link target', 'catalog' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'standard' => __( 'Standard', 'catalog' ),
								'flat' => __( 'Flat', 'catalog' ),
								'ghost' => __( 'Ghost', 'catalog' ),
								'soft' => __( 'Soft', 'catalog' ),
								'glass' => __( 'Glass', 'catalog' ),
								'bubbles' => __( 'Bubbles', 'catalog' ),
								'noise' => __( 'Noise', 'catalog' ),
								'stroked' => __( 'Stroked', 'catalog' ),
								'3d' => __( '3D', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ), 
							'desc' => __( 'Button background style preset', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Background', 'catalog' ), 
							'desc' => __( 'Button background color', 'catalog' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0,
							'name' => __( 'Opacity', 'catalog' ),
							'desc' => __( 'Background Opacity', 'catalog' )
						),
						'background_hover' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#f3b723',
							'name' => __( 'Background Hover', 'catalog' ), 
							'desc' => __( 'Button background hover color', 'catalog' )
						),
						'border' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#121212',
							'name' => __( 'Border Color', 'catalog' ), 
							'desc' => __( 'Border color', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#121212',
							'name' => __( 'Text color', 'catalog' ),
							'desc' => __( 'Button text color', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Button size', 'catalog' )
						),
						'wide' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Fluid', 'catalog' ), 
							'desc' => __( 'Fluid buttons has 100% width', 'catalog' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'catalog' ), 
							'desc' => __( 'Is button centered on the page', 'catalog' )
						),
						'radius' => array(
							'type' => 'select',
							'values' => array(
								'auto' => __( 'Auto', 'catalog' ),
								'round' => __( 'Round', 'catalog' ),
								'0' => __( 'Square', 'catalog' ),
								'5' => '5px',
								'10' => '10px',
								'20' => '20px'
							),
							'default' => 'auto',
							'name' => __( 'Radius', 'catalog' ),
							'desc' => __( 'Radius of button corners. Auto-radius calculation based on button size', 'catalog' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Icon color', 'catalog' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'catalog' )
						),
						'text_shadow' => array(
							'type' => 'shadow',
							'default' => 'none',
							'name' => __( 'Text shadow', 'catalog' ),
							'desc' => __( 'Button text shadow', 'catalog' )
						),
						'desc' => array(
							'default' => '',
							'name' => __( 'Description', 'catalog' ),
							'desc' => __( 'Small description under button text. This option is incompatible with icon.', 'catalog' )
						),
						'onclick' => array(
							'default' => '',
							'name' => __( 'onClick', 'catalog' ),
							'desc' => __( 'Advanced JavaScript code for onClick action', 'catalog' )
						),
						'rel' => array(
							'default' => '',
							'name' => __( 'Rel attribute', 'catalog' ),
							'desc' => __( 'Here you can add value for the rel attribute.<br>Example values: <b%value>nofollow</b>, <b%value>lightbox</b>', 'catalog' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title attribute', 'catalog' ),
							'desc' => __( 'Here you can add value for the title attribute', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Button text', 'catalog' ),
					'desc' => __( 'Styled button', 'catalog' ),
					'example' => 'buttons',
					'icon' => 'heart'
				),
				
				//services
			    'services' => 
				array(
					'name' => __( 'Services', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'style_2' => __( 'Services With Carousel', 'catalog' ),
								'style_3' => __( 'Services With Tooltip', 'catalog' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Box style preset', 'catalog' )
						),					
						),
					'content' => __( 'Single service shortcode goes here', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'check-square-o'
				),
				// service
				'service' => array(
					'name' => __( 'Service', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'style_2' => __( 'Style 2', 'catalog' ),
								'style_3' => __( 'Style 3', 'catalog' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Style of service', 'catalog' )
						),
						'title' => array(
							'values' => array( ),
							'default' => __( 'Service title', 'catalog' ),
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Service name', 'catalog' )
						),
						'small_text' => array(
							'values' => array( ),
							'default' => __( '', 'catalog' ),
							'name' => __( 'Small Text', 'catalog' ),
							'desc' => __( 'Only for style 2', 'catalog' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'catalog' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'catalog' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'catalog' )
						),
						'tooltip_content' => array(
							'values' => array( ),
							'default' => __( '', 'catalog' ),
							'name' => __( 'Tooltip Content', 'catalog' ),
							'desc' => __( 'Only applyed for style 3. ', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Service description', 'catalog' ),
					'desc' => __( 'Service box with title', 'catalog' ),
					'icon' => 'check-square-o'
				),
				
				// box
				'box' => array(
					'name' => __( 'Box', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Box title', 'catalog' ),
							'name' => __( 'Title', 'catalog' ), 'desc' => __( 'Text for the box title', 'catalog' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'soft' => __( 'Soft', 'catalog' ),
								'glass' => __( 'Glass', 'catalog' ),
								'bubbles' => __( 'Bubbles', 'catalog' ),
								'noise' => __( 'Noise', 'catalog' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Box style preset', 'catalog' )
						),
						'box_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Color', 'catalog' ),
							'desc' => __( 'Color for the box title and borders', 'catalog' )
						),
						'title_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Title text color', 'catalog' ), 'desc' => __( 'Color for the box title text', 'catalog' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'catalog' ),
							'desc' => __( 'Box corners radius', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Box content', 'catalog' ),
					'desc' => __( 'Colored box with caption', 'catalog' ),
					'icon' => 'list-alt'
				),
				// note
				'note' => array(
					'name' => __( 'Note', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'note_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFF66',
							'name' => __( 'Background', 'catalog' ), 'desc' => __( 'Note background color', 'catalog' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'catalog' ),
							'desc' => __( 'Note text color', 'catalog' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'catalog' ), 'desc' => __( 'Note corners radius', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Note text', 'catalog' ),
					'desc' => __( 'Colored box', 'catalog' ),
					'icon' => 'list-alt'
				),
				// expand
				'expand' => array(
					'name' => __( 'Expand', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'more_text' => array(
							'default' => __( 'Show more', 'catalog' ),
							'name' => __( 'More text', 'catalog' ),
							'desc' => __( 'Enter the text for more link', 'catalog' )
						),
						'less_text' => array(
							'default' => __( 'Show less', 'catalog' ),
							'name' => __( 'Less text', 'catalog' ),
							'desc' => __( 'Enter the text for less link', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 100,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Height for collapsed state (in pixels)', 'catalog' )
						),
						'hide_less' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Hide less link', 'catalog' ),
							'desc' => __( 'This option allows you to hide less link, when the text block has been expanded', 'catalog' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'catalog' ),
							'desc' => __( 'Pick the text color', 'catalog' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#0088FF',
							'name' => __( 'Link color', 'catalog' ),
							'desc' => __( 'Pick the link color', 'catalog' )
						),
						'link_style' => array(
							'type' => 'select',
							'values' => array(
								'default'    => __( 'Default', 'catalog' ),
								'underlined' => __( 'Underlined', 'catalog' ),
								'dotted'     => __( 'Dotted', 'catalog' ),
								'dashed'     => __( 'Dashed', 'catalog' ),
								'button'     => __( 'Button', 'catalog' ),
							),
							'default' => 'default',
							'name' => __( 'Link style', 'catalog' ),
							'desc' => __( 'Select the style for more/less link', 'catalog' )
						),
						'link_align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'catalog' ),
								'center' => __( 'Center', 'catalog' ),
								'right' => __( 'Right', 'catalog' ),
							),
							'default' => 'left',
							'name' => __( 'Link align', 'catalog' ),
							'desc' => __( 'Select link alignment', 'catalog' )
						),
						'more_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'More icon', 'catalog' ),
							'desc' => __( 'Add an icon to the more link', 'catalog' )
						),
						'less_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Less icon', 'catalog' ),
							'desc' => __( 'Add an icon to the less link', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'This text block can be expanded', 'catalog' ),
					'desc' => __( 'Expandable text block', 'catalog' ),
					'icon' => 'sort-amount-asc'
				),
				// lightbox
				'lightbox' => array(
					'name' => __( 'Lightbox', 'catalog' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'iframe' => __( 'Iframe', 'catalog' ),
								'image' => __( 'Image', 'catalog' ),
								'inline' => __( 'Inline (html content)', 'catalog' )
							),
							'default' => 'iframe',
							'name' => __( 'Content type', 'catalog' ),
							'desc' => __( 'Select type of the lightbox window content', 'catalog' )
						),
						'src' => array(
							'default' => '',
							'name' => __( 'Content source', 'catalog' ),
							'desc' => __( 'Insert here URL or CSS selector. Use URL for Iframe and Image content types. Use CSS selector for Inline content type.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( '[%prefix_button] Click Here to Watch the Video [/%prefix_button]', 'catalog' ),
					'desc' => __( 'Lightbox window with custom content', 'catalog' ),
					'icon' => 'external-link'
				),
				// lightbox content
				'lightbox_content' => array(
					'name' => __( 'Lightbox content', 'catalog' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'catalog' ),
							'desc' => sprintf( __( 'Enter here the ID from Content source field. %s Example value: %s', 'catalog' ), '<br>', '<b%value>my-custom-popup</b>' )
						),
						'width' => array(
							'default' => '50%',
							'name' => __( 'Width', 'catalog' ),
							'desc' => sprintf( __( 'Adjust the width for inline content (in pixels or percents). %s Example values: %s, %s, %s', 'catalog' ), '<br>', '<b%value>300px</b>', '<b%value>600px</b>', '<b%value>90%</b>' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Margin', 'catalog' ),
							'desc' => __( 'Adjust the margin for inline content (in pixels)', 'catalog' )
						),
						'padding' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Padding', 'catalog' ),
							'desc' => __( 'Adjust the padding for inline content (in pixels)', 'catalog' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'center' => __( 'Center', 'catalog' ),
								'left' => __( 'Left', 'catalog' ),
								'right' => __( 'Right', 'catalog' ),
								'justify' => __( 'Justify', 'catalog' ),
							),
							'default' => 'center',
							'name' => __( 'Text Align', 'catalog' ),
							'desc' => __( 'Choose text align', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFFFFF',
							'name' => __( 'Background color', 'catalog' ),
							'desc' => __( 'Pick a background color', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'catalog' ),
							'desc' => __( 'Pick a text color', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'catalog' ),
							'desc' => __( 'Pick a text color', 'catalog' )
						),
						'shadow' => array(
							'type' => 'shadow',
							'default' => '0px 0px 15px #333333',
							'name' => __( 'Shadow', 'catalog' ),
							'desc' => __( 'Adjust the shadow for content box', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Inline content', 'catalog' ),
					'desc' => __( 'Inline content for lightbox', 'catalog' ),
					'icon' => 'external-link'
				),
				// tooltip
				'tooltip' => array(
					'name' => __( 'Tooltip', 'catalog' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'light' => __( 'Basic: Light', 'catalog' ),
								'dark' => __( 'Basic: Dark', 'catalog' ),
								'yellow' => __( 'Basic: Yellow', 'catalog' ),
								'green' => __( 'Basic: Green', 'catalog' ),
								'red' => __( 'Basic: Red', 'catalog' ),
								'blue' => __( 'Basic: Blue', 'catalog' ),
								'youtube' => __( 'Youtube', 'catalog' ),
								'tipsy' => __( 'Tipsy', 'catalog' ),
								'bootstrap' => __( 'Bootstrap', 'catalog' ),
								'jtools' => __( 'jTools', 'catalog' ),
								'tipped' => __( 'Tipped', 'catalog' ),
								'cluetip' => __( 'Cluetip', 'catalog' ),
							),
							'default' => 'yellow',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Tooltip window style', 'catalog' )
						),
						'position' => array(
							'type' => 'select',
							'values' => array(
								'north' => __( 'Top', 'catalog' ),
								'south' => __( 'Bottom', 'catalog' ),
								'west' => __( 'Left', 'catalog' ),
								'east' => __( 'Right', 'catalog' )
							),
							'default' => 'top',
							'name' => __( 'Position', 'catalog' ),
							'desc' => __( 'Tooltip position', 'catalog' )
						),
						'shadow' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Shadow', 'catalog' ),
							'desc' => __( 'Add shadow to tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'catalog' )
						),
						'rounded' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Rounded corners', 'catalog' ),
							'desc' => __( 'Use rounded for tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'catalog' )
						),
						'size' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'1' => 1,
								'2' => 2,
								'3' => 3,
								'4' => 4,
								'5' => 5,
								'6' => 6,
							),
							'default' => 'default',
							'name' => __( 'Font size', 'catalog' ),
							'desc' => __( 'Tooltip font size', 'catalog' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Tooltip title', 'catalog' ),
							'desc' => __( 'Enter title for tooltip window. Leave this field empty to hide the title', 'catalog' )
						),
						'content' => array(
							'default' => __( 'Tooltip text', 'catalog' ),
							'name' => __( 'Tooltip content', 'catalog' ),
							'desc' => __( 'Enter tooltip content here', 'catalog' )
						),
						'behavior' => array(
							'type' => 'select',
							'values' => array(
								'hover' => __( 'Show and hide on mouse hover', 'catalog' ),
								'click' => __( 'Show and hide by mouse click', 'catalog' ),
								'always' => __( 'Always visible', 'catalog' )
							),
							'default' => 'hover',
							'name' => __( 'Behavior', 'catalog' ),
							'desc' => __( 'Select tooltip behavior', 'catalog' )
						),
						'close' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Close button', 'catalog' ),
							'desc' => __( 'Show close button', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( '[%prefix_button] Hover me to open tooltip [/%prefix_button]', 'catalog' ),
					'desc' => __( 'Tooltip window with custom content', 'catalog' ),
					'icon' => 'comment-o'
				),
				// private
				'private' => array(
					'name' => __( 'Private', 'catalog' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Private note text', 'catalog' ),
					'desc' => __( 'Private note for post authors', 'catalog' ),
					'icon' => 'lock'
				),
				// youtube
				'youtube' => array(
					'name' => __( 'YouTube', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'catalog' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Player height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Play video automatically when page is loaded', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'YouTube video', 'catalog' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// youtube_advanced
				'youtube_advanced' => array(
					'name' => __( 'YouTube Advanced', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'catalog' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'catalog' )
						),
						'playlist' => array(
							'default' => '',
							'name' => __( 'Playlist', 'catalog' ),
							'desc' => __( 'Value is a comma-separated list of video IDs to play. If you specify a value, the first video that plays will be the VIDEO_ID specified in the URL path, and the videos specified in the playlist parameter will play thereafter', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Player height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'catalog' )
						),
						'controls' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Hide controls', 'catalog' ),
								'yes' => __( '1 - Show controls', 'catalog' ),
								'alt' => __( '2 - Show controls when playback is started', 'catalog' )
							),
							'default' => 'yes',
							'name' => __( 'Controls', 'catalog' ),
							'desc' => __( 'This parameter indicates whether the video player controls will display', 'catalog' )
						),
						'autohide' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Do not hide controls', 'catalog' ),
								'yes' => __( '1 - Hide all controls on mouse out', 'catalog' ),
								'alt' => __( '2 - Hide progress bar on mouse out', 'catalog' )
							),
							'default' => 'alt',
							'name' => __( 'Autohide', 'catalog' ),
							'desc' => __( 'This parameter indicates whether the video controls will automatically hide after a video begins playing', 'catalog' )
						),
						'showinfo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show title bar', 'catalog' ),
							'desc' => __( 'If you set the parameter value to NO, then the player will not display information like the video title and uploader before the video starts playing.', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Play video automatically when page is loaded', 'catalog' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'catalog' ),
							'desc' => __( 'Setting of YES will cause the player to play the initial video again and again', 'catalog' )
						),
						'rel' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Related videos', 'catalog' ),
							'desc' => __( 'This parameter indicates whether the player should show related videos when playback of the initial video ends', 'catalog' )
						),
						'fs' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show full-screen button', 'catalog' ),
							'desc' => __( 'Setting this parameter to NO prevents the fullscreen button from displaying', 'catalog' )
						),
						'modestbranding' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => 'modestbranding',
							'desc' => __( 'This parameter lets you use a YouTube player that does not show a YouTube logo. Set the parameter value to YES to prevent the YouTube logo from displaying in the control bar. Note that a small YouTube text label will still display in the upper-right corner of a paused video when the user\'s mouse pointer hovers over the player', 'catalog' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'dark' => __( 'Dark theme', 'catalog' ),
								'light' => __( 'Light theme', 'catalog' )
							),
							'default' => 'dark',
							'name' => __( 'Theme', 'catalog' ),
							'desc' => __( 'This parameter indicates whether the embedded player will display player controls (like a play button or volume control) within a dark or light control bar', 'catalog' )
						),
						'https' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Force HTTPS', 'catalog' ),
							'desc' => __( 'Use HTTPS in player iframe', 'catalog' )
						),
						'wmode' => array(
							'default' => '',
							'name'    => __( 'WMode', 'catalog' ),
							'desc'    => sprintf( __( 'Here you can specify wmode value for the embed URL. %s Example values: %s, %s', 'catalog' ), '<br>', '<b%value>transparent</b>', '<b%value>opaque</b>' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'YouTube video player with advanced settings', 'catalog' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// vimeo
				'vimeo' => array(
					'name' => __( 'Vimeo', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'catalog' ), 'desc' => __( 'Url of Vimeo page with video', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Player height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Play video automatically when page is loaded', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Vimeo video', 'catalog' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// screenr
				'screenr' => array(
					'name' => __( 'Screenr', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'catalog' ),
							'desc' => __( 'Url of Screenr page with video', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Player height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Screenr video', 'catalog' ),
					'icon' => 'youtube-play'
				),
				// dailymotion
				'dailymotion' => array(
					'name' => __( 'Dailymotion', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'catalog' ),
							'desc' => __( 'Url of Dailymotion page with video', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Player height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Start the playback of the video automatically after the player load. May not work on some mobile OS versions', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFC300',
							'name' => __( 'Background color', 'catalog' ),
							'desc' => __( 'HTML color of the background of controls elements', 'catalog' )
						),
						'foreground' => array(
							'type' => 'color',
							'default' => '#F7FFFD',
							'name' => __( 'Foreground color', 'catalog' ),
							'desc' => __( 'HTML color of the foreground of controls elements', 'catalog' )
						),
						'highlight' => array(
							'type' => 'color',
							'default' => '#171D1B',
							'name' => __( 'Highlight color', 'catalog' ),
							'desc' => __( 'HTML color of the controls elements\' highlights', 'catalog' )
						),
						'logo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show logo', 'catalog' ),
							'desc' => __( 'Allows to hide or show the Dailymotion logo', 'catalog' )
						),
						'quality' => array(
							'type' => 'select',
							'values' => array(
								'240'  => '240',
								'380'  => '380',
								'480'  => '480',
								'720'  => '720',
								'1080' => '1080'
							),
							'default' => '380',
							'name' => __( 'Quality', 'catalog' ),
							'desc' => __( 'Determines the quality that must be played by default if available', 'catalog' )
						),
						'related' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show related videos', 'catalog' ),
							'desc' => __( 'Show related videos at the end of the video', 'catalog' )
						),
						'info' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show video info', 'catalog' ),
							'desc' => __( 'Show videos info (title/author) on the start screen', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Dailymotion video', 'catalog' ),
					'icon' => 'youtube-play'
				),
				// audio
				'audio' => array(
					'name' => __( 'Audio', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'catalog' ),
							'desc' => __( 'Audio file url. Supported formats: mp3, ogg', 'catalog' )
						),
						'width' => array(
							'values' => array(),
							'default' => '100%',
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width. You can specify width in percents and player will be responsive. Example values: <b%value>200px</b>, <b%value>100&#37;</b>', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Play file automatically when page is loaded', 'catalog' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'catalog' ),
							'desc' => __( 'Repeat when playback is ended', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Custom audio player', 'catalog' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// video
				'video' => array(
					'name' => __( 'Video', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'catalog' ),
							'desc' => __( 'Url to mp4/flv video-file', 'catalog' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'catalog' ),
							'desc' => __( 'Url to poster image, that will be shown before playback', 'catalog' )
						),
						'title' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Player title', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Player width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Player height', 'catalog' )
						),
						'controls' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Controls', 'catalog' ),
							'desc' => __( 'Show player controls (play/pause etc.) or not', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Play file automatically when page is loaded', 'catalog' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'catalog' ),
							'desc' => __( 'Repeat when playback is ended', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Custom video player', 'catalog' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// table
				'table' => array(
					'name' => __( 'Table', 'catalog' ),
					'type' => 'mixed',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'style2' => __( 'Style 2', 'catalog' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Choose style for this table', 'catalog' ) . '%ts_skins_link%'
						),
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'CSV file', 'catalog' ),
							'desc' => __( 'Upload CSV file if you want to create HTML-table from file', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( "<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'catalog' ),
					'desc' => __( 'Styled table from HTML or CSV file', 'catalog' ),
					'icon' => 'table'
				),
				// alert_box
				'alert_box' => array(
					'name' => __( 'Alert Box', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'success' => __( 'Success', 'catalog' ),
								'danger' => __( 'Error', 'catalog' ),
								'warning' => __( 'Warning', 'catalog' ),
								'info' => __( 'Information', 'catalog' ),
							),
							'default' => 'success',
							'name' => __( 'Alert Type', 'catalog' ),
							'desc' => __( 'Choose alert type', 'catalog' ) . '%ts_skins_link%'
						),
						'text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Alert Text', 'catalog' ),
							'desc' => __( 'Write your confirmation text here', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( "", 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'table'
				),
				// permalink
				'permalink' => array(
					'name' => __( 'Permalink', 'catalog' ),
					'type' => 'mixed',
					'group' => 'content other',
					'atts' => array(
						'id' => array(
							'values' => array( ), 'default' => 1,
							'name' => __( 'ID', 'catalog' ),
							'desc' => __( 'Post or page ID', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'catalog' ),
								'blank' => __( 'New tab', 'catalog' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'catalog' ),
							'desc' => __( 'Link target. blank - link will be opened in new window/tab', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => '',
					'desc' => __( 'Permalink to specified post/page', 'catalog' ),
					'icon' => 'link'
				),
				// members
				'members' => array(
					'name' => __( 'Members', 'catalog' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'message' => array(
							'default' => __( 'This content is for registered users only. Please %login%.', 'catalog' ),
							'name' => __( 'Message', 'catalog' ), 'desc' => __( 'Message for not logged users', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffcc00',
							'name' => __( 'Box color', 'catalog' ), 'desc' => __( 'This color will applied only to box for not logged users', 'catalog' )
						),
						'login_text' => array(
							'default' => __( 'login', 'catalog' ),
							'name' => __( 'Login link text', 'catalog' ), 'desc' => __( 'Text for the login link', 'catalog' )
						),
						'login_url' => array(
							'default' => wp_login_url(),
							'name' => __( 'Login link url', 'catalog' ), 'desc' => __( 'Login link url', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Content for logged members', 'catalog' ),
					'desc' => __( 'Content for logged in members only', 'catalog' ),
					'icon' => 'lock'
				),
				// guests
				'guests' => array(
					'name' => __( 'Guests', 'catalog' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Content for guests', 'catalog' ),
					'desc' => __( 'Content for guests only', 'catalog' ),
					'icon' => 'user'
				),
				// feed
				'feed' => array(
					'name' => __( 'RSS Feed', 'catalog' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'catalog' ),
							'desc' => __( 'Url to RSS-feed', 'catalog' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Limit', 'catalog' ), 'desc' => __( 'Number of items to show', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Feed grabber', 'catalog' ),
					'icon' => 'rss'
				),
				// menu
				'menu' => array(
					'name' => __( 'Menu', 'catalog' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Menu name', 'catalog' ), 'desc' => __( 'Custom menu name. Ex: Main menu', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Custom menu by name', 'catalog' ),
					'icon' => 'bars'
				),
				// subpages
				'subpages' => array(
					'name' => __( 'Sub pages', 'catalog' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3, 4, 5 ), 'default' => 1,
							'name' => __( 'Depth', 'catalog' ),
							'desc' => __( 'Max depth level of children pages', 'catalog' )
						),
						'p' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Parent ID', 'catalog' ),
							'desc' => __( 'ID of the parent page. Leave blank to use current page', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'List of sub pages', 'catalog' ),
					'icon' => 'bars'
				),
				// siblings
				'siblings' => array(
					'name' => __( 'Siblings', 'catalog' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3 ), 'default' => 1,
							'name' => __( 'Depth', 'catalog' ),
							'desc' => __( 'Max depth level', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'List of cureent page siblings', 'catalog' ),
					'icon' => 'bars'
				),
				// document
				'document' => array(
					'name' => __( 'Document', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Url', 'catalog' ),
							'desc' => __( 'Url to uploaded document. Supported formats: doc, xls, pdf etc.', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Viewer width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Viewer height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make viewer responsive', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Document viewer by Google', 'catalog' ),
					'icon' => 'file-text'
				),
				// gmap
				'gmap' => array(
					'name' => __( 'Gmap', 'catalog' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Map width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Map height', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make map responsive', 'catalog' )
						),
						'address' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Marker', 'catalog' ),
							'desc' => __( 'Address for the marker. You can type it in any language', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Maps by Google', 'catalog' ),
					'icon' => 'globe'
				),
				
				// bg_map
				'bg_map' => array(
					'name' => __( 'Background Gmap', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => 'How can we help you?',
							'name' => __( 'Title of Map', 'catalog' ),
							'desc' => __('Write your map title', 'catalog'),
						),
						'latitude' => array(
							'values' => '',
							'default' => '-37.801578',
							'name' => __( 'Latitude', 'catalog' ),
							'desc' => __( 'Get Latitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'catalog' )
						),
						'longitude' => array(
							'default' => '145.060508',
							'name' => __( 'Longitude', 'catalog' ),
							'desc' => __( 'Get Longitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'catalog' )
						),
						'marker_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Maker Image', 'catalog' ),
							'desc' => __( 'Upload maker image', 'catalog' )
						),
						'maker_title' => array(
							'type' => 'text',
							'default' => 'Maker Title',
							'name' => __( 'Title of Maker', 'catalog' ),
							'desc' => __('Write your maker title', 'catalog'),
						),
						'maker_description' => array(
							'type' => 'text',
							'default' => 'Maker Description',
							'name' => __( 'Description of Maker', 'catalog' ),
							'desc' => __('Write your maker description', 'catalog'),
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1000,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Height of Map', 'catalog' )
						)
					),
					'desc' => __( 'Maps by Google', 'catalog' ),
					'icon' => 'globe'
				),
				
				// slider
				'slider' => array(
					'name' => __( 'Slider', 'catalog' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'catalog' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'catalog' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'catalog' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'catalog' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'catalog' ),
								'image'      => __( 'Full-size image', 'catalog' ),
								'lightbox'   => __( 'Lightbox', 'catalog' ),
								'custom'     => __( 'Slide link (added in media editor)', 'catalog' ),
								'attachment' => __( 'Attachment page', 'catalog' ),
								'post'       => __( 'Post permalink', 'catalog' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'catalog' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'catalog' ),
								'blank' => __( 'New window', 'catalog' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'catalog' ),
							'desc' => __( 'Open links in', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ), 'desc' => __( 'Slider width (in pixels)', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'catalog' ), 'desc' => __( 'Slider height (in pixels)', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make slider responsive', 'catalog' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'catalog' ), 'desc' => __( 'Display slide titles', 'catalog' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'catalog' ), 'desc' => __( 'Is slider centered on the page', 'catalog' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'catalog' ), 'desc' => __( 'Show left and right arrows', 'catalog' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Pagination', 'catalog' ),
							'desc' => __( 'Show pagination', 'catalog' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'catalog' ),
							'desc' => __( 'Allow to change slides with mouse wheel', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Choose interval between slide animations. Set to 0 to disable autoplay', 'catalog' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'catalog' ), 'desc' => __( 'Specify animation speed', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Customizable image slider', 'catalog' ),
					'icon' => 'picture-o'
				),
				//text_sliders
				'text_sliders' =>
				array(
					'name' => __( 'Text Sliders', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
							),
							'default' => 'default',
							'name' => __( 'Select Style', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
					),
					'desc' => __( 'Single Text Slider Goes Here...', 'catalog' ),
					'icon' => 'edit'
				),
				//text_slider
				'text_slider' =>
				array(
					'name' => __( 'Text Slider', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => 'We are awesomeness',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'sub_title' => array(
							'type' => 'text',
							'default' => 'Responsive Design & Retina Display',
							'name' => __( 'Sub-Title', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
					),
					'desc' => __( 'Button Shortcodes goes here', 'catalog' ),
					'icon' => 'edit'
				),
				
				//slide_shows
				'slide_shows' =>
				array(
					'name' => __( 'Slide Shows', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
							),
							'default' => 'default',
							'name' => __( 'Select Style', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
					),
					'desc' => __( 'Single Slide show Goes Here...', 'catalog' ),
					'icon' => 'edit'
				),
				//slide_show
				'slide_show' =>
				array(
					'name' => __( 'Slide Show', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Image', 'catalog' ),
							'desc' => __( 'Upload Image', 'catalog' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'center' => __( 'Center', 'catalog' ),
								'left' => __( 'Left', 'catalog' ),
								'right' => __( 'Right', 'catalog' ),
								'justify' => __( 'Justify', 'catalog' ),
							),
							'default' => 'center',
							'name' => __( 'Text Align', 'catalog' ),
							'desc' => __( 'Choose text align', 'catalog' )
						),
					),
					'desc' => __( 'Slide Content Shortcodes goes here', 'catalog' ),
					'icon' => 'edit'
				),
				
				// carousel
				'carousel' => array(
					'name' => __( 'Carousel', 'catalog' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'catalog' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'catalog' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'catalog' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'catalog' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'catalog' ),
								'image'      => __( 'Full-size image', 'catalog' ),
								'lightbox'   => __( 'Lightbox', 'catalog' ),
								'custom'     => __( 'Slide link (added in media editor)', 'catalog' ),
								'attachment' => __( 'Attachment page', 'catalog' ),
								'post'       => __( 'Post permalink', 'catalog' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'catalog' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'catalog' ),
								'blank' => __( 'New window', 'catalog' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'catalog' ),
							'desc' => __( 'Open links in', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 100,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Carousel width (in pixels)', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 1600,
							'step' => 20,
							'default' => 100,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Carousel height (in pixels)', 'catalog' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'catalog' ),
							'desc' => __( 'Ignore width and height parameters and make carousel responsive', 'catalog' )
						),
						'items' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Items to show', 'catalog' ),
							'desc' => __( 'How much carousel items is visible', 'catalog' )
						),
						'scroll' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1, 'default' => 1,
							'name' => __( 'Scroll number', 'catalog' ),
							'desc' => __( 'How much items are scrolled in one transition', 'catalog' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'catalog' ), 'desc' => __( 'Display titles for each item', 'catalog' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'catalog' ), 'desc' => __( 'Is carousel centered on the page', 'catalog' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'catalog' ), 'desc' => __( 'Show left and right arrows', 'catalog' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Pagination', 'catalog' ),
							'desc' => __( 'Show pagination', 'catalog' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'catalog' ),
							'desc' => __( 'Allow to rotate carousel with mouse wheel', 'catalog' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'catalog' ),
							'desc' => __( 'Choose interval between auto animations. Set to 0 to disable autoplay', 'catalog' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'catalog' ), 'desc' => __( 'Specify animation speed', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Customizable image carousel', 'catalog' ),
					'icon' => 'picture-o'
				),
				
				//Featured Lists
				'featured_lists' => 
				array(
					'name' => __( 'Featured Lists', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(	
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Heading of Lists', 'catalog' ),
							'desc' => __('Write your featured list heading', 'catalog'),
						),					
						'desc' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'List Description', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'list'
				),
				//Featured List
				'featured_list' => 
				array(
					'name' => __( 'Featured List', 'catalog' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(	
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'List Title', 'catalog' ),
							'desc' => __('Write your featured list title', 'catalog'),
						),					
						'desc' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'List Description', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Choose Icon', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#fa9000',
							'name' => __( 'Icon color', 'catalog' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'list'
				),
				
				//skills
				'skills' =>
				array(
					'name' => __( 'Skills', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => 'Wordpress',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'percent' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 80,
							'name' => __( 'Total percentage', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Bacground color', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'activebackground' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Active Bacground color', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( '', 'catalog' ),
					'icon' => 'bar-chart-o'
				),
				
				//progress_bar
			'progress_bar' =>
				array(
					'name' => __( 'Progress Bar', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Top Half Circle', 'catalog' ),
								'style_2' => __( 'Full Circle', 'catalog' ),
								'style_3' => __( 'Bottom Half Circle', 'catalog' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'SEO & SEM',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'percent' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 80,
							'name' => __( 'Total percentage', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'activebackground' => array(
							'type' => 'color',
							'default' => '#f3b723',
							'name' => __( 'Active Bacground color', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( '', 'catalog' ),
					'icon' => 'bar-chart-o'
				),
				
				//Testimonial group
			    'testimonials' => 
				array(
					'name' => __( 'Testimonials', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						),
					'content' => __( 'Single testimonial shortcode goes here', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'recycle'
				),

			//Testimonial
			'testimonial' => 
				array(
					'name' => __( 'Testimonial', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
								'style2' => __( 'Style 2', 'catalog' ),
							),
							'default' => 'Default',

							'name' => __( 'Style', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'name' => array(
							'type' => 'text',
							'default' => 'Nikar avlley',
							'name' => __( 'Name', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'rtp',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Photo', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'quote-left'
				),
			//Team
			'team' =>
				array(
					'name' => __( 'Team', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'name' => array(
							'type' => 'text',
							'default' => 'John DOE',
							'name' => __( 'Name', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'Web Designer',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Photo', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'male'
				),
				
				//Icons
				'icons' => 
				array(
					'name' => __( 'Icon', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#f3b723',
							'name' => __( 'Icon color', 'catalog' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'catalog' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Font Size', 'catalog' ),
							'desc' => __( 'Font size of Title(in pixels)', 'catalog' )
						),
						'icon_align' => array(
							'type' => 'select',
							'values' => array(
								'left'   => __( 'Left', 'catalog' ),
								'center' => __( 'Center', 'catalog' ),
								'right'  => __( 'Right', 'catalog' )
							),
							'default' => 'center',
							'name' => __( 'Icon alignment', 'catalog' ),
							'desc' => __( 'Select the icon alignment', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'indent'
				),
				
				//Icons
				'icons_info' => 
				array(
					'name' => __( 'Icon With Info', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#f3b723',
							'name' => __( 'Icon color', 'catalog' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'catalog' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 28,
							'name' => __( 'Font Size', 'catalog' ),
							'desc' => __( 'Font size of icon(in pixels)', 'catalog' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'Australia Office',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Title of icon', 'catalog' )
						),
						'icon_des' => array(
							'type' => 'text',
							'default' => 'PO Box 16122 Collins Street West Victoria',
							'name' => __( 'Description', 'catalog' ),
							'desc' => __( 'Description of icon', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'indent'
				),
				
				//counter
				'counters' => 
				array(
					'name' => __( 'Counters', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Heading of counters', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#f7f8f9',
							'name' => __( 'Background', 'catalog' ),
							'desc' => __( 'Background of main section', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'counter description', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'check-square-o'
				),
				
				//counter
				'counter_up' => 
				array(
					'name' => __( 'Counter', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'catalog' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'catalog' ),
							'desc' => __( 'Color of counter icon, title and number.', 'catalog' )
						),
						'number' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100000,
							'step' => 1,
							'default' => 1000,
							'name' => __( 'Total number', 'catalog' ),
							'desc' => __( 'This is count up from zero.', 'catalog' )
						),
						'column' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 12,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'catalog' ),
							'desc' => __( 'Column Number', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'counter description', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'check-square-o'
				),
				
				//Partners
				'partners' => 
				array(
					'name' => __( 'Partners', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'catalog' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Single partner shortcode here...', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'users'
				),
				
				//Partner
				'partner' => 
				array(
					'name' => __( 'Partner', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Partners Image', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'image_link' => array(
							'type' => 'text',
							'default' => '#',
							'name' => __( 'Image Link', 'catalog' ),
							'desc' => __('', 'catalog'),
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'partner description', 'catalog' ),
					'desc' => __( '', 'catalog' ),
					'icon' => 'users'
				),
				
				// custom_gallery
				'custom_gallery' => array(
					'name' => __( 'Gallery', 'catalog' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'catalog' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'catalog' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'catalog' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'catalog' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'catalog' ),
								'image'      => __( 'Full-size image', 'catalog' ),
								'lightbox'   => __( 'Lightbox', 'catalog' ),
								'custom'     => __( 'Slide link (added in media editor)', 'catalog' ),
								'attachment' => __( 'Attachment page', 'catalog' ),
								'post'       => __( 'Post permalink', 'catalog' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'catalog' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'catalog' ),
								'blank' => __( 'New window', 'catalog' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'catalog' ),
							'desc' => __( 'Open links in', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Width', 'catalog' ), 'desc' => __( 'Single item width (in pixels)', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Height', 'catalog' ), 'desc' => __( 'Single item height (in pixels)', 'catalog' )
						),
						'title' => array(
							'type' => 'select',
							'values' => array(
								'never' => __( 'Never', 'catalog' ),
								'hover' => __( 'On mouse over', 'catalog' ),
								'always' => __( 'Always', 'catalog' )
							),
							'default' => 'hover',
							'name' => __( 'Show titles', 'catalog' ),
							'desc' => __( 'Title display mode', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Customizable image gallery', 'catalog' ),
					'icon' => 'picture-o'
				),
				
				// banner_slider
				'banner_slider' => array(
					'name' => __( 'Banner Slider', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'catalog' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'catalog' )
						),
						'previous_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Previous image', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'next_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Next image', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 1400,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Image width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 700,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Image height', 'catalog' )
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Customizable banner slider', 'catalog' ),
					'icon' => 'picture-o'
				),
				
				// contact_info
				'contact_address' => array(
					'name' => __( 'Contact Address', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(						
						'title' => array(
							'type' => 'text',
							'values' => '',
							'default' => 'Head Office',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Title of address', 'catalog' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this box', 'catalog' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 3,
							'step' => 1,
							'default' => 2,
							'name' => __( 'Column', 'catalog' ),
							'desc' => __( 'Number of column', 'catalog' )
						),
						'address' => array(
							'type' => 'textarea',
							'values' => '',
							'default' => '',
							'name' => __( 'Address', 'catalog' ),
							'desc' => __( 'Address of contact', 'catalog' )
						),
						'phone' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Phone', 'catalog' ),
							'desc' => __( 'Phone number, leave blank if you do not want to show it.', 'catalog' )
						),
						'fax' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Fax', 'catalog' ),
							'desc' => __( 'Fax number, leave blank if you do not want to show it.', 'catalog' )
						),
						'email' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Email', 'catalog' ),
							'desc' => __( 'Email ID, leave blank if you do not want to show it.', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Contact Info', 'catalog' ),
					'icon' => 'users'
				),
				
				// socials_icons
				'socials_icons' => array(
					'name' => __( 'Social Icons', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(						
						'align' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'catalog' ),
								'left' => __( 'Left', 'catalog' ),
								'center' => __( 'Center', 'catalog' ),
								'right' => __( 'Right', 'catalog' ),
								
							),
							'default' => 'center',
							'name' => __( 'Text Align', 'catalog' ),
							'desc' => __( 'Select text align', 'catalog' )
						),
					),
					'desc' => __( 'Socials Icons', 'catalog' ),
					'icon' => 'users'
				),
				
				// socials_icon
				'socials_icon' => array(
					'name' => __( 'Social Icon', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(						
						'name' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Name', 'catalog' ),
							'desc' => __( 'Social Icon name', 'catalog' )
						),
						'link' => array(
							'type' => 'text',
							'values' => '',
							'default' => '#',
							'name' => __( 'Social Link', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'values' => '',
							'default' => '',
							'name' => __( 'Select Icon', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 40,
							'step' => 1,
							'default' => 14,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Size of Icon', 'catalog' )
						),
						
					),
					'desc' => __( 'Socials Icons', 'catalog' ),
					'icon' => 'users'
				),
				
				// callout
				'callout' => array(
					'name' => __( 'Callout', 'catalog' ),
					'type' => 'wrap',
					'group' => 'catalog',
					'atts' => array(						
						'title' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Title', 'catalog' )
						),
						'button_text' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Button Text', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'button_link' => array(
							'type' => 'text',
							'values' => '',
							'default' => '#',
							'name' => __( 'Button Link', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 40,
							'step' => 1,
							'default' => 14,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Size of Icon', 'catalog' )
						),
						
					),
					'desc' => __( 'Socials Icons', 'catalog' ),
					'icon' => 'users'
				),
				
				// timer
				'timer' => array(
					'name' => __( 'Timer', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(						
						'date' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Date', 'catalog' ),
							'desc' => __( 'Date formate: 12/24/2016(MM/DD/YYYY)', 'catalog' )
						),	
					),
					'desc' => __( 'Timer', 'catalog' ),
					'icon' => 'calendar'
				),
				
				// posts
				'posts' => array(
					'name' => __( 'Posts', 'catalog' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/default-loop.php', 'name' => __( 'Template', 'catalog' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/default-loop.php</b> - posts loop<br/><b%value>templates/teaser-loop.php</b> - posts loop with thumbnail and title<br/><b%value>templates/single-post.php</b> - single post template<br/><b%value>templates/list-loop.php</b> - unordered list with posts titles', 'catalog' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'catalog' ),
							'desc' => __( 'Enter comma separated ID\'s of the posts that you want to show', 'catalog' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Posts per page', 'catalog' ),
							'desc' => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'catalog' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'catalog' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple post types', 'catalog' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Ts_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'catalog' ),
							'desc' => __( 'Select taxonomy to show posts from', 'catalog' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'catalog' ),
							'desc' => __( 'Select terms to show posts from', 'catalog' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'catalog' ),
							'desc' => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'catalog' )
						),
						// 'author' => array(
						// 	'type' => 'select',
						// 	'multiple' => true,
						// 	'values' => Ts_Tools::get_users(),
						// 	'default' => 'default',
						// 	'name' => __( 'Authors', 'catalog' ),
						// 	'desc' => __( 'Choose the authors whose posts you want to show. Enter here comma-separated list of users (IDs). Example: 1,7,18', 'catalog' )
						// ),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'catalog' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'catalog' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'catalog' ),
							'desc' => __( 'Enter meta key name to show posts that have this key', 'catalog' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'catalog' ),
							'desc' => __( 'Specify offset to start posts loop not from first post', 'catalog' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'catalog' ),
								'asc' => __( 'Ascending', 'catalog' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'catalog' ),
							'desc' => __( 'Posts order', 'catalog' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'catalog' ),
								'id' => __( 'Post ID', 'catalog' ),
								'author' => __( 'Post author', 'catalog' ),
								'title' => __( 'Post title', 'catalog' ),
								'name' => __( 'Post slug', 'catalog' ),
								'date' => __( 'Date', 'catalog' ), 'modified' => __( 'Last modified date', 'catalog' ),
								'parent' => __( 'Post parent', 'catalog' ),
								'rand' => __( 'Random', 'catalog' ), 'comment_count' => __( 'Comments number', 'catalog' ),
								'menu_order' => __( 'Menu order', 'catalog' ), 'meta_value' => __( 'Meta key values', 'catalog' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'catalog' ),
							'desc' => __( 'Order posts by', 'catalog' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Post parent', 'catalog' ),
							'desc' => __( 'Show childrens of entered post (enter post ID)', 'catalog' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'catalog' ),
								'pending' => __( 'Pending', 'catalog' ),
								'draft' => __( 'Draft', 'catalog' ),
								'auto-draft' => __( 'Auto-draft', 'catalog' ),
								'future' => __( 'Future post', 'catalog' ),
								'private' => __( 'Private post', 'catalog' ),
								'inherit' => __( 'Inherit', 'catalog' ),
								'trash' => __( 'Trashed', 'catalog' ),
								'any' => __( 'Any', 'catalog' ),
							),
							'default' => 'publish',
							'name' => __( 'Post status', 'catalog' ),
							'desc' => __( 'Show only posts with selected status', 'catalog' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'catalog' ),
							'desc' => __( 'Select Yes to ignore posts that is sticked', 'catalog' )
						)
					),
					'desc' => __( 'Custom posts query with customizable template', 'catalog' ),
					'icon' => 'th-list'
				),
				// dummy_text
				'dummy_text' => array(
					'name' => __( 'Dummy text', 'catalog' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'what' => array(
							'type' => 'select',
							'values' => array(
								'paras' => __( 'Paragraphs', 'catalog' ),
								'words' => __( 'Words', 'catalog' ),
								'bytes' => __( 'Bytes', 'catalog' ),
							),
							'default' => 'paras',
							'name' => __( 'What', 'catalog' ),
							'desc' => __( 'What to generate', 'catalog' )
						),
						'amount' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Amount', 'catalog' ),
							'desc' => __( 'How many items (paragraphs or words) to generate. Minimum words amount is 5', 'catalog' )
						),
						'cache' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Cache', 'catalog' ),
							'desc' => __( 'Generated text will be cached. Be careful with this option. If you disable it and insert many dummy_text shortcodes the page load time will be highly increased', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Text placeholder', 'catalog' ),
					'icon' => 'text-height'
				),
				// dummy_image
				'dummy_image' => array(
					'name' => __( 'Dummy image', 'catalog' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 500,
							'name' => __( 'Width', 'catalog' ),
							'desc' => __( 'Image width', 'catalog' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 300,
							'name' => __( 'Height', 'catalog' ),
							'desc' => __( 'Image height', 'catalog' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'any'       => __( 'Any', 'catalog' ),
								'abstract'  => __( 'Abstract', 'catalog' ),
								'animals'   => __( 'Animals', 'catalog' ),
								'business'  => __( 'Business', 'catalog' ),
								'cats'      => __( 'Cats', 'catalog' ),
								'city'      => __( 'City', 'catalog' ),
								'food'      => __( 'Food', 'catalog' ),
								'nightlife' => __( 'Night life', 'catalog' ),
								'fashion'   => __( 'Fashion', 'catalog' ),
								'people'    => __( 'People', 'catalog' ),
								'nature'    => __( 'Nature', 'catalog' ),
								'sports'    => __( 'Sports', 'catalog' ),
								'technics'  => __( 'Technics', 'catalog' ),
								'transport' => __( 'Transport', 'catalog' )
							),
							'default' => 'any',
							'name' => __( 'Theme', 'catalog' ),
							'desc' => __( 'Select the theme for this image', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Image placeholder with random image', 'catalog' ),
					'icon' => 'picture-o'
				),
				// animate
				'animate' => array(
					'name' => __( 'Animation', 'catalog' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array_combine( self::animations(), self::animations() ),
							'default' => 'bounceIn',
							'name' => __( 'Animation', 'catalog' ),
							'desc' => __( 'Select animation type', 'catalog' )
						),
						'duration' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 1,
							'name' => __( 'Duration', 'catalog' ),
							'desc' => __( 'Animation duration (seconds)', 'catalog' )
						),
						'delay' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 0,
							'name' => __( 'Delay', 'catalog' ),
							'desc' => __( 'Animation delay (seconds)', 'catalog' )
						),
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'catalog' ),
							'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'content' => __( 'Animated content', 'catalog' ),
					'desc' => __( 'Wrapper for animation. Any nested element will be animated', 'catalog' ),
					'example' => 'animations',
					'icon' => 'bolt'
				),
				// meta
				'meta' => array(
					'name' => __( 'Meta', 'catalog' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'key' => array(
							'default' => '',
							'name' => __( 'Key', 'catalog' ),
							'desc' => __( 'Meta key name', 'catalog' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'catalog' ),
							'desc' => __( 'This text will be shown if data is not found', 'catalog' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'catalog' ),
							'desc' => __( 'This content will be shown before the value', 'catalog' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'catalog' ),
							'desc' => __( 'This content will be shown after the value', 'catalog' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'catalog' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'catalog' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'catalog' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'catalog' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post meta', 'catalog' ),
					'icon' => 'info-circle'
				),
				// user
				'user' => array(
					'name' => __( 'User', 'catalog' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'display_name'        => __( 'Display name', 'catalog' ),
								'ID'                  => __( 'ID', 'catalog' ),
								'user_login'          => __( 'Login', 'catalog' ),
								'user_nicename'       => __( 'Nice name', 'catalog' ),
								'user_email'          => __( 'Email', 'catalog' ),
								'user_url'            => __( 'URL', 'catalog' ),
								'user_registered'     => __( 'Registered', 'catalog' ),
								'user_activation_key' => __( 'Activation key', 'catalog' ),
								'user_status'         => __( 'Status', 'catalog' )
							),
							'default' => 'display_name',
							'name' => __( 'Field', 'catalog' ),
							'desc' => __( 'User data field name', 'catalog' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'catalog' ),
							'desc' => __( 'This text will be shown if data is not found', 'catalog' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'catalog' ),
							'desc' => __( 'This content will be shown before the value', 'catalog' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'catalog' ),
							'desc' => __( 'This content will be shown after the value', 'catalog' )
						),
						'user_id' => array(
							'default' => '',
							'name' => __( 'User ID', 'catalog' ),
							'desc' => __( 'You can specify custom user ID. Leave this field empty to use an ID of the current user', 'catalog' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'catalog' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'catalog' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'User data', 'catalog' ),
					'icon' => 'info-circle'
				),
				// post
				'post' => array(
					'name' => __( 'Post', 'catalog' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'ID'                    => __( 'Post ID', 'catalog' ),
								'post_author'           => __( 'Post author', 'catalog' ),
								'post_date'             => __( 'Post date', 'catalog' ),
								'post_date_gmt'         => __( 'Post date', 'catalog' ) . ' GMT',
								'post_content'          => __( 'Post content', 'catalog' ),
								'post_title'            => __( 'Post title', 'catalog' ),
								'post_excerpt'          => __( 'Post excerpt', 'catalog' ),
								'post_status'           => __( 'Post status', 'catalog' ),
								'comment_status'        => __( 'Comment status', 'catalog' ),
								'ping_status'           => __( 'Ping status', 'catalog' ),
								'post_name'             => __( 'Post name', 'catalog' ),
								'post_modified'         => __( 'Post modified', 'catalog' ),
								'post_modified_gmt'     => __( 'Post modified', 'catalog' ) . ' GMT',
								'post_content_filtered' => __( 'Filtered post content', 'catalog' ),
								'post_parent'           => __( 'Post parent', 'catalog' ),
								'guid'                  => __( 'GUID', 'catalog' ),
								'menu_order'            => __( 'Menu order', 'catalog' ),
								'post_type'             => __( 'Post type', 'catalog' ),
								'post_mime_type'        => __( 'Post mime type', 'catalog' ),
								'comment_count'         => __( 'Comment count', 'catalog' )
							),
							'default' => 'post_title',
							'name' => __( 'Field', 'catalog' ),
							'desc' => __( 'Post data field name', 'catalog' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'catalog' ),
							'desc' => __( 'This text will be shown if data is not found', 'catalog' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'catalog' ),
							'desc' => __( 'This content will be shown before the value', 'catalog' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'catalog' ),
							'desc' => __( 'This content will be shown after the value', 'catalog' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'catalog' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'catalog' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'catalog' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'catalog' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post data', 'catalog' ),
					'icon' => 'info-circle'
				),
				// post_terms
				// 'post_terms' => array(
				// 	'name' => __( 'Post terms', 'catalog' ),
				// 	'type' => 'single',
				// 	'group' => 'data',
				// 	'atts' => array(
				// 		'post_id' => array(
				// 			'default' => '',
				// 			'name' => __( 'Post ID', 'catalog' ),
				// 			'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'catalog' )
				// 		),
				// 		'links' => array(
				// 			'type' => 'bool',
				// 			'default' => 'yes',
				// 			'name' => __( 'Show links', 'catalog' ),
				// 			'desc' => __( 'Show terms names as hyperlinks', 'catalog' )
				// 		),
				// 		'format' => array(
				// 			'type' => 'select',
				// 			'values' => array(
				// 				'text' => __( 'Terms separated by commas', 'catalog' ),
				// 				'br' => __( 'Terms separated by new lines', 'catalog' ),
				// 				'ul' => __( 'Unordered list', 'catalog' ),
				// 				'ol' => __( 'Ordered list', 'catalog' ),
				// 			),
				// 			'default' => 'text',
				// 			'name' => __( 'Format', 'catalog' ),
				// 			'desc' => __( 'Choose how to output the terms', 'catalog' )
				// 		),
				// 	),
				// 	'desc' => __( 'Terms list', 'catalog' ),
				// 	'icon' => 'info-circle'
				// ),
				// template
				'template' => array(
					'name' => __( 'Template', 'catalog' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'default' => '',
							'name' => __( 'Template name', 'catalog' ),
							'desc' => sprintf( __( 'Use template file name (with optional .php extension). If you need to use templates from theme sub-folder, use relative path. Example values: %s, %s, %s', 'catalog' ), '<b%value>page</b>', '<b%value>page.php</b>', '<b%value>includes/page.php</b>' )
						)
					),
					'desc' => __( 'Theme template', 'catalog' ),
					'icon' => 'puzzle-piece'
				),
				// qrcode
				'qrcode' => array(
					'name' => __( 'QR code', 'catalog' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'data' => array(
							'default' => '',
							'name' => __( 'Data', 'catalog' ),
							'desc' => __( 'The text to store within the QR code. You can use here any text or even URL', 'catalog' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Enter here short description. This text will be used in alt attribute of QR code', 'catalog' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1000,
							'step' => 10,
							'default' => 200,
							'name' => __( 'Size', 'catalog' ),
							'desc' => __( 'Image width and height (in pixels)', 'catalog' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 50,
							'step' => 5,
							'default' => 0,
							'name' => __( 'Margin', 'catalog' ),
							'desc' => __( 'Thickness of a margin (in pixels)', 'catalog' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'catalog' ),
								'left' => __( 'Left', 'catalog' ),
								'center' => __( 'Center', 'catalog' ),
								'right' => __( 'Right', 'catalog' ),
							),
							'default' => 'none',
							'name' => __( 'Align', 'catalog' ),
							'desc' => __( 'Choose image alignment', 'catalog' )
						),
						'link' => array(
							'default' => '',
							'name' => __( 'Link', 'catalog' ),
							'desc' => __( 'You can make this QR code clickable. Enter here the URL', 'catalog' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open link in same window/tab', 'catalog' ),
								'blank' => __( 'Open link in new window/tab', 'catalog' ),
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'catalog' ),
							'desc' => __( 'Select link target', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#000000',
							'name' => __( 'Primary color', 'catalog' ),
							'desc' => __( 'Pick a primary color', 'catalog' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Background color', 'catalog' ),
							'desc' => __( 'Pick a background color', 'catalog' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'catalog' ),
							'desc' => __( 'Extra CSS class', 'catalog' )
						)
					),
					'desc' => __( 'Advanced QR code generator', 'catalog' ),
					'icon' => 'qrcode'
				),
				
				// products
				'products' => array(
					'name' => __( 'Featured Products', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'template' => array(
							'type' => 'select',
							'values' => array(
								'templates/product-featured.php' => __( 'Featured Product', 'catalog' ),
							),
							'default' => 'templates/product-featured.php', 
							'name' => __( 'Template', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Product per page', 'catalog' ),
							'desc' => __( 'Specify number of products that you want to show. Enter -1 to get all products', 'catalog' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => array(
								'product_cat' => __( 'Product Category', 'catalog' ),
								'product_tag' => __( 'Product Tag', 'catalog' ),
							),
							'default' => 'product_cat',
							'name' => __( 'Taxonomy', 'catalog' ),
							'desc' => __( 'Select taxonomy to show products from', 'catalog' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'catalog' ),
							'desc' => __( 'Select terms to show products from', 'catalog' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'goshop' ),
							'desc' => __( 'IN - products that have any of selected categories terms<br/>NOT IN - products that is does not have any of selected terms<br/>AND - products that have all selected terms', 'catalog' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'catalog' ),
								'asc' => __( 'Ascending', 'catalog' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'catalog' ),
							'desc' => __( 'Product order', 'catalog' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'catalog' ),
								'id' => __( 'Product ID', 'catalog' ),
								'title' => __( 'Product title', 'catalog' ),
								'name' => __( 'Product slug', 'catalog' ),
								'date' => __( 'Date', 'catalog' ),
								'modified' => __( 'Last modified date', 'catalog' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'catalog' ),
							'desc' => __( 'Order product by', 'catalog' )
						),
						'featured' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Featured', 'catalog' ),
							'desc' => __( 'Is product featured or not', 'catalog' )
						),
						'view_all_link' => array(
							'default' => '',
							'name' => __( 'View All Link', 'catalog' ),
							'desc' => __( 'View all link', 'catalog' )
						),						
					),
					'desc' => __( 'Custom product query with customizable template', 'catalog' ),
					'icon' => 'th-list'
				),
				
				// products_bestseller
				'products_bestseller' => array(
					'name' => __( 'Best Seller Products', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'template' => array(
							'type' => 'select',
							'values' => array(
								'templates/product-bestsellet.php' => __( 'Best Seller Product', 'catalog' ),
							),
							'default' => 'templates/product-bestseller.php', 
							'name' => __( 'Template', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Product per page', 'catalog' ),
							'desc' => __( 'Specify number of products that you want to show. Enter -1 to get all products', 'catalog' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => array(
								'product_cat' => __( 'Product Category', 'catalog' ),
								'product_tag' => __( 'Product Tag', 'catalog' ),
							),
							'default' => 'product_cat',
							'name' => __( 'Taxonomy', 'catalog' ),
							'desc' => __( 'Select taxonomy to show products from', 'catalog' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Ts_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'catalog' ),
							'desc' => __( 'Select terms to show products from', 'catalog' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'goshop' ),
							'desc' => __( 'IN - products that have any of selected categories terms<br/>NOT IN - products that is does not have any of selected terms<br/>AND - products that have all selected terms', 'catalog' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'catalog' ),
								'asc' => __( 'Ascending', 'catalog' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'catalog' ),
							'desc' => __( 'Product order', 'catalog' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'catalog' ),
								'id' => __( 'Product ID', 'catalog' ),
								'title' => __( 'Product title', 'catalog' ),
								'name' => __( 'Product slug', 'catalog' ),
								'date' => __( 'Date', 'catalog' ),
								'modified' => __( 'Last modified date', 'catalog' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'catalog' ),
							'desc' => __( 'Order product by', 'catalog' )
						),						
					),
					'desc' => __( 'Custom product query with customizable template', 'catalog' ),
					'icon' => 'th-list'
				),
				
				// product_categories
				'product_categories' => array(
					'name' => __( 'Product Categories', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'number' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Category number', 'catalog' ),
							'desc' => __( 'Specify number of category that you want to show.', 'catalog' )
						),
						'include' => array(
							'default' => '',
							'name' => __( 'Categories ID(seperate by comma)', 'catalog' ),
							'desc' => __( 'Leave empty if want to show all.', 'catalog' )
						),				
					),
					'desc' => __( 'Custom product category', 'catalog' ),
					'icon' => 'th-list'
				),
				
				// title_subtitle
				'title_subtitle' => array(
					'name' => __( 'Title & Sub-title', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'style_1' => __( 'Style 1', 'catalog' ),
							),
							'default' => 'style_1',
							'name' => __( 'Style', 'catalog' ),
							'desc' => __( 'Select your title style', 'catalog' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'catalog' ),
							'desc' => __( 'Title', 'catalog' )
						),
						'subtitle' => array(
							'type'		=> 'textarea',
							'default' => '',
							'name' => __( 'Sub-Title', 'catalog' ),
							'desc' => __( 'Sub-Title', 'catalog' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Color', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Title Font Size', 'catalog' ),
							'desc' => __( 'Font size of Title(in pixels)', 'catalog' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(ET Icons)', 'catalog' ),
							'desc' => __( 'Example: icon-edit ; Copy and Paste your icon class from here <a href="http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes" target="_blank">site</a> ', 'catalog' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'catalog' ),
							'desc' => __( '<strong>If you do not select et icon</strong> then select icon from here, You can upload custom icon for this list or pick a built-in icon', 'catalog' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#f0f0f0',
							'name' => __( 'Icon Color', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'text_transform' => array(
							'type' => 'select',
							'values' => array(
								'uppercase' => __( 'Uppercase', 'catalog' ),
								'lowercase' => __( 'Lowercase', 'catalog' ),
								'capitalize' => __( 'Capitalize', 'catalog' ),
							),
							'default' => 'uppercase',
							'name' => __( 'Text Tranform', 'catalog' ),
							'desc' => __( 'Choose a text transform style', 'catalog' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'center' => __( 'Center', 'catalog' ),
								'left' => __( 'Left', 'catalog' ),
								'right' => __( 'Right', 'catalog' ),
								'justify' => __( 'Justify', 'catalog' ),
							),
							'default' => 'center',
							'name' => __( 'Text Align', 'catalog' ),
							'desc' => __( 'Choose text align', 'catalog' )
						),
						'margin_bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 100,
							'step' => 5,
							'default' => 80,
							'name' => __( 'Margin Bottom', 'catalog' ),
							'desc' => __( 'Margin bottom of full title & subtitle', 'catalog' )
						),
					),
					
					'class'=> '',
					'desc' => __( 'Single title and sub-title', 'catalog' ),
					'icon' => 'link'
				),
				
				// pricing_table
				'pricing_table' => array(
					'name' => __( 'Pricing', 'catalog' ),
					'type' => 'single',
					'group' => 'catalog',
					'atts' => array(
						'template' => array(
							'default' => 'templates/pricing-loop.php', 'name' => __( 'Template', 'catalog' ),
							'desc' => __( '', 'catalog' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 18,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Number of pricing to show', 'catalog' ),
							'desc' => __( 'Specify number of pricing that you want to show. Enter -1 to get all pricing', 'catalog' )
						),

						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'catalog' ),
								'asc' => __( 'Ascending', 'catalog' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'catalog' ),
							'desc' => __( 'Pricing order', 'catalog' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'catalog' ),
								'id' => __( 'Pricing ID', 'catalog' ),
								'title' => __( 'Pricing title', 'catalog' ),
								'name' => __( 'Pricing slug', 'catalog' ),
								'date' => __( 'Date', 'catalog' ), 'modified' => __( 'Last modified date', 'catalog' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'catalog' ),
							'desc' => __( 'Order pricing by', 'catalog' )
						),
						
					),
					'desc' => __( 'Pricing table', 'catalog' ),
					'icon' => 'th-list'
				),
				
				// scheduler
				'scheduler' => array(
					'name' => __( 'Scheduler', 'catalog' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'time' => array(
							'default' => '',
							'name' => __( 'Time', 'catalog' ),
							'desc' => sprintf( __( 'In this field you can specify one or more time ranges. Every day at this time the content of shortcode will be visible. %s %s %s - show content from 9:00 to 18:00 %s - show content from 9:00 to 13:00 and from 14:00 to 18:00 %s - example with minutes (content will be visible each day, 45 minutes) %s - example with seconds', 'catalog' ), '<br><br>', __( 'Examples (click to set)', 'catalog' ), '<br><b%value>9-18</b>', '<br><b%value>9-13, 14-18</b>', '<br><b%value>9:30-10:15</b>', '<br><b%value>9:00:00-17:59:59</b>' )
						),
						'days_week' => array(
							'default' => '',
							'name' => __( 'Days of the week', 'catalog' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the week. Every week at these days the content of shortcode will be visible. %s 0 - Sunday %s 1 - Monday %s 2 - Tuesday %s 3 - Wednesday %s 4 - Thursday %s 5 - Friday %s 6 - Saturday %s %s %s - show content from Monday to Friday %s - show content only at Sunday %s - show content at Sunday and from Wednesday to Friday', 'catalog' ), '<br><br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br><br>', __( 'Examples (click to set)', 'catalog' ), '<br><b%value>1-5</b>', '<br><b%value>0</b>', '<br><b%value>0, 3-5</b>' )
						),
						'days_month' => array(
							'default' => '',
							'name' => __( 'Days of the month', 'catalog' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the month. Every month at these days the content of shortcode will be visible. %s %s %s - show content only at first day of month %s - show content from 1th to 5th %s - show content from 10th to 15th and from 20th to 25th', 'catalog' ), '<br><br>', __( 'Examples (click to set)', 'catalog' ), '<br><b%value>1</b>', '<br><b%value>1-5</b>', '<br><b%value>10-15, 20-25</b>' )
						),
						'months' => array(
							'default' => '',
							'name' => __( 'Months', 'catalog' ),
							'desc' => sprintf( __( 'In this field you can specify the month or months in which the content will be visible. %s %s %s - show content only in January %s - show content from February to June %s - show content in January, March and from May to July', 'catalog' ), '<br><br>', __( 'Examples (click to set)', 'catalog' ), '<br><b%value>1</b>', '<br><b%value>2-6</b>', '<br><b%value>1, 3, 5-7</b>' )
						),
						'years' => array(
							'default' => '',
							'name' => __( 'Years', 'catalog' ),
							'desc' => sprintf( __( 'In this field you can specify the year or years in which the content will be visible. %s %s %s - show content only in 2014 %s - show content from 2014 to 2016 %s - show content in 2014, 2018 and from 2020 to 2022', 'catalog' ), '<br><br>', __( 'Examples (click to set)', 'catalog' ), '<br><b%value>2014</b>', '<br><b%value>2014-2016</b>', '<br><b%value>2014, 2018, 2020-2022</b>' )
						),
						'alt' => array(
							'default' => '',
							'name' => __( 'Alternative text', 'catalog' ),
							'desc' => __( 'In this field you can type the text which will be shown if content is not visible at the current moment', 'catalog' )
						)
					),
					'content' => __( 'Scheduled content', 'catalog' ),
					'desc' => __( 'Allows to show the content only at the specified time period', 'catalog' ),
					'note' => __( 'This shortcode allows you to show content only at the specified time.', 'catalog' ) . '<br><br>' . __( 'Please pay special attention to the descriptions, which are located below each text field. It will save you a lot of time', 'catalog' ) . '<br><br>' . __( 'By default, the content of this shortcode will be visible all the time. By using fields below, you can add some limitations. For example, if you type 1-5 in the Days of the week field, content will be only shown from Monday to Friday. Using the same principles, you can limit content visibility from years to seconds.', 'catalog' ),
					'icon' => 'clock-o'
				),
			) );
		// Return result
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class Catalog_Shortcodes_Data extends Ts_Data {
	function __construct() {
		parent::__construct();
	}
}
