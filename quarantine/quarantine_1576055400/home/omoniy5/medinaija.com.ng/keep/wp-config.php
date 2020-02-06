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
define( 'WP_MEMORY_LIMIT', '256M' );
define('DB_NAME', 'omoniy5_wp726');

/** MySQL database username */
define('DB_USER', 'omoniy5_wp726');

/** MySQL database password */
define('DB_PASSWORD', '3[h(L5AS5p');

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
define('AUTH_KEY',         '5rae0dw82qdkyy1gbubpgooof51jmdk6convld2k9jvpaxunx2jusbgppbz5stt2');
define('SECURE_AUTH_KEY',  'kcbmhg2cq4bhblmpb6pdejcoswb59idmjorhjg88ytxfcegrly3xty82gyk0shwn');
define('LOGGED_IN_KEY',    'siuj59h8zbnzw8qjscj7qgwedjxhjzrxpjiankotxdjdztjlxzmaf0gtoqvta8rr');
define('NONCE_KEY',        'ixaopcuhdrnokaoecsyjaomuymwshts9cixelyitpticirwupljq3dtdjbupugag');
define('AUTH_SALT',        'ptlym49l16e5l24o5xmvkskmdxnjqg3pobnrwrbbkjv53iw87gpujczsjkawtacl');
define('SECURE_AUTH_SALT', 'x860cljhwrewwgvgwnzvg4oeqvq8rnskps9az1gaewswo9y8bhqnwrsuze0msjs3');
define('LOGGED_IN_SALT',   '1jg2ui8j8qzyt1bo7u0kwehyux61zjaem1i6gdrfvwt2cbbjpfcf0csbjmzcg7ym');
define('NONCE_SALT',       'r2zisgq3uirxu98z6ip4n9in0fxej35wdpbyonadlqu9yefvknfmzyfwwhla81y3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp8oaw_';

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
