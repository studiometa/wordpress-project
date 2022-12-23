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
class Accordion extends AbstractBlock {

	/**
	 * Return Field block to use in template
	 *
	 * @param string $name block name.
	 */
	public static function get_block( $name = 'block_accordion' ) {
		$accordion_block = new FieldsBuilder( $name );
		$accordion_block
			->addText( 'title', array( 'label' => __( 'Titre du block', 'studiometa' ) ) )
			->addRepeater( 'list' )
				->addText( 'title', array( 'label' => __( 'Titre', 'studiometa' ) ) )
				->addWysiwyg( 'content', array( 'label' => __( 'Contenu', 'studiometa' ) ) )
			->endRepeater();

		return $accordion_block;
	}
}
