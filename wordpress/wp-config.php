<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// Disable filesystem level changes from WP
if (getenv('ENVIRONMENT') == 'production') {
  define('DISALLOW_FILE_EDIT', true);
  define('DISALLOW_FILE_MODS', true);
}

define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
define('UPLOADS', 'wp-uploads');

// ** MySQL settings - You can get this info from your web host ** //
$url = parse_url($_SERVER['DATABASE_URL'] ? $_SERVER['DATABASE_URL'] : 'mysql://b13413500555e5:a850b7b2@us-cdbr-iron-east-02.cleardb.net/heroku_8aa24dfc4d687e6?reconnect=true');
// $url = parse_url(getenv('DATABASE_URL') ? getenv('DATABASE_URL') : 'mysql://wordpress:wordpress@localhost/wordpress');

/** The name of the database for WordPress */
define('DB_NAME', trim($url['path'], '/'));

/** MySQL database username */
define('DB_USER', $url['user']);

/** MySQL database password */
define('DB_PASSWORD', $url['pass']);

/** MySQL hostname */
if ($url['port'] != NULL) {
  define('DB_HOST', $url['host'] . ':' . $url['port']);
} else {
  define('DB_HOST', $url['host']);
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', getenv('WP_AUTH_KEY') ? getenv('WP_AUTH_KEY') : 'k>Z0R+@1}0{]R%*n%+&GRW|?PAQcT`!F:+~lW*&zFV%(qji<[/cGe,~bPD!<p&n/');
define('SECURE_AUTH_KEY', getenv('WP_SECURE_AUTH_KEY') ? getenv('WP_SECURE_AUTH_KEY') : '5)|K7uHY@|zCvX=),V_+N,#fvo-5+QA<UT@7?C91+)&h-$UDk{%JUZn?H: AY`rj');
define('LOGGED_IN_KEY', getenv('WP_LOGGED_IN_KEY') ? getenv('WP_LOGGED_IN_KEY') : '6+3_S|I72{ #EkG1g/Nz8Km?t?yC(sC+WE9&&j@Y}$a-!vjU:a/hW9mR=wrt6*,u');
define('NONCE_KEY', getenv('WP_NONCE_KEY') ? getenv('WP_NONCE_KEY') : ':TO|A(/~6t[LHWUom/MB?C/ XlVo(?Za/+Lz`K}|Rg?zD u8W:Y;mp,E33-d<$v)');
define('AUTH_SALT', getenv('WP_AUTH_SALT') ? getenv('WP_AUTH_SALT') : 'w2e6tOi83y|Ug+.4rhX7%-&bRn&Fbw-RJZP:7vgk/|<niJ.tn]L S6lFA&XiH1@y');
define('SECURE_AUTH_SALT', getenv('WP_SECURE_AUTH_SALT') ? getenv('WP_SECURE_AUTH_SALT') : ':V fTvP~KV/@tL.1`dH|1ROktygxA;N[b(U{yFKZZ -~YYbX.k:+oIbZ|K7i7nM|');
define('LOGGED_IN_SALT', getenv('WP_LOGGED_IN_SALT') ? getenv('WP_LOGGED_IN_SALT') : 'Fy,HW_Jz}l:i]y8VR:N[kH0||PiEAb|)G%eTKAbL[a&]/P^6u-B}IkjB#{h<~*KG');
define('NONCE_SALT', getenv('WP_NONCE_SALT') ? getenv('WP_NONCE_SALT') : 'B^uGZ-&_3|-&~| <![wR_Q4 JMmEPp+h-aK5> }jiIl06H:,X?-DvB +0F|S&-~J');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
// define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
