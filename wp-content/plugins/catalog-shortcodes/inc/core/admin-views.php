<?php
class Ts_Admin_Views {
	function __construct() {}

	public static function about( $field, $config ) {
		ob_start();
?>
<div id="ts-about-screen">
	<h1><?php _e( 'Welcome to Catalog Shortcodes', 'catalog' ); ?> <small><?php _e( 'A real swiss army knife for WordPress', 'catalog' ); ?></small></h1>
	<div class="sunrise-inline-menu">
		<a href="http://gndev.info/catalog/" target="_blank"><strong><?php _e( 'Project homepage', 'catalog' ); ?></strong></a>
		<a href="http://gndev.info/kb/" target="_blank"><?php _e( 'Documentation', 'catalog' ); ?></a>
		<a href="http://wordpress.org/support/plugin/catalog/" target="_blank"><?php _e( 'Support forum', 'catalog' ); ?></a>
		<a href="http://wordpress.org/extend/plugins/catalog/changelog/" target="_blank"><?php _e( 'Changelog', 'catalog' ); ?></a>
		<a href="https://github.com/gndev/catalog" target="_blank"><?php _e( 'Fork on GitHub', 'catalog' ); ?></a>
	</div>
	<div class="ts-clearfix">
		<div class="ts-about-column">
			<h3><?php _e( 'Plugin features', 'catalog' ); ?></h3>
			<ul>
				<li><?php _e( '40+ amazing shortcodes', 'catalog' ); ?></li>
				<li><?php _e( 'Power of CSS3 transitions', 'catalog' ); ?></li>
				<li><?php _e( 'Handy shortcodes generator', 'catalog' ) ?></li>
				<li><?php _e( 'International', 'catalog' ); ?></li>
				<li><?php _e( 'Documented API', 'catalog' ); ?></li>
			</ul>
		</div>
		<div class="ts-about-column">
			<h3><?php _e( 'What is a shortcode?', 'catalog' ); ?></h3>
			<p><?php _e( '<strong>Shortcode</strong> is a WordPress-specific code that lets you do nifty things with very little effort.', 'catalog' ); ?></p>
			<p><?php _e( 'Shortcodes can embed files or create objects that would normally require lots of complicated, ugly code in just one line. Shortcode = shortcut.', 'catalog' ); ?></p>
		</div>
	</div>
	<div class="ts-clearfix">
		<div class="ts-about-column">
			<h3><?php _e( 'How does it works', 'catalog' ); ?></h3>
			<a href="http://www.youtube.com/watch?v=lni-w2dtcQY?autoplay=1&amp;showinfo=0&amp;rel=0&amp;theme=light#" target="_blank" class="ts-demo-video"><img src="<?php echo plugins_url( 'assets/images/banners/how-it-works.jpg', TS_PLUGIN_FILE ); ?>" alt=""></a>
		</div>
		<div class="ts-about-column">
			<h3><?php _e( 'More videos', 'catalog' ); ?></h3>
			<ul>
				<li><a href="http://www.youtube.com/watch?v=IjmaXz-b55I" target="_blank"><?php _e( 'Catalog Shortcodes Tutorial', 'catalog' ); ?></a></li>
				<li><a href="http://www.youtube.com/watch?v=YU3Zu6C5ZfA" target="_blank"><?php _e( 'How to use special widget', 'catalog' ); ?></a></li>
				<li><a href="http://www.screenr.com/BK0H" target="_blank"><?php _e( 'How to create Carousel', 'catalog' ); ?></a></li>
				<li><a href="http://www.youtube.com/watch?v=kCWyO2F7jTw" target="_blank"><?php _e( 'How to create image gallery', 'catalog' ); ?></a></li>
			</ul>
		</div>
	</div>
</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		ts_query_asset( 'css', array( 'magnific-popup', 'ts-options-page' ) );
		ts_query_asset( 'js', array( 'jquery', 'magnific-popup', 'ts-options-page' ) );
		return $output;
	}

	public static function custom_css( $field, $config ) {
		ob_start();
?>
<div id="ts-custom-css-screen">
	<div class="ts-custom-css-originals">
		<p><strong><?php _e( 'You can overview the original styles to overwrite it', $config['textdomain'] ); ?></strong></p>
		<div class="sunrise-inline-menu">
			<a href="<?php echo ts_skin_url( 'content-shortcodes.css' ); ?>">content-shortcodes.css</a>
			<a href="<?php echo ts_skin_url( 'box-shortcodes.css' ); ?>">box-shortcodes.css</a>
			<a href="<?php echo ts_skin_url( 'media-shortcodes.css' ); ?>">media-shortcodes.css</a>
			<a href="<?php echo ts_skin_url( 'galleries-shortcodes.css' ); ?>">galleries-shortcodes.css</a>
			<a href="<?php echo ts_skin_url( 'players-shortcodes.css' ); ?>">players-shortcodes.css</a>
			<a href="<?php echo ts_skin_url( 'other-shortcodes.css' ); ?>">other-shortcodes.css</a>
		</div>
		<?php do_action( 'ts/admin/css/originals/after' ); ?>
	</div>
	<div class="ts-custom-css-vars">
		<p><strong><?php _e( 'You can use next variables in your custom CSS', $config['textdomain'] ); ?></strong></p>
		<code>%home_url%</code> - <?php _e( 'home url', $config['textdomain'] ); ?><br/>
		<code>%theme_url%</code> - <?php _e( 'theme url', $config['textdomain'] ); ?><br/>
		<code>%plugin_url%</code> - <?php _e( 'plugin url', $config['textdomain'] ); ?>
	</div>
	<div id="ts-custom-css-editor">
		<div id="sunrise-field-<?php echo $field['id']; ?>-editor"></div>
		<textarea name="sunrise[<?php echo $field['id']; ?>]" id="sunrise-field-<?php echo $field['id']; ?>" class="regular-text" rows="10"><?php echo stripslashes( get_option( $config['prefix'] . $field['id'] ) ); ?></textarea>
	</div>
</div>
			<?php
		$output = ob_get_contents();
		ob_end_clean();
		ts_query_asset( 'css', array( 'magnific-popup', 'ts-options-page' ) );
		ts_query_asset( 'js', array( 'jquery', 'magnific-popup', 'ace', 'ts-options-page' ) );
		return $output;
	}

	public static function examples( $field, $config ) {
		$output = array();
		$examples = Ts_Data::examples();
		$preview = '<div style="display:none"><div id="ts-examples-window"><div id="ts-examples-preview"></div></div></div>';
		$open = ( isset( $_GET['example'] ) ) ? sanitize_key( $_GET['example'] ) : '';
		$open = '<input id="ts_open_example" type="hidden" name="ts_open_example" value="' . $open . '" />';
		$nonce = '<input id="ts_examples_nonce" type="hidden" name="ts_examples_nonce" value="' . wp_create_nonce( 'ts_examples_nonce' ) . '" />';
		foreach ( $examples as $group ) {
			$items = array();
			if ( isset( $group['items'] ) ) foreach ( $group['items'] as $item ) {
					$code = ( isset( $item['code'] ) ) ? $item['code'] : plugins_url( 'inc/examples/' . $item['id'] . '.example', TS_PLUGIN_FILE );
					$id = ( isset( $item['id'] ) ) ? $item['id'] : '';
					$items[] = '<div class="ts-examples-item" data-code="' . $code . '" data-id="' . $id . '" data-mfp-src="#ts-examples-window"><i class="fa fa-' . $item['icon'] . '"></i> ' . $item['name'] . '</div>';
				}
			$output[] = '<div class="ts-examples-group ts-clearfix"><h2 class="ts-examples-group-title">' . $group['title'] . '</h2>' . implode( '', $items ) . '</div>';
		}
		ts_query_asset( 'css', array( 'magnific-popup', 'font-awesome', 'ts-options-page' ) );
		ts_query_asset( 'js', array( 'jquery', 'magnific-popup', 'ts-options-page' ) );
		return '<div id="ts-examples-screen">' . implode( '', $output ) . '</div>' . $preview . $open . $nonce;
	}

	public static function cheatsheet( $field, $config ) {
		// Prepare print button
		$print = '<div><a href="javascript:;" id="ts-cheatsheet-print" class="ts-cheatsheet-switch button button-primary button-large">' . __( 'Printable version', 'catalog' ) . '</a><div id="ts-cheatsheet-print-head"><h1>' . __( 'Catalog Shortcodes', 'catalog' ) . ': ' . __( 'Cheatsheet', 'catalog' ) . '</h1><a href="javascript:;" class="ts-cheatsheet-switch">&larr; ' . __( 'Back to Dashboard', 'catalog' ) . '</a></div></div>';
		// Prepare table array
		$table = array();
		// Table start
		$table[] = '<table><tr><th style="width:20%;">' . __( 'Shortcode', 'catalog' ) . '</th><th style="width:50%">' . __( 'Attributes', 'catalog' ) . '</th><th style="width:30%">' . __( 'Example code', 'catalog' ) . '</th></tr>';
		// Loop through shortcodes
		foreach ( (array) Ts_Data::shortcodes() as $name => $shortcode ) {
			// Prepare vars
			$icon = ( isset( $shortcode['icon'] ) ) ? $shortcode['icon'] : 'puzzle-piece';
			$shortcode['name'] = ( isset( $shortcode['name'] ) ) ? $shortcode['name'] : $name;
			$attributes = array();
			$example = array();
			$icons = 'icon: music, icon: envelope &hellip; <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">' . __( 'full list', 'catalog' ) . '</a>';
			// Loop through attributes
			if ( is_array( $shortcode['atts'] ) )
				foreach ( $shortcode['atts'] as $id => $data ) {
					// Prepare default value
					$default = ( isset( $data['default'] ) && $data['default'] !== '' ) ? '<p><em>' . __( 'Default value', 'catalog' ) . ':</em> ' . $data['default'] . '</p>' : '';
					// Check type is set
					if ( empty( $data['type'] ) ) $data['type'] = 'text';
					// Switch attribute types
					switch ( $data['type'] ) {
						// Select
					case 'select':
						$value = implode( ', ', array_keys( $data['values'] ) );
						break;
						// Slider and number
					case 'slider':
					case 'number':
						$value = $data['min'] . '&hellip;' . $data['max'];
						break;
						// Bool
					case 'bool':
						$value = 'yes | no';
						break;
						// Icon
					case 'icon':
						$value = $icons;
						break;
						// Color
					case 'color':
						$value = __( '#RGB and rgba() colors' );
						break;
						// Default value
					default:
						$value = $data['default'];
						break;
					}
					// Check empty value
					if ( $value === '' ) $value = __( 'Any text value', 'catalog' );
					// Extra CSS class
					if ( $id === 'class' ) $value = __( 'Any custom CSS classes', 'catalog' );
					// Add attribute
					$attributes[] = '<div class="ts-shortcode-attribute"><strong>' . $data['name'] . ' <em>&ndash; ' . $id . '</em></strong><p><em>' . __( 'Possible values', 'catalog' ) . ':</em> ' . $value . '</p>' . $default . '</div>';
					// Add attribute to the example code
					$example[] = $id . '="' . $data['default'] . '"';
				}
			// Prepare example code
			$example = '[%prefix_' . $name . ' ' . implode( ' ', $example ) . ']';
			// Prepare content value
			if ( empty( $shortcode['content'] ) ) $shortcode['content'] = '';
			// Add wrapping code
			if ( $shortcode['type'] === 'wrap' ) $example .= esc_textarea( $shortcode['content'] ) . '[/%prefix_' . $name . ']';
			// Change compatibility prefix
			$example = str_replace( array( '%prefix_', '__' ), ts_cmpt(), $example );
			// Shortcode
			$table[] = '<td>' . '<span class="ts-shortcode-icon">' . Ts_Tools::icon( $icon ) . '</span>' . $shortcode['name'] . '<br/><em class="ts-shortcode-desc">' . $shortcode['desc'] . '</em></td>';
			// Attributes
			$table[] = '<td>' . implode( '', $attributes ) . '</td>';
			// Example code
			$table[] = '<td><code contenteditable="true">' . $example . '</code></td></tr>';
		}
		// Table end
		$table[] = '</table>';
		// Query assets
		ts_query_asset( 'css', array( 'font-awesome', 'ts-cheatsheet' ) );
		ts_query_asset( 'js', array( 'jquery', 'ts-options-page' ) );
		// Return output
		return '<div id="ts-cheatsheet-screen">' . $print . implode( '', $table ) . '</div>';
	}

	public static function addons( $field, $config ) {
		$output = array();
		$addons = array(
			array(
				'name' => __( 'New Shortcodes', 'catalog' ),
				'desc' => __( 'Parallax sections, responsive content slider, pricing tables, vector icons, testimonials, progress bars and even more', 'catalog' ),
				'url' => 'http://gndev.info/catalog/extra/',
				'image' => plugins_url( 'assets/images/banners/extra.png', TS_PLUGIN_FILE )
			),
			array(
				'name' => __( 'Maker', 'catalog' ),
				'desc' => __( 'This add-on allows you to create custom shortcodes. You can easily create any shortcode with different parameters or even override default shortcodes', 'catalog' ),
				'url' => 'http://gndev.info/catalog/maker/',
				'image' => plugins_url( 'assets/images/banners/maker.png', TS_PLUGIN_FILE )
			),
			array(
				'name' => __( 'Skins', 'catalog' ),
				'desc' => __( 'Set of additional skins for Catalog Shortcodes. It includes skins for accordeons/spoilers, tabs and some other shortcodes', 'catalog' ),
				'url' => 'http://gndev.info/catalog/skins/',
				'image' => plugins_url( 'assets/images/banners/skins.png', TS_PLUGIN_FILE )
			),
			array(
				'name' => __( 'Add-ons bundle', 'catalog' ),
				'desc' => __( 'Get all three add-ons with huge discount!', 'catalog' ),
				'url' => 'http://gndev.info/catalog/add-ons-bundle/',
				'image' => plugins_url( 'assets/images/banners/bundle.png', TS_PLUGIN_FILE )
			),
		);
		$plugins = array();
		$output[] = '<h2>' . __( 'Catalog Shortcodes Add-ons', 'catalog' ) . '</h2>';
		$output[] = '<div class="ts-addons-loop ts-clearfix">';
		foreach ( $addons as $addon ) {
			$output[] = '<div class="ts-addons-item" style="visibility:hidden" data-url="' . $addon['url'] . '"><img src="' . $addon['image'] . '" alt="' . $addon['image'] . '" /><div class="ts-addons-item-content"><h4>' . $addon['name'] . '</h4><p>' . $addon['desc'] . '</p><div class="ts-addons-item-button"><a href="' . $addon['url'] . '" class="button button-primary" target="_blank">' . __( 'Learn more', 'catalog' ) . '</a></div></div></div>';
		}
		$output[] = '</div>';
		if ( count( $plugins ) ) {
			$output[] = '<h2>' . __( 'Other WordPress Plugins', 'catalog' ) . '</h2>';
			$output[] = '<div class="ts-addons-loop ts-clearfix">';
			foreach ( $plugins as $plugin ) {
				$output[] = '<div class="ts-addons-item" style="visibility:hidden" data-url="' . $plugin['url'] . '"><img src="' . $plugin['image'] . '" alt="' . $plugin['image'] . '" /><div class="ts-addons-item-content"><h4>' . $plugin['name'] . '</h4><p>' . $plugin['desc'] . '</p>' . Ts_Shortcodes::button( array( 'url' => $plugin['url'], 'target' => 'blank', 'style' => 'flat', 'background' => '#FF7654', 'wide' => 'yes', 'radius' => '0' ), __( 'Learn more', 'catalog' ) ) . '</div></div>';
			}
			$output[] = '</div>';
		}
		ts_query_asset( 'css', array( 'animate', 'ts-options-page' ) );
		ts_query_asset( 'js', array( 'jquery', 'ts-options-page' ) );
		return '<div id="ts-addons-screen">' . implode( '', $output ) . '</div>';
	}
}
