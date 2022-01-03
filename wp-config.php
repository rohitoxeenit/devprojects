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
define( 'DB_NAME', 'bloomnew' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'dW( 7vqm9i0Fe.j}VBXbQ:.:8Tg}j%KS^=1qlXA0?>|o-%|SZLgq)(J=H/mxTQd4' );
define( 'SECURE_AUTH_KEY',  '+36%4$t1qiN7ixxJcCY)tH}1@~x1_Vs@7J*oC!D5`AOWP}B{#5c1HW7_;F|H]n.e' );
define( 'LOGGED_IN_KEY',    'b%ns=*EiKMZ{S_1$)/ djuku~)vUsiF&uU` ]o8!M2_WZjl$k-KRMdyNWD/> `%H' );
define( 'NONCE_KEY',        'ZB%}uE:!?p[<2oPl<V{I:]z-~ikp7%ZbEX?Qpqm&oe!~#Ps$Wie9;_td9;?T~1iC' );
define( 'AUTH_SALT',        'c79/e:k0H(ROPef}Gs|J5p^m~ofLIy(nNX+flc<*G2dA&UaA/h/<DXT,pDC)WVFf' );
define( 'SECURE_AUTH_SALT', 'BhH08{6_MiyY?A+WBei>@hzWEusdf15p2ffq0CY}{*3yo;,Bd]YfKn`&BwxP|<U^' );
define( 'LOGGED_IN_SALT',   'bCL(S(gpIKf/[#0nwqv|rS5Ig`DT+_4?`:y,=uR<?uY}%Fe<@l}]<Ph^zZ2~.zHX' );
define( 'NONCE_SALT',       '`]()JF*7Tfk!P&lMBy`Y0gLGa<Q)1!s/KI=esh/ksYwV<d1;,na5ivcpjWp.MQ5Z' );

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
