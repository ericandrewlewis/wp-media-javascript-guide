<div class="chapter-index">
	<a class="dropdown-trigger chapters-dropdown-trigger" href="#">Sections &#x25BE;</a>
	<div class="dropdown-panel chapters-dropdown-panel">
		<ol>
			<?php
			$directory_contents = scandir( wpmt()->directory->sections );
			foreach ( $directory_contents as $directory_content ) {
				if ( strpos( $directory_content, '.') === 0 )
					continue;
				?><li class="chapter">
				<a href="<?php echo WPMT::get_section_url( $directory_content ) ?>"><?php echo $directory_content ?></a>
				</li><?php
			} ?>
		</ol>
	</div>
</div>