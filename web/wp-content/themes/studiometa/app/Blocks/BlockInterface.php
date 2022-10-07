<?php
/**
 *
 * Block Interface.
 *
 * @see https://github.com/stoutlogic/acf-builder
 * @package Studiometa
 */

namespace Studiometa\Blocks;

use StoutLogic\AcfBuilder\FieldsBuilder;

/** Interface **/
interface BlockInterface {

	/**
	 * Get field block
	 *
	 * @param  string $name key name.
	 * @return FieldsBuilder
	 */
	public static function get_block( string $name );
}
