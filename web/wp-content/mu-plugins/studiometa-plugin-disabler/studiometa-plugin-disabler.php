<?php
/**
 * Plugin Name: Studio Meta - Plugin Disabler
 * Description: Disable plugins depends on environment.
 * Version: 1.0.0
 * Author: Studio Meta
 * Author URI: https://www.studiometa.fr/
 *
 * @package    studiometa/create-wordpress-project
 * @author     Studio Meta <agence@studiometa.fr>
 * @copyright  2021 Studio Meta
 * @license    https://opensource.org/licenses/MIT
 * @version    1.0.0
 */

/**
 * StudiometaPluginDisabler class.
 */
class StudiometaPluginDisabler {
	/**
	 * Disable plugins.
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! defined( 'WP_ENV' ) ) {
			return;
		}

		$plugins_to_disable_raw = getenv( 'DISABLE_PLUGINS_' . strtoupper( WP_ENV ) );

		if ( ! $plugins_to_disable_raw ) {
			return;
		}

		$plugins_to_disable = array_filter( explode( ',', $plugins_to_disable_raw ) );

		if ( empty( $plugins_to_disable ) || ! is_array( $plugins_to_disable ) ) {
			return;
		}

		new DisablePlugins( $plugins_to_disable );
	}
}

require_once __DIR__ . '/includes/class-disableplugins.php';

StudiometaPluginDisabler::init();
