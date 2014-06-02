<h3>wp.media</h3>
<p>The WordPress Javascript namespace for all media elements.</p>
<dl>
	<dt><code>media( attributes )</code></dt>
	<dd>Creates and returns a media frame with the given attributes.</dd>
	<dt><code>media.View</code></dt>
	<dd>The base media view.</dd>
	<dt><code>media.ajax</code></dt>
	<dd>Alias of wp.ajax.send</dd>
	<dt><code>media.attachment( id )</code></dt>
	<dd>Returns an existing attachment (or creates one if it doesn't exist) in the wp.media.Attachments.all collection.</dd>
	<dt><code>media.audio</code></dt>
	<dd>uh</dd>
	<dt><code>media.coerce</code></dt>
	<dd>A helper mixin function to avoid truthy and falsey values being passed as an input that expects booleans.</dd>
	<dt><code>media.controller</code></dt>
	<dd>Namespace for storing controllers. <BR>
		wp.media.controller.StateMachine wp.media.controller.State wp.media.controller.Library wp.media.controller.ImageDetails wp.media.controller.GalleryEdit wp.media.controller.GalleryAdd wp.media.controller.CollectionEdit wp.media.controller.CollectionAdd wp.media.controller.FeaturedImage wp.media.controller.ReplaceImage wp.media.controller.EditImage wp.media.controller.MediaLibrary wp.media.controller.Embed wp.media.controller.Cropper wp.media.controller.AudioDetails wp.media.controller.VideoDetails</dd>
	<dt><code>media.editor</code></dt>
	<dd>Manages frames that are related to TinyMCE instances(editors) and inserting content into the frame after selection.</dd>
	<dt><code>media.events</code></dt>
	<dd>A shared event bus used to provide events into the media workflows that 3rd-party devs can use to hook in. A clone of Backbone.Events.</dd>
	<dt><code>media.featuredImage</code></dt>
	<dd>um</dd>
	<dt><code>media.fit</code></dt>
	<dd>um</dd>
	<dt><code>media.frame</code></dt>
	<dd>um</dd>
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
	<dd>Alias of wp.ajax.post. Sends a POST request to WordPress.</dd>
	<dt><code>media.query( props )</code></dt>
	<dd>Return a new Attachments collection(wp.media.model.Attachments) with the given query props.</dd>
	<dt><code>media.selectionSync</code></dt>
	<dd>um</dd>
	<dt><code>media.string</code></dt>
	<dd>Helper functions to create strings. audio, image, link, props, video.</dd>
	<dt><code>media.template( id )</code></dt>
	<dd>Fetches and compiles a micro-template by id, proxying to <code>_.template</code><br>
		Expects a prefix of 'tmpl-'. e.g. template( 'attachment-details' ) selects '#tmpl-attachment-details'</dd>
	<dt><code>media.transition</code></dt>
	<dd>um</dd>
	<dt><code>media.truncate</code></dt>
	<dd>um</dd>
	<dt><code>media.video</code></dt>
	<dd>um</dd>
	<dt><code>media.view</code></dt>
	<dd>Namespace for storing all media Backbone views.</dd>
	<dt><code>media.view.settings</code></dt>
	<dd>Localization strings and user settings.</dd>
</dl>