<h3>wp.media.View.Modal</h3>
<p>A view that creates a modal. The modal can be closed and reopened without changing markup (i.e. losing state). The default media experience uses it as a wrapper, however it can be used outside the media context.</p>
<div class="example">
	<h3>Example: Open a modal</h3>
	<h4>LIVE EXAMPLE</h4>
	<div class="live-example">
		<button class="js--open-media-modal">Open a modal</button>
		<script type="text/template" id="tmpl-modal-content">
			<h1>Hi, I&#39;m a Modal!</h1>
		</script>
	</div>
	<h4>Template Markup</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-modal-content&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a Modal!&lt;/h1&gt;
&lt;/script&gt;
</code></pre>
		<p>Create a template for the modal content view.</p>
		<h4>Javascript</h4>
<pre><code class="language-javascript">// Create a modal view.
var modal = new wp.media.view.Modal({
	// A controller object is expected, but let&#039;s just pass
	// a fake one to illustrate this proof of concept without
	// getting console errors.
	controller: { trigger: function() {} }
});
// Create a modal content view.
var ModalContentView = wp.Backbone.View.extend({
	template: wp.template( &#039;modal-content&#039; )
});

// When the user clicks a button, open a modal.
$(&#039;.js--open-media-modal&#039;).click( function( event ) {
	event.preventDefault();
	// Assign the ModalContentView to the modal as the `content` subview.
	// Proxies to View.views.set( &#039;.media-modal-content&#039;, content );
	modal.content( new ModalContentView() );
	// Out of the box, the modal is closed, so we need to open() it.
	modal.open();
});</code></pre>
	<h4>In-page Markup</h4>
<pre><code class="language-html">&lt;button class=&quot;js--open-media-modal&quot;&gt;Open a modal&lt;/button&gt;
</code></pre>
</div>