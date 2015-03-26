<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'charlotte');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '0f}G3]=Y0lLIARLm3&<WB+j7)@G_-:IAq,dn-~A.t-Z7<&8+DzA v[~oYINR?2Q&');
define('SECURE_AUTH_KEY',  'lR_jsZ@t2<tr+LEDku^* 5&8[WuFPWDVe|(gp%?GTOYkq]P_oP{OnrCR-1l%UGz=');
define('LOGGED_IN_KEY',    'Vp8]%NB%|wNUp9$9EO{=eI:|=t3ruJxBao}c(mB b{J(3v.FY<b<=]/ ]NW W&N9');
define('NONCE_KEY',        'SPA+Us-}G@Jq]8pK&+(^N4nk/l?%<TlEY^{T_E7f%;A8@|_27WpGsul:Z{&)-Zsl');
define('AUTH_SALT',        ']]w|(UY:!vq80bv0DUh2}=K6vbg~R||L@`g-HQ:is-oePg-7E1Rs1E+{*$-~9fWM');
define('SECURE_AUTH_SALT', 'Yjs$5*=H*,~&R;[})]89D C3``>}h|R2S6[!~g|6gR`~P&cvZTsC4`5pmx?#+B /');
define('LOGGED_IN_SALT',   '@=/JH8-el!kF<O&:M!`@/oqPRn._^?)Q>|<R746|~?`s6Bfu~!ZS$~9QL~I?Wq+`');
define('NONCE_SALT',       '|17Eb2|C-%a.{tq4&v=+9p]7(8m$1IP]qh u46BRd`rc*e-]d.|eA| !y9XP+j%n');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
