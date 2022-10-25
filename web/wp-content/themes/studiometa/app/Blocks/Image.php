<?php
/**
 *
 * Image Block for templating
 *
 * @see https://github.com/stoutlogic/acf-builder
 * @package Studiometa
 */

namespace Studiometa\Blocks;

use StoutLogic\AcfBuilder\FieldsBuilder;

/** Class **/
class Image extends AbstractBlock {

	/**
	 * Return Field block to use in template
	 *
	 * @param string $name block name.
	 */
	public static function get_block( $name = 'block_image' ) {
		$image_block = new FieldsBuilder( $name );
		$image_block->addImage(
			'image',
			array(
				'label'        => __( 'Image', 'studiometa' ),
				'instructions' => 'Format HD à privilégier',
			)
		);

		return $image_block;
	}
}
