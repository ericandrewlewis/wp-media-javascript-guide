<h3>wp.media.controller.region</h3>
<p>A <strong>region</strong> is a persistent section of a layout, which can hold a view, and can be replaced by a different view as the application requires.</p>
<p>A region allows views to be swapped in and out of a section of the page without either view having to know about the other.</p>
<p>Regions are not a WordPress creation: Marionette has a <a href="https://github.com/marionettejs/backbone.marionette/blob/master/docs/marionette.region.md">region object</a>; Derick Bailey <a href="http://lostechies.com/derickbailey/2011/12/12/composite-js-apps-regions-and-region-managers/">wrote about the concept a while ago</a>.</p>
<p>A <strong>mode</strong> applies a transformed state to a region.</p>
<div class="example">
	<h3>Example: Render a view in a region</h3>

	<h4>LIVE EXAMPLE</h4>
	<div class="live-example">
		<script type="text/template" id="tmpl-example-1-view-1">
			<h1>Hi, I&#39;m a view inside a region!</h1>
		</script>
		<div class="example-1--region-parent-view">
			<div class="region-1"></div>
		</div>
		<button class="js--example-1--render-region">Render a view inside a region</button>
	</div>
	<h4>Template Markup</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-1-view-1&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a view inside a region!&lt;/h1&gt;
&lt;/script&gt;</code></pre>
		<h4>Javascript</h4>
<pre><code class="language-javascript">$(&#039;.js--example-1--render-region&#039;).click( function( event ) {
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
					template: wp.template( &#039;example-1-view-1&#039; )
				});
				// Create the view for the region, which is automatically
				// rendered later.
				region.view = new RegionViewConstructor();
			}
		});
		// Create an instance of the RegionParentView.
		var RegionParentView = new RegionParentViewConstructor({
			// Tie the view to an existing DOM element.
			el: &#039;.example-1--region-parent-view&#039;
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
<pre><code class="language-html">&lt;div class=&quot;example-1--region-parent-view&quot;&gt;
	&lt;div class=&quot;region-1&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;button class=&quot;js--example-1--render-region&quot;&gt;Render Region&lt;/button&gt;</code></pre>
</div>
<div class="example">
	<h3>Example: Render a view in a region in two modes.</h3>
	<p>One region is created. A callback is bound to clicking either button, which triggers a mode switch on the region, filling in the region with a different view for each mode.
	<h4>Live Example</h4>
	<div class="live-example">
		<script type="text/template" id="tmpl-example-2-view-1">
			<h1>Hi, I&#39;m a view inside a region in "a" mode!</h1>
		</script>
		<script type="text/template" id="tmpl-example-2-view-2">
			<h1>Hi, I&#39;m a view inside a region in "b" mode!</h1>
		</script>
		<div class="example-2--region-parent-view">
			<div class="region-1"></div>
		</div>
		<button class="js--example-2--switch-region-to-a-mode">Switch the region to "a" mode</button>
		<button class="js--example-2--switch-region-to-b-mode">Render the region in "b" mode</button>
	</div>
	<h4>Template Markup</h4>
<pre><code class="language-html">&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-2-view-1&quot;&gt;
	&lt;h1&gt;Hi, I&amp;#39;m a view inside a region in &quot;a mode&quot;!&lt;/h1&gt;
&lt;/script&gt;
&lt;script type=&quot;text/template&quot; id=&quot;tmpl-example-2-view-2&quot;&gt;
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
			template: wp.template( &#039;example-2-view-1&#039; )
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
			template: wp.template( &#039;example-2-view-2&#039; )
		});
		// Create the view for the region, which is automatically
		// rendered later.
		region.view = new RegionViewConstructor();
	}
});
// Create an instance of the RegionParentView.
var RegionParentView = new RegionParentViewConstructor({
	// Tie the view to an existing DOM element.
	el: &#039;.example-2--region-parent-view&#039;
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
$(&#039;.js--example-2--render-region-in-a-mode&#039;).click( function( event ) {
	event.preventDefault();
	// Render a mode on the region to trigger the {region}:create
	// event on the parent view.
	RegionOne.render( &#039;a-mode&#039; );
});
$(&#039;.js--example-2--render-region-in-b-mode&#039;).click( function( event ) {
	event.preventDefault();
	RegionOne.render( &#039;b-mode&#039; );
});</code></pre>
		<h4>In-page Markup</h4>
<pre><code class="language-html">&lt;div class=&quot;example-2--region-parent-view&quot;&gt;
	&lt;div class=&quot;region-1&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;button class=&quot;js--example-2--render-region-in-a-mode&quot;&gt;Render the region in &quot;a mode&quot;&lt;/button&gt;
&lt;button class=&quot;js--example-2--render-region-in-b-mode&quot;&gt;Render the region in &quot;b mode&quot;&lt;/button&gt;</code></pre>
</div>