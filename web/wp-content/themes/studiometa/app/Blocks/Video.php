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
	 *
	 * @param string $name block name.
	 */
	public static function get_block( $name = 'block_video' ) {
		$video_block = new FieldsBuilder( $name );
		$video_block->addText( 'title', array( 'label' => __( 'Titre de la vidéo', 'studiometa' ) ) )
		->addFile(
			'video',
			array(
				'label'        => __( 'Vidéo', 'studiometa' ),
				'instructions' => __( 'Format MP4 à privilégier', 'studiometa' ),
			)
		)
		->addImage(
			'video_cover',
			array(
				'label' => __( 'Image de couverture', 'studiometa' ),
			)
		)
		->addText(
			'video_legend',
			array(
				'label'        => __( 'Légende vidéo', 'studiometa' ),
				'instructions' => __( 'Caché si non renseigné', 'studiometa' ),
			)
		);

		return $video_block;
	}
}
