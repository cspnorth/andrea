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
define('DB_NAME', 'andrea');

/** MySQL database username */
define('DB_USER', 'andrea');

/** MySQL database password */
define('DB_PASSWORD', 'T1rans@Lation');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '}F ;|1=<_`!-z$i{EJR^y(,ce4Sm8mr}Q[gdixwI2/W#z18l<3l_/@3V@5s7.y{l');
define('SECURE_AUTH_KEY',  'OF3mS3[~dD47:Rq!kzF[l}9VJo[acAzof^#Ced}*yMn~CDkFv6  *<r~S[hu,:Nu');
define('LOGGED_IN_KEY',    '}TEb%ulhk{*hCf~?(^!ATss;6rZY@<:QhId8.uPSIv+aOh=sehqr`*X|X?z};X;X');
define('NONCE_KEY',        '?%NJA;~nhkE~_Vp@?U$ibN*o_=n>hCJbaNQ0XdfjJRkqCijq`#eiZ3MI0Bdr:m0:');
define('AUTH_SALT',        '9~(2j-FoA]9ErxU;5 es{fleK<Mz_)i=e3+O:FQj9(e8)?5w91Vx/WkP[_xzOs/=');
define('SECURE_AUTH_SALT', '0p$FVw/kvSCjJ/rWd)s.M]$[)P1|oU&4%tJy|OB=)C`Mm;}9A}XY&jE&/W2;|Nl!');
define('LOGGED_IN_SALT',   '1R#T%%A>&o|Z7uVDP< uv[na=c{pb(_`+=L-<EBV`n$KL0u5B9UKRCE,*Jr_v)*Y');
define('NONCE_SALT',       'sLd#:/?f|~zUjvI~?+5T;#L~g+SB)J$2nmUooc 7RVZI,Q4}z)+!)$DhI5?<nXI*');

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
