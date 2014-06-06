<h3>wp.Backbone.View</h3>
<p>Extends <code>Backbone.View</code>.</p>
<p>Base view on top of which all views in WordPress are built on.</p>
<p>A Subview Manager is baked in via <code>wp.Backbone.Subviews</code>.</p>
<div class="example">
	<h3>Example: Render a view with a subview</h3>
	<h4>LIVE EXAMPLE <a class="add-new-h2" target="_blank" href="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>">open in a new window</a></h4>
	<iframe class="iframe-interactive-demo" src="<?php echo WPMJG::get_example_url( WPMJG::get_current_section(), 1 ) ?>"></iframe>
	<h4>MARKUP</h4>
	<pre><code class="language-html"><?php WPMJG()->the_section_example_markup( WPMJG::get_current_section(), 1 ) ?></code></pre>
	<p>An element goes in a view where a subview will be rendered (here <code>.subview-container</code>).</p>
	<p><code>wp.template()</code> will find templates where <code>id="tmpl-{...}"</code>, so ID templates accordingly.</p>
	<p><code>wp.template()</code> expects Mustache-inspired templating tags (see <a href="http://core.trac.wordpress.org/ticket/22344">#22344</a>), so use them:
		<blockquote>
		<code>{{{ interpolating }}}</code>,<code>{{ 'escaping' }}</code>,<code><# execution #></code>
	</blockquote>
	</p>
	<h4>JAVASCRIPT</h4>
	<pre><code class="language-javascript"><?php WPMJG()->the_section_example_javascript( WPMJG::get_current_section(), 1 ) ?></code></pre>
</div>