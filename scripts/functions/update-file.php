<?php

namespace Studiometa\WPInstaller;

function getFilePath( $path ) {
	return sprintf( '%s/../%s', dirname( __DIR__ ),  $path );
}

function writeFile( $path, $content ) {
	return file_put_contents( getFilePath( $path ), $content );
}

function readFile( $path ) {
	return file( getFilePath( $path ) );
}

function updateFile( $path, $newLines ) {
	echo "\nUpdating $path...";
	$file = readFile( $path );

	// Update lines
	foreach ( $newLines as $index => $value ) {
		if ( ! empty( $value) ) {
			$file[$index] = $value . "\n";
		}
	}

	// Remove lines last to avoid index errors
	foreach ( $newLines as $index => $value ) {
		if ( empty( $value) ) {
			unset( $file[$index] );
		}
	}

	writeFile( $path, $file );
}
