<h3>wp.media.controller.State</h3>
<p>A state is a self-contained workflow step, e.g. selecting an image from the library or editing an image.</p>
<p>Extends directly from Backbone.Model.</p>
<p>Keeps track of the current modes of each region in model attributes.</p>
<p>Use in tandem with a media frame or <a href="<?php echo WPMT::get_section_url( 'wp.media.controller.StateMachine' ) ?>"><code>wp.media.controller.StateMachine</code></a></p>
<div class="example"><h3>State boilerplate</h3>
<pre><code class="language-javascript">var stateConstructor = media.controller.State.extend({
	// autowired (see media.controller.State.constructor() ) to be called when a state
	// is activated (see media.controller.StateMachine.setState() )
	activate: function() {},

	// autowired (see media.controller.State.constructor() ) to be called when a state
	// is deactivated (see media.controller.StateMachine.setState() )
	deactivate: function() {},

	// autowired (see media.controller.State.constructor() ) to be called when a state
	// has the `reset` event triggered on it.
	reset: function() {}

	// autowired (see media.controller.State.constructor() ) to be called when a state
	// has the `ready` event triggered on it.
	ready: function() {}

});</code></pre>
</div>