<?php
/**
 * Disable emojis by Serge Liatko
 *
 * @package     SergeLiatko\WPDisableEmojis
 * @author      Serge Liatko
 * @copyright   2022 Serge Liatko https://techspokes.com
 * @license     GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name:         Disable emojis by Serge Liatko
 * Plugin URI:          https://github.com/sergeliatko/wp-disable-emojis?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-disable-emojis&utm_content=plugin-link
 * Description:         Disables emojis functionality.
 * Version:             0.0.1
 * Requires at least:   4.4.0
 * Requires PHP:        7.3
 * Author:              Serge Liatko
 * Author URI:          https://techspokes.com?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-disable-emojis&utm_content=author-link
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:         object-gallery-sliderpro
 * Domain Path:         /languages
 */

// do not load this file directly
defined( 'ABSPATH' ) or die( sprintf( 'Please do not load %s directly', __FILE__ ) );

// load namespace
require_once( dirname( __FILE__ ) . '/autoload.php' );

// load plugin text domain
add_action( 'plugins_loaded', function () {

	load_plugin_textdomain(
		'wp-disable-emojis',
		false,
		basename( dirname( __FILE__ ) ) . '/languages'
	);
}, 10, 0 );

// load the plugin
add_action( 'plugins_loaded', array( 'SergeLiatko\WPDisableEmojis\Plugin', 'getInstance' ), 10, 0 );

