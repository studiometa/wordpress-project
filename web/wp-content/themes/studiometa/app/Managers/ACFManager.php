<?php
/**
 * Boostrap ACF
 *
 * Create ACF Fields group with stoutlogic/acf-builder package
 *
 * @see https://github.com/stoutlogic/acf-builder
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;
use StoutLogic\AcfBuilder\FieldsBuilder;

/** Class **/
class ACFManager implements ManagerInterface {
	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'register_acf_example_group' ) );
	}

	/**
	 * Register acf example field group
	 * Using the content field from the default group
	 *
	 * @return void
	 */
	public function register_acf_example_group() {
		$example_group = new FieldsBuilder( 'example_group' );
		$example_group->addImage( 'image' )
			->setLocation( 'post_type', '==', 'post' );
		acf_add_local_field_group( $example_group->build() );
	}
}
