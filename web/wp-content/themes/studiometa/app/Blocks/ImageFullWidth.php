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
class ImageFullWidth {

	/**
	 * Return Field block to use in template
	 * @return Object 
	 */
	public static function get_block() {
		$image_block = new FieldsBuilder( 'block_image_full_width' );
		$image_block->addImage(
			'image',
			array(
				'label'        => 'Image',
				'instructions' => 'Format HD à privilégier',
			)
		);

		return $image_block;
	}
}
