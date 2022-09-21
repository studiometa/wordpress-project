<?php

require __DIR__ . '/functions/autoload.php';

use function Studiometa\WPInstaller\{getSalts, randomChars, randomNumber, updateFile, readFile, runCommands};

$name = basename( dirname( __DIR__ ) );

if ( readFile( 'README.md' )[0] !== "# WordPress project\n" ) {
	echo "\nProject already created.";
	die(PHP_EOL);
}

updateFile(
	'package.json',
	[
		1 => sprintf( "  \"name\": \"%s\",", $name ),
		2 => "  \"version\": \"0.0.0\",",
	]
);

updateFile(
	'.ddev/config.yaml',
	[
		0 => sprintf( 'name: %s', $name ),
	]
);

updateFile(
	'README.md',
	[
		0 => sprintf( "# %s", $name ),
		7 => sprintf( 'git clone git@gitlab.com:studiometa/%s.git', $name ),
	]
);

runCommands(
	'Removing unwanted files',
	[
		'rm -rf .github',
	]
);

runCommands(
	'Initialize Git repository',
	[
		'git init',
		'git branch -m master',
		'git add .',
		'git commit -m "Premier commit"',
		'git checkout -b develop',
	]
);

runCommands(
	'Install WordPress',
	[
		'cp .env.example .env',
	]
);

$salts = getSalts();
updateFile(
	'.env',
	[
		0  => sprintf( 'APP_HOST=%s.ddev.site', $name ),
		1  => 'APP_ENV=local',
		2  => 'APP_DEBUG=true',
		3  => 'APP_SSL=true',
		9  => sprintf( 'DB_PREFIX=%s_', randomChars( 3 ) . randomNumber( 2 ) ),
		15 => sprintf( 'AUTH_KEY="%s"', $salts['AUTH_KEY'] ),
		16 => sprintf( 'SECURE_AUTH_KEY="%s"', $salts['SECURE_AUTH_KEY'] ),
		17 => sprintf( 'LOGGED_IN_KEY="%s"', $salts['LOGGED_IN_KEY'] ),
		18 => sprintf( 'NONCE_KEY="%s"', $salts['NONCE_KEY'] ),
		19 => sprintf( 'AUTH_SALT="%s"', $salts['AUTH_SALT'] ),
		20 => sprintf( 'SECURE_AUTH_SALT="%s"', $salts['SECURE_AUTH_SALT'] ),
		21 => sprintf( 'LOGGED_IN_SALT="%s"', $salts['LOGGED_IN_SALT'] ),
		22 => sprintf( 'NONCE_SALT="%s"', $salts['NONCE_SALT'] ),
	]
);

// @todo install wordpress
// @todo dump first DB and add it to Git LFS
// @todo delete self to avoid re-running this file

echo PHP_EOL;
