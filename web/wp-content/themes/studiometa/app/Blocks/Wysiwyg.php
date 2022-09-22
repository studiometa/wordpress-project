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
class Wysiwyg {

	/**
	 * Return Field block to use in template
	 * @return Object 
	 */
	public static function get_block() {
		$wysiwyg_block = new FieldsBuilder( 'block_wysiwyg' );
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
