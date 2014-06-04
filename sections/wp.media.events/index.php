<h3>wp.media.events</h3>
<p>A shared event bus used to provide events into the media workflows that 3rd-party scripts can use to hook in. A clone of Backbone.Events.</p>
<div class="example">
	<h3>Example: Tap into broadcast events.</h3>
	<pre><code class="language-php">&lt;?php
// Hook and priority loads after tinymce.js and its plugins.
add_action( &#039;admin_print_footer_scripts&#039;, function() {
	?&gt;&lt;script&gt;
	(function($) {
		wp.media.events.on( &#039;editor:image-update&#039;, function( arguments ) {
			// arguments[0] = { Editor, image, metadata }
		});

		wp.media.events.on( &#039;editor:image-edit&#039;, function( arguments ) {
			// arguments[0] = { Editor, image, metadata }
		});

		wp.media.events.on( &#039;editor:frame-create&#039;, function( arguments ) {
			// arguments[0] = { frame }
		});

	})(jQuery);
	&lt;/script&gt;
	&lt;?php
}, 100 );</code></pre>
</div>