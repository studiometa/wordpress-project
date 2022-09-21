<?php
/**
 * Interface for Managers
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

/** Interface **/
interface ManagerInterface {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run();
}
