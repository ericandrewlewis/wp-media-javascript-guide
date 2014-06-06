<h3>wp.media.view.MediaFrame.Post</h3>
<p>A workflow for choosing content in various forms (media, galleries, playlists) to insert into the content editor.</p>
<h3>Properties</h3>
<dl>
	<dt><code>content</code><?php WPMJG::inherited_from_text( 'wp.media.view.Frame' ) ?></dt>
	<dd>The <code>content</code> region controller object. See <code><?php WPMJG::the_section_link( 'wp.media.controller.Region' ) ?></code>.</dd>
	<dt><code>menu</code><?php WPMJG::inherited_from_text( 'wp.media.view.Frame' ) ?></dt>
	<dd>The <code>menu</code> region controller object. See <code><?php WPMJG::the_section_link( 'wp.media.controller.Region' ) ?></code>.</dd>
	<dt><code>title</code><?php WPMJG::inherited_from_text( 'wp.media.view.Frame' ) ?></dt>
	<dd>The <code>title</code> region controller object. See <code><?php WPMJG::the_section_link( 'wp.media.controller.Region' ) ?></code>.</dd>
	<dt><code>toolbar</code><?php WPMJG::inherited_from_text( 'wp.media.view.Frame' ) ?></dt>
	<dd>The <code>toolbar</code> region controller object. See <code><?php WPMJG::the_section_link( 'wp.media.controller.Region' ) ?></code>.</dd>
	<dt><code>router</code><?php WPMJG::inherited_from_text( 'wp.media.view.Frame' ) ?></dt>
	<dd>The <code>router</code> region controller object. See <code><?php WPMJG::the_section_link( 'wp.media.controller.Region' ) ?></code>.</dd>
	<dt><code>views</code><?php WPMJG::inherited_from_text( 'wp.Backbone.View' ) ?></dt>
	<dd>A subview manager. Instance of <code>wp.Backbone.Subviews</code>.</dd>
</dl>
<h3>Methods</h3>
<dl>
	<dt><code>open()</code><?php WPMJG::inherited_from_text( 'wp.media.view.MediaFrame' ) ?></dt>
	<dd>Open the frame in a modal.</dd>
	<dt><code>close()</code><?php WPMJG::inherited_from_text( 'wp.media.view.MediaFrame' ) ?></dt>
	<dd>Close the modal.</dd>
	<dt><code>state( state )</code><?php WPMJG::inherited_from_text( 'wp.media.controller.StateMachine' ) ?></dt>
	<dd>Get a state object. <br>Defaults to the current state; if a state ID is supplied, returns that state.</dd>
	<dt><code>setState( state )</code><?php WPMJG::inherited_from_text( 'wp.media.controller.StateMachine' ) ?></dt>
	<dd>Set the state.<br>
		Triggers an `activate` event on the state, and a `deactivate` event on the previous state.</dd>
	<dt><code>lastState()</code><?php WPMJG::inherited_from_text( 'wp.media.controller.StateMachine' ) ?></dt>
	<dd>Get the previously active state object.</dd>
</dl>
<div class="example">
	<h3>Example: Open a post frame</h3>
	<h4>LIVE EXAMPLE <a class="add-new-h2" target="_blank" href="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>"></iframe>
	<h4>MARKUP</h4>
	<pre><code class="language-html"><?php WPMJG()->the_section_example_markup( WPMJG::get_current_section(), 1 ) ?></code></pre>
	<h4>JAVASCRIPT</h4>
	<pre><code class="language-javascript"><?php WPMJG()->the_section_example_javascript( WPMJG::get_current_section(), 1 ) ?></code></pre>
</div>