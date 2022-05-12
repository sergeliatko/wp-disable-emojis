<?php


namespace SergeLiatko\WPDisableEmojis;

/**
 * Class Plugin
 *
 * @package SergeLiatko\WPDisableEmojis
 *
 * @since   0.0.1
 */
class Plugin {

	/**
	 * @var \SergeLiatko\WPDisableEmojis\Plugin $instance - Instance of the plugin.
	 *
	 * @since 0.0.1
	 */
	protected static $instance;

	/**
	 * @return \SergeLiatko\WPDisableEmojis\Plugin - instance of the plugin.
	 *
	 * @since 0.0.1
	 */
	public static function getInstance(): Plugin {
		if ( ! self::$instance instanceof Plugin ) {
			self::setInstance( new self() );
		}

		return self::$instance;
	}

	/**
	 * @param \SergeLiatko\WPDisableEmojis\Plugin $instance - instance of the plugin.
	 *
	 * @since 0.0.1
	 */
	public static function setInstance( Plugin $instance ) {
		self::$instance = $instance;
	}

	/**
	 * Plugin constructor.
	 */
	protected function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	/**
	 * @return void
	 *
	 * @since 0.0.1
	 */
	public function init() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', [ $this, 'disable_emojis_tinymce' ] );
	}

	/**
	 * @param array|mixed $plugins - list of plugins.
	 *
	 * @return array - filtered list of plugins.
	 *
	 * @since 0.0.1
	 */
	public function disable_emojis_tinymce( $plugins ): array {
		return is_array( $plugins ) ? array_diff( $plugins, [ 'wpemoji' ] ) : [];
	}

}
