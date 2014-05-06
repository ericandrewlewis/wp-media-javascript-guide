<?php
/*
Plugin Name: WP Media Tutorial
Version: 0.1
*/

/**
 * Sandbox plugin PHP functionality yall.
 */
class WPMT {
	protected static $instance = array();

	/**
	 * Singleton yall.
	 */
	public static function get_instance() {
		$c = get_called_class();
		if ( ! isset( self::$instance[ $c ] ) ) {
			self::$instance[ $c ] = new $c;
		}
		return self::$instance[ $c ];
	}

	/**
	 * Setup action handlers.
	 */
	protected function __construct() {
		add_action( 'media_buttons', array( $this, 'add_media_button' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts.
	 */
	public function admin_enqueue_scripts() {
		// Bail if we're not on the edit post screen.
		if ( get_current_screen()->base != 'post' )
			return;

		// Enqueue script for creating a basic modal.
		wp_enqueue_script( 'wp-media-tutorial-basic-modal',
			plugin_dir_url( __FILE__ ) . 'js/basic-modal.js',
			array( 'media-views', 'media-models') );


		wp_enqueue_script( 'wp-media-tutorial-media-frame',
			plugin_dir_url( __FILE__ ) . 'js/media-frame.js',
			array( 'media-views', 'media-models') );

		wp_enqueue_script( 'wp-media-tutorial-frame-with-region-handlers',
			plugin_dir_url( __FILE__ ) . 'js/frame-with-region-handlers.js',
			array( 'media-views', 'media-models') );
	}

	/**
	 * Output more media buttons above the content editor.
	 */
	public function add_media_button() {
		?>
		<a href="#" id="open-media-modal-button" class="button open-media-modal add_media" title="Open a modal">
		<span class="wp-media-buttons-icon"></span> Open a modal</a>
		<a href="#" id="open-media-frame-button" class="button open-media-frame add_media" title="Open a media frame">
		<span class="wp-media-buttons-icon"></span> Open a media frame</a>
		<a href="#" id="open-media-frame-with-region-renderers-button" class="button open-media-frame-with-region-renderers add_media" title="Open a frame with region renderers">
		<span class="wp-media-buttons-icon"></span> Open a media frame with region renderers</a>
		<?php
	}
}

WPMT::get_instance();