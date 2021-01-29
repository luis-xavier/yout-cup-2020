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
define( 'DB_NAME', 'fucho' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Choco01#' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '>w8HvN,w71Z`E@RWNZEZ~O:sL8C@i|nF9`vcr,c}dbyT$d47/kN,4KG!Y$~fCa^m' );
define( 'SECURE_AUTH_KEY',  'KtfG$&Q~984b2`h19U.G{scbUgb;7M)CkT3wr} AwXDKkAt/egJ/Pmn/v{NHKI#9' );
define( 'LOGGED_IN_KEY',    'Dh$_X0lUrdZjt#W_hA1/:1y*|@+e::ZFB$ECBq#_C>$t O%8Q%M:l7j;sHbQY!s.' );
define( 'NONCE_KEY',        'ozN>dIaqBCKq]DJ=$q!2q7d5[%HPO,`mB4$flO7mNc0U*zcgMjBr*-Np*DD|]5U2' );
define( 'AUTH_SALT',        '5:G!~D&:n29h3X/(ot47A44Hsqm2w14?Y?CUAA)MlO^p!uY8wU~AwAFsO<+utgKF' );
define( 'SECURE_AUTH_SALT', ',Jg1-.55RD4(R,x|TYP(.^WgjG)bG/Do~p`xDD*LaABEDxqi^PD8k;=#;Ql@G@w ' );
define( 'LOGGED_IN_SALT',   '!/-UsYRyikAQA>Mq,w ;xBwv,8.Kgn]3{op@}Xw0<0*aMj~>cLBBE>lM0<1q^/88' );
define( 'NONCE_SALT',       'it|?r86>Pe!@+z8;C|-H#Z%wk9hZ~FsF.b?wR7`n{7,}Jy<SP&C+Cb=Ct]HKhJKU' );


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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
