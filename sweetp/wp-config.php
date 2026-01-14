<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sweetp_db' );

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
define( 'AUTH_KEY',         ';YKZzWm^OEk e<`GtYm=Ci7k|d@(c8|*sbSU[*P?CWWtgY?+$U *|g}: BBAR55-' );
define( 'SECURE_AUTH_KEY',  'O(@Y=~u2~|$Ppd1D{[H`P}+YKbJ##%I^f*E}YLR)gy5}Zu</?U6&Ha~BhC}hYwM5' );
define( 'LOGGED_IN_KEY',    'on)<w:*+RRFj-P>MQvca<V;]KgdbFf]v6V +NT>Ba23&6wp<+rj)<xr+&gPIDC#y' );
define( 'NONCE_KEY',        '>1Y==f&$7N^Ks:{X*YiX` L]zyMQEb3<x<qa&euAuZ*s&0<82/NUJ)U8Juc.(Tf-' );
define( 'AUTH_SALT',        'DO8<f{B-O@`F5_`Xha2n;{N^(/GZ*.)7FaN}jP^?l[#)@*X9}<6ep[nWOuaY01?<' );
define( 'SECURE_AUTH_SALT', '~1J<.,[4mGT:C6Eycq ;*0WJwj-`$S4qF]LZ-PgSbaWD4iyBFG00s!pOKx!6Y>{T' );
define( 'LOGGED_IN_SALT',   '51Ds|f6Bb8`UHNtG>MI-w4TM_/1YC=ZC.u]F;1.1^biU%[q*ADbR)!jpM^uYMB[0' );
define( 'NONCE_SALT',       'Ix9eX/EP:V]UY<D@^cP3:$G1[pl[-C%6hS%3V5D}{xAF&`n(<Yl:msuLj4(>76K-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
