<?php
/**
 * Plugin name: Woocommerce find in title
 * Description: Если скрипт находит слово в названии продукта, то в описание добавляется короткое описание.
 */

defined( 'ABSPATH' ) || exit();

new Woocommerce_Find_In_Title();

class Woocommerce_Find_In_Title {
	function __construct() {
	}
}