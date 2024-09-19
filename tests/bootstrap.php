<?php
/**
 * PHPUnit bootstrap file
 *
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';


$_tests_dir = getenv( 'WP_TESTS_DIR' );

define( 'TEST_DIR', __DIR__ );
define( 'PHPUNIT_RUNNER', true );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL;
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';


// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
require_once dirname( __DIR__ ) . '/wc-bretagne-2024.php';
// Load additional files.