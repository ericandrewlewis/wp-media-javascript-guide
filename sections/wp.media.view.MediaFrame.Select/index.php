<h3>wp.media.view.MediaFrame.Select</h3>
<p>A workflow dffor choosing a single attachment from the media library.</p>
<h3>Properties</h3>
<dl>
	<dt><code>content<span class="inheritance-info">inherited from wp.media.view.Frame</span></dt>
	<dd>The `content` region controller object.</dd>
	<dt><code>menu<span class="inheritance-info">inherited from wp.media.view.Frame</span></dt>
	<dd>The `menu` region controller object.</dd>
	<dt><code>title<span class="inheritance-info">inherited from wp.media.view.Frame</span></dt>
	<dd>The `title` region object</dd>
	<dt><code>toolbar<span class="inheritance-info">inherited from wp.media.view.Frame</span></dt>
	<dd>The `toolbar` region object</dd>
	<dt><code>router<span class="inheritance-info">inherited from wp.media.view.Frame</span></dt>
	<dd>The `router` region object</dd>
	<dt><code>views<span class="inheritance-info">inherited from wp.media.view.Frame</span></dt>
	<dd>The `router` region object</dd>
</dl>
<h3>Methods</h3>
<dl>
	<dt><code>state( state )</code><span class="inheritance-info">inherited from wp.media.controller.StateMachine</span></dt>
	<dd>Get a state object. <br>Defaults to the current state; if a state ID is supplied, returns that state.</dd>
	<dt><code>setState( state )</code><span class="inheritance-info">inherited from wp.media.controller.StateMachine</span></dt>
	<dd>Set the state.<br>
		Triggers an `activate` event on the state, and a `deactivate` event on the previous state.</dd>
	<dt><code>lastState()</code><span class="inheritance-info">inherited from wp.media.controller.StateMachine</span></dt>
	<dd>Get the previously active state object.</dd>
</dl>
<div class="example">
	<h3>Example: Render a view with a subview</h3>
	<h4>LIVE EXAMPLE <a class="add-new-h2" target="_blank" href="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 1 ) ?>"></iframe>
	<h4>MARKUP</h4>
	<pre><code class="language-html"><?php wpmt()->the_section_example_markup( WPMT::get_current_section(), 1 ) ?></code></pre>
	<h4>JAVASCRIPT</h4>
	<pre><code class="language-javascript"><?php wpmt()->the_section_example_javascript( WPMT::get_current_section(), 1 ) ?></code></pre>
</div>