<?php

$_root_dir = getcwd();

require_once $_root_dir . '/vendor/autoload.php';

$_env_dir = __DIR__;

if ( is_readable( $_env_dir . '/.env' ) ) {
	Dotenv\Dotenv::createImmutable( $_env_dir )->load();
}

// Features we don't need during testing:
define( 'WP_DEBUG', true );
define( 'DISALLOW_FILE_MODS', true );
define( 'DISABLE_WP_CRON', true );
define( 'WPMU_PLUGIN_DIR', __DIR__ . '/mu-plugins' );

// WARNING WARNING WARNING!
// These tests will DROP ALL TABLES in the database with the prefix named below.
// DO NOT use a production database or one that is shared with something else.
define( 'DB_NAME',     getenv( 'WP_TESTS_DB_NAME' ) ?: 'wordpress_test' );
define( 'DB_USER',     getenv( 'WP_TESTS_DB_USER' ) ?: 'root' );
define( 'DB_PASSWORD', getenv( 'WP_TESTS_DB_PASS' ) ?: '' );
define( 'DB_HOST',     getenv( 'WP_TESTS_DB_HOST' ) ?: 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
