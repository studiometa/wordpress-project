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
class Video extends AbstractBlock {

	/**
	 * Return Field block to use in template
	 * {@inheritdoc}
	 */
	public static function get_block( $name = 'block_video' ) {
		$video_block = new FieldsBuilder( $name );
		$video_block->addText( 'title', array( 'label' => 'Titre de la vidéo' ) )
		->addFile(
			'video',
			array(
				'label'        => 'Vidéo',
				'instructions' => 'Format MP4 à privilégier',
			)
		)
		->addImage(
			'video_cover',
			array(
				'label'        => 'Vidéo cover',
				'instructions' => 'Image de couverture',
			)
		)
		->addText(
			'video_legend',
			array(
				'label'        => 'Légende vidéo',
				'instructions' => 'Caché si non renseigné',
			)
		);

		return $video_block;
	}
}
