<h3>wp.media.controller.State</h3>
<p>A state is a self-contained workflow step, e.g. selecting an image from the media library, or editing an image.</p>
<p>Extends directly from Backbone.Model. The default mode of each region is stored internally via model attributes.</p>
<p>Media frames, which are mixed-in with a <a href="<?php echo WPMJG::get_section_url( 'wp.media.controller.StateMachine' ) ?>"><code>wp.media.controller.StateMachine</code></a>, include multiple states.</p>
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