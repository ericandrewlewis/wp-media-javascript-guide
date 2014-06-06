<h3>wp.media.controller.StateMachine</h3>
<p>A <a href="http://en.wikipedia.org/wiki/Finite-state_machine">finite-state machine</a> is in one of a number of states at any given time.</p>
<p>All media frames (subclasses of <code>media.view.Frame</code>) are mixins that include a <code>StateMachine</code>.</p>
<p>Subclasses of <a href="admin.php?page=media-guide&section=wp.media.controller.State">wp.media.controller.State</a> are added to a frame.</p>
<h3>Methods</h3>
<dl>
	<dt><code>state( state )</code></dt>
	<dd>Get a state object. <br>Defaults to the current state; if a state ID is supplied, returns that state.</dd>
	<dt><code>setState( state )</code></dt>
	<dd>Set the state.<br>
		Triggers an `activate` event on the state, and a `deactivate` event on the previous state.</dd>
	<dt><code>lastState()</code></dt>
	<dd>Get the previously active state object.</dd>
</dl>
<div class="example">
	<h3>Example: A simple state machine that toggles between two states.</h3>
	<h4>Live Example <a class="add-new-h2" target="_blank" href="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>"></iframe>
	<h4>Markup</h4>
	<pre><code class="language-html"><?php WPMJG()->the_section_example_markup( WPMJG::get_current_section(), 1 ) ?></code></pre>
	<h4>Javascript</h4>
	<pre><code class="language-javascript"><?php WPMJG()->the_section_example_javascript( WPMJG::get_current_section(), 1 ) ?></code></pre>
</div>
<h4>Further reading</h4>
<ul>
	<li><a href="http://en.wikipedia.org/wiki/Finite-state_machine">Finite-state machine</a></li>
	<li><a href="http://en.wikipedia.org/wiki/State_pattern">State pattern</a></li>
	<li><a href="http://robdodson.me/blog/2012/06/02/take-control-of-your-app-with-the-javascript-state-patten">Rob Dodson, Take Control of Your App With the JavaScript State Pattern</a></li>
</ul>