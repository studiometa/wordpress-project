<?php
/**
 * Boostrap ACF
 *
 * Create ACF Fields group with stoutlogic/acf-builder package
 *
 * @see https://github.com/stoutlogic/acf-builder
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;
use StoutLogic\AcfBuilder\FieldsBuilder;

/** Class **/
class ACFManager implements ManagerInterface {
	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'register_acf_builder_group' ) );
	}

	/**
	 * Register acf example field group
	 * Using the content field from the default group
	 *
	 * @return void
	 */
	public function register_acf_builder_group() {
		$builder_group = new FieldsBuilder( 'builder_group', array( 'title' => 'Page builder' ) );
		$builder_group->addFlexibleContent( 'builder', array( 'button_label' => 'Ajouter section' ) )
			->addLayout( 'block_push_img_txt', array( 'label' => 'Bloc Image + Texte' ) )
				->addImage( 'image', array( 'label' => 'Image' ) )
				->addWysiwyg( 'content', array( 'label' => 'Contenu' ) )
				->addLink(
					'cta',
					array(
						'label'             => 'Bouton CTA',
						'instructions'      => 'Ajoute un CTA, si non renseigné il ne sera pas visible',
						'conditional_logic' => 0,
						'return_format'     => 'array',
					)
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
				)
			->addLayout( 'block_wysiwyg', array( 'label' => 'Bloc Texte simple' ) )
				->addWysiwyg(
					'content',
					array(
						'label'   => 'Contenu',
						'toolbar' => 'full',
					)
				)
			->addLayout( 'block_video', array( 'label' => 'Bloc vidéo' ) )
				->addText( 'title', array( 'label' => 'Titre de la vidéo' ) )
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
				)
			->addLayout( 'block_image_full_width', array( 'label' => 'Bloc image pleine largeur' ) )
				->addImage(
					'image',
					array(
						'label'        => 'Image',
						'instructions' => 'Format HD à privilégier',
					)
				)
			->addLayout( 'block_accordeon', array( 'label' => 'Bloc Accordeon' ) )
				->addRepeater(
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
				->endRepeater()
			->setLocation( 'post_type', '==', 'page' );
			acf_add_local_field_group( $builder_group->build() );
	}
}
