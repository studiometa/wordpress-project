<?php
/**
 * Bootstrap the custom taxonomies
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;
use Studiometa\WPToolkit\Builders\TaxonomyBuilder;

/** Class **/
class TaxonomiesManager implements ManagerInterface {
	/**
	 * {@inheritdoc}
	 */
	public function run() {
		add_action( 'init', array( $this, 'register_taxonomy_sample' ), 1 );
	}

	/**
	 * Register a custom taxonomy "sample".
	 *
	 * Use one method per taxonomy.
	 * Use TaxonomyBuilder from studiometa/wp-toolkit to register the taxonomy.
	 *
	 * @see https://github.com/studiometa/wp-toolkit
	 *
	 * @return void
	 */
	public function register_taxonomy_sample() {
		$tax = new TaxonomyBuilder( 'sample-cat' );
		$tax->set_post_types( 'sample' )
			->set_labels( 'Sample Category', 'Sample Categories' )
			->register();
	}
}
