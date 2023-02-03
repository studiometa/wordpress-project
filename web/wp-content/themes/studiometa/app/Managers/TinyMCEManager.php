<?php
/**
 * Bootstraps TinyMCE related functions.
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;
use Studiometa\WPToolkit\Managers\AssetsManager;

/** Class */
class TinyMCEManager implements ManagerInterface {
	/**
	 * Assets manager.
	 *
	 * @var AssetsManager
	 */
	private $assets_manager;

	/**
	 * Class constructor.
	 *
	 * @param AssetsManager $assets_manager Assets manager.
	 */
	public function __construct( AssetsManager $assets_manager ) {
		$this->assets_manager = $assets_manager;
	}

	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_filter( 'tiny_mce_before_init', array( $this, 'set_editor_config' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_editor_stylesheet' ), 11 );
		add_filter( 'mce_buttons', array( $this, 'add_editor_buttons' ) );
	}

	/**
	 * Add a buttons to the TinyMCE editor
	 *
	 * @param mixed[] $buttons Buttons list.
	 * @return mixed[]
	 */
	public function add_editor_buttons( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	}

	/**
	 * Set TinyMCE Editor config
	 * - add custom style formats dropdown
	 * - add custom colors
	 *
	 * @param mixed[] $config Configuration.
	 * @return mixed[]
	 */
	public function set_editor_config( $config ) {
		$style_formats = array(
			array(
				'title'    => __( 'Titre h1' ),
				'selector' => 'p, h1, h2, h3, h4, h5, h6',
				'classes'  => 'type-h1',
			),
			array(
				'title'    => __( 'Titre h2' ),
				'selector' => 'p, h1, h2, h3, h4, h5, h6',
				'classes'  => 'type-h2',
			),
			array(
				'title'    => __( 'Titre h3' ),
				'selector' => 'p, h1, h2, h3, h4, h5, h6',
				'classes'  => 'type-h3',
			),
			array(
				'title'    => __( 'Titre h4' ),
				'selector' => 'p, h1, h2, h3, h4, h5, h6',
				'classes'  => 'type-h4',
			),
		);

		// Add custom style_formats to TinyMCE.
		$config['style_formats'] = wp_json_encode( $style_formats );

		return $config;
	}

	/**
	 * Load a custom stylesheet for TinyMCE wysiwyg editor
	 *
	 * @return void
	 */
	public function add_editor_stylesheet() {
		$stylesheet = $this->assets_manager->webpack_manifest->asset( 'css/admin/editor-style.css' );

		if ( $stylesheet ) {
			add_editor_style( $stylesheet );
		}
	}
}
