<?php

/**
 * Class Woocommerce_Find_In_Title_Options
 */
class Woocommerce_Find_In_Title_Options {
	private static $instance = null;
	private $key = 'wfit_words';

	/**
	 * Get words and texts
	 * @return mixed
	 */
	public function get() {
		return get_option( $this->key );
	}

	/**
	 * @param $post_data array
	 */
	public function save( $post_data ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Not allowed' );
		}
		if ( ! wp_verify_nonce( $post_data['_wpnonce'], 'wfit_nonce' ) ) {
			wp_die( 'Nonce verification failed' );
		}
		$data = $this->sanitize( $post_data['items'] );
		update_option( $this->key, $data );
	}

	/**
	 * @param $array
	 *
	 * @return array
	 */
	private function sanitize( $array ) {
		$new = array();
		foreach ( $array as $index => $item ) {
			$word = sanitize_text_field( trim( $item['word'] ) );
			$text = sanitize_text_field( trim( $item['text'] ) );
			if ( ! $word ) {
				continue;
			}
			$new[] = array(
				'word' => $word,
				'text' => $text
			);
		}

		return $new;
	}

	/**
	 * Singleton
	 * @return null|Woocommerce_Find_In_Title_Options
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