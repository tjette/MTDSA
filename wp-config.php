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
define('DB_NAME', 'mtdsa');

/** MySQL database username */
define('DB_USER', 'tjette');

/** MySQL database password */
define('DB_PASSWORD', 'Futbol20');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// define('WP_HOME','http://localhost:8888/wordpress');
// define('WP_SITEURL','http://localhost:8888/wordpress');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/HOSkZ %}+)Q_I7_<Ue{%Yj$_9C3cn@64Z/Eq2iviBjc5uj2hH>a_uF&+dt95iCv');
define('SECURE_AUTH_KEY',  'kzy.qr]Y.;9Abw8;jmc)lfnhM(tBG{a/nl-Oh/4sh+>[Nv}Kq_7^z1%^(RYx9zP%');
define('LOGGED_IN_KEY',    'fP([5t1<=0Bpf1VXPXH:lVmLu!ao1L DVpoqeU5u5LZ<0HYu>`fC{c.feE; 88lz');
define('NONCE_KEY',        'usUjjT~P:2Wfv ?kuBH{fQkY`=<N8j-8VS%/4T6=ful[FzvD6YTPLhrGQRa&*j]E');
define('AUTH_SALT',        'G(mnH:,&aVFXW[;jvrkE]n 8M&4CUmk]B[g{%<>^c7P)SeJqnca)q:5s2$3-p}jp');
define('SECURE_AUTH_SALT', 'XlansI @ a.KV.tQ$?%=H|l:&(GT%!NZ(U#WS{ #7jnZEg:uF7!!Ov. mj,p8IWf');
define('LOGGED_IN_SALT',   'isoF*Ui0HdGianw=k*+&fdN3?U%3J08X({{kq;<vu+n*{N}DaHj[Toy<VhU|Hph{');
define('NONCE_SALT',       'aYgLH!XXbnw&^-~NE9[qNwxo=U<o>3?R>EU!q&zvZrVRd<{2]<weFjn.ZvbzQX``');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
