<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.isparkinfo.com/
 * @since             1.0.0
 * @package           Wp_wps
 *
 * @wordpress-plugin
 * Plugin Name:       WP Woo Products Slider
 * Plugin URI:        https://wordpress.org
 * Description:        A premium quality carousel slider to slide your woo-commerce product. unlimited slider anywhere via short-codes and easy admin setting.For More Support Feel free to ask here https://www.isparkinfo.com/
 * Version:           1.0.0
 * Author:            iSpark IT Services Pvt Ltd. 
 * Author URI:        https://www.isparkinfo.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_wps
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
define( 'Wp_wps', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp_wps-activator.php
 */
function activate_wp_wps() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_wps-activator.php';
	Wp_wps_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp_wps-deactivator.php
 */
function deactivate_wp_wps() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_wps-deactivator.php';
	Wp_wps_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_wps' );
register_deactivation_hook( __FILE__, 'deactivate_wp_wps' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp_wps.php'; 

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_wps() {

	$plugin = new Wp_wps();
	$plugin->run();

}
run_wp_wps();
