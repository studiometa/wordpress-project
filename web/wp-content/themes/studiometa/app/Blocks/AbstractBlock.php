<?php
/**
 *
 * Abstract Block class.
 *
 * @see https://github.com/stoutlogic/acf-builder
 * @package Studiometa
 */

namespace Studiometa\Blocks;

use StoutLogic\AcfBuilder\FieldsBuilder;

/** Interface **/
abstract class AbstractBlock implements BlockInterface {
	/**
	 * Get Field Block
	 *
	 * @param  string $name key name.
	 * @return FieldsBuilder
	 */
	public static function get_block( string $name ) {
		return new FieldsBuilder( $name );
	}
}
