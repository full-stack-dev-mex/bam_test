<?php

/**
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           BAM_Ads_test
 *
 * @wordpress-plugin
 * Plugin Name:       Born Again Media - Ads Plugin Test for Elias Escalante
 * Plugin URI:        http://example.com/bam-ads-test-uri/
 * Description:       Implement a plugin of a basic Ad System for WordPress for authors to add, edit, and remove ads. Each ad has the following attributes:
 * Version:           1.0.0
 * Author:            Elias Escalante
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bam-ads-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BAM_BANNER_TEST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bam-ads-test-activator.php
 */
function activate_bam_ads_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bam-ads-test-activator.php';
	BAM_Ads_test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bam-ads-test-deactivator.php
 */
function deactivate_bam_ads_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bam-ads-test-deactivator.php';
	BAM_Ads_test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bam_ads_test' );
register_deactivation_hook( __FILE__, 'deactivate_bam_ads_test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bam-ads-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bam_ads_test() {

	$plugin = new BAM_Ads_test();
	$plugin->run();

}
run_bam_ads_test();
