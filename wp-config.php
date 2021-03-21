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
define( 'DB_NAME', 'fscode' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'vcPXt-m~Dj%VE-%s-GpgWA>jH(4&/RR?L+(P5dR%$ze7r3vj{J<*n3T>pM98A3(I' );
define( 'SECURE_AUTH_KEY',  'i/!yrf95Q2xhR[Ki$(|vu6xW?-qTPi|K@MVl&>+>BV(+<2i7/.Z^4+w9GXM9B|jm' );
define( 'LOGGED_IN_KEY',    'M-Ytlma7YB2_s=V7#&aE;6;),!j1M;61m!FO|Pai|Ab>4a?MgwZ<oNHgud/bm5(.' );
define( 'NONCE_KEY',        'KCp|FB/dQF 63aroZi t:9wno/gX&HzO,i/>FX&=`hvs)6r.6Ut/.7Ovgg|reCV7' );
define( 'AUTH_SALT',        ',^cDM,tX.9bgKP97./lYU+&dlIp5K[8L0(Dl 7ksSu^$}dq~3wC-YAZmQE}$m[FY' );
define( 'SECURE_AUTH_SALT', '}x8xkVsx!O3EiA1{CzXkm(,EVvv((O;l?,n_26Ht;RzND%-=or26xwa4hDO+eLkm' );
define( 'LOGGED_IN_SALT',   '{q2iVrqPv9sh7VOAF!<jbE<%3LprZ:g.Q}uKwiD-Q4iTW0CnVdr)O~Z%KtW0zkYI' );
define( 'NONCE_SALT',       'qe9q}/DH4EN~yG>=&CGv.Ry}kj#6F[8s%77ks2]2,ERy.Cn}d*L@wfO{Nj0uNGy>' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
