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
class ImageText extends AbstractBlock {

	/**
	 * Return Field block to use in template
	 *
	 * @param string $name block name.
	 */
	public static function get_block( $name = 'block_image_text' ) {
		$push_block = new FieldsBuilder( $name );
		$push_block->addImage( 'image', array( 'label' => __( 'Image', 'studiometa' ) ) )
		->addWysiwyg( 'content', array( 'label' => __( 'Contenu', 'studiometa' ) ) )
		->addLink(
			'cta',
			array(
				'label'         => __( 'Bouton CTA', 'studiometa' ),
				'instructions'  => __( 'Ajoute un CTA, si non renseigné il ne sera pas visible', 'studiometa' ),
				'return_format' => 'array',
			),
		)
		->addRadio(
			'text_position',
			array(
				'label'         => __( 'Position du bloc texte', 'studiometa' ),
				'default_value' => 'left',
				'choices'       => array(
					'left'  => __( 'Gauche', 'studiometa' ),
					'right' => __( 'Droite', 'studiometa' ),
				),
			)
		);

		return $push_block;
	}
}
