<h3>wp.media.controller.region</h3>
<p>A <strong>region</strong> is a persistent section of a layout, which can hold a view, and can be replaced by a different view as the application requires.</p>
<p>A region allows multiple views to be swapped in and out of a section of the page without them having to know about each other.</p>
<p>Regions are generally managed by the frame, using callbacks for region-specific events.</p>
<p>Regions are not a WordPress creation: Marionette has a <a href="https://github.com/marionettejs/backbone.marionette/blob/master/docs/marionette.region.md">region object</a>, and Derick Bailey <a href="http://lostechies.com/derickbailey/2011/12/12/composite-js-apps-regions-and-region-managers/">wrote about regions and region managers a while ago</a>.</p>
<p>A <strong>mode</strong> applies a transformed state to a region. </p>
<h3>Properties</h3>
<dl>
	<dt><code>id</code></dt>
	<dd>Unique identifying slug for the region.</dd>
	<dt><code>.selector</code></dt>
	<dd>jQuery selector of the region's containing element within the frame.</dd>
	<dt><code>_mode</code></dt>
	<dd>The active mode of the region.</dd>
</dl>
<h3>Methods</h3>
<dl>
	<dt><code>mode( mode )</code></dt>
	<dd>Activate a mode on a region. <br>
	Triggers events on the frame controller:
		<code>{region-id}:deactivate:{previous-mode}</code>, <code>{region-id}:deactivate</code>, <code>{region-id}:activate:{new-mode}</code>, and <code>{region-id}:activate</code>
	</dd>
	<dt><code>render( mode )</code></dt>
	<dd>Render a mode on a region. Activates the mode if it isn't already.<br>
	Triggers events on the frame controller:
		<code>{region-id}:create:{mode}</code>, <code>{region-id}:create</code>, <code>{region-id}:render:{new-mode}</code>, and <code>{region-id}:render</code>
	</dd>
	<dt><code>get()</code></dt>
	<dd>Get the region's view.</dd>
	<dt><code>set()</code></dt>
	<dd>Set the region's view as a subview of the frame using the region's <code>.selector</code>.</dd>

	<dt><code>trigger( event )</code></dt>
	<dd>Trigger events on the region's frame: <code>{region-id}:{event}:{mode}</code> and <code>{region-id}:{event}</code></dd>
</dl>
<div class="example">
	<h3>Example: Render a view in a region</h3>

	<h4>LIVE EXAMPLE <a class="add-new-h2" target="_blank" href="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>"></iframe>
	<h4>Markup</h4>
	<pre><code class="language-html"><?php WPMJG()->the_section_example_markup( WPMJG::get_current_section(), 1 ) ?></code></pre>
	<h4>Javascript</h4>
	<pre><code class="language-javascript"><?php WPMJG()->the_section_example_javascript( WPMJG::get_current_section(), 1 ) ?></code></pre>
</div>
<div class="example">
	<h3>Example: Render a view in a region in two modes.</h3>
	<p>One region is created. A callback is bound to clicking either button, which triggers a mode switch on the region, filling in the region with a different view for each mode.
	<h4>Live Example <a class="add-new-h2" target="_blank" href="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 2 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 2 ) ?>"></iframe>
	<h4>Markup</h4>
	<pre><code class="language-html"><?php WPMJG()->the_section_example_markup( WPMJG::get_current_section(), 2 ) ?></code></pre>
	<h4>Javascript</h4>
	<pre><code class="language-javascript"><?php WPMJG()->the_section_example_javascript( WPMJG::get_current_section(), 2 ) ?></code></pre>
</div>