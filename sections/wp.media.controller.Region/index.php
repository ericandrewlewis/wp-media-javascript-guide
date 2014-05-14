<h3>wp.media.controller.region</h3>
<p>A <strong>region</strong> is a persistent section of a layout, which can hold a view, and can be replaced by a different view as the application requires.</p>
<p>A region allows views to be swapped in and out of a section of the page without either view having to know about the other.</p>
<p>Regions are not a WordPress creation: Marionette has a <a href="https://github.com/marionettejs/backbone.marionette/blob/master/docs/marionette.region.md">region object</a>; Derick Bailey <a href="http://lostechies.com/derickbailey/2011/12/12/composite-js-apps-regions-and-region-managers/">wrote about the concept a while ago</a>.</p>
<p>A <strong>mode</strong> applies a transformed state to a region.</p>
<div class="example">
	<h3>Example: Render a view in a region</h3>

	<h4>LIVE EXAMPLE <a class="add-new-h2" target="_blank" href="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 1 ) ?>"></iframe>
	<h4>Markup</h4>
	<pre><code class="language-html"><?php wpmt()->the_section_example_markup( WPMT::get_current_section(), 1 ) ?></code></pre>
	<h4>Javascript</h4>
	<pre><code class="language-javascript"><?php wpmt()->the_section_example_javascript( WPMT::get_current_section(), 1 ) ?></code></pre>
</div>
<div class="example">
	<h3>Example: Render a view in a region in two modes.</h3>
	<p>One region is created. A callback is bound to clicking either button, which triggers a mode switch on the region, filling in the region with a different view for each mode.
	<h4>Live Example <a class="add-new-h2" target="_blank" href="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 2 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 2 ) ?>"></iframe>
	<h4>Markup</h4>
	<pre><code class="language-html"><?php wpmt()->the_section_example_markup( WPMT::get_current_section(), 2 ) ?></code></pre>
	<h4>Javascript</h4>
	<pre><code class="language-javascript"><?php wpmt()->the_section_example_javascript( WPMT::get_current_section(), 2 ) ?></code></pre>
</div>