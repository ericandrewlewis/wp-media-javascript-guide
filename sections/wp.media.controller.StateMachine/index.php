<h3>wp.media.controller.StateMachine</h3>
<p>A <strong>finite-state machine</strong>, in general terms, is in one of a finite number of states at any given time.</p>
<p>The <strong>StateMachine</strong> object includes a collection of <a href="admin.php?page=media-guide&section=wp.media.controller.State">states</a>. A state can specify activate and deactivate event handlers.</p>
<h4>See also</h4>
<ul>
	<li><a href="http://en.wikipedia.org/wiki/Finite-state_machine">Finite-state machine</a></li>
	<li><a href="http://en.wikipedia.org/wiki/State_pattern">State pattern</a></li>
	<li><a href="http://robdodson.me/blog/2012/06/02/take-control-of-your-app-with-the-javascript-state-patten">Rob Dodson, Take Control of Your App With the JavaScript State Pattern</a></li>
</ul>
<div class="example">
	<h3>Example: A state machine which can toggle between two states.</h3>
	<h4>Live Example <a class="add-new-h2" target="_blank" href="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMT::get_example_url( WPMT::get_current_section(), 1 ) ?>"></iframe>
	<h4>Markup</h4>
	<pre><code class="language-html"><?php wpmt()->the_section_example_markup( WPMT::get_current_section(), 1 ) ?></code></pre>
	<h4>Javascript</h4>
	<pre><code class="language-javascript"><?php wpmt()->the_section_example_javascript( WPMT::get_current_section(), 1 ) ?></code></pre>
</div>