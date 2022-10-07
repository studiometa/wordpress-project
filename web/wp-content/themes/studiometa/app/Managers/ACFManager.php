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
use Studiometa\Blocks\Accordion;
use Studiometa\Blocks\ImageFullWidth;
use Studiometa\Blocks\PushImageText;
use Studiometa\Blocks\Video;
use Studiometa\Blocks\Wysiwyg;

/** Class **/
class ACFManager implements ManagerInterface {
	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'register_acf_builder_group' ) );
	}

	/**
	 * Register acf example field group
	 * Using the content field from the default group
	 *
	 * @return void
	 */
	public function register_acf_builder_group() {
		$builder_group = new FieldsBuilder( 'builder_group', array( 'title' => 'Page builder' ) );
		$builder_group->addFlexibleContent( 'builder', array( 'button_label' => 'Ajouter section' ) )
			->addLayout( Video::get_block() )
			->addLayout( PushImageText::get_block() )
			->addLayout( Wysiwyg::get_block() )
			->addLayout( ImageFullWidth::get_block() )
			->addLayout( Accordion::get_block() )
			->setLocation( 'post_type', '==', 'page' );
			acf_add_local_field_group( $builder_group->build() );
	}
}
