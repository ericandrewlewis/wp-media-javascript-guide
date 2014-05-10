<div class="wrap">
	<h2>WordPress Media Backbone Guide</h2>
	<div class="chapter-index">
		<a class="dropdown-trigger chapters-dropdown-trigger" href="#">Sections &#x25BE;</a>
		<div class="dropdown-panel chapters-dropdown-panel">
			<ol>
				<li class="chapter">
					<a href="admin.php?page=media-guide">Introduction</a>
				</li>
				<li class="chapter">
					<a href="admin.php?page=media-guide&section=wp.Backbone.View">wp.Backbone.View</a>
				</li>
				<li class="chapter">
					<a href="admin.php?page=media-guide&section=wp.media.View.Modal">wp.media.View.Modal</a>
				</li>
				<li class="chapter">
					<a href="admin.php?page=media-guide&section=wp.media.controller.Region">wp.media.controller.Region</a>
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
		<h3>TITLE</h3>
		<p>CONTENT</p>
		<div class="example">
			<h3>Example</h3>
			<h4>LIVE EXAMPLE</h4>
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