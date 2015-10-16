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
define('DB_NAME', 'myslq.wpdemo01.mattjennings.net');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '8Lt8#&F-[$S:PeK2n!P[nSX,6cYWx;bL,`vOcED;yufUin)t4GDdV_Z+VF#{?sU+');
define('SECURE_AUTH_KEY',  'f>?(`d=&Ypi|N]f=C|YR{WNu*%sHw/A)y:y*J/Ctm.?+6Zgf}. DerJT K8z{Rzh');
define('LOGGED_IN_KEY',    '2~aN+NF.:eN}U&il=xa#Vn(`f haH)[V!Nm J*Evd_4F@cmL_.f!-;@^d|k&6&a.');
define('NONCE_KEY',        'C*?CV{g3PM+Ds++K,-_Yk`||;j$@Bp`*9$rw-p!Z&A(b,B#+}}12fd/hK+-m>LyA');
define('AUTH_SALT',        '0xK}YG*V}zV2REW*[jN0bF+y%K~IC-;h .Amy<h0U}|tW+hnFosC45&@5],LAsw6');
define('SECURE_AUTH_SALT', '|9KUF-[6MQ[{VTV3e;S)CXB?q{R>NF{X.X,:  }^Q#* Wd#=$WU2=r?,zL~!}~+c');
define('LOGGED_IN_SALT',   'rC/$HzN_iDZeCrxbx8 ]f.eRKp{Pl6|A#v+[qUX;GZ1/*A(vREhZ=1FrPOb(+oI%');
define('NONCE_SALT',       'X{; &c-mPNT5zO^6tyZDW y-}>4*&Am.cjDP+g.q6t@6We|z(j(?J>;IK+&=~[JG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dsfkji_';

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
