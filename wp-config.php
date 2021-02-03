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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woocommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mysql' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$WS~M@Sk#+SVQKeo?&!9T9/Wm,lZ#!4dEO8bliB^s[WG@Z?F|h}x +q.`hzEzHv)' );
define( 'SECURE_AUTH_KEY',  'ecJX;=Izg<w3f#0Wr96MRMhI^!jQ;.V^[z62.w4FTIXJlj9xe45 WxgwN|a#?nTV' );
define( 'LOGGED_IN_KEY',    'E=n2S7L7)juUkr+[N2cR0s-iR< EKw&m=B*,Y(#EwoUipe7/s=u%V]<OG;JFd1&q' );
define( 'NONCE_KEY',        '3lU+#OZyg`Y@>IoCURuhyU+{Fy]FIOZY9pu0 j?8YL}bM<*:(/W,>Ox(&V]b6zMB' );
define( 'AUTH_SALT',        ':FB@B#$5*p?`&F.]toJAm]9{%)(}3`@w=]X1uh?m`&*Rk8>>UqH[+SA%<x3-qfIF' );
define( 'SECURE_AUTH_SALT', 's}73#.Vr%9*AmM71OuRZ?=UssJCsL#pgY?u;{ZhECEIDKR,U+p< |}EmmB8KIF$4' );
define( 'LOGGED_IN_SALT',   'r_VOa:C_fvs4!h>j.R/;FNrgTDOK. Ln^2!rP7 ]5HjTJ/yLd$&7Z KKnXG;Y,za' );
define( 'NONCE_SALT',       'zHEB`|UY]vFqy%eg=6qp_Up:j)3;gf)mX=KPL>z.wJ[2>8]h63((5>%0)Q6BeJZ8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define('WP_DEBUG_DISPLAY', true);
define( 'WP_DEBUG_LOG', '/tmp/wp-errors.log' );
define( 'SCRIPT_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
