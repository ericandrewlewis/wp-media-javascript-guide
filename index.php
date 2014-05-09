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
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	public function admin_menu() {
		add_menu_page( 'Media Guide', 'Media Guide', 'manage_options', 'media-guide', array( $this, 'render_page' )  );
	}

	public function render_page() {
		require( 'template.php' );
	}
	/**
	 * Enqueue scripts.
	 */
	public function admin_enqueue_scripts() {
		// Bail if we're not on the edit post screen.
		if ( get_current_screen()->base != 'toplevel_page_media-guide' )
			return;

		wp_enqueue_media();

		wp_enqueue_script( 'highlight-js',
			plugin_dir_url( __FILE__ ) . 'includes/highlight/highlight.pack.js' );

		wp_enqueue_style( 'highlight-js',
			plugin_dir_url( __FILE__ ) . 'includes/highlight/styles/monokai_sublime.css' );

		wp_enqueue_style( 'wp-media-backbone-tutorial',
			plugin_dir_url( __FILE__ ) . 'style.css' );

		wp_enqueue_script( 'wp-media-backbone-tutorial',
			plugin_dir_url( __FILE__ ) . 'script.js',
			array( 'media-views', 'media-models', 'highlight-js' ) );
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