<?php
/**
 * Bootstraps Twig Extensions and Functions.
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;
use Studiometa\Ui\Extension;

/** Class */
class TwigManager implements ManagerInterface {
	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_filter( 'timber/twig', array( $this, 'add_twig_ui' ) );
		add_filter( 'timber/twig', array( $this, 'add_twig_template_from_string' ) );
		add_filter( 'timber/twig', array( $this, 'add_twig_template_include_comments' ) );
		add_filter( 'timber/output', array( $this, 'add_twig_template_render_comments' ), 10, 3 );
		add_filter( 'timber/loader/loader', array( $this, 'add_svg_path' ), 10, 1 );
	}

	/**
	 * Add Studio Meta's UI extension.
	 *
	 * @link https://ui.studiometa.dev
	 * @param \Twig\Environment $twig The Twig environment.
	 * @return \Twig\Environment
	 */
	public function add_twig_ui( \Twig\Environment $twig ) {
		/**
		 * The Twig loader
		 *
		 * @var \Twig\Loader\FilesystemLoader|null $loader.
		 */
		$loader = $twig->getLoader();
		$twig->addExtension(
			new Extension(
				$loader,
				get_template_directory() . '/templates',
				get_template_directory() . '/static/svg',
			)
		);

		return $twig;
	}

	/**
	 * Adds template_from_string to Twig.
	 *
	 * @link https://twig.symfony.com/doc/2.x/functions/template_from_string.html
	 * @param \Twig\Environment $twig The Twig environment.
	 * @return \Twig\Environment
	 */
	public function add_twig_template_from_string( \Twig\Environment $twig ) {
		$twig->addExtension( new \Twig\Extension\StringLoaderExtension() );
		return $twig;
	}

	/**
	 * Adds template_from_string to Twig.
	 *
	 * @link https://github.com/djboris88/twig-commented-include
	 * @param \Twig\Environment $twig The Twig environment.
	 * @return \Twig\Environment
	 */
	public function add_twig_template_include_comments( \Twig\Environment $twig ) {
		if ( getenv( 'APP_DEBUG' ) === 'false' ) {
			return $twig;
		}

		$twig->addExtension( new \Djboris88\Twig\Extension\CommentedIncludeExtension() );
		return $twig;
	}

	/**
	 * Add debug comments to Timber::render
	 *
	 * @param string  $output HTML.
	 * @param mixed[] $data   Data.
	 * @param string  $file   Name.
	 * @return string
	 */
	public function add_twig_template_render_comments( $output, $data, $file ) {
		if ( getenv( 'APP_DEBUG' ) === 'false' ) {
			return $output;
		}

		return "\n<!-- Begin output of '" . $file . "' -->\n" . $output . "\n<!-- / End output of '" . $file . "' -->\n";
	}

	/**
	 * Add an alias for the SVG folder.
	 *
	 * @example {{ source('@svg/icon.svg') }}
	 * @param \Twig\Loader\FilesystemLoader $fs The loader to extend.
	 * @return \Twig\Loader\FilesystemLoader
	 */
	public function add_svg_path( \Twig\Loader\FilesystemLoader $fs ) {
		$fs->addPath( get_template_directory() . '/static/svg', 'svg' );
		return $fs;
	}
}
