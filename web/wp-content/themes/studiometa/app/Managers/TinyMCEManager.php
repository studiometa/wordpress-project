<?php
/**
 * Bootstraps TinyMCE related functions.
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;

/** Class */
class TinyMCEManager implements ManagerInterface {
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
				'title'    => __( 'Large title' ),
				'selector' => 'p, h1, h2, h3, h4, h5, h6',
				'classes'  => 'type-h1',
			),
			array(
				'title'    => __( 'Button' ),
				'selector' => 'a',
				'classes'  => 'btn',
			),
		);

		$colors = array(
			'000000', // Hexadecimal color value.
			'Black', // Color name.
			'ffffff',
			'White',
		);

		// Add custom style_formats to TinyMCE.
		$config['style_formats'] = wp_json_encode( $style_formats );

		// Add custom colors to TinyMCE.
		$config['textcolor_map'] = wp_json_encode( $colors );

		return $config;
	}

	/**
	 * Load a custom stylesheet for TinyMCE wysiwyg editor
	 *
	 * @param string $hook_suffix Plugins.
	 * @return string
	 */
	public function add_editor_stylesheet( $hook_suffix ) {
		add_editor_style( get_template_directory_uri() . '/dist/css/admin/editor-style.css' );
		return $hook_suffix;
	}

}
