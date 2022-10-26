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
use Studiometa\Blocks\Image;
use Studiometa\Blocks\ImageText;
use Studiometa\Blocks\Text;
use Studiometa\Blocks\Video;

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
		// @phpstan-ignore-next-line
		$builder_group->addFlexibleContent( 'builder', array( 'button_label' => __( 'Ajouter section', 'studiometa' ) ) )
			->addLayout( Video::get_block() )
			->addLayout( ImageText::get_block() )
			->addLayout( Text::get_block() )
			->addLayout( Image::get_block() )
			->addLayout( Accordion::get_block() )
			->setLocation( 'page_template', '==', 'page-template-builder.php' );
			acf_add_local_field_group( $builder_group->build() );
	}
}
