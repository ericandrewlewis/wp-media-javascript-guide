<div class="wrap">
	<h2>WordPress Media Backbone Guide</h2>
	<?php require( plugin_dir_path( __FILE__ ) . 'menu.php' );

	$section_index_path = WPMJG::get_instance()->directory->sections . WPMJG::get_current_section() . '/index.php';
	if ( file_exists( $section_index_path ) ) {
		require( $section_index_path );
	}
	else {
		require( WPMJG::get_instance()->directory->plugin_root . '/templates/404.php' );
	} ?>
</div>