<h3>wp.media</h3>
<p>The WordPress Javascript namespace for all media elements.</p>
<dl>
	<dt><code>media( attributes )</code></dt>
	<dd>Creates and returns a media frame with the given attributes.</dd>
	<dt><code>media.View</code></dt>
	<dd>The base media view.</dd>
	<dt><code>media.ajax()</code></dt>
	<dd>Alias of wp.ajax.send</dd>
	<dt><code>media.attachment( id )</code></dt>
	<dd>Returns an existing attachment (or creates one if it doesn't exist) in the <code>wp.media.Attachments.all</code> collection. Does not <code>fetch()</code> from the server surprisingly.</dd>
	<dt><code>media.audio</code></dt>
	<dd>uh</dd>
	<dt><code>media.coerce()</code></dt>
	<dd>A helper mixin function to avoid truthy and falsey values being passed as an input that expects booleans.</dd>
	<dt><code>media.controller</code></dt>
	<dd>Namespace for storing controllers. <BR>
		wp.media.controller.StateMachine wp.media.controller.State wp.media.controller.Library wp.media.controller.ImageDetails wp.media.controller.GalleryEdit wp.media.controller.GalleryAdd wp.media.controller.CollectionEdit wp.media.controller.CollectionAdd wp.media.controller.FeaturedImage wp.media.controller.ReplaceImage wp.media.controller.EditImage wp.media.controller.MediaLibrary wp.media.controller.Embed wp.media.controller.Cropper wp.media.controller.AudioDetails wp.media.controller.VideoDetails</dd>
	<dt><code>media.editor</code></dt>
	<dd>Manages frames that are related to TinyMCE instances(editors), including inserting content into the editor after selection.</dd>
	<dt><code>media.events</code></dt>
	<dd>A shared event bus used to provide events into the media workflows that 3rd-party devs can use to hook in. A clone of <code>Backbone.Events</code>.</dd>
	<dt><code>media.featuredImage</code></dt>
	<dd>Manages the frame for the Featured Image metabox.</dd>
	<dt><code>media.fit()</code></dt>
	<dd>Scales a set of dimensions to fit within bounding dimensions.</dd>
	<dt><code>media.frame</code></dt>
	<dd>A reference to the last media frame instantiated in <code>wp.media()</code>.</dd>
	<dt><code>media.frames</code></dt>
	<dd>um</dd>
	<dt><code>media.gallery</code></dt>
	<dd>um</dd>
	<dt><code>media.mixin</code></dt>
	<dd>um</dd>
	<dt><code>media.model</code></dt>
	<dd>Namespace containing media models.</dd>
	<dt><code>media.playlist</code></dt>
	<dd>um</dd>
	<dt><code>media.post</code></dt>
	<dd>Alias of <code>wp.ajax.post</code>. Sends a POST request to WordPress.</dd>
	<dt><code>media.query( props )</code></dt>
	<dd>Return a new attachments collection(<code>wp.media.model.Attachments</code>) with the given query properties.</dd>
	<dt><code>media.selectionSync</code></dt>
	<dd>um</dd>
	<dt><code>media.string</code></dt>
	<dd>Helper functions to create strings. audio, image, link, props, video.</dd>
	<dt><code>media.template( id )</code></dt>
	<dd>Fetches and compiles a micro-template by id, proxying to <code>_.template</code><br>
		Expects a prefix of <code>'tmpl-'</code>. e.g. <code>template( 'attachment-details' )</code> equals a selector of <code>'#tmpl-attachment-details'</code>.</dd>
	<dt><code>media.transition</code></dt>
	<dd>um</dd>
	<dt><code>media.truncate()</code></dt>
	<dd>um</dd>
	<dt><code>media.video</code></dt>
	<dd>um</dd>
	<dt><code>media.view</code></dt>
	<dd>Namespace for storing all media Backbone views.</dd>
	<dt><code>media.view.settings</code></dt>
	<dd>Localization strings and user settings.</dd>
</dl>