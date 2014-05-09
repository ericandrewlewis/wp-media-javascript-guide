<div class="wrap">
	<h2>WordPress Media Backbone Guide</h2>
	<p>An introduction to Backbone design patterns and reusable elements in the WordPress Media experience. Knowledge of <a href="http://backbonejs.org">Backbone</a> is a soft prerequisite.</p>
	<h3>wp.Backbone.View</h3>
	<p>An extension of <code>Backbone.View</code>. All views in WordPress are built on top of this. A Subview Manager is baked in via <code>wp.Backbone.Subviews</code>.</p>
	<div class="example">
		<h3>Example</h3>
		<h4>TEMPLATE MARKUP</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-1-view-1&quot;&gt;
	A view template.
	&lt;div class=&quot;subview-container&quot;&gt;&lt;/div&gt;
&lt;/script&gt;
&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-1-view-2&quot;&gt;
	A subview template.
&lt;/script&gt;</code></pre>
		<p>An element goes in a view where a subview will be rendered (here <code>.subview-container</code>).</p>
		<p><code>wp.template()</code> will find templates where <code>id="tmpl-{...}"</code>, so ID templates accordingly.</p>
		<p><code>wp.template()</code> expects Mustache-inspired templating tags (see <a href="http://core.trac.wordpress.org/ticket/22344">#22344</a>), so use them:
			<blockquote>
			<code>{{{ interpolating }}}</code>,<code>{{ 'escaping' }}</code>,<code><# execution #></code>
		</blockquote>
		</p>
		<h4>JAVASCRIPT</h4>
<pre><code class="language-javascript">$(document).ready( function() {
	// Create view and subview constructors.
	var ViewConstructor = wp.Backbone.View.extend({
		// assign a compiled template function.
		template: wp.template( &#039;example-1-view-1&#039; )
	});
	var SubviewConstructor = wp.Backbone.View.extend({
		template: wp.template( &#039;example-1-view-2&#039; )
	});

	// Create the views.
	var View = new ViewConstructor({
		// specify an existing element in the document to bind the view to.
		el: &#039;.example-1-view-1-container&#039;
	});
	var Subview = new SubviewConstructor();

	// Set the subview on a selector inside the main view&#039;s template.
	View.views.set( &#039;.subview-container&#039;, Subview );
	$(&#039;.js--example-1--render-view-1&#039;).on( &#039;click&#039;, function() {
		// When a parent view is rendered, all subviews are rendered automagically.
		View.render();
	});
});</code></pre>
		<h4>IN-PAGE MARKUP</h4>
<pre><code class="language-html">&lt;div class=&quot;example-1-view-1-container&quot;&gt;&lt;/div&gt;
&lt;button class=&quot;js--example-1-view-1-render&quot;&gt;Click to render View&lt;/button&gt;
</code></pre>
		<h4>LIVE EXAMPLE</h4>
		<div class="live-example">
			<div class="example-1-view-1-container"></div>
			<button class="js--example-1--render-view-1">Click to render View</button>
			<script type="text/template" id="tmpl-example-1-view-1">
				A view template.
				<div class="subview-container"></div>
			</script>
			<script type="text/template" id="tmpl-example-1-view-2">
				A subview template.
			</script>
		</div>
	</div>
	<h3>wp.media.View.Modal</h3>
	<p>A view that creates a modal. The modal can be closed and reopened without changing markup (i.e. losing state). The default media experience uses it as a wrapper, however it can be used outside the media context.</p>
	<div class="example">
		<h3>Example</h3>
		<h4>Template Markup</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-modal-content&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a Modal!&lt;/h1&gt;
&lt;/script&gt;
</code></pre>
		<p>Create a template for the modal content view.</p>
		<h4>Javascript</h4>
<pre><code class="language-javascript">// When the user clicks a button, create a modal.
$(&#039;.js--example-2-open-media-modal&#039;).click( function( event ) {
	event.preventDefault();
	// Create a modal view.
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
	// Assign the ModalContentView to the modal as the `content` subview.
	// Proxies to View.views.set( &#039;.media-modal-content&#039;, content );
	modal.content( new ModalContentView() );
	// Out of the box, the modal is closed, so we need to open() it.
	modal.open();
});</code></pre>
		<h4>In-page Markup</h4>
<pre><code class="language-html">&lt;button class=&quot;js--example-2-open-media-modal&quot;&gt;Open a modal&lt;/button&gt;
</code></pre>
		<h4>LIVE EXAMPLE</h4>
		<div class="live-example">
			<button class="js--example-2-open-media-modal">Open a modal</button>
			<script type="text/template" id="tmpl-modal-content">
				<h1>Hi, I&#39;m a Modal!</h1>
			</script>
		</div>
	</div>
</div>