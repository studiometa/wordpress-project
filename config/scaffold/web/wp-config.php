<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You do not have to use the web site, you can
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

if ( ! file_exists( dirname( __DIR__ ) . '/vendor/autoload.php' ) ) {
	die( '`autoload.php` not found. Did you run `composer install`?' );
}

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create( dirname( __DIR__ ) );
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv( 'DB_DATABASE' ) );

/** MySQL database username */
define( 'DB_USER', getenv( 'DB_USERNAME' ) );

/** MySQL database password */
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );

/** MySQL hostname */
define( 'DB_HOST', getenv( 'DB_HOST' ) );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Do not change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Limit the number of revisions store in the Database */
define( 'WP_POST_REVISIONS', getenv( 'WP_POST_REVISIONS' ) ? (int) getenv( 'WP_POST_REVISIONS' ) : 3 );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define( 'AUTH_KEY', getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY', getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY', getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY', getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT', getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT', getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT', getenv( 'NONCE_SALT' ) );
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv( 'DB_PREFIX' );

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
define( 'WP_DEBUG', getenv( 'APP_DEBUG' ) === 'true' ? true : false );
define( 'WP_DEBUG_DISPLAY', getenv( 'APP_DEBUG' ) === 'true' ? true : false );

if ( getenv( 'APP_ENV' ) !== 'local' ) {
	define( 'AUTOMATIC_UPDATER_DISABLED', true );
	define( 'DISALLOW_FILE_EDIT', true );
	define( 'DISALLOW_FILE_MODS', true );
}

/* That is all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp' );
}

/** Automatically set paths */
define( 'WP_HOME', ( getenv( 'APP_SSL' ) === 'true' ? 'https://' : 'http://' ) . getenv( 'APP_HOST' ) );
define( 'WP_SITEURL', WP_HOME . '/wp' );

/** Configure directory paths if WP core is in a different directory */
define( 'WP_CONTENT_URL', WP_HOME . '/wp-content' );
define( 'WP_CONTENT_DIR', realpath( ABSPATH . '../wp-content/' ) );

/* WP Rocket config */
define( 'WP_ROCKET_EMAIL', getenv( 'WP_ROCKET_EMAIL' ) );
define( 'WP_ROCKET_KEY', getenv( 'WP_ROCKET_KEY' ) );
define( 'WP_CACHE', getenv( 'WP_CACHE' ) === 'true' );

/* Set default theme */
define( 'WP_DEFAULT_THEME', 'studiometa' );

/**
 * Allow WordPress to detect HTTPS when used behind a reverse proxy or a load balancer
 * @see https://codex.wordpress.org/Function_Reference/is_ssl#Notes
 */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
	$_SERVER['HTTPS'] = 'on';
} else if ( isset( $_SERVER['HTTP_CF_VISITOR'] ) ) {
	try {
		$visitor = json_decode( $_SERVER['HTTP_CF_VISITOR'] );
		if ( 'https' === $visitor->scheme ) {
			$_SERVER['HTTPS'] = 'on';
		}
	} catch (\Exception $error) {}
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
