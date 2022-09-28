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
	 * Return Field block to use in template
	 * @return {FieldsBuilder}
	 */
	public static function get_block( string $name ) {}
}
