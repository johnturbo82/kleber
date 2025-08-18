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
define( 'DB_NAME', 'bitnami_wordpress' );

/** Database username */
define( 'DB_USER', getenv('WORDPRESS_DATABASE_USER') );

/** Database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DATABASE_PASSWORD') );

/** Database hostname */
define( 'DB_HOST', 'mariadb:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'h:^0lMt]d/s,45I& ~6]0H1B(,JKJ D{TkHig203KX&pj7/ lfTq{WR,F!@,LWU5' );
define( 'SECURE_AUTH_KEY',  '-gj@{:j8+5YZh`KS{,kZtPa1 9<p/>`GqUmP5vmR7F[CLJQ39~fGjX74CeN=6V2@' );
define( 'LOGGED_IN_KEY',    '.Z*za:s%VZ-a[c{m$ui?<6io8,E^CI(Ek~fL1l(a.4BknF$ZPt{:7_xz]- Yjd^m' );
define( 'NONCE_KEY',        '6iP5bTqPrTq-(-c*7Wr:swl)>b^9zxR#:l#5H2-57iL)CdL$x9tT0H/E?SdVW_n]' );
define( 'AUTH_SALT',        'E}[&Je&FH*0PB;x;kf4!lj,/UV@,Y%9OW><Xs(zmk`,q,*#VMcrUa2~Xg3ltK<kr' );
define( 'SECURE_AUTH_SALT', 'PNqHw(0ipQz8@Qo@^stH.dNHsLwc=!G]^=bu|Ol.;8g..yUoXRoV&L4Qy8W_X#Q0' );
define( 'LOGGED_IN_SALT',   'J8SJdxoy6[aJTCy+:0=-zFF!g_*{$2L^5/+:$<FnO$*|a=1n|i6o#(`hg`f?/q9R' );
define( 'NONCE_SALT',       ')e=$I.:/ QaPHGeWY)+OyhVRwg@j.*#S:H5~tQZ`xG06pU*8s7]&J5p?~e`EpZEx' );

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



define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
        $_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_AUTO_UPDATE_CORE', false );

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
        // remove x-pingback HTTP header
        add_filter("wp_headers", function($headers) {
                unset($headers["X-Pingback"]);
                return $headers;
        });
        // disable pingbacks
        add_filter( "xmlrpc_methods", function( $methods ) {
                unset( $methods["pingback.ping"] );
                return $methods;
        });
}