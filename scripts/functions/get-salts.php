<?php

namespace Studiometa\WPInstaller;

use mikehaertl\shellcommand\Command;

function getSalts() {
	$command = new Command( "curl -s 'https://api.wordpress.org/secret-key/1.1/salt/'" );

	if ( $command->execute() ) {
		$output = $command->getOutput();
		$lines = explode( "\n", $output );
		$salts = [];

		foreach ($lines as $line) {
			$matches = [];
			preg_match( "/define\('([A-z]+)',\s+'(.+)'\);/", $line, $matches );
			$salts[$matches[1]] = $matches[2];
		}

		return $salts;
	} else {
		throw $command->getError();
	}
}
