<?php

namespace Studiometa\WPInstaller;

require __DIR__ . '/functions/autoload.php';

use function Studiometa\WPInstaller\{getSalts};

foreach ( getSalts() as $name => $value ) {
	echo "\n$name=$value";
}

echo PHP_EOL;
