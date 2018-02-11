<?php
class Ts_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	function __construct() {}

	public static function heading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'  => 'style_2',
				'tag'   => 'h2',
				'size'   => 48,
				'color'		=> '#ffffff',
				'align'  => 'center',
				'margin_top' => '20',
				'margin_bottom' => '20',
				'text_transform' => 'uppercase',
				'letter_spacing' => '28',
				'text_typed'    => 'no',
				'class'  => ''
			), $atts, 'heading' );
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		do_action( 'ts/shortcode/heading', $atts );
		
		$typed_class = '';
		$data = '';
		if($atts['text_typed'] == 'yes'){
			$typed_class = ' element';
			$data = 'data-string="'.esc_attr($content).'"';
		}
		
		if($atts['style'] == 'default'){
		return '<div class="ts-heading ts-heading-style-' . esc_attr($atts['style']) . ' ts-heading-align-' . esc_attr($atts['align']) . ts_ecssc( $atts ) . esc_attr($typed_class). '" style="margin-top:' . intval($atts['margin_top']) . 'px; margin-bottom:' . intval($atts['margin_bottom']) . 'px; font-size: ' . intval($atts['size']) . 'px; text-transform: ' . esc_attr($atts['text_transform']) . '; color: '.$atts['color'].'; letter-spacing: ' . intval($atts['letter_spacing']) . 'px; '.$data.'"><div class="ts-heading-inner">' . do_shortcode( $content ) . '<span class="bg-border"></span></div></div>';
		} else {		
		return '<' . esc_attr($atts['tag']) . ' class="ts-heading ts-heading-style-' . esc_attr($atts['style']) . ' ts-heading-align-' . esc_attr($atts['align']) . ts_ecssc( $atts ) . esc_attr($typed_class) . '" style="margin-top:' . intval($atts['margin_top']) . 'px; margin-bottom:' . intval($atts['margin_bottom']) . 'px; font-size: ' . intval($atts['size']) . 'px; text-transform: ' . esc_attr($atts['text_transform']) . '; color: '.$atts['color'].'; letter-spacing: ' . intval($atts['letter_spacing']) . 'px; " '.$data.'><div class="ts-heading-inner">' . do_shortcode( $content ) . '</div></' . $atts['tag'] . '>';
		}
	}

	public static function tabs( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'active'   => 1,
				'vertical' => 'no',
				'style'    => 'default', // 3.x
				'class'    => ''
			), $atts, 'tabs' );
		if ( $atts['style'] === '3' ) $atts['vertical'] = 'yes';
		do_shortcode( $content );
		$return = '';
		$tabs = $panes = array();
		if ( is_array( self::$tabs ) ) {
			if ( self::$tab_count < $atts['active'] ) $atts['active'] = self::$tab_count;
			foreach ( self::$tabs as $tab ) {
				$tabs[] = '<span class="' . ts_ecssc( $tab ) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'] . '>' . ts_scattr( $tab['title'] ) . '</span>';
				$panes[] = '<div class="ts-tabs-pane ts-clearfix' . ts_ecssc( $tab ) . '">' . $tab['content'] . '</div>';
			}
			$atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? ' ts-tabs-vertical' : '';
			$return = '<div class="ts-tabs ts-tabs-style-' . $atts['style'] . $atts['vertical'] . ts_ecssc( $atts ) . '" data-active="' . (string) $atts['active'] . '"><div class="ts-tabs-nav">' . implode( '', $tabs ) . '</div><div class="ts-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';
		}
		// Reset tabs
		self::$tabs = array();
		self::$tab_count = 0;
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		do_action( 'ts/shortcode/tabs', $atts );
		return $return;
	}

	public static function tab( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'    => __( 'Tab title', 'catalog' ),
				'disabled' => 'no',
				'anchor'   => '',
				'url'      => '',
				'target'   => 'blank',
				'class'    => ''
			), $atts, 'tab' );
		$x = self::$tab_count;
		self::$tabs[$x] = array(
			'title'    => $atts['title'],
			'content'  => do_shortcode( $content ),
			'disabled' => ( $atts['disabled'] === 'yes' ) ? ' ts-tabs-disabled' : '',
			'anchor'   => ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '',
			'url'      => ' data-url="' . $atts['url'] . '"',
			'target'   => ' data-target="' . $atts['target'] . '"',
			'class'    => $atts['class']
		);
		self::$tab_count++;
		do_action( 'ts/shortcode/tab', $atts );
	}

	public static function spoiler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'  => __( 'Spoiler title', 'catalog' ),
				'open'   => 'no',
				'style'  => 'default',
				'icon'   => 'plus',
				'anchor' => '',
				'class'  => ''
			), $atts, 'spoiler' );
		$atts['style'] = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
		$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
		if ( $atts['open'] !== 'yes' ) $atts['class'] .= ' ts-spoiler-closed';
		ts_query_asset( 'css', 'font-awesome' );
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		do_action( 'ts/shortcode/spoiler', $atts );
		return '<div class="ts-spoiler ts-spoiler-style-' . $atts['style'] . ' ts-spoiler-icon-' . $atts['icon'] . ts_ecssc( $atts ) . '"' . $atts['anchor'] . '><div class="ts-spoiler-title"><span class="ts-spoiler-icon"></span>' . ts_scattr( $atts['title'] ) . '</div><div class="ts-spoiler-content ts-clearfix" style="display:none">' . ts_do_shortcode( $content, 's' ) . '</div></div>';
	}

	public static function accordion( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );
		do_action( 'ts/shortcode/accordion', $atts );
		return '<div class="ts-accordion' . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function divider( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'top'           => 'yes',
				'text'          => __( 'Go to top', 'catalog' ),
				'style'         => 'default',
				'divider_color' => '#999999',
				'link_color'    => '#999999',
				'size'          => '3',
				'margin'        => '15',
				'class'         => ''
			), $atts, 'divider' );
		// Prepare TOP link
		$top = ( $atts['top'] === 'yes' ) ? '<a href="#" style="color:' . $atts['link_color'] . '">' . ts_scattr( $atts['text'] ) . '</a>' : '';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<div class="ts-divider ts-divider-style-' . $atts['style'] . ts_ecssc( $atts ) . '" style="margin:' . $atts['margin'] . 'px 0;border-width:' . $atts['size'] . 'px;border-color:' . $atts['divider_color'] . '">' . $top . '</div>';
	}

	public static function spacer( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'  => '20',
				'class' => ''
			), $atts, 'spacer' );
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<div class="ts-spacer' . ts_ecssc( $atts ) . '" style="height:' . (string) $atts['size'] . 'px"></div>';
	}

	public static function highlight( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'background' => '#ddff99',
				'bg'         => null, // 3.x
				'color'      => '#000000',
				'class'      => ''
			), $atts, 'highlight' );
		if ( $atts['bg'] !== null ) $atts['background'] = $atts['bg'];
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<span class="ts-highlight' . ts_ecssc( $atts ) . '" style="background:' . $atts['background'] . ';color:' . $atts['color'] . '">&nbsp;' . do_shortcode( $content ) . '&nbsp;</span>';
	}

	public static function label( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'  => 'default',
				'style' => null, // 3.x
				'class' => ''
			), $atts, 'label' );
		if ( $atts['style'] !== null ) $atts['type'] = $atts['style'];
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<span class="ts-label ts-label-type-' . $atts['type'] . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function quote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'cite'  => false,
				'url'   => false,
				'class' => ''
			), $atts, 'quote' );
		$cite_link = ( $atts['url'] && $atts['cite'] ) ? '<a href="' . $atts['url'] . '" target="_blank">' . $atts['cite'] . '</a>'
		: $atts['cite'];
		$cite = ( $atts['cite'] ) ? '<span class="ts-quote-cite">' . $cite_link . '</span>' : '';
		$cite_class = ( $atts['cite'] ) ? ' ts-quote-has-cite' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		do_action( 'ts/shortcode/quote', $atts );
		return '<div class="ts-quote ts-quote-style-' . $atts['style'] . $cite_class . ts_ecssc( $atts ) . '"><div class="ts-quote-inner ts-clearfix">' . do_shortcode( $content ) . ts_scattr( $cite ) . '</div></div>';
	}

	public static function pullquote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'align' => 'left',
				'class' => ''
			), $atts, 'pullquote' );
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		return '<div class="ts-pullquote ts-pullquote-align-' . $atts['align'] . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function dropcap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'size'  => 3,
				'class' => ''
			), $atts, 'dropcap' );
		$atts['style'] = str_replace( array( '1', '2', '3' ), array( 'default', 'light', 'default' ), $atts['style'] ); // 3.x
		// Calculate font-size
		$em = $atts['size'] * 0.5 . 'em';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<span class="ts-dropcap ts-dropcap-style-' . $atts['style'] . ts_ecssc( $atts ) . '" style="font-size:' . $em . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function frame( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'align' => 'left',
				'class' => ''
			), $atts, 'frame' );
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<span class="ts-frame ts-frame-align-' . $atts['align'] . ' ts-frame-style-' . $atts['style'] . ts_ecssc( $atts ) . '"><span class="ts-frame-inner">' . do_shortcode( $content ) . '</span></span>';
	}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts );
		return '<div class="ts-row' . ts_ecssc( $atts ) . '">' . ts_do_shortcode( $content, 'r' ) . '</div>';
	}

	public static function column( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'   => '1/2',
				'center' => 'no',
				'last'   => null,
				'class'  => ''
			), $atts, 'column' );
		if ( $atts['last'] !== null && $atts['last'] == '1' ) $atts['class'] .= ' ts-column-last';
		if ( $atts['center'] === 'yes' ) $atts['class'] .= ' ts-column-centered';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		return '<div class="ts-column ts-column-size-' . str_replace( '/', '-', $atts['size'] ) . ts_ecssc( $atts ) . '"><div class="ts-column-inner ts-clearfix">' . ts_do_shortcode( $content, 'c' ) . '</div></div>';
	}

	public static function ts_list( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'et_icon'	=> '',
				'icon' => '',
				'icon_color' => '#333',
				'style' => null,
				'class' => ''
			), $atts, 'list' );
		// Backward compatibility // 4.2.3+
		if ( $atts['style'] !== null ) {
			switch ( $atts['style'] ) {
			case 'star':
				$atts['icon'] = 'icon: star';
				$atts['icon_color'] = '#ffd647';
				break;
			case 'arrow':
				$atts['icon'] = 'icon: arrow-right';
				$atts['icon_color'] = '#00d1ce';
				break;
			case 'check':
				$atts['icon'] = 'icon: check';
				$atts['icon_color'] = '#17bf20';
				break;
			case 'cross':
				$atts['icon'] = 'icon: remove';
				$atts['icon_color'] = '#ff142b';
				break;
			case 'thumbs':
				$atts['icon'] = 'icon: thumbs-o-up';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'link':
				$atts['icon'] = 'icon: external-link';
				$atts['icon_color'] = '#5c5c5c';
				break;
			case 'gear':
				$atts['icon'] = 'icon: cog';
				$atts['icon_color'] = '#ccc';
				break;
			case 'time':
				$atts['icon'] = 'icon: time';
				$atts['icon_color'] = '#a8a8a8';
				break;
			case 'note':
				$atts['icon'] = 'icon: edit';
				$atts['icon_color'] = '#f7d02c';
				break;
			case 'plus':
				$atts['icon'] = 'icon: plus-sign';
				$atts['icon_color'] = '#61dc3c';
				break;
			case 'guard':
				$atts['icon'] = 'icon: shield';
				$atts['icon_color'] = '#1bbe08';
				break;
			case 'event':
				$atts['icon'] = 'icon: bullhorn';
				$atts['icon_color'] = '#ff4c42';
				break;
			case 'idea':
				$atts['icon'] = 'icon: sun';
				$atts['icon_color'] = '#ffd880';
				break;
			case 'settings':
				$atts['icon'] = 'icon: cogs';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'twitter':
				$atts['icon'] = 'icon: twitter-sign';
				$atts['icon_color'] = '#00ced6';
				break;
			}
		}
		
		if($atts['et_icon'] != ''){
			$atts['icon'] = '<i class="icon '.esc_attr($atts['et_icon']).' style="color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<div class="ts-list ts-list-style-' . $atts['style'] . ts_ecssc( $atts ) . '">' . str_replace( '<li>', '<li>' . $atts['icon'] . ' ', ts_do_shortcode( $content, 'l' ) ) . '</div>';
	}

	public static function button( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        		 => get_option( 'home' ),
				'link'        		=> null, // 3.x
				'target'      		=> 'self',
				'style'       		=> 'default',
				'background'  		=> '#FFFFFF',
				'opacity'	  		=> '0',
				'background_hover'	=> '#f3b723',
				'border'			=> '#121212',
				'color'       		=> '#121212',
				'dark'        		=> null, // 3.x
				'size'        		=> 3,
				'wide'        		=> 'no',
				'center'      		=> 'no',
				'radius'      		=> 'auto',
				'et_icon'			=> '',
				'icon'        		=> false,
				'icon_color'  		=> '#121212',
				'ts_color'    		=> null, // Dep. 4.3.2
				'ts_pos'      		=> null, // Dep. 4.3.2
				'text_shadow' 		=> 'none',
				'desc'        		=> '',
				'onclick'     		=> '',
				'rel'         		=> '',
				'title'       		=> '',
				'class'       		=> ''
			), $atts, 'button' );

		if ( $atts['link'] !== null ) $atts['url'] = $atts['link'];
		if ( $atts['dark'] !== null ) {
			$atts['background'] = $atts['color'];
			$atts['color'] = ( $atts['dark'] ) ? '#000' : '#fff';
		}
		if ( is_numeric( $atts['style'] ) ) $atts['style'] = str_replace( array( '1', '2', '3', '4', '5' ), array( 'default', 'glass', 'bubbles', 'noise', 'stroked' ), $atts['style'] ); // 3.x
		// Prepare vars
		$a_css = array();
		$span_css = array();
		$img_css = array();
		$small_css = array();
		$radius = '0px';
		$before = $after = '';
		// Text shadow values
		$shadows = array(
			'none'         => '0 0',
			'top'          => '0 -1px',
			'right'        => '1px 0',
			'bottom'       => '0 1px',
			'left'         => '-1px 0',
			'top-right'    => '1px -1px',
			'top-left'     => '-1px -1px',
			'bottom-right' => '1px 1px',
			'bottom-left'  => '-1px 1px'
		);
		// Common styles for button
		$styles = array(
			'size'     => round( ( $atts['size'] + 7 ) * 1.3 ),
			'ts_color' => ( $atts['ts_color'] === 'light' ) ? ts_hex_shift( $atts['background'], 'lighter', 50 ) : ts_hex_shift( $atts['background'], 'darker', 40 ),
			'ts_pos'   => ( $atts['ts_pos'] !== null ) ? $shadows[$atts['ts_pos']] : $shadows['none']
		);
		// Calculate border-radius
		if ( $atts['radius'] == 'auto' ) $radius = round( $atts['size'] + 2 ) . 'px';
		elseif ( $atts['radius'] == 'round' ) $radius = round( ( ( $atts['size'] * 2 ) + 2 ) * 2 + $styles['size'] ) . 'px';
		elseif ( is_numeric( $atts['radius'] ) ) $radius = intval( $atts['radius'] ) . 'px';
		// CSS rules for <a> tag
		$background = ts_hex2rgb($atts['background'], ',');
		
		$a_rules = array(
			'color'                 => $atts['color'],
			'background'      		=> 'rgba('.$background.', '.$atts['opacity'].')',
			'border-color'          => $atts['border'],
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius
		);
		
		$data_hover_background = $atts['background_hover'];
		// CSS rules for <span> tag
		$span_rules = array(
			'color'                 => $atts['color'],
			'padding'               => ( $atts['icon'] ) ? round( ( $atts['size'] ) / 2 + 4 ) . 'px ' . round( $atts['size'] * 2 + 10 ) . 'px' : '0px ' . round( $atts['size'] * 2 + 10 ) . 'px',
			'font-size'             => $styles['size'] . 'px',
			'line-height'           => ( $atts['icon'] ) ? round( $styles['size'] * 1.5 ) . 'px' : round( $styles['size'] * 2 ) . 'px',
			'border-color'          => $atts['border'],
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius,
			'text-shadow'           => $styles['ts_pos'] . ' 1px ' . $styles['ts_color'],
			'-moz-text-shadow'      => $styles['ts_pos'] . ' 1px ' . $styles['ts_color'],
			'-webkit-text-shadow'   => $styles['ts_pos'] . ' 1px ' . $styles['ts_color']
		);
		// Apply new text-shadow value
		if ( $atts['ts_color'] === null && $atts['ts_pos'] === null ) {
			$span_rules['text-shadow'] = $atts['text_shadow'];
			$span_rules['-moz-text-shadow'] = $atts['text_shadow'];
			$span_rules['-webkit-text-shadow'] = $atts['text_shadow'];
		}
		// CSS rules for <img> tag
		$img_rules = array(
			'width'     => round( $styles['size'] * 1.5 ) . 'px',
			'height'    => round( $styles['size'] * 1.5 ) . 'px'
		);
		// CSS rules for <small> tag
		$small_rules = array(
			'padding-bottom' => round( ( $atts['size'] ) / 2 + 4 ) . 'px',
			'color' => $atts['color']
		);
		// Create style attr value for <a> tag
		foreach ( $a_rules as $a_rule => $a_value ) $a_css[] = $a_rule . ':' . $a_value;
		// Create style attr value for <span> tag
		foreach ( $span_rules as $span_rule => $span_value ) $span_css[] = $span_rule . ':' . $span_value;
		// Create style attr value for <img> tag
		foreach ( $img_rules as $img_rule => $img_value ) $img_css[] = $img_rule . ':' . $img_value;
		// Create style attr value for <img> tag
		foreach ( $small_rules as $small_rule => $small_value ) $small_css[] = $small_rule . ':' . $small_value;
		// Prepare button classes
		$classes = array( 'ts-button', 'ts-button-style-' . $atts['style'] );
		// Additional classes
		if ( $atts['class'] ) $classes[] = $atts['class'];
		// Wide class
		if ( $atts['wide'] === 'yes' ) $classes[] = 'ts-button-wide';
		// Prepare icon
		if ( $atts['icon'] || $atts['et_icon'] ) {
			if($atts['et_icon'] != ''){
				$icon = '<i class="icon '.esc_attr($atts['et_icon']).' style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
			}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $styles['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
				ts_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( $img_css, ';' ) . '" />';
		}
		else $icon = '';
		// Prepare <small> with description
		$desc = ( $atts['desc'] ) ? '<small style="' . implode( $small_css, ';' ) . '">' . ts_scattr( $atts['desc'] ) . '</small>' : '';
		// Wrap with div if button centered
		if ( $atts['center'] === 'yes' ) {
			$before .= '<div class="ts-button-center">';
			$after .= '</div>';
		}
		// Replace icon marker in content,
		// add float-icon class to rearrange margins
		if ( strpos( $content, '%icon%' ) !== false ) {
			$content = str_replace( '%icon%', $icon, $content );
			$classes[] = 'ts-button-float-icon';
		}
		// Button text has no icon marker, append icon to begin of the text
		else $content = $icon . ' ' . $content;
		// Prepare onclick action
		$atts['onclick'] = ( $atts['onclick'] ) ? ' onClick="' . $atts['onclick'] . '"' : '';
		// Prepare rel attribute
		$atts['rel'] = ( $atts['rel'] ) ? ' rel="' . $atts['rel'] . '"' : '';
		// Prepare title attribute
		$atts['title'] = ( $atts['title'] ) ? ' title="' . $atts['title'] . '"' : '';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return $before . '<a href="' . ts_scattr( $atts['url'] ) . '" data-hoverback="'.esc_attr($atts['background_hover']).'" data-currentbg="'.esc_attr('rgba('.$background.', '.$atts['opacity'].')').'" data-currentbor="'.esc_attr($atts['border']).'" class="' . implode( $classes, ' ' ) . '" style="' . implode( $a_css, ';' ) . '" target="_' . $atts['target'] . '"' . $atts['onclick'] . $atts['rel'] . $atts['title'] . '><span style="' . implode( $span_css, ';' ) . '">' . do_shortcode( stripcslashes( $content ) ) . $desc . '</span></a>' . $after;
	}

	public static function services( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'				=> 'default',
			), $atts, 'services' );
			
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		if($atts['style'] == 'style_2'){
			return '<div id="owl-services" class="services text-left">' . do_shortcode( $content ) . '</div>';
		} 
		elseif($atts['style'] == 'style_3'){
			return '<div class="service-list row clearfix text-center">' . do_shortcode( $content ) . '</div>';
		}
		else {
			return '<div class="services text-center row">' . do_shortcode( $content ) . '</div><!--.services-->';
		}
	}

	public static function service( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			    'style'		  => 'default',
				'title'       => __( 'Service title', 'catalog' ),
				'small_text'       => '',
				'et_icon'	  => '',
				'icon'        => plugins_url( 'assets/images/service.png', TS_PLUGIN_FILE ),
				'icon_color'  => '#121212',
				'size'        => 32,
				'tooltip_content'    => '',
				'class'       => ''
			), $atts, 'service' );
		// RTL
		$rtl = ( is_rtl() ) ? 'right' : 'left';
		// Built-in icon
		if($atts['et_icon'] != ''){
			$icon = '<i class="icon '.esc_attr($atts['et_icon']).' style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . $atts['icon'] . '" width="' . $atts['size'] . '" height="' . $atts['size'] . '" alt="' . $atts['title'] . '" />';
		}
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		if($atts['style'] == 'default'){
			return '<div class="boxes boxs ts-service">
						<div class="' . ts_ecssc( $atts ) . ' service-box wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
							<div class="icon-container" style="min-height:' . $atts['size'] . 'px;line-height:' . $atts['size'] . 'px">' . $icon . '</div><!--.icon-container -->
							<h3>' . ts_scattr( $atts['title'] ) . '</h3>
                            <p>' . do_shortcode( $content ) . ' </p>
                        </div><!-- end service-box -->
                    </div>';
		}
		elseif($atts['style'] == 'style_2'){
			return '<div class="boxes service_'.$atts['style'].'">
						<small>'.$atts['small_text'].'</small>
						<h3>' . ts_scattr( $atts['title'] ) . '</h3>
						<p>' . do_shortcode( $content ) . '</p>
					</div>';
		}
		elseif($atts['style'] == 'style_3'){
			return '<div class="service-box col-md-3 col-sm-6">
                        <div rel="tooltip" 
                        data-toggle="tooltip" 
                        data-trigger="hover" 
                        data-placement="top" 
                        data-html="true" 
                        data-title="'.$atts['tooltip_content'].'">
                        <span class="icon-container wow fadeIn" style="min-height:' . $atts['size'] . 'px;line-height:' . $atts['size'] . 'px;">' . $icon . '</span>
                        <h3>' . ts_scattr( $atts['title'] ) . '</h3>
                        </div>
                        <p>' . do_shortcode( $content ) . '</p>
                    </div>';
		}
	}

	public static function box( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'       => __( 'This is box title', 'catalog' ),
				'style'       => 'default',
				'box_color'   => '#333333',
				'title_color' => '#FFFFFF',
				'color'       => null, // 3.x
				'radius'      => '3',
				'class'       => ''
			), $atts, 'box' );
		if ( $atts['color'] !== null ) $atts['box_color'] = $atts['color'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		$title_radius = ( $atts['radius'] != '0' ) ? $atts['radius'] - 1 : '';
		$title_radius = ( $title_radius ) ? '-webkit-border-top-left-radius:' . $title_radius . 'px;-webkit-border-top-right-radius:' . $title_radius . 'px;-moz-border-radius-topleft:' . $title_radius . 'px;-moz-border-radius-topright:' . $title_radius . 'px;border-top-left-radius:' . $title_radius . 'px;border-top-right-radius:' . $title_radius . 'px;' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		// Return result
		return '<div class="ts-box ts-box-style-' . $atts['style'] . ts_ecssc( $atts ) . '" style="border-color:' . ts_hex_shift( $atts['box_color'], 'darker', 20 ) . ';' . $radius . '"><div class="ts-box-title" style="background-color:' . $atts['box_color'] . ';color:' . $atts['title_color'] . ';' . $title_radius . '">' . ts_scattr( $atts['title'] ) . '</div><div class="ts-box-content ts-clearfix">' . ts_do_shortcode( $content, 'b' ) . '</div></div>';
	}

	public static function note( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'note_color' => '#FFFF66',
				'text_color' => '#333333',
				'background' => null, // 3.x
				'color'      => null, // 3.x
				'radius'     => '3',
				'class'      => ''
			), $atts, 'note' );
		if ( $atts['color'] !== null ) $atts['note_color'] = $atts['color'];
		if ( $atts['background'] !== null ) $atts['note_color'] = $atts['background'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		return '<div class="ts-note' . ts_ecssc( $atts ) . '" style="border-color:' . ts_hex_shift( $atts['note_color'], 'darker', 10 ) . ';' . $radius . '"><div class="ts-note-inner ts-clearfix" style="background-color:' . $atts['note_color'] . ';border-color:' . ts_hex_shift( $atts['note_color'], 'lighter', 80 ) . ';color:' . $atts['text_color'] . ';' . $radius . '">' . ts_do_shortcode( $content, 'n' ) . '</div></div>';
	}

	public static function expand( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'more_text'  => __( 'Show more', 'catalog' ),
				'less_text'  => __( 'Show less', 'catalog' ),
				'height'     => '100',
				'hide_less'  => 'no',
				'text_color' => '#333333',
				'link_color' => '#0088FF',
				'link_style' => 'default',
				'link_align' => 'left',
				'more_icon'  => '',
				'less_icon'  => '',
				'class'      => ''
			), $atts, 'expand' );
		// Prepare more icon
		$more_icon = ( $atts['more_icon'] ) ? Ts_Tools::icon( $atts['more_icon'] ) : '';
		$less_icon = ( $atts['less_icon'] ) ? Ts_Tools::icon( $atts['less_icon'] ) : '';
		if ( $more_icon || $less_icon ) ts_query_asset( 'css', 'font-awesome' );
		// Prepare less link
		$less = ( $atts['hide_less'] !== 'yes' ) ? '<div class="ts-expand-link ts-expand-link-less" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $less_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['less_text'] . '</span></a></div>' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<div class="ts-expand ts-expand-collapsed ts-expand-link-style-' . $atts['link_style'] . ts_ecssc( $atts ) . '" data-height="' . $atts['height'] . '"><div class="ts-expand-content" style="color:' . $atts['text_color'] . ';max-height:' . intval( $atts['height'] ) . 'px;overflow:hidden">' . do_shortcode( $content ) . '</div><div class="ts-expand-link ts-expand-link-more" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $more_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['more_text'] . '</span></a></div>' . $less . '</div>';
	}

	public static function lightbox( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'src'   => false,
				'type'  => 'iframe',
				'class' => ''
			), $atts, 'lightbox' );
		if ( !$atts['src'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct source', 'catalog' ) );
		ts_query_asset( 'css', 'magnific-popup' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'magnific-popup' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<span class="ts-lightbox' . ts_ecssc( $atts ) . '" data-mfp-src="' . ts_scattr( $atts['src'] ) . '" data-mfp-type="' . $atts['type'] . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function lightbox_content( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id'         => '',
				'width'      => '50%',
				'margin'     => '40',
				'padding'    => '40',
				'text_align' => 'center',
				'background' => '#FFFFFF',
				'color'      => '#333333',
				'shadow'     => '0px 0px 15px #333333',
				'class'      => ''
			), $atts, 'lightbox_content' );
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		if ( !$atts['id'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct ID for this block. You should use same ID as in the Content source field (when inserting lightbox shortcode)', 'catalog' ) );
		$return = '<div class="ts-lightbox-content ' . ts_ecssc( $atts ) . '" id="' . trim( $atts['id'], '#' ) . '" style="display:none;width:' . $atts['width'] . ';margin-top:' . $atts['margin'] . 'px;margin-bottom:' . $atts['margin'] . 'px;padding:' . $atts['padding'] . 'px;background-color:' . $atts['background'] . ';color:' . $atts['color'] . ';box-shadow:' . $atts['shadow'] . ';text-align:' . $atts['text_align'] . '">' . do_shortcode( $content ) . '</div>';
		if ( did_action( 'ts/generator/preview/before' ) ) return '<div class="ts-lightbox-content-preview">' . $return . '</div>';
		else return $return;
	}

	public static function tooltip( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'        => 'yellow',
				'position'     => 'north',
				'shadow'       => 'no',
				'rounded'      => 'no',
				'size'         => 'default',
				'title'        => '',
				'content'      => __( 'Tooltip text', 'catalog' ),
				'behavior'     => 'hover',
				'close'        => 'no',
				'class'        => ''
			), $atts, 'tooltip' );
		// Prepare style
		$atts['style'] = ( in_array( $atts['style'], array( 'light', 'dark', 'green', 'red', 'blue', 'youtube', 'tipsy', 'bootstrap', 'jtools', 'tipped', 'cluetip' ) ) ) ? $atts['style'] : 'plain';
		// Position
		$atts['position'] = str_replace( array( 'top', 'right', 'bottom', 'left' ), array( 'north', 'east', 'south', 'west' ), $atts['position'] );
		$position = array(
			'my' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'bottom center', 'center left', 'top center', 'center right' ), $atts['position'] ),
			'at' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'top center', 'center right', 'bottom center', 'center left' ), $atts['position'] )
		);
		// Prepare classes
		$classes = array( 'ts-qtip qtip-' . $atts['style'] );
		$classes[] = 'ts-qtip-size-' . $atts['size'];
		if ( $atts['shadow'] === 'yes' ) $classes[] = 'qtip-shadow';
		if ( $atts['rounded'] === 'yes' ) $classes[] = 'qtip-rounded';
		// Query assets
		ts_query_asset( 'css', 'qtip' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'qtip' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<span class="ts-tooltip' . ts_ecssc( $atts ) . '" data-close="' . $atts['close'] . '" data-behavior="' . $atts['behavior'] . '" data-my="' . $position['my'] . '" data-at="' . $position['at'] . '" data-classes="' . implode( ' ', $classes ) . '" data-title="' . $atts['title'] . '" title="' . esc_attr( $atts['content'] ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function ts_private( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'private' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return ( current_user_can( 'publish_posts' ) ) ? '<div class="ts-private' . ts_ecssc( $atts ) . '"><div class="ts-private-shell">' . do_shortcode( $content ) . '</div></div>' : '';
	}

	public static function media( $atts = null, $content = null ) {
		// Check YouTube video
		if ( strpos( $atts['url'], 'youtu' ) !== false ) return Ts_Shortcodes::youtube( $atts );
		// Check Vimeo video
		elseif ( strpos( $atts['url'], 'vimeo' ) !== false ) return Ts_Shortcodes::vimeo( $atts );
		// Image
		else return '<img src="' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" style="max-width:100%" />';
	}

	public static function youtube( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'youtube' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '?autoplay=1' : '';
		// Create player
		$return[] = '<div class="ts-youtube ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $id . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function youtube_advanced( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$params = array();
		$atts = shortcode_atts( array(
				'url'            => false,
				'width'          => 600,
				'height'         => 400,
				'responsive'     => 'yes',
				'autohide'       => 'alt',
				'autoplay'       => 'no',
				'controls'       => 'yes',
				'fs'             => 'yes',
				'loop'           => 'no',
				'modestbranding' => 'no',
				'playlist'       => '',
				'rel'            => 'yes',
				'showinfo'       => 'yes',
				'theme'          => 'dark',
				'https'          => 'no',
				'wmode'          => '',
				'class'          => ''
			), $atts, 'youtube_advanced' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		// Prepare params
		foreach ( array( 'autohide', 'autoplay', 'controls', 'fs', 'loop', 'modestbranding', 'playlist', 'rel', 'showinfo', 'theme', 'wmode' ) as $param ) $params[$param] = str_replace( array( 'no', 'yes', 'alt' ), array( '0', '1', '2' ), $atts[$param] );
		// Correct loop
		if ( $params['loop'] === '1' && $params['playlist'] === '' ) $params['playlist'] = $id;
		// Prepare protocol
		$protocol = ( $atts['https'] === 'yes' ) ? 'https' : 'http';
		// Prepare player parameters
		$params = http_build_query( $params );
		// Create player
		$return[] = '<div class="ts-youtube ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="' . $protocol . '://www.youtube.com/embed/' . $id . '?' . $params . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function vimeo( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'vimeo' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '&amp;autoplay=1' : '';
		// Create player
		$return[] = '<div class="ts-vimeo ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="//player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function screenr( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'screenr' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*screenr\.com(?:[\/\w]*\/videos?)?\/([a-zA-Z0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		// Create player
		$return[] = '<div class="ts-screenr ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://screenr.com/embed/' . $id . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function dailymotion( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'autoplay'   => 'no',
				'background' => '#FFC300',
				'foreground' => '#F7FFFD',
				'highlight'  => '#171D1B',
				'logo'       => 'yes',
				'quality'    => '380',
				'related'    => 'yes',
				'info'       => 'yes',
				'class'      => ''
			), $atts, 'dailymotion' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = strtok( basename( $atts['url'] ), '_' );
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		// Prepare params
		$params = array();
		foreach ( array( 'autoplay', 'background', 'foreground', 'highlight', 'logo', 'quality', 'related', 'info' ) as $param )
			$params[] = $param . '=' . str_replace( array( 'yes', 'no', '#' ), array( '1', '0', '' ), $atts[$param] );
		// Create player
		$return[] = '<div class="ts-dailymotion ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.dailymotion.com/embed/video/' . $id . '?' . implode( '&', $params ) . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function audio( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'width'    => 'auto',
				'title'    => '',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'audio' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'ts_audio_player_' );
		// Prepare width
		$width = ( $atts['width'] !== 'auto' ) ? 'max-width:' . $atts['width'] : '';
		// Check that url is specified
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		ts_query_asset( 'css', 'ts-players-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'jplayer' );
		ts_query_asset( 'js', 'ts-players-shortcodes' );
		ts_query_asset( 'js', 'ts-players-shortcodes' );
		// Create player
		return '<div class="ts-audio' . ts_ecssc( $atts ) . '" data-id="' . $id . '" data-audio="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', TS_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" style="' . $width . '"><div id="' . $id . '" class="jp-jplayer"></div><div id="' . $id . '_container" class="jp-audio"><div class="jp-type-single"><div class="jp-gui jp-interface"><div class="jp-controls"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-stop"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-volume-max"></span></div><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div><div class="jp-current-time"></div><div class="jp-duration"></div></div><div class="jp-title">' . $atts['title'] . '</div></div></div></div>';
	}

	public static function video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'poster'   => false,
				'title'    => '',
				'width'    => 600,
				'height'   => 300,
				'controls' => 'yes',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'video' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'ts_video_player_' );
		// Check that url is specified
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'catalog' ) );
		// Prepare title
		$title = ( $atts['title'] ) ? '<div class="jp-title">' . $atts['title'] . '</div>' : '';
		ts_query_asset( 'css', 'ts-players-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'jplayer' );
		ts_query_asset( 'js', 'ts-players-shortcodes' );
		// Create player
		return '<div style="width:' . $atts['width'] . 'px; max-width: 100%;"><div id="' . $id . '" class="ts-video jp-video ts-video-controls-' . $atts['controls'] . ts_ecssc( $atts ) . '" data-id="' . $id . '" data-video="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', TS_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" data-poster="' . $atts['poster'] . '"><div id="' . $id . '_player" class="jp-jplayer" style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px; max-width: 100%;"></div>' . $title . '<div class="jp-start jp-play"></div><div class="jp-gui"><div class="jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-current-time"></div><div class="jp-duration"></div><div class="jp-controls-holder"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-full-screen"></span><span class="jp-restore-screen"></span><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div></div></div></div></div>';
	}

	public static function table( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'       => 'default',
				'url'   => false,
				'class' => ''
			), $atts, 'table' );
		$return = '<div class="ts-table' . ts_ecssc( $atts ) . ' ts-table-'. $atts['style'] .'">';
		$return .= ( $atts['url'] ) ? ts_parse_csv( $atts['url'] ) : do_shortcode( $content );
		$return .= '</div>';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return $return;
	}

	public static function permalink( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id' => 1,
				'p' => null, // 3.x
				'target' => 'self',
				'class' => ''
			), $atts, 'permalink' );
		if ( $atts['p'] !== null ) $atts['id'] = $atts['p'];
		$atts['id'] = ts_scattr( $atts['id'] );
		// Prepare link text
		$text = ( $content ) ? $content : get_the_title( $atts['id'] );
		return '<a href="' . get_permalink( $atts['id'] ) . '" class="' . ts_ecssc( $atts ) . '" title="' . $text . '" target="_' . $atts['target'] . '">' . $text . '</a>';
	}

	public static function members( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'message'    => __( 'This content is for registered users only. Please %login%.', 'catalog' ),
				'color'      => '#ffcc00',
				'style'      => null, // 3.x
				'login_text' => __( 'login', 'catalog' ),
				'login_url'  => wp_login_url(),
				'login'      => null, // 3.x
				'class'      => ''
			), $atts, 'members' );
		if ( $atts['style'] !== null ) $atts['color'] = str_replace( array( '0', '1', '2' ), array( '#fff', '#FFFF29', '#1F9AFF' ), $atts['style'] );
		// Check feed
		if ( is_feed() ) return;
		// Check authorization
		if ( !is_user_logged_in() ) {
			if ( $atts['login'] !== null && $atts['login'] == '0' ) return; // 3.x
			// Prepare login link
			$login = '<a href="' . esc_attr( $atts['login_url'] ) . '">' . $atts['login_text'] . '</a>';
			ts_query_asset( 'css', 'ts-other-shortcodes' );
			return '<div class="ts-members' . ts_ecssc( $atts ) . '" style="background-color:' . ts_hex_shift( $atts['color'], 'lighter', 50 ) . ';border-color:' .ts_hex_shift( $atts['color'], 'darker', 20 ) . ';color:' .ts_hex_shift( $atts['color'], 'darker', 60 ) . '">' . str_replace( '%login%', $login, ts_scattr( $atts['message'] ) ) . '</div>';
		}
		// Return original content
		else return do_shortcode( $content );
	}

	public static function guests( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'guests' );
		$return = '';
		if ( !is_user_logged_in() && !is_null( $content ) ) {
			ts_query_asset( 'css', 'ts-other-shortcodes' );
			$return = '<div class="ts-guests' . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		}
		return $return;
	}

	public static function feed( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'   => get_bloginfo_rss( 'rss2_url' ),
				'limit' => 3,
				'class' => ''
			), $atts, 'feed' );
		if ( !function_exists( 'wp_rss' ) ) include_once ABSPATH . WPINC . '/rss.php';
		ob_start();
		echo '<div class="ts-feed' . ts_ecssc( $atts ) . '">';
		wp_rss( $atts['url'], $atts['limit'] );
		echo '</div>';
		$return = ob_get_contents();
		ob_end_clean();
		return $return;
	}

	public static function subpages( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'depth' => 1,
				'p'     => false,
				'class' => ''
			), $atts, 'subpages' );
		global $post;
		$child_of = ( $atts['p'] ) ? $atts['p'] : get_the_ID();
		$return = wp_list_pages( array(
				'title_li' => '',
				'echo' => 0,
				'child_of' => $child_of,
				'depth' => $atts['depth']
			) );
		return ( $return ) ? '<ul class="ts-subpages' . ts_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function siblings( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'depth' => 1, 'class' => '' ), $atts, 'siblings' );
		global $post;
		$return = wp_list_pages( array( 'title_li' => '',
				'echo' => 0,
				'child_of' => $post->post_parent,
				'depth' => $atts['depth'],
				'exclude' => $post->ID ) );
		return ( $return ) ? '<ul class="ts-siblings' . ts_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function menu( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => false,
				'class' => ''
			), $atts, 'menu' );
		$return = wp_nav_menu( array(
				'echo'        => false,
				'menu'        => $atts['name'],
				'container'   => false,
				'fallback_cb' => array( __CLASS__, 'menu_fb' ),
				'items_wrap'  => '<ul id="%1$s" class="%2$s' . ts_ecssc( $atts ) . '">%3$s</ul>'
			) );
		return ( $atts['name'] ) ? $return : false;
	}

	public static function menu_fb() {
		return __( 'This menu doesn\'t exists, or has no elements', 'catalog' );
	}

	public static function document( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        => '',
				'file'       => null, // 3.x
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'document' );
		if ( $atts['file'] !== null ) $atts['url'] = $atts['file'];
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		return '<div class="ts-document ts-responsive-media-' . $atts['responsive'] . '"><iframe src="//docs.google.com/viewer?embedded=true&url=' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="ts-document' . ts_ecssc( $atts ) . '"></iframe></div>';
	}

	public static function gmap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'address'    => 'New York',
				'class'      => ''
			), $atts, 'gmap' );
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		return '<div class="ts-gmap ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://maps.google.com/maps?q=' . urlencode( ts_scattr( $atts['address'] ) ) . '&amp;output=embed"></iframe></div>';
	}

	public static function slider( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 300,
				'responsive' => 'yes',
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'yes',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'slider' );
		// Get slides
		$slides = (array) Ts_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'ts_slider_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' ts-slider-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' ts-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="ts-slider' . $centered . ' ts-slider-pages-' . $atts['pages'] . ' ts-slider-responsive-' . $atts['responsive'] . ts_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '"><div class="ts-slider-slides">';
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop the image
				$image = ts_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="ts-slider-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="ts-slider-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="ts-slider-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes' ) $return .= '<div class="ts-slider-direction"><span class="ts-slider-prev"></span><span class="ts-slider-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="ts-slider-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				ts_query_asset( 'css', 'magnific-popup' );
				ts_query_asset( 'js', 'magnific-popup' );
			}
			ts_query_asset( 'css', 'ts-galleries-shortcodes' );
			ts_query_asset( 'js', 'jquery' );
			ts_query_asset( 'js', 'swiper' );
			ts_query_asset( 'js', 'ts-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'catalog' ) );
		return $return;
	}

	public static function carousel( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 100,
				'responsive' => 'yes',
				'items'      => 3,
				'scroll'     => 1,
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'no',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'carousel' );
		// Get slides
		$slides = (array) Ts_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'ts_carousel_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' ts-carousel-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' ts-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="ts-carousel' . $centered . ' ts-carousel-pages-' . $atts['pages'] . ' ts-carousel-responsive-' . $atts['responsive'] . ts_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '" data-items="' . $atts['items'] . '" data-scroll="' . $atts['scroll'] . '"><div class="ts-carousel-slides">';
			// Create slides
			foreach ( (array) $slides as $slide ) {
				// Crop the image
				$image = ts_image_resize( $slide['image'], ( round( $atts['width'] / $atts['items'] ) - 18 ), $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="ts-carousel-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="ts-carousel-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="ts-carousel-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes'
			) $return .= '<div class="ts-carousel-direction"><span class="ts-carousel-prev"></span><span class="ts-carousel-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="ts-carousel-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				ts_query_asset( 'css', 'magnific-popup' );
				ts_query_asset( 'js', 'magnific-popup' );
			}
			ts_query_asset( 'css', 'ts-galleries-shortcodes' );
			ts_query_asset( 'js', 'jquery' );
			ts_query_asset( 'js', 'swiper' );
			ts_query_asset( 'js', 'ts-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'catalog' ) );
		return $return;
	}

	public static function custom_gallery( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'  => 'none',
				'limit'   => 20,
				'gallery' => null, // Dep. 4.4.0
				'link'    => 'none',
				'width'   => 90,
				'height'  => 90,
				'title'   => 'hover',
				'target'  => 'self',
				'class'   => ''
			), $atts, 'custom_gallery' );
		$slides = (array) Ts_Tools::get_slides( $atts );
		// Loop slides
		$i = 1;
		if ( count( $slides ) ) {
			// Prepare links target
			$atts['target'] = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' ts-lightbox-gallery';
			// Open gallery
			$return = '<div class="ts-custom-gallery ts-custom-gallery-title-' . $atts['title'] . ts_ecssc( $atts ) . ' gallery">';
			// Create slides
			foreach ( $slides as $slide ) {
				if($i == 1){
					$class_col = 'col-lg-6 col-md-6 col-xs-12';
				} else {
					$class_col = 'col-lg-3 col-md-3 col-xs-12';
				}
				// Crop image
				$image = ts_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $slide['title'] ) ? '<span class="ts-custom-gallery-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="ts-custom-gallery-slide single-work '.$class_col.'">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $atts['target'] . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . esc_url($image['url']) . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
				$i++;
			}
			// Clear floats
			$return .= '<div class="ts-clear"></div>';
			// Close gallery
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				ts_query_asset( 'css', 'magnific-popup' );
				ts_query_asset( 'js', 'jquery' );
				ts_query_asset( 'js', 'magnific-popup' );
				ts_query_asset( 'js', 'ts-galleries-shortcodes' );
			}
			ts_query_asset( 'css', 'ts-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'catalog' ) );
		return $return;
	}

	public static function posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/default-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'posts' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Ts_Tools::error( __FUNCTION__, __( 'template not found', 'catalog' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return $output;
	}

	public static function dummy_text( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'amount' => 1,
				'what'   => 'paras',
				'cache'  => 'yes',
				'class'  => ''
			), $atts, 'dummy_text' );
		$transient = 'su/cache/dummy_text/' . sanitize_text_field( $atts['what'] ) . '/' . intval( $atts['amount'] );
		$return = get_transient( $transient );
		if ( $return && $atts['cache'] === 'yes' && TS_ENABLE_CACHE ) return $return;
		else {
			$xml = simplexml_load_file( 'http://www.lipsum.com/feed/xml?amount=' . $atts['amount'] . '&what=' . $atts['what'] . '&start=0' );
			$return = '<div class="ts-dummy-text' . ts_ecssc( $atts ) . '">' . wpautop( str_replace( "\n", "\n\n", $xml->lipsum ) ) . '</div>';
			set_transient( $transient, $return, 60*60*24*30 );
			return $return;
		}
	}

	public static function dummy_image( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'  => 500,
				'height' => 300,
				'theme'  => 'any',
				'class'  => ''
			), $atts, 'dummy_image' );
		$url = 'http://lorempixel.com/' . $atts['width'] . '/' . $atts['height'] . '/';
		if ( $atts['theme'] !== 'any' ) $url .= $atts['theme'] . '/' . rand( 0, 10 ) . '/';
		return '<img src="' . $url . '" alt="' . __( 'Dummy image', 'catalog' ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="ts-dummy-image' . ts_ecssc( $atts ) . '" />';
	}

	public static function animate( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'      => 'bounceIn',
				'duration'  => 1,
				'delay'     => 0,
				'inline'    => 'no',
				'class'     => ''
			), $atts, 'animate' );
		$tag = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
		$time = '-webkit-animation-duration:' . $atts['duration'] . 's;-webkit-animation-delay:' . $atts['delay'] . 's;animation-duration:' . $atts['duration'] . 's;animation-delay:' . $atts['delay'] . 's;';
		$return = '<' . $tag . ' class="ts-animate' . ts_ecssc( $atts ) . '" style="visibility:hidden;' . $time . '" data-animation="' . $atts['type'] . '" data-duration="' . $atts['duration'] . '" data-delay="' . $atts['delay'] . '">' . do_shortcode( $content ) . '</' . $tag . '>';
		ts_query_asset( 'css', 'animate' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'inview' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return $return;
	}

	public static function meta( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'key'     => '',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'meta' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="ts-error">Meta: %s</p>', __( 'post ID is incorrect', 'catalog' ) );
		// Check key name
		if ( !$atts['key'] ) return sprintf( '<p class="ts-error">Meta: %s</p>', __( 'please specify meta key name', 'catalog' ) );
		// Get the meta
		$meta = get_post_meta( $atts['post_id'], $atts['key'], true );
		// Set default value if meta is empty
		if ( !$meta ) $meta = $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $meta = call_user_func( $atts['filter'], $meta );
		// Return result
		return ( $meta ) ? $atts['before'] . $meta . $atts['after'] : '';
	}

	public static function user( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'display_name',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'user_id' => '',
				'filter'  => ''
			), $atts, 'user' );
		// Check for password requests
		if ( $atts['field'] === 'user_pass' ) return sprintf( '<p class="ts-error">User: %s</p>', __( 'password field is not allowed', 'catalog' ) );
		// Define current user ID
		if ( !$atts['user_id'] ) $atts['user_id'] = get_current_user_id();
		// Check user ID
		if ( !is_numeric( $atts['user_id'] ) || $atts['user_id'] < 1 ) return sprintf( '<p class="ts-error">User: %s</p>', __( 'user ID is incorrect', 'catalog' ) );
		// Get user data
		$user = get_user_by( 'id', $atts['user_id'] );
		// Get user data if user was found
		$user = ( $user && isset( $user->data->$atts['field'] ) ) ? $user->data->$atts['field'] : $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $user = call_user_func( $atts['filter'], $user );
		// Return result
		return ( $user ) ? $atts['before'] . $user . $atts['after'] : '';
	}

	public static function post( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'post_title',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'post' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="ts-error">Post: %s</p>', __( 'post ID is incorrect', 'catalog' ) );
		// Get the post
		$post = get_post( $atts['post_id'] );
		// Set default value if meta is empty
		$post = ( empty( $post ) || empty( $post->$atts['field'] ) ) ? $atts['default'] : $post->$atts['field'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $post = call_user_func( $atts['filter'], $post );
		// Return result
		return ( $post ) ? $atts['before'] . $post . $atts['after'] : '';
	}

	// public static function post_terms( $atts = null, $content = null ) {
	//  $atts = shortcode_atts( array(
	//    'post_id'  => '',
	//    'taxonomy' => 'category',
	//    'limit'    => '5',
	//    'links'    => '',
	//    'format'   => ''
	//   ), $atts, 'post_terms' );
	//  // Define current post ID
	//  if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
	//  // Check post ID
	//  if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="ts-error">Post terms: %s</p>', __( 'post ID is incorrect', 'catalog' ) );
	// }

	public static function template( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => ''
			), $atts, 'template' );
		// Check template name
		if ( !$atts['name'] ) return sprintf( '<p class="ts-error">Template: %s</p>', __( 'please specify template name', 'catalog' ) );
		// Get template output
		ob_start();
		get_template_part( str_replace( '.php', '', $atts['name'] ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return result
		return $output;
	}

	public static function qrcode( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'data' => '',
				'title' => '',
				'size' => 200,
				'margin' => 0,
				'align' => 'none',
				'link' => '',
				'target' => 'blank',
				'color' => '#000000',
				'background' => '#ffffff',
				'class' => ''
			), $atts, 'qrcode' );
		// Check the data
		if ( !$atts['data'] ) return 'QR code: ' . __( 'please specify the data', 'catalog' );
		// Prepare link
		$href = ( $atts['link'] ) ? ' href="' . $atts['link'] . '"' : '';
		// Prepare clickable class
		if ( $atts['link'] ) $atts['class'] .= ' ts-qrcode-clickable';
		// Prepare title
		$atts['title'] = esc_attr( $atts['title'] );
		// Query assets
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		// Return result
		return '<span class="ts-qrcode ts-qrcode-align-' . $atts['align'] . ts_ecssc( $atts ) . '"><a' . $href . ' target="_' . $atts['target'] . '" title="' . $atts['title'] . '"><img src="https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode( $atts['data'] ) . '&size=' . $atts['size'] . 'x' . $atts['size'] . '&format=png&margin=' . $atts['margin'] . '&color=' . ts_hex2rgb( $atts['color'] ) . '&bgcolor=' . ts_hex2rgb( $atts['background'] ) . '" alt="' . $atts['title'] . '" /></a></span>';
	}

	public static function scheduler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'time'       => 'all',
				'days_week'  => 'all',
				'days_month' => 'all',
				'months'     => 'all',
				'years'      => 'all',
				'alt'        => ''
			), $atts, 'scheduler' );
		// Check time
		if ( $atts['time'] !== 'all' ) {
			// Get current time
			$now = current_time( 'timestamp', 0 );
			// Sanitize
			$atts['time'] = preg_replace( "/[^0-9-,:]/", '', $atts['time'] );
			// Loop time ranges
			foreach( explode( ',', $atts['time'] ) as $range ) {
				// Check for range symbol
				if ( strpos( $range, '-' ) === false ) return Ts_Tools::error( __FUNCTION__, sprintf( __( 'Incorrect time range (%s). Please use - (minus) symbol to specify time range. Example: 14:00 - 18:00', 'catalog' ), $range ) );
				// Split begin/end time
				$time = explode( '-', $range );
				// Add minutes
				if ( strpos( $time[0], ':' ) === false ) $time[0] .= ':00';
				if ( strpos( $time[1], ':' ) === false ) $time[1] .= ':00';
				// Parse begin/end time
				$time[0] = strtotime( $time[0] );
				$time[1] = strtotime( $time[1] );
				// Check time
				if ( $now < $time[0] || $now > $time[1] ) return $atts['alt'];
			}
		}
		// Check day of the week
		if ( $atts['days_week'] !== 'all' ) {
			// Get current day of the week
			$today = date( 'w', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_week'] = preg_replace( "/[^0-9-,]/", '', $atts['days_week'] );
			// Parse days range
			$days = Ts_Tools::range( $atts['days_week'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check day of the month
		if ( $atts['days_month'] !== 'all' ) {
			// Get current day of the month
			$today = date( 'j', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_month'] = preg_replace( "/[^0-9-,]/", '', $atts['days_month'] );
			// Parse days range
			$days = Ts_Tools::range( $atts['days_month'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check month
		if ( $atts['months'] !== 'all' ) {
			// Get current month
			$now = date( 'n', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['months'] = preg_replace( "/[^0-9-,]/", '', $atts['months'] );
			// Parse months range
			$months = Ts_Tools::range( $atts['months'] );
			// Check current month
			if ( !in_array( $now, $months ) ) return $atts['alt'];
		}
		// Check year
		if ( $atts['years'] !== 'all' ) {
			// Get current year
			$now = date( 'Y', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['years'] = preg_replace( "/[^0-9-,]/", '', $atts['years'] );
			// Parse years range
			$years = Ts_Tools::range( $atts['years'] );
			// Check current year
			if ( !in_array( $now, $years ) ) return $atts['alt'];
		}
		// Return result (all check passed)
		return do_shortcode( $content );
	}
	
	//Featured lists shortcode
	public static function featured_lists( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'desc'			=> '',
			), $atts, 'featured_lists' );

		$html = '';
		$html .='<div class="featured-lists">';
					if($atts['title'] != ''){
					$html .='<h3>'.force_balance_tags($atts['title']).'</h3>';
					}
					$html .='<ul class="feature-list">'.do_shortcode($content).'</ul>
				</div>';
		return $html;
	}
	
	//Featured list shortcode
	public static function featured_list( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'desc'			=> '',
				'icon' 			=> '',
				'icon_color'	=> '',
			), $atts, 'featured_list' );

		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		return '<li class="list">
					<h4><span class="icon-view">'.$atts['icon'].'</span>'.force_balance_tags($atts['title']).'</h4>
					<p>'.esc_attr($atts['desc']).'</p>
				</li>';
	}
	
	
	public static function testimonials( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',
			), $atts, 'testimonials' );
			
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<div class="text-center" id="owl-testimonial">'.do_shortcode($content).'</div><!--#owl-testimonial-->';
	}

	public static function testimonial( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',
				'name' 		=> 'Nikar avlley',
				'title' 	=> 'rtp',
				'image'		=> '',
			), $atts, 'testimonial' );
		
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		
		$html = '';
		$html .='<div class="testi-item">';
		if($atts['image'] != ''){
			$image_url = ts_image_resize( esc_url($atts['image']), 200, 200 );
			$html .='<img src="'.$image_url['url'].'" alt="testi-image"  class="img-circle" />';
		}
			$html .='<h4>'.$atts['name'].'</h4>
			<small>'.$atts['title'].'</small>
			<p class="lead">' . do_shortcode($content) . '</p>
		</div>';
		
		return $html; 
	}

	public static function team( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'name' 				=> 'John DOE',
				'title' 			=> 'Web Designer',
				'image' 			=> '',			
			), $atts, 'team' );
		
		
			if( $atts['image'] != '' ){
				$arr = ts_image_resize( esc_url($atts['image']), 390, 390 );
				$image = '<img src="'.esc_url($arr['url']).'" alt="'.esc_attr($atts['name']).'" class="img-responsive">';
			}else{
				$image = '';
			}
		
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		$html = '
		<div class="col-sm-6">
			<div class="team-image">'.$image.'</div><!-- end team-image -->
		</div><!-- end col -->

		<div class="col-sm-6">
			<div class="team-desc">
				<h4>'.esc_html($atts['name']).'</h4>
				<small>'.esc_html($atts['title']).'</small>
				<p>'.do_shortcode($content).'</p>
			</div><!-- end team-image -->
		</div><!-- end col -->';
		return $html;
	}
	
	public static function icons( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'et_icon'	=> '',
				'icon' 			=> '',
				'icon_color' 	=> '',
				'font_size'		=> 40,
				'icon_align'	=> 'center',
				'class' 		=> '',
				), $atts, 'icons' );
		if($atts['et_icon'] != ''){
			$atts['icon'] = '<i class="icon '.esc_attr($atts['et_icon']).' style="font-size:' . $atts['font_size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		return '<span class="icons-font '.$atts['class'].'" style="text-align: '.$atts['icon_align'].'">' . $atts['icon'] . '</span>';
	}
	
	public static function icons_info( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'et_icon'		=> '',
				'icon' 			=> '',
				'icon_color' 	=> '',
				'font_size'		=> 28,
				'title'			=> 'Australia Office',
				'icon_des'		=> 'PO Box 16122 Collins Street West Victoria',
				'class' 		=> '',
				), $atts, 'icons_info' );
		if($atts['et_icon'] != ''){
			$atts['icon'] = '<i class="icon '.esc_attr($atts['et_icon']).' style="font-size:' . $atts['font_size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		return '<div class="col-md-3 col-sm-6 col-xs-12 contact-informations padding-zero">
				<div class="fun-facts text-center">
					<span class="fun-icon">' . $atts['icon'] . '</span>
					<h3>' . $atts['title'] . '</h3>
					<p>' . $atts['icon_des'] . '</p>
				</div>
				</div><!-- end service-box -->';
	}
	
	public static function counters( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'class' 		=> '',
				), $atts, 'counters' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		$title = '';
		if($atts['title'] != ''){
			$title = '<h4 class="count-tit">' .$atts['title']. '</h4>'; 
		}
		return '
		<div class="counter-wrap ' .$atts['class']. '">
						' .$title. '
						' .do_shortcode( $content ). '
		</div>';		
	}
	
	public static function counter_up( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'et_icon'	  => '',
				'icon'        => '',
				'size'        => 32,
				'color'			=> '#ffffff',
				'number' 		=> 1000,
				'column'		=> 3,
				'class' 		=> '',
				), $atts, 'counter_up' );

		
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		$column = round(12/$atts['column']);
		
		// Built-in icon
		if($atts['et_icon'] != ''){
			$icon = '<i class="icon '.esc_attr($atts['et_icon']).' style="font-size:' . $atts['size'] . 'px;color:' . $atts['color'] . ';"></i>';
		}elseif($atts['et_icon'] != ''){
			$icon = '<i class="icon '.esc_attr($atts['et_icon']).' style="font-size:' . esc_attr($atts['size']) . 'px;"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', esc_attr($atts['icon']) ) ) . '" style="font-size:' . esc_attr($atts['size']) . 'px;"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . esc_url($atts['icon']) . '" width="' . esc_attr($atts['size']) . '" height="' . esc_attr($atts['size']) . '" alt="" />';
		}
		
		return '<div class="counter-main-content col-sm-' .esc_attr($column). '">
					<div class="fun-facts text-center" style="color:'.esc_attr($atts['color']).'">
						<span class="fun-icon">'.$icon.'</span>
						<h3>' .do_shortcode( $content ). '</h3>
						<p class="stat-count">' .esc_html($atts['number']). '</p>
					</div>
				</div>';
	}
	
	public static function partners( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'style' => 'default',
				), $atts, 'partners' );
		
		return '<div id="owl-client" class="owl-client clients">' . do_shortcode( $content ) . '</div>';		
	}
	
	public static function partner( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'image' 		=> '',
				'image_link' 	=> '#',
				'class'			=> '',
				), $atts, 'partner' );
				
		if( $atts['image'] != '' ){
			$image = '<a href="'.esc_url($atts['image_link']).'"><img src="'.esc_url($atts['image']).'" alt="Client-logo" class="img-responsive"></a>';
			}else{
			$image = '';
		}
		
		$return = '<div class="client-logo">'.$image.'</div>';
		
		//ts_query_asset( 'css', 'animate' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'inview' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		return $return;
		
	}
	
	public static function bg_map( $atts = null, $content = null ){
		$atts = shortcode_atts( array(
				'title'        		=> 'How can we help you?',
				'latitude' 			=> '-37.801578',
				'longitude'			=> '145.060508',
				'marker_image'		=> plugins_url( 'assets/images/marker.png', TS_PLUGIN_FILE ),
				'maker_title'		=> 'New York',
				'maker_description'	=> 'Our office in the mitte',
				'height'			=> 300,
			), $atts, 'bg_map' );
			ts_query_asset( 'js', 'bg-map' );
		$output = '';
		$output .='<div id="map" style="height: ' .esc_attr($atts['height']). 'px" class="g_map google-map" data-latitude="' .esc_attr($atts['latitude']). '" data-longitude="' .esc_attr($atts['longitude']). '" data-marker="' .esc_attr($atts['marker_image']). '" data-title="' .esc_attr($atts['maker_title']). '" data-description="' .esc_attr($atts['maker_description']). '"></div>';
		return $output;
	}
	
	public static function banner_slider($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'source'        => '',
				'previous_image' => '',
				'next_image' => '',
				'width' => 1400,
				'height' => 700,
				'class'        	=> '',
			), $atts, 'banner_slider' );
			
			$output = '';
			$width = $atts['width'];
			$height = $atts['height'];		
			$slides = (array) Ts_Tools::get_slides( $atts );
			if ( count( $slides ) ) {
				$output .= '<div class="banner-slider" data-prev="'.$atts['previous_image'].'" data-next="'.$atts['next_image'].'">';			
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop image
				$i = 1;
				//$image = $slide['image'];
				$arr = ts_image_resize( esc_url($slide['image']), $width, $height );
				$output .= '<div class="item"><img src="' .$arr['url']. '" alt="slider '.$i.'" /></div>';				
				$i++;
			}
			
			$output .= '</div>';
			

		} else $output = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'ts' ) );
		
		return $output;
	}
	
	public static function contact_address($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'title'        	=> 'Head Office',
			'et_icon'		=> '',
			'icon'			=> '',
			'column'        => 2,
			'address' 		=> '',
			'phone'			=> '',
			'fax'			=> '',
			'email'			=> '',
		), $atts, 'contact_address' );
		
		$output = '';
		$column = 12/$atts['column'];
		$column_class = 'col-lg-'.$column. ' col-md-'.$column. ' col-sm-'.$column. ' col-xs-12';
		
		if($atts['et_icon'] != ''){
			$atts['icon'] = '<i class="icon '.esc_attr($atts['et_icon']).'" style="color:'.esc_attr($atts['icon_color']).'"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$atts['icon'] = '<img src="' . $atts['icon'] . '" alt="' . $atts['title'] . '" />';
		}
		ts_query_asset( 'css', 'ts-box-shortcodes' );
			
		$output .='<div class="'.$column_class.' address-main">
			<h3>' .$atts['icon']. ' '.$atts['title'].'</h3>                       
			<div class="address">'.$atts['address'].'</div>';
			
			if($atts['phone'] != ''){
			$output .='<p><i class="fa fa-mobile"></i> '.$atts['phone'].'</p>';
			}
			
			if($atts['fax'] != ''){
				$output .='<p><i class="fa fa-fax"></i> '.$atts['fax'].'</p>';
			}
			
			if($atts['email'] != ''){
				$output .='<p><i class="fa fa-envelope"></i> '.$atts['email'].'</p>';
			}
		$output .='</div>';		
		return $output;
	}
	
	public static function title_subtitle( $atts = null, $content = null ) {
		// Parse attributes
		$atts = shortcode_atts( array(
				'style'				=> 'style_1',				
				'title'				=> '',
				'subtitle'			=> '',
				'color'				=> '#121212',				
				'font_size'			=> 40,
				'et_icon'			=> '',
				'icon'				=> '',
				'icon_color'		=> '#f0f0f0',
				'text_transform'	=> 'uppercase',
				'text_align'		=> 'center',
				'margin_bottom'			=> 80,
				'class'      		=> '',
			), $atts, 'title_subtitle' );
		
		$output = '';
		$styles = 'font-size: ' .$atts['font_size'].'px; color: '.$atts['color'].'; margin-bottom: '.$atts['margin_bottom'].'px;';
		
		$icon = '';
		if($atts['et_icon'] != ''){
			$icon = '<i class="icon '.esc_attr($atts['et_icon']).'" style="color:'.esc_attr($atts['icon_color']).'"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:'.esc_attr($atts['icon_color']).'"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		elseif($atts['icon'] != '') {
			$icon = '<img src="' . esc_url($atts['icon']) . '" alt="' . esc_attr($atts['title']) . '" />';
		}
		if($atts['text_align'] == 'center'){
			$class = 'text-center';
			$lead_css = 'margin: 0 auto;';
		} elseif($atts['text_align'] == 'right'){
			$class = 'text-right';
			$lead_css = 'margin: 0;';
		} else {
			$class = 'text-left';
			$lead_css = 'margin: 0;';
		}

		$output .= '<div class="ts-title-'.esc_attr($atts['style']).' section-title '.esc_attr($class).'" style="' .esc_attr($styles). '">
				<h3 style="text-transform:' .esc_attr($atts['text_transform']).'; color: '.esc_attr($atts['color']).';"><span class="font-backend">'.$icon.'</span> <span class="colored-text">'.esc_html($atts['title']).'</span><span class="bottom-botder"></span></h3>
				<p class="lead" style="'.esc_attr($lead_css).'">'.esc_html($atts['subtitle']).'</p>
			</div>';
		
		return $output;
	}
	
	public static function skills( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title' => 'Wordpress',
				'percent' => '80',
				'background' => '#ffffff',
				'activebackground' => '#121212'
			), $atts, 'skills' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );

		return '
		<div class="skills">
			<p>'.esc_html($atts['title']).'</p>
			<div class="progress">
				<div class="progress-bar" role="progressbar" data-transitiongoal="'.esc_attr($atts['percent']).'"><span>'.esc_html($atts['percent']).'</span></div>
			</div>
		</div>';
	}
	
	public static function pricing_table( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/pricing-loop.php',
				'posts_per_page'      => '3',
				'order'               => 'DESC',
				'orderby'             => 'date',
			), $atts, 'pricing_table' );

		$original_atts = $atts;

		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		
		$args = array(
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => 'pricing',
			'posts_per_page' => $posts_per_page,
		);
		
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Ts_Tools::error( __FUNCTION__, __( 'template not found', 'ts' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return $output;
	}
	
	public static function color_overlay( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'background' => '#000000',
				'opacity' => '0.5',
				
			), $atts, 'color_overlay' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );

		$background_color = $atts['background'];
		$background = ts_hex2rgb($atts['background'], ',');
		return '<div class="ts-background-overlay" style="background:rgba('.$background.', '.$atts['opacity'].');"></div>';
	}
	
	public static function background_video(  $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'videoid'		=> 'TwIEOkZ-e7I',
				'video_title'	=> 'Video Background Section',
				'video_des' 	=> '',
				'background' 	=> '#f3b723',
				'opacity' 		=> '0.8',
				'playvideo'		=> 'PLAY / STOP',
				'opensound'		=> 'SOUND / MUTE',
				'image'			=> '',				
				
			), $atts, 'color_overlay' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );

		$background_color = $atts['background'];
		$background = ts_hex2rgb($atts['background'], ',');
		return '<div class="youtubevideo" data-videoid="'.$atts['videoid'].'">
            <div class="video-overlay" style="background:rgba('.$background.', '.$atts['opacity'].');"></div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="videobg text-left">
                            <h1>'.$atts['video_title'].'</h1>
                            <p>'.$atts['video_des'].'</p>
                            <button id="playvideo" class="btn btn-home">'.$atts['playvideo'].'</button> 
                            <button id="opensound" class="btn btn-home">'.$atts['opensound'].'</button> 
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-6">
                         <div class="text-center image-center image-center2">
                            <img src="'.esc_url($atts['image']).'" alt="" class="img-responsive wow fadeInUp">
                        </div>
                    </div>
                </div><!-- end row -->
        </div><!-- end section -->';
	}
	
	public static function text_sliders(  $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',		
			), $atts, 'text_sliders' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<div id="slides">
					<ul class="slides-container">'.do_shortcode($content).'</ul>
					 <nav class="slides-navigation">
						<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
						<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
					</nav>
				</div>';
	}
	
	public static function text_slider(  $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'sub_title'		=> 'Responsive Design & Retina Display',
				'title'			=> 'We are awesomeness',				
			), $atts, 'text_slider' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		
		return '<li>
					<div class="message welcome-text">
						<h1 class="main-title">'.$atts['sub_title'].'</h1>
						<h2>'.$atts['title'].'</h2>
						'.do_shortcode($content).'
					</div>
				</li>';
	}
	
	public static function slide_shows(  $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',		
			), $atts, 'slide_shows' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<div id="slides_show">
					<ul class="slides-container">'.do_shortcode($content).'</ul>
					 <nav class="slides-navigation">
						<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
						<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
					</nav>
				</div>';
	}
	
	public static function slide_show(  $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'image'			=> '',
				'text_align'	=> 'center',			
			), $atts, 'slide_show' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		
		return '<li style="background: url('.$atts['image'].');">
		
		<div class="message welcome-text text-'.$atts['text_align'].'">'.do_shortcode($content).'</div><div class="slider-overlay-color"></div>
		</li>';
	}
	
	public static function products_carousel( $atts = null, $content = null ) {
		$return = '';
		global $wpdb, $post;
		$atts = shortcode_atts( array(
				'ids' => '',
				'posts_per_page'    => 9,
			), $atts, 'products_carousel' );

		$args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'orderby' =>'date','order' => 'DESC' );
		if($atts['ids'] != ''){
			$arr = explode(',', $atts['ids']);
			$args['post__in'] = $arr;
		}
        $loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			// Prepare unique ID

			// Open slider
			$return .= '<div id="owl-shop" class="owl-shop text-center">';
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
            $return .= '<div class="shop-carousel">
                       <div class="shop-box">';
					   if ( has_post_thumbnail( $post->ID ) ){
					   $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					   $arr = ts_image_resize( $image[0], 744, 938 );
                            $return .= '<div class="shop-image entry">
                                <a href="'.esc_url(get_permalink()).'"><img src="'.esc_url($arr['url']).'" alt="" class="img-responsive"></a>
                                <div class="magnifier">
                                    <div class="shop-buttons">
                                        <a class="btn btn-white" href="'.esc_url(get_permalink()).'" rel="bookmark">'. esc_html__('Add to Cart', 'catalog'). '</a>
                                    </div>
                                </div><!-- end magnifier -->
                            </div>';
					   }
                       
					   $return .= '<div class="shop-title">
                                <h3><a href="'.esc_url(get_permalink()).'" title="">'.get_the_title().'</a></h3>
                            </div><!-- end blog-title -->
                            <div class="meta">';
								/*$return .= get_the_term_list( $post->ID, 'product_cat', '<span>' .esc_html__('In: ', 'catalog'), ',<span></span>', '</span>' );
								$return .='<span>|</span>';	*/							
                                $return .='<span>' .esc_html__('Price : ', 'catalog'). '<a href="'.esc_url(get_permalink()).'" title="">'.$product->get_price_html().'</a></span>
                            </div><!-- end meta -->
                        </div><!-- end blog-wrap -->
                    </div><!-- end col -->';
					endwhile;                   
           $return .= '</div>';

		}
		
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, esc_html__( 'Products not found', 'catalog' ) );
		wp_reset_postdata();
		return $return;
	}
	
	public static function product_categories( $atts = null, $content = null ) {
		$return = '';
		global $wpdb, $post, $woocommerce, $product;
		$atts = shortcode_atts( array(
				'number'    => 12,
				'include'	=> '',
			), $atts, 'product_categories' );
			
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => false,
				'number'	=> $atts['number'],
				'include'	=> $atts['include'],
			) );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
				$return = '<div class="row">';
				foreach ( $terms as $term ) {
					$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					if($image != ''){
						$arr = ts_image_resize( $image, 800, 800 );
						$image = $arr['url'];
					} else {
						$image = 'http://placehold.it/800x800';
					}
				$return .= '<div class="col-md-3 col-sm-6">
					<div class="item-box">
						<div class="item-media entry">
							
							<a href="' . esc_url( get_term_link( $term ) ) . '">
							<div class="background-img-details"></div>
							<img src="'.$image.'" alt="" class="img-responsive"></a>
							<div class="theme__button">
								<a href="' . esc_url( get_term_link( $term ) ) . '" title=""><i class="fa fa-link"></i></a>
							</div>
						</div><!-- end item-media -->
						<h4><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></h4>
					</div><!-- end item-box -->
				</div>';
				}
			}
			$return .= '</div>';
			return $return;
	}
	
	public static function progress_bar( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'		=>'default',
				'title' => 'SEO & SEM',
				'percent' => '95',
				'activebackground' => '#f3b723'
			), $atts, 'progress_bar' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		if($atts['style'] == 'style_2'){
			$percent_value = $atts['percent'];
		}else{
			$percent_value = intval($atts['percent']/2);
		}
		
		if($atts['style'] == 'style_3'){
			$style = 'top: 0;';
		} else {
			$style = 'bottom: 0;';
		}

		$html = '
		<div class="piechart-value ts_'.$atts['style'].'">
			<div class="ts-progress-bar">
				<div class="progress-pie text-center">
					<div class="progress-chart" data-percent="'.$percent_value.'%" data-activebackground="'.$atts['activebackground'].'">
						<span class="pro-percent" style="">'.$atts['percent'].'%</span>
					</div>
					<h2>'.$atts['title'].'</h2>
				</div>';
				if($atts['style'] != 'style_2'){
				$html .='<div class="progress_overlay" style="' .$style. '"></div>';
				}
			$html .='</div>
			
		</div>';
		
		return $html;
	}
	
	public static function angle_background_shape( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'background' => '#fcc71f',
				'position'	=> 'left_top',
				'height'	=> '110',
				'width'		=> '220',
			), $atts, 'angle_background_shape' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );

		$style = '';
		if($atts['position'] == 'left_top'){
			$style = 'border-bottom: '.$atts['height'].'px solid '.$atts['background'].'; border-right: '.$atts['width'].'px solid transparent; top: -'.$atts['height'].'px; left: 0; right: auto; bottom: auto;';
		} elseif($atts['position'] == 'left_bottom'){
			$style = 'border-top: '.$atts['height'].'px solid '.$atts['background'].'; border-right: '.$atts['width'].'px solid transparent; top: auto; left: 0; right: auto; bottom: -'.$atts['height'].'px;';
		} elseif($atts['position'] == 'right_top'){
			$style = 'border-bottom: '.$atts['height'].'px solid '.$atts['background'].'; border-left: '.$atts['width'].'px solid transparent; 
			top: -'.$atts['height'].'px; left: auto; right: 0; bottom: auto';
		} elseif($atts['position'] == 'right_bottom'){
			$style = 'border-top: '.$atts['height'].'px solid '.$atts['background'].'; border-left: '.$atts['width'].'px solid transparent; top: auto; left: auto; right: 0; bottom: -'.$atts['height'].'px;';
		}
		return '<div class="angle-background-shape" style="'.$style.';"></div>';
	}
	
	public static function socials_icons($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'align'     => 'center',
			), $atts, 'socials_icons' );
			
			$output = '';
			$output .='<div class="ts-socials-icons '.$atts['align'].'">'.do_shortcode($content).'</div>';
		return $output;
	}
	
	public static function socials_icon($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'name'     => 'facebook',
				'link'      => '#',
				'icon'     => 'icon:facebook',
				'size'		=> 14
			), $atts, 'socials_icon' );
			
			$output = '';
			
			$line_height = $atts['size']*2;
			
			if($atts['link'] != '' && $atts['name']){
			$output .='<div class="ts-social-width">
                    <a href="' .esc_url($atts['link']). '" class="social-blocks" target="' .$atts['name']. '" style="width: '.$line_height.'px;font-size: ' .$atts['size']. 'px; line-height: ' .$line_height. 'px;">';
                            if ( $atts['icon'] ) {
								if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
									$output .= '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></i>';
									ts_query_asset( 'css', 'font-awesome' );
								}
								else $output .= '<img src="' . esc_url($atts['icon']) . '" alt="social icon" />';
							}
               			$output .='</a>
                </div>';
			}
		return $output;
	}
	
	public static function callout($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'title'     		=> '',
				'button_link'      	=> '',
				'button_text'     	=> '',
				'size'				=> 14
			), $atts, 'callout' );
			
			$output = '';
			
			$line_height = $atts['size']*2;
			
			$output .='<div class="ts-callout">
					<div class="ts-callout-left"><h3>'.$atts['title'].'</h3>
					<p>'.do_shortcode($content).'</p></div>
                    <a href="' .esc_url($atts['button_link']). '" style="padding: 7px '.$line_height.'px;font-size: ' .$atts['size']. 'px; line-height: ' .$line_height. 'px;">'.$atts['button_text'].'</a>
                </div>';
		return $output;
	}
	
	public static function alert_box( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'type' => 'success',
				'text' => 'Success confirmation message here',
			), $atts, 'alert_box' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'css', 'font-awesome' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		if($atts['type'] == 'success'){
			$icon = 'check';
		} elseif($atts['type'] == 'danger'){
			$icon = 'times';
		} elseif($atts['type'] == 'warning'){
			$icon = 'exclamation-triangle';
		}  elseif($atts['type'] == 'info'){
			$icon = 'exclamation';
		}

		return '<div class="alert alert-'.$atts['type'].' alert-dismissible" role="alert">
		<span class="alert-icon"><i class="fa fa-'.$icon.'"></i></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$atts['text'].'</div>';
	}
	
	public static function timer($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'date'     		=> '12/24/2016',
			), $atts, 'timer' );
			
			$output = '';
			
			$date = $atts['date']. ' 23:59:59';
			
			$output .='
			<ul id="datatime" class="list-inline" data-date="'.$date.'">
				<li><span class="days">00</span><p class="days_text">Days</p></li>
				<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
				<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
				<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
			</ul>';
		return $output;
	}
	
	public static function products( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/product-featured.php',
				'posts_per_page'      => '1',
				'taxonomy'            => 'product_cat',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'order'               => 'DESC',
				'orderby'             => 'date',
				'featured'			  => 'yes',
				'view_all_link'			  => '',
			), $atts, 'products' );

		$original_atts = $atts;

		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => 'product',
			'posts_per_page' => $posts_per_page,
			
		);

		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}
		
		if($atts['featured'] == 'yes'){
			$featured = array( 'meta_key' => '_featured','meta_value' => 'yes'  );
			
			$args = array_merge( $args, $featured );
		}

		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Ts_Tools::error( __FUNCTION__, __( 'template not found', 'ts' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return $output;
	}
	
	public static function products_bestseller( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/product-bestseller.php',
				'posts_per_page'      => '12',
				'taxonomy'            => 'product_cat',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'order'               => 'DESC',
				'orderby'             => 'date',
			), $atts, 'products_bestseller' );

		$original_atts = $atts;

		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => 'product',
			'posts_per_page' => $posts_per_page,
			
		);

		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}
		
		$best_seller = array( 'meta_key' => 'total_sales','orderby' => 'meta_value_num' );
		$args = array_merge( $args, $best_seller );

		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Ts_Tools::error( __FUNCTION__, __( 'template not found', 'ts' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return $output;
	}

}

new Ts_Shortcodes;

class Catalog_Shortcodes_Shortcodes extends Ts_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}
