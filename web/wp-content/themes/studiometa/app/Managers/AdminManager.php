<?php
/**
 * Bootstraps Admin related functions.
 *
 * @package Studiometa
 */

namespace Studiometa\Managers;

use Studiometa\WPToolkit\Managers\ManagerInterface;

/** Class */
class AdminManager implements ManagerInterface {
// phpcs:ignore Generic.Commenting.DocComment.MissingShort
	/**
	 * @inheritDoc
	 */
	public function run() {
		add_filter( 'login_headerurl', array( $this, 'custom_login_logo_url' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'change_login_logo' ) );
	}

	/**
	 * Custom link on login page for the logo
	 *
	 * @param String $url URL.
	 * @return String new url for the logo
	 */
	public function custom_login_logo_url( $url ) {
		return home_url();
	}

	/**
	 * Enqueue scripts for the admin
	 */
	public function enqueue_scripts():void {
		wp_enqueue_script( 'linked_content_script', get_template_directory_uri() . '/src/js/admin/index.js', array(), '1', true );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function change_login_logo() {
		wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/dist/css/admin/login-style.css', array(), '1' );
	}
}
