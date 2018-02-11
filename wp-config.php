<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wholbuyp_wp605');

/** MySQL database username */
define('DB_USER', 'wholbuyp_wp605');

/** MySQL database password */
define('DB_PASSWORD', '6ecpS.Q[41');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'keezk0zkraowev9kji4zjowo9tc1cqnqqfvm2yffhuknarqmxsty4ibmfd3j9dtp');
define('SECURE_AUTH_KEY',  'zujcgzmhblyupwz2mfopb4yj4kaxsnli9cvkbeyfvblw2to3mpmpicmhmrahd7v8');
define('LOGGED_IN_KEY',    'frc0hpgb2bhmgbx0jfo4jfk7c8znbwgqx5oiefxqg1ytvdccnbchfnuixgqibjaf');
define('NONCE_KEY',        'fjzmwkpeftppdegz7mvtgod1eew4xnnidvjj0zrdewemtvho1afgc3r8xnedcvfr');
define('AUTH_SALT',        'x9kunxjievfwylysg8w1gkwkcakydiit0cl6h5uhydfxftyv3l6zkz80iaxyh9zu');
define('SECURE_AUTH_SALT', 'uan7r0kyprz6uzor8uivgpyn80cxcedz9u3gur5hstfsxiok6epujfxvwehsnjhg');
define('LOGGED_IN_SALT',   'phabd4fwsajjsdohu5gtift572ocvqtv8vxvhnlbiqopiaxjghxy1kcq44ecivth');
define('NONCE_SALT',       '872hjfncajraqc1vvxdszeibjfmmpeh5ubczhfc5xozl81gph6efqrepu3a9ogpd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp7m_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
