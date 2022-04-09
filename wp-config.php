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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'OwibHMIV9sNbUiHWeZWz98z0C0fHUcgpqieYwTOKENEK7Iy08z6WrFFDkZxQ0TBI06GDq4kXilfZKwyGo0ImUw==');
define('SECURE_AUTH_KEY',  'cNYLonq5+J4zon4p2HPV6Xb/5acTiFRtnk7i+96hp5geH0Zq6XCMAgNDfrrePidA5BO4FZZjtBr52uUT/qWO0A==');
define('LOGGED_IN_KEY',    '7mRuz4uQseKab5w7AilHnb/Qgfp6l4D3iM8PAXeej67UI7vwtDIETqGGB8X+9CrjOQw2sbTA8TvUohV3DQSqjQ==');
define('NONCE_KEY',        'vErBbDfJPnjE4ZH9+VbwzRrJ4jy2LfVAOZndzrZQx+X2LG/1OlnCI9IGSjxN2RXKeZ8XRI56cc+WuorRDC278g==');
define('AUTH_SALT',        'V4jndMfK2pLcIw7741X275xeEoMokbzzePqf3xakhB53KkZV4ku9wuoWEgVR+pS7qqi8bpYAWuz4PsrTMJ/S2Q==');
define('SECURE_AUTH_SALT', 'jFFzapWS2SmC8BvZw7cU4OAorWSCHRDYYGfT6uJr5ccJeY7cWCyuI65rAQfJCIDna9yMwMPEbLyj9p1PPOPZ2A==');
define('LOGGED_IN_SALT',   'd4dJcgIMb7QbxgPBAHZH0zznz09AhvgHBP2JZm1EEKM09H/CxjkbK/endRgNSDo0wFPenY0pYoBxx1sPAuPfrg==');
define('NONCE_SALT',       'HpBUWoXrEt219vuOBqZnlQORd+eAAcW3Hb45pfVzrTO/Tz8MexAomEmPdi9WjrJYJgutXYeM21G/KbFOTJDtxA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
