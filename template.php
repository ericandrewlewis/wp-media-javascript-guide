<div class="wrap">
	<h2>WordPress Media Backbone Guide</h2>
	<p>An introduction to Backbone design patterns and reusable elements in the WordPress Media experience. Knowledge of <a href="http://backbonejs.org">Backbone</a> is a soft prerequisite.</p>
	<h3>wp.Backbone.View</h3>
	<p>An extension of <code>Backbone.View</code>. All views in WordPress are built on top of this. A Subview Manager is baked in via <code>wp.Backbone.Subviews</code>.</p>
	<div class="example">
		<h3>Example: Render a view with a subview</h3>
		<h4>LIVE EXAMPLE</h4>
		<div class="live-example">
			<div class="example-1-view-1-container"></div>
			<button class="js--example-1--render-view-1">Click to render the parent view</button>
			<script type="text/template" id="tmpl-example-1-view-1">
				A view template.
				<div class="subview-container"></div>
			</script>
			<script type="text/template" id="tmpl-example-1-view-2">
				A subview template.
			</script>
		</div>
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
&lt;button class=&quot;js--example-1-view-1-render&quot;&gt;Click to render the parent view&lt;/button&gt;
</code></pre>
	</div>
	<h3>wp.media.View.Modal</h3>
	<p>A view that creates a modal. The modal can be closed and reopened without changing markup (i.e. losing state). The default media experience uses it as a wrapper, however it can be used outside the media context.</p>
	<div class="example">
		<h3>Example: Open a modal</h3>
		<h4>LIVE EXAMPLE</h4>
		<div class="live-example">
			<button class="js--example-2--open-media-modal">Open a modal</button>
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
$(&#039;.js--example-2--open-media-modal&#039;).click( function( event ) {
	event.preventDefault();
	// Assign the ModalContentView to the modal as the `content` subview.
	// Proxies to View.views.set( &#039;.media-modal-content&#039;, content );
	modal.content( new ModalContentView() );
	// Out of the box, the modal is closed, so we need to open() it.
	modal.open();
});</code></pre>
		<h4>In-page Markup</h4>
<pre><code class="language-html">&lt;button class=&quot;js--example-2--open-media-modal&quot;&gt;Open a modal&lt;/button&gt;
</code></pre>
	</div>
	<h3>wp.media.controller.region</h3>
	<p>A <strong>region</strong> is a persistent section of a layout, which can hold a view, and can be replaced by a different view as the application requires.</p>
	<p>A region allows views to be swapped in and out of a section of the page without either view having to know about the other.</p>
	<p>Regions are not a WordPress creation: Marionette has a <a href="https://github.com/marionettejs/backbone.marionette/blob/master/docs/marionette.region.md">region object</a>; Derick Bailey <a href="http://lostechies.com/derickbailey/2011/12/12/composite-js-apps-regions-and-region-managers/">wrote about the concept a while ago</a>.</p>
	<p>A <strong>mode</strong> applies a transformed state to a region.</p>
	<div class="example">
		<h3>Example: Render a view in a region</h3>

		<h4>LIVE EXAMPLE</h4>
		<div class="live-example">
			<script type="text/template" id="tmpl-example-3-view-1">
				<h1>Hi, I&#39;m a view inside a region!</h1>
			</script>
			<div class="example-3--region-parent-view">
				<div class="region-1"></div>
			</div>
			<button class="js--example-3--render-region">Render a view inside a region</button>
		</div>
		<h4>Template Markup</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-3-view-1&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a view inside a region!&lt;/h1&gt;
&lt;/script&gt;</code></pre>
		<h4>Javascript</h4>
<pre><code class="language-javascript">$(&#039;.js--example-3--render-region&#039;).click( function( event ) {
		event.preventDefault();

		// A region requires a parent view to live inside.
		var RegionParentViewConstructor = wp.Backbone.View.extend({
			// When the view is initialized, bind events to callbacks.
			initialize: function() {
				// Regions trigger events on their parent views, which
				// the parent view should bind callbacks for.

				// When the region is created:
				// Events triggered: {region-id}:create and {region-id}:create:{mode}
				this.on( &#039;region-1:create&#039;, this.onCreateRegion, this );

				// When the region is rendered:
				// Events triggered: {region-id}:render and {region-id}:render:{mode}
			},

			/**
			 * On the &quot;create&quot; event, the region controller is passed as an
			 * argument.
			 *
			 * This is the time to create a view on the region.
			 */
			onCreateRegion: function( region ) {
				// Create a basic view constructor that binds to a template.
				var RegionViewConstructor = wp.Backbone.View.extend({
					// assign a compiled template function.
					template: wp.template( &#039;example-3-view-1&#039; )
				});
				// Create the view for the region, which is automatically
				// rendered later.
				region.view = new RegionViewConstructor();
			}
		});
		// Create an instance of the RegionParentView.
		var RegionParentView = new RegionParentViewConstructor({
			// Tie the view to an existing DOM element.
			el: &#039;.example-3--region-parent-view&#039;
		});
		// Render the region parent view.
		RegionParentView.render();

		// Create a new region
		var RegionOne = new wp.media.controller.Region({
			// Unique identifier.
			id: &#039;region-1&#039;,
			// The region&#039;s parent view.
			view: RegionParentView,
			// The selector for the element in the parent view&#039;s markup
			// that represents the region.
			selector: &#039;.region-1&#039;
		});
		// Render a mode on the region to trigger the {region}:create
		// event on the parent view.
		RegionOne.render( &#039;some-mode&#039; );
	});
});</code></pre>
		<h4>In-page Markup</h4>
<pre><code class="language-html">&lt;div class=&quot;example-3--region-parent-view&quot;&gt;
	&lt;div class=&quot;region-1&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;button class=&quot;js--example-3--render-region&quot;&gt;Render Region&lt;/button&gt;</code></pre>
	</div>
	<div class="example">
		<h3>Example: Render a view in a region in two modes.</h3>
		<p>One region is created. A callback is bound to clicking either button, which triggers a mode switch on the region, filling in the region with a different view for each mode.
		<h4>Live Example</h4>
		<div class="live-example">
			<script type="text/template" id="tmpl-example-4-view-1">
				<h1>Hi, I&#39;m a view inside a region in "a" mode!</h1>
			</script>
			<script type="text/template" id="tmpl-example-4-view-2">
				<h1>Hi, I&#39;m a view inside a region in "b" mode!</h1>
			</script>
			<div class="example-4--region-parent-view">
				<div class="region-1"></div>
			</div>
			<button class="js--example-4--switch-region-to-a-mode">Switch the region to "a" mode</button>
			<button class="js--example-4--switch-region-to-b-mode">Render the region in "b" mode</button>
		</div>
		<h4>Template Markup</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-4-view-1&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a view inside a region in &quot;a mode&quot;!&lt;/h1&gt;
&lt;/script&gt;
&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-4-view-2&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a view inside a region in &quot;b mode&quot;!&lt;/h1&gt;
&lt;/script&gt;</code></pre>
		<h4>Javascript</h4>
<pre><code class="language-javascript">// A region requires a parent view to live inside.
var RegionParentViewConstructor = wp.Backbone.View.extend({
	// When the view is initialized, bind events to callbacks.
	initialize: function() {
		// Regions trigger events on their parent views, which
		// the parent view should bind callbacks for.

		// When the region is created:
		// Events triggered: {region-id}:create and {region-id}:create:{mode}
		this.on( &#039;region-1:create:a-mode&#039;, this.onCreateRegionInAMode, this );
		this.on( &#039;region-1:create:b-mode&#039;, this.onCreateRegionInBMode, this );

		// When the region is rendered:
		// Events triggered: {region-id}:render and {region-id}:render:{mode}
	},

	/**
	 * On the &quot;region-1:create:a-mode&quot; event, the region controller is passed as an
	 * argument.
	 *
	 * This is the time to create a view on the region.
	 *
	 * Callback for rendering the region in &quot;A mode&quot;.
	 */
	onCreateRegionInAMode: function( region ) {
		// Create a basic view constructor that binds to a template.
		var RegionViewConstructor = wp.Backbone.View.extend({
			// assign a compiled template function.
			template: wp.template( &#039;example-4-view-1&#039; )
		});
		// Create the view for the region, which is automatically
		// rendered later.
		region.view = new RegionViewConstructor();
	},

	/**
	 * Callback for rendering the region in &quot;B mode&quot;.
	 */
	onCreateRegionInBMode: function( region ) {
		// Create a basic view constructor that binds to a template.
		var RegionViewConstructor = wp.Backbone.View.extend({
			// assign a compiled template function.
			template: wp.template( &#039;example-4-view-2&#039; )
		});
		// Create the view for the region, which is automatically
		// rendered later.
		region.view = new RegionViewConstructor();
	}
});
// Create an instance of the RegionParentView.
var RegionParentView = new RegionParentViewConstructor({
	// Tie the view to an existing DOM element.
	el: &#039;.example-4--region-parent-view&#039;
});
// Render the region parent view.
RegionParentView.render();

// Create a new region
var RegionOne = new wp.media.controller.Region({
	// Unique identifier.
	id: &#039;region-1&#039;,
	// The region&#039;s parent view.
	view: RegionParentView,
	// The selector for the element in the parent view&#039;s markup
	// that represents the region.
	selector: &#039;.region-1&#039;
});
$(&#039;.js--example-4--render-region-in-a-mode&#039;).click( function( event ) {
	event.preventDefault();
	// Render a mode on the region to trigger the {region}:create
	// event on the parent view.
	RegionOne.render( &#039;a-mode&#039; );
});
$(&#039;.js--example-4--render-region-in-b-mode&#039;).click( function( event ) {
	event.preventDefault();
	RegionOne.render( &#039;b-mode&#039; );
});</code></pre>
		<h4>In-page Markup</h4>
<pre><code class="language-html">&lt;div class=&quot;example-4--region-parent-view&quot;&gt;
	&lt;div class=&quot;region-1&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;button class=&quot;js--example-4--render-region-in-a-mode&quot;&gt;Render the region in &quot;a mode&quot;&lt;/button&gt;
&lt;button class=&quot;js--example-4--render-region-in-b-mode&quot;&gt;Render the region in &quot;b mode&quot;&lt;/button&gt;</code></pre>
	</div>
	<div class="entry-template">
		<h3>TITLE</h3>
		<p>CONTENT</p>
		<div class="example">
			<h3>Example</h3>
			<h4>LIVE EXAMPLE</h4>
			<div class="live-example">
			</div>
			<h4>Template Markup</h4>
	<pre><code class="language-html"></code></pre>
			<h4>Javascript</h4>
	<pre><code class="language-javascript"></code></pre>
			<h4>In-page Markup</h4>
	<pre><code class="language-html"></code></pre>
		</div>
	</div>
</div>