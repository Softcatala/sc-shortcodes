<?php


// disable xdebug backtrace
if ( function_exists( 'xdebug_disable' ) ) {
	xdebug_disable();
}
echo 'Welcome to the SC Shortcodes Test Suite' . PHP_EOL;
echo 'Version: 1.0' . PHP_EOL . PHP_EOL;

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	if( is_dir( '/tmp/wordpress-tests-lib/' ) ) {
		$_tests_dir = '/tmp/wordpress-tests-lib/';
	} else {
		$_tests_dir = '/tmp/wordpress/tests/phpunit/';
	} 
}

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/sc-shortcodes.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );


require_once $_tests_dir . '/includes/bootstrap.php';

