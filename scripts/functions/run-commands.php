<?php

namespace Studiometa\WPInstaller;

use mikehaertl\shellcommand\Command;

function runCommands( $label, $commands ) {
	echo "\n$label...";

	foreach ( $commands as $command ) {
		$cmd = new Command( $command );
		echo "\nExecuting `$cmd`...";
		if ( $cmd->execute() ) {
			$output = $cmd->getOutput();

			if ( ! empty( $output ) )
			echo "\n$output";
		} else {
			echo $cmd->getError();
		}
	}
}
