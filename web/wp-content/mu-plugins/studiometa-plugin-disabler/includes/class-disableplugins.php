<?php
/**
 * Plugin disabling engine class
 *
 * Inspired by https://gist.github.com/markjaquith/1044546
 *
 * @package    studiometa/create-wordpress-project
 * @author     Studio Meta <agence@studiometa.fr>
 * @copyright  2021 Studio Meta
 * @license    https://opensource.org/licenses/MIT
 * @version    1.0.0
 */

/**
 * DisablePlugins class.
 */
class DisablePlugins {
	/**
	 * Instance.
	 *
	 * @var object
	 */
	public static $instance;

	/**
	 * Disabled plugins.
	 *
	 * @var string[]
	 */
	private $disabled = array();

	/**
	 * Sets up the options filter, and optionally handles an array of plugins to disable
	 *
	 * @param string[] $disables Optional array of plugin filenames to disable.
	 */
	public function __construct( array $disables = null ) {
		/**
		 * Handle what was passed in
		 */
		if ( is_array( $disables ) ) {
			foreach ( $disables as $disable ) {
				$this->disable( $disable );
			}
		}

		/**
		 * Add the filters
		 */
		add_filter( 'option_active_plugins', array( $this, 'do_disabling' ) );
		add_filter( 'site_option_active_sitewide_plugins', array( $this, 'do_network_disabling' ) );

		/**
		 * Allow other plugins to access this instance
		 */
		self::$instance = $this;
	}

	/**
	 * Adds a filename to the list of plugins to disable
	 *
	 * @param string $file File to disable.
	 *
	 * @return void
	 */
	public function disable( $file ) {
		$this->disabled[] = $file;
	}

	/**
	 * Hooks in to the option_active_plugins filter and does the disabling
	 *
	 * @param string[] $plugins WP-provided list of plugin filenames.
	 *
	 * @return string[] The filtered array of plugin filenames
	 */
	public function do_disabling( $plugins ) {
		if ( count( $this->disabled ) ) {
			foreach ( (array) $this->disabled as $plugin ) {
				$key = array_search( $plugin, $plugins, true );
				if ( false !== $key ) {
					unset( $plugins[ $key ] );
				}
			}
		}

		return $plugins;
	}

	/**
	 * Hooks in to the site_option_active_sitewide_plugins filter and does the disabling
	 *
	 * @param string[] $plugins Plugins.
	 *
	 * @return string[]
	 */
	public function do_network_disabling( $plugins ) {
		if ( count( $this->disabled ) ) {
			foreach ( (array) $this->disabled as $plugin ) {
				if ( isset( $plugins[ $plugin ] ) ) {
					unset( $plugins[ $plugin ] );
				}
			}
		}

		return $plugins;
	}
}
