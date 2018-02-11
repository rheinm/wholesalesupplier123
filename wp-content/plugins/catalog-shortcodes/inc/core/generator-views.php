<?php
/**
 * Shortcode Generator
 */
class Ts_Generator_Views {

	/**
	 * Constructor
	 */
	function __construct() {}

	public static function text( $id, $field ) {
		$field = wp_parse_args( $field, array(
			'default' => ''
		) );
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr" />';
		return $return;
	}

	public static function textarea( $id, $field ) {
		$field = wp_parse_args( $field, array(
			'rows'    => 3,
			'default' => ''
		) );
		$return = '<textarea name="' . $id . '" id="ts-generator-attr-' . $id . '" rows="' . $field['rows'] . '" class="ts-generator-attr">' . esc_textarea( $field['default'] ) . '</textarea>';
		return $return;
	}

	public static function select( $id, $field ) {
		// Multiple selects
		$multiple = ( isset( $field['multiple'] ) ) ? ' multiple' : '';
		$return = '<select name="' . $id . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr"' . $multiple . '>';
		// Create options
		foreach ( $field['values'] as $option_value => $option_title ) {
			// Is this option selected
			$selected = ( $field['default'] === $option_value ) ? ' selected="selected"' : '';
			// Create option
			$return .= '<option value="' . $option_value . '"' . $selected . '>' . $option_title . '</option>';
		}
		$return .= '</select>';
		return $return;
	}

	public static function bool( $id, $field ) {
		$return = '<span class="ts-generator-switch ts-generator-switch-' . $field['default'] . '"><span class="ts-generator-yes">' . __( 'Yes', 'catalog' ) . '</span><span class="ts-generator-no">' . __( 'No', 'catalog' ) . '</span></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr ts-generator-switch-value" />';
		return $return;
	}

	public static function upload( $id, $field ) {
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr ts-generator-upload-value" /><div class="ts-generator-field-actions"><a href="javascript:;" class="button ts-generator-upload-button"><img src="' . admin_url( '/images/media-button.png' ) . '" alt="' . __( 'Media manager', 'catalog' ) . '" />' . __( 'Media manager', 'catalog' ) . '</a></div>';
		return $return;
	}

	public static function icon( $id, $field ) {
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr ts-generator-icon-picker-value" /><div class="ts-generator-field-actions"><a href="javascript:;" class="button ts-generator-upload-button ts-generator-field-action"><img src="' . admin_url( '/images/media-button.png' ) . '" alt="' . __( 'Media manager', 'catalog' ) . '" />' . __( 'Media manager', 'catalog' ) . '</a> <a href="javascript:;" class="button ts-generator-icon-picker-button ts-generator-field-action"><img src="' . admin_url( '/images/media-button-other.gif' ) . '" alt="' . __( 'Icon picker', 'catalog' ) . '" />' . __( 'Icon picker', 'catalog' ) . '</a></div>
		<div class="ts-generator-icon-picker ts-generator-clearfix"><input type="text" class="widefat" placeholder="' . __( 'Filter icons', 'catalog' ) . '" /></div>';
		return $return;
	}

	public static function color( $id, $field ) {
		$return = '<span class="ts-generator-select-color"><span class="ts-generator-select-color-wheel"></span><input type="text" name="' . $id . '" value="' . $field['default'] . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr ts-generator-select-color-value" /></span>';
		return $return;
	}

	public static function gallery( $id, $field ) {
		$shult = catalog_shortcodes();
		// Prepare galleries list
		$galleries = $shult->get_option( 'galleries' );
		$created = ( is_array( $galleries ) && count( $galleries ) ) ? true : false;
		$return = '<select name="' . $id . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr" data-loading="' . __( 'Please wait', 'catalog' ) . '">';
		// Check that galleries is set
		if ( $created ) // Create options
			foreach ( $galleries as $g_id => $gallery ) {
				// Is this option selected
				$selected = ( $g_id == 0 ) ? ' selected="selected"' : '';
				// Prepare title
				$gallery['name'] = ( $gallery['name'] == '' ) ? __( 'Untitled gallery', 'catalog' ) : stripslashes( $gallery['name'] );
				// Create option
				$return .= '<option value="' . ( $g_id + 1 ) . '"' . $selected . '>' . $gallery['name'] . '</option>';
			}
		// Galleries not created
		else
			$return .= '<option value="0" selected>' . __( 'Galleries not found', 'catalog' ) . '</option>';
		$return .= '</select><small class="description"><a href="' . $shult->admin_url . '#tab-3" target="_blank">' . __( 'Manage galleries', 'catalog' ) . '</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="ts-generator-reload-galleries">' . __( 'Reload galleries', 'catalog' ) . '</a></small>';
		return $return;
	}

	public static function number( $id, $field ) {
		$return = '<input type="number" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="ts-generator-attr" />';
		return $return;
	}

	public static function slider( $id, $field ) {
		$return = '<div class="ts-generator-range-picker ts-generator-clearfix"><input type="number" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="ts-generator-attr" /></div>';
		return $return;
	}

	public static function shadow( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ( '0', '0', '0', '#000000' ) : explode( ' ', str_replace( 'px', '', $field['default'] ) );
		$return = '<div class="ts-generator-shadow-picker"><span class="ts-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="ts-generator-sp-hoff" /><small>' . __( 'Horizontal offset', 'catalog' ) . ' (px)</small></span><span class="ts-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[1] . '" class="ts-generator-sp-voff" /><small>' . __( 'Vertical offset', 'catalog' ) . ' (px)</small></span><span class="ts-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[2] . '" class="ts-generator-sp-blur" /><small>' . __( 'Blur', 'catalog' ) . ' (px)</small></span><span class="ts-generator-shadow-picker-field ts-generator-shadow-picker-color"><span class="ts-generator-shadow-picker-color-wheel"></span><input type="text" value="' . $defaults[3] . '" class="ts-generator-shadow-picker-color-value" /><small>' . __( 'Color', 'catalog' ) . '</small></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr" /></div>';
		return $return;
	}

	public static function border( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ( '0', 'solid', '#000000' ) : explode( ' ', str_replace( 'px', '', $field['default'] ) );
		$borders = Ts_Tools::select( array(
				'options' => Ts_Data::borders(),
				'class' => 'ts-generator-bp-style',
				'selected' => $defaults[1]
			) );
		$return = '<div class="ts-generator-border-picker"><span class="ts-generator-border-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="ts-generator-bp-width" /><small>' . __( 'Border width', 'catalog' ) . ' (px)</small></span><span class="ts-generator-border-picker-field">' . $borders . '<small>' . __( 'Border style', 'catalog' ) . '</small></span><span class="ts-generator-border-picker-field ts-generator-border-picker-color"><span class="ts-generator-border-picker-color-wheel"></span><input type="text" value="' . $defaults[2] . '" class="ts-generator-border-picker-color-value" /><small>' . __( 'Border color', 'catalog' ) . '</small></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr" /></div>';
		return $return;
	}

	public static function image_source( $id, $field ) {
		$field = wp_parse_args( $field, array(
				'default' => 'none'
			) );
		$sources = Ts_Tools::select( array(
				'options'  => array(
					'media'         => __( 'Media library', 'catalog' ),
					'posts: recent' => __( 'Recent posts', 'catalog' ),
					'category'      => __( 'Category', 'catalog' ),
					'taxonomy'      => __( 'Taxonomy', 'catalog' )
				),
				'selected' => '0',
				'none'     => __( 'Select images source', 'catalog' ) . '&hellip;',
				'class'    => 'ts-generator-isp-sources'
			) );
		$categories = Ts_Tools::select( array(
				'options'  => Ts_Tools::get_terms( 'category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'ts-generator-isp-categories'
			) );
		$taxonomies = Ts_Tools::select( array(
				'options'  => Ts_Tools::get_taxonomies(),
				'none'     => __( 'Select taxonomy', 'catalog' ) . '&hellip;',
				'selected' => '0',
				'class'    => 'ts-generator-isp-taxonomies'
			) );
		$terms = Ts_Tools::select( array(
				'class'    => 'ts-generator-isp-terms',
				'multiple' => true,
				'size'     => 10,
				'disabled' => true,
				'style'    => 'display:none'
			) );
		$return = '<div class="ts-generator-isp">' . $sources . '<div class="ts-generator-isp-source ts-generator-isp-source-media"><div class="ts-generator-clearfix"><a href="javascript:;" class="button button-primary ts-generator-isp-add-media"><i class="fa fa-plus"></i>&nbsp;&nbsp;' . __( 'Add images', 'catalog' ) . '</a></div><div class="ts-generator-isp-images ts-generator-clearfix"><em class="description">' . __( 'Click the button above and select images.<br>You can select multimple images with Ctrl (Cmd) key', 'catalog' ) . '</em></div></div><div class="ts-generator-isp-source ts-generator-isp-source-category"><em class="description">' . __( 'Select categories to retrieve posts from.<br>You can select multiple categories with Ctrl (Cmd) key', 'catalog' ) . '</em>' . $categories . '</div><div class="ts-generator-isp-source ts-generator-isp-source-taxonomy"><em class="description">' . __( 'Select taxonomy and it\'s terms.<br>You can select multiple terms with Ctrl (Cmd) key', 'catalog' ) . '</em>' . $taxonomies . $terms . '</div><input type="hidden" name="' . $id . '" value="' . $field['default'] . '" id="ts-generator-attr-' . $id . '" class="ts-generator-attr" /></div>';
		return $return;
	}

}
