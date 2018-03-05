<?php
/**
 * Plugin name: Woocommerce find in title
 * Description: Если скрипт находит слово в названии продукта, то в описание добавляется короткое описание.
 */

defined( 'ABSPATH' ) || exit();

/**
 * This plugin require woocommerce
 */
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

require_once 'woocommerce-find-in-title-options.php';

$plugin  = Woocommerce_Find_In_Title::get_instance();
$options = Woocommerce_Find_In_Title_Options::get_instance();
$plugin->run( $options );


/**
 * Class Woocommerce_Find_In_Title
 */
class Woocommerce_Find_In_Title {
	private $slug;
	private $options;
	private static $instance = null;

	public function run( Woocommerce_Find_In_Title_Options $options ) {
		$this->slug = 'woo-find-in-title';

		$options = Woocommerce_Find_In_Title_Options::get_instance();

		$this->options = $options;

		add_action( 'admin_menu', array( $this, 'menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'script' ) );
	}

	/**
	 * WP menu
	 */
	public function menu() {
		add_submenu_page(
			'plugins.php',
			'Woo find in title',
			'Woo find in title',
			'manage_options',
			$this->slug,
			array(
				$this,
				'menu_callback'
			) );
	}

	/**
	 * Menu page
	 */
	public function menu_callback() {
		if ( isset( $_POST['items'] ) ) {
			$this->options->save( $_POST );
		}
		require_once 'admin-page.php';
	}

	public function script( $hook ) {
		if ( strpos( $hook, 'woo-find-in-title' ) ) {
			wp_enqueue_script( 'wfit-script', plugins_url( '/js/script.js', __FILE__ ), 'jquery' );
		}
	}

	/**
	 * Singleton
	 * @return null|Woocommerce_Find_In_Title
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __clone() {
	}

	private function __construct() {
	}

}