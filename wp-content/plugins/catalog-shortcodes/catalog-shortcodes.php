<?php
/*
  Plugin Name: Catalog Shortcodes
  Plugin URI: http://gndev.info/catalog/
  Version: 1.0
  Author: ThemeStall
  Author URI: http://gndev.info/
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: catalog
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'TS_PLUGIN_FILE', __FILE__ );
define( 'TS_PLUGIN_VERSION', '1.0' );
define( 'TS_ENABLE_CACHE', true );

// Includes
require_once 'inc/vendor/sunrise.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
//require_once 'inc/core/vote.php';
require_once 'inc/core/counters.php';
require_once 'inc/pricing/pricing-post-type.php';
