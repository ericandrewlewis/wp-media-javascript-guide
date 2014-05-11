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
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_filter( 'admin_body_class', array( $this, 'admin_body_class' ) );

		$this->maybe_bootstap_example_screen();
	}

	public function admin_menu() {
		add_menu_page( 'Media Guide', 'Media Guide', 'manage_options', 'media-guide', array( $this, 'render_page' )  );
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

		// Load the documentation javascript for a section page.
		if ( self::is_section_page() ) {
			wp_enqueue_script( 'wp-media-backbone-tutorial',
				plugin_dir_url( __FILE__ ) . 'script.js',
				array( 'media-views', 'media-models', 'highlight-js' ) );
		}

		// Load the example javascript and stylesheet for an example page.
		if ( self::is_example_page() ) {
			$example_id = self::get_current_example();

			$example_script_src = sprintf( plugin_dir_url( __FILE__ ) . 'sections/%s/examples/%s/script.js',
				WPMT::get_current_section(),
				WPMT::get_current_example() );
			wp_enqueue_script( 'wp-media-backbone-tutorial-example-' . $example_id,
				$example_script_src,
				array( 'media-views', 'media-models' ) );

			$example_style_src = sprintf( plugin_dir_url( __FILE__ ) . 'sections/%s/examples/%s/style.css',
				WPMT::get_current_section(),
				WPMT::get_current_example() );

			wp_enqueue_style( 'wp-media-backbone-tutorial-example-' . $example_id,
				$example_style_src );
		}
	}

	/**
	 * Admin page render callback.
	 *
	 * If we're looking at an example page.
	 * @return [type] [description]
	 */
	public function render_page() {
		if ( self::is_example_page() ) {
			require( sprintf( 'sections/%s/examples/%s/index.php',
				self::get_current_section(),
				self::get_current_example()
				) );
			return;
		}
		require( 'template.php' );
	}

	/**
	 * If we're on an example page, bootstrap a bit.
	 * @return [type] [description]
	 */
	public function maybe_bootstap_example_screen() {
		if ( ! self::is_example_page() )
			return;
		define( 'IFRAME_REQUEST', true );
	}

	public function admin_body_class( $classes ) {
		if ( self::is_example_page() ) {
			$classes .= ' wpmt-example ';
		}
		return $classes;
	}

	/**
	 * Static Functions
	 */

	/**
	 * Get a url for a section.
	 */
	public static function get_section_url( $section_name = '' ) {
		$admin_url = get_admin_url( null, 'admin.php' );
		$url = add_query_arg( array( 'page' => 'media-guide' ), $admin_url );
		if ( ! empty( $section_name ) ) {
			$url = add_query_arg( array( 'section' => $section_name ), $url );
		}
		return $url;
	}

	/**
	 * Get a url for an example.
	 */
	public static function get_example_url( $section_name = '', $example_id = 1 ) {
		$url = self::get_section_url( $section_name );
		$url = add_query_arg( array( 'example' => $example_id ), $url );
		return $url;
	}

	/**
	 * Get the current section.
	 */
	public static function get_current_section() {
		$section = ! empty( $_GET['section'] ) ? $_GET['section']: 'introduction';
		return $section;
	}

	/**
	 * Get the current example.
	 */
	public static function get_current_example() {
		$example = ! empty( $_GET['example'] ) ? $_GET['example']: '';
		return $example;
	}

	public static function is_example_page() {
		return (bool) self::get_current_example();
	}

	public static function is_section_page() {
		$is_section_page = null;
		if ( (bool) self::get_current_section() && ! self::is_example_page() )
			$is_section_page = true;
		else
			$is_section_page = false;
		return $is_section_page;
	}

}

WPMT::get_instance();