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
class PushImageText extends AbstractBlock {

	/**
	 * Return Field block to use in template
	 * {@inheritdoc}
	 */
	public static function get_block( $name = 'block_push_img_txt' ) {
		$push_block = new FieldsBuilder( $name );
		$push_block->addImage( 'image', array( 'label' => 'Image' ) )
		->addWysiwyg( 'content', array( 'label' => 'Contenu' ) )
		->addLink(
			'cta',
			array(
				'label'         => 'Bouton CTA',
				'instructions'  => 'Ajoute un CTA, si non renseigné il ne sera pas visible',
				'return_format' => 'array',
			),
		)
		->addRadio(
			'text_position',
			array(
				'label'         => 'Position du bloc texte',
				'choices'       =>
				array(
					'left'  => 'Gauche',
					'right' => 'Droite',
				),
				'default_value' => 'left',
			)
		);

		return $push_block;
	}
}
