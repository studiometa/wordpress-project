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
class Wysiwyg extends AbstractBlock {

	/**
	 * Return Field block to use in template
	 *
	 * @param string $name block name.
	 */
	public static function get_block( $name = 'block_wysiwyg' ) {
		$wysiwyg_block = new FieldsBuilder( $name );
		$wysiwyg_block->addWysiwyg(
			'content',
			array(
				'label'   => 'Contenu',
				'toolbar' => 'full',
			)
		);
		return $wysiwyg_block;
	}
}
