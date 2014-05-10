<div class="wrap">
	<h2>WordPress Media Backbone Guide</h2>
	<div class="chapter-index">
		<a class="dropdown-trigger chapters-dropdown-trigger" href="#">Sections &#x25BE;</a>
		<div class="dropdown-panel chapters-dropdown-panel">
			<ol>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_url() ?>">Introduction</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_url( 'wp.Backbone.View' ) ?>">wp.Backbone.View</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_url( 'wp.media.View.Modal' ) ?>">wp.media.View.Modal</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_url( 'wp.media.controller.Region' ) ?>">wp.media.controller.Region</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_url( 'wp.media.controller.StateMachine' ) ?>">wp.media.controller.StateMachine</a>
				</li>
				<li class="chapter">
					<a href="<?php echo WPMT::get_section_url( 'wp.media.controller.State' ) ?>">wp.media.controller.State</a>
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
	<?php require( 'sections/' . WPMT::get_current_section() . '/index.php' ); ?>
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