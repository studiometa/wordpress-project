<?php
/**
 *
 * Video Block for templating
 *
 * @see https://github.com/stoutlogic/acf-builder
 * @package Studiometa
 */

namespace Studiometa\Blocks;

use StoutLogic\AcfBuilder\FieldsBuilder;

/** Class **/
class Accordion {

	/**
	 * Return Field block to use in template
	 * @return Object 
	 */
	public static function get_block() {
		$accordion_block = new FieldsBuilder( 'block_accordion' );
		$accordion_block->addRepeater(
			'theme',
			array(
				'label'  => 'Chapitre',
				'layout' => 'block',
			)
		)
			->addText( 'theme_title', array( 'label' => 'Titre du chapitre' ) )
			->addRepeater( 'list' )
				->addText( 'list_title', array( 'label' => 'Titre' ) )
				->addWysiwyg( 'list_content', array( 'label' => 'Contenu' ) )
			->endRepeater()
		->endRepeater();

		return $accordion_block;
	}
}
