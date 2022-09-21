<?php

namespace Studiometa\WPInstaller;

function randomStr( $length = 5, $chars = "abcdefghijklmnopqrstuvwxyz0123456789" ) {
	return substr( str_shuffle( $chars ), 0, $length );
}

function randomChars( $length = 5 ) {
	return randomStr( $length, "abcdefghijklmnopqrstuvwxyz" );
}

function randomNumber( $length = 5 ) {
	return randomStr( $length, "0123456789" );
}
