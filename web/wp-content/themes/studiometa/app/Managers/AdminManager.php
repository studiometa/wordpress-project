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
		add_filter( 'admin_footer_text', array( $this, 'studiometa_footer_admin' ) );
		add_filter( 'login_headerurl', array( $this, 'custom_login_logo_url' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'change_login_logo' ) );
	}

	/**
	 * Add Studio Meta signature in admin footer
	 *
	 * @return void
	 */
	public function studiometa_footer_admin() {
		echo 'Made with ❤️ by
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="69" height="11" viewBox="0 0 69 11" enable-background="new 0 0 69 11" xml:space="preserve"><path d="M3.2 9.4c-0.9 0-1.7-0.3-2.5-0.7L0 10.1C0.9 10.7 2.1 11 3.1 11c2.3 0 3.8-1.2 3.8-3.1 0-1.3-0.8-2.3-2.3-2.7L3.4 4.9c-0.8-0.2-1-0.4-1-0.9 0-0.6 0.5-1 1.3-1 0.7 0 1.3 0.2 2.1 0.7l0.9-1.3c-0.8-0.6-1.9-0.9-3-0.9 -1.9 0-3.2 1.1-3.2 2.8 0 0.5 0.1 1 0.4 1.4 0.3 0.6 0.9 0.9 1.8 1.1l1 0.3c0.8 0.2 1.2 0.6 1.2 1.2C4.8 9 4.2 9.4 3.2 9.4M11.5 9.6c-0.3 0.1-0.5 0.1-0.6 0.1 -0.6 0-0.8-0.2-0.8-1.1V5.3h1.1l0.4-1.2h-1.6V2H8.4v2H7.8v1.2h0.7v3.6c0 0.6 0 0.8 0.1 1 0.2 0.6 0.9 1 1.8 1 0.4 0 0.9-0.1 1.4-0.3L11.5 9.6zM18.1 9V4h-1.7V9c-0.1 0.3-0.7 0.7-1.1 0.7 -0.3 0-0.5-0.1-0.6-0.3 -0.1-0.2-0.1-0.5-0.1-1.1V4.1h-1.7v4.5c0 0.7 0 1 0.1 1.3 0.2 0.7 1 1.1 2 1.1 0.7 0 1.3-0.2 1.8-0.7 0.1 0.3 0.3 0.5 0.5 0.7l1.2-0.7C18.2 9.9 18.1 9.5 18.1 9M23.4 9c-0.2 0.2-0.6 0.4-0.9 0.4 -0.9 0-1.2-0.5-1.2-1.9 0-1.5 0.3-2.1 1.1-2.1 0.3 0 0.6 0.1 1 0.4L23.4 9C23.4 9 23.4 9 23.4 9zM23.8 10.8h1.6c-0.1-0.3-0.2-0.8-0.2-2.5V1.1h-1.7v2.3c0 0.4 0 0.9 0 1C23.1 4.1 22.7 4 22.2 4c-1.7 0-2.9 1.5-2.9 3.5s1.1 3.4 2.8 3.4c0.6 0 1.1-0.2 1.6-0.6C23.7 10.6 23.7 10.7 23.8 10.8"/><rect x="26.9" y="3.9" width="1.8" height="6.8"/><path d="M27.8 0c-0.6 0-1.1 0.5-1.1 1.1s0.5 1.1 1.1 1.1 1.1-0.5 1.1-1.1C28.8 0.5 28.4 0 27.8 0"/><path d="M33 9.7c-0.3 0-0.7-0.2-0.9-0.6 -0.1-0.3-0.2-0.9-0.2-1.7 0-0.7 0.1-1.1 0.2-1.5 0.1-0.4 0.5-0.7 0.9-0.7 0.3 0 0.6 0.1 0.8 0.3 0.2 0.3 0.3 0.9 0.3 1.8C34.1 9 33.8 9.7 33 9.7M35.2 4.9c-0.6-0.7-1.3-1-2.3-1 -1.8 0-3 1.4-3 3.5s1.2 3.5 3 3.5c1 0 1.7-0.3 2.2-0.9C35.8 9.4 36 8.6 36 7.4 36 6.3 35.8 5.6 35.2 4.9M47.2 1.6L46 6.1c-0.1 0.6-0.2 1-0.3 1.5 -0.1-0.5-0.1-0.8-0.3-1.5l-1.2-4.6h-2.3l-0.9 9.1h1.8l0.3-4.8c0-0.6 0.1-1.1 0.1-1.6 0.1 0.5 0.2 1.2 0.4 1.6l1.3 4.8h1.6l1.4-5c0.2-0.6 0.2-0.9 0.3-1.4 0 0.5 0 0.9 0.1 1.5l0.3 4.9h1.8l-0.8-9.1C49.6 1.6 47.2 1.6 47.2 1.6zM55.6 6.5h-2v0c0-0.9 0.4-1.5 1-1.5 0.3 0 0.6 0.1 0.8 0.4 0.2 0.2 0.2 0.5 0.2 1L55.6 6.5 55.6 6.5zM54.6 3.8c-0.9 0-1.6 0.3-2.1 0.9 -0.6 0.7-0.8 1.5-0.8 2.7 0 2.1 1.2 3.5 3.2 3.5 0.9 0 1.8-0.3 2.5-0.9l-0.7-1c-0.6 0.4-1.1 0.7-1.7 0.7 -0.9 0-1.4-0.6-1.4-1.6V7.8h3.9V7.4c0-1.4-0.3-2.3-0.9-2.9C56.1 4 55.4 3.8 54.6 3.8M61.4 9.6c-0.6 0-0.8-0.2-0.8-1.1V5.1h1.1l0.4-1.2h-1.6v-2H59v2h-0.7v1.2h0.7v3.6c0 0.6 0 0.8 0.1 1 0.2 0.6 0.9 1 1.8 1 0.4 0 0.9-0.1 1.4-0.3l-0.2-1C61.8 9.5 61.6 9.6 61.4 9.6M66.6 9.1c-0.3 0.3-0.6 0.4-0.9 0.4 -0.4 0-0.8-0.3-0.8-0.9 0-0.8 0.4-1 1.6-1h0.1V9.1zM68.3 8.5V8.4l0-2.2c0-0.7 0-0.9-0.1-1.2 -0.3-0.8-1-1.2-2.2-1.2 -0.6 0-1.2 0.1-1.8 0.4 -0.5 0.2-0.7 0.3-1.1 0.6l0.8 1.2c0.7-0.5 1.4-0.8 1.9-0.8 0.7 0 0.8 0.2 0.8 1v0.3c-0.1 0-0.3 0-0.4 0 -2.1 0-3.2 0.7-3.2 2.3 0 1.3 0.8 2.1 2.3 2.1 0.6 0 1-0.1 1.3-0.4 0.1-0.1 0.3-0.2 0.4-0.3 0.2 0.3 0.6 0.7 0.9 0.8L69 9.9C68.4 9.5 68.3 9.2 68.3 8.5"/>
		</svg>';
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
