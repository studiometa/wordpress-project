<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\Timber;
use Studiometa\Managers\ACFManager;
use Studiometa\Managers\CustomPostTypesManager;
use Studiometa\Managers\TaxonomiesManager;
use Studiometa\Managers\ThemeManager;
use Studiometa\Managers\TinyMCEManager;
use Studiometa\Managers\TwigManager;
use Studiometa\Managers\WordPressManager;
use Studiometa\WPToolkit\Managers\AssetsManager;
use Studiometa\WPToolkit\Managers\CleanupManager;
use Studiometa\WPToolkit\Managers\ManagerFactory;

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber\Timber' ) ) {
	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	if ( ! is_admin() ) {
		die( 'Timber not activated.' );
	}
}

$timber = new Timber();

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = true;

add_action(
	'after_setup_theme',
	function () {
		$assets_manager = new AssetsManager();

		$managers = array(
			$assets_manager,
			new ThemeManager(),
			new WordPressManager(),
			new TwigManager(),
			new CleanupManager(),
			new CustomPostTypesManager(),
			new TaxonomiesManager(),
			new TinyMCEManager( $assets_manager ),
			new ACFManager(),
		);

		ManagerFactory::init( $managers );
	}
);
