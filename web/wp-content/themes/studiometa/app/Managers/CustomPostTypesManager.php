<?php
/**
 * Bootstrap the custom post types.
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;
use Studiometa\WPToolkit\Builders\PostTypeBuilder;

/** Class **/
class CustomPostTypesManager implements ManagerInterface {
	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_action( 'init', array( $this, 'register_custom_post_type_sample' ), 1 );
		add_filter( 'Timber\PostClassMap', array( $this, 'set_timber_classmap' ) );
	}

	/**
	 * Register a custom post type "Sample".
	 *
	 * Use one method per custom post type.
	 * Use PostTypeBuilder from studiometa/wp-toolkit to register the post type.
	 *
	 * @see https://github.com/studiometa/wp-toolkit
	 *
	 * @return void
	 */
	public function register_custom_post_type_sample() {
		$cpt = new PostTypeBuilder( 'sample' );
		$cpt->set_labels( 'Sample', 'Samples' )
			->register();
	}

	/**
	 * Set the class map for Timber instantiation of posts.
	 *
	 * @param string $post_class The default post class.
	 * @return string[] The project's class map.
	 */
	public function set_timber_classmap( string $post_class ): array {
		$post_types         = get_post_types();
		$class_map          = array();
		$exclude_post_types = array(
			'acf-field',
			'acf-field-group',
			'attachment',
			'custom_css',
			'customize_changeset',
			'nav_menu_item',
			'oembed_cache',
			'revision',
			'user_request',
			'wp_block',
			'wp_template',
			'wp_navigation',
			'wp_template_part',
			'wp_global_styles',
		);

		foreach ( $post_types as $key => $post_type ) {
			// Do not change the class_map of default WordPress post_types.
			if ( in_array( $post_type, $exclude_post_types, true ) ) {
				continue;
			}

			$class_map[ $key ] = '\Studiometa\Models\\' . ucfirst( $key );
		}

		return $class_map;
	}
}
