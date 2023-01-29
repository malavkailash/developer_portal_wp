<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '5yInP@0D#H_{6D8%k3ud[u6?YWh/v($eQ}suc[/pkVNS[T/ji2~!H5wAxX)TDSW7' );
define( 'SECURE_AUTH_KEY',  '-Tr]};esn FK4|Bu=}0B$gF|]D70q=3_9Pl}D-osZya)M8D!`a#@D{Z)]Xx*Ae {' );
define( 'LOGGED_IN_KEY',    '#_rKe8.t MUx~5J=e<74LqPlJXqJA[}c-SW*~&:oDxzQw!b7{&Q28Z5gOdFnUoh.' );
define( 'NONCE_KEY',        'e^SeyRUF_[(h, _XS>xj;W|FE5l8ior[?TRKgKj,]vR^&F&GX1{#kWj6&z!&U0=%' );
define( 'AUTH_SALT',        'g27>-)Gh*~>j*}:znkplM^_!lE)Uo53bo8c_pYC ;Q1Y->70Zeo#LwNH>lHH5w[_' );
define( 'SECURE_AUTH_SALT', ' &eR=m,V|b;(Dy2S|o,@x1C`9DDVK~UeJFAo$6Qx 5M~FR&uhvAFT8u[K8zs*!^Y' );
define( 'LOGGED_IN_SALT',   '`qA45#H/6dX :UQ~QYiX3|+2 Pqn1T__!Xnr9Jv;I%h;`j$W6BQVN-&r{BA=Z0x3' );
define( 'NONCE_SALT',       's;y`RbI2yFhXkR=(|W/i ty^_jcJ|#D~aH/n&Cq#:VW=5L>4|t]m-_:[P_5cv&/y' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
