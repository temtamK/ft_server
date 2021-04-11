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
define( 'DB_NAME', 'wordpress' );

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
define('AUTH_KEY',         'AWlG5J3lm1ouJEb3Ak^`rm%4sswiiB^z(*5DuWT4bC$rs|;x-h86xiMm@-.+j2Jf');
define('SECURE_AUTH_KEY',  '@a_;oGh^GWeEL]6WlNje ]@e:2nF1>to_n}D5C~AOl$eiH)hHnS;J*t|FU4|37f|');
define('LOGGED_IN_KEY',    '$o+tAviA.Ts5|VY.=n/!2}_KPd0@g3|Nz%(_sZN7+:e}yMZP@go,9 MKS :EOIN#');
define('NONCE_KEY',        'GAQeld$H{EQ;K4<OqqUEi^UP8xM+/&%;fk.sLnJh[EyAMw|&n&oDn*7A!]U0^z=l');
define('AUTH_SALT',        'zynH$Re${A.RSa-E/ml.$N&9PPA)a53y}4Qq}S-w1}&y@$Fc2}MQ+A:mKf]*2j%l');
define('SECURE_AUTH_SALT', '+4l=>nHT9mPXgI tnIlItq0p%7]=-aFBH<p23|?$~5oHT=O-gI&p*Zi]v&,6$sW9');
define('LOGGED_IN_SALT',   '?$?9q9$sbertg0AU x?z5kwOi8mg..eU]:Co-ot~eK0D7^$ryf[#+&SnVm:<%g4L');
define('NONCE_SALT',       '/<J1Z~fVa .SJw~$fRr$I:RAm+5&vv|yi}~D2a~JYBMF&>7oIWQZ4Wz8 Mn,qZGg');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
