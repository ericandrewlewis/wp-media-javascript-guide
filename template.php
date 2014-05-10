<div class="wrap">
	<h2>WordPress Media Backbone Guide</h2>
	<div class="chapter-index">
		<a class="dropdown-trigger chapters-dropdown-trigger" href="#">Sections &#x25BE;</a>
		<div class="dropdown-panel chapters-dropdown-panel">
			<ol>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_link() ?>">Introduction</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_link( 'wp.Backbone.View' ) ?>">wp.Backbone.View</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_link( 'wp.media.View.Modal' ) ?>">wp.media.View.Modal</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_link( 'wp.media.controller.Region' ) ?>">wp.media.controller.Region</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_link( 'wp.media.controller.StateMachine' ) ?>">wp.media.controller.StateMachine</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_link( 'wp.media.controller.State' ) ?>">wp.media.controller.State</a>
				</li>
				<li class="chapter">
					wp.media.controller.Library
				</li>
				<li class="chapter">
					wp.media.view.Frame
				</li>
				<li class="chapter">
					wp.media.view.MediaFrame
				</li>
				<li class="chapter">
					wp.media.view.MediaFrame.Select
				</li>
				<li class="chapter">
					wp.media.view.MediaFrame.Post
				</li>
				<li class="chapter">
					wp.media.view.MediaFrame.ImageDetails
				</li>
			</ol>
		</div>
	</div>
	<?php
	if ( ! empty( $_GET['section'] ) ) {
		$section = $_GET['section']; // todo: sanitize/whitelist
	} else {
		$section = 'introduction';
	}
	require( 'sections/' . $section . '/index.php' );
	?>
	<script type="text/javascript"
	        src="<?php echo plugins_url( 'sections/' . $section .  '/script.js', __FILE__ ); ?>"></script>
	<div class="entry-template">
		<h3>Title</h3>
		<p>Content</p>
		<div class="example">
			<h3>Example: title</h3>
			<h4>Live Example</h4>
			<div class="live-example">
			</div>
			<h4>Template Markup</h4>
	<pre><code class="language-html"></code></pre>
			<h4>Javascript</h4>
	<pre><code class="language-javascript"></code></pre>
			<h4>In-page Markup</h4>
	<pre><code class="language-html"></code></pre>
		</div>
	</div>
</div>