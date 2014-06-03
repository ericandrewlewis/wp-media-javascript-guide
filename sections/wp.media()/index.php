<h3>wp.media( attributes )</h3>
<p>Returns a media workflow.</p>
<pre><code class="language-javascript">// Returns a Select frame.
var selectFrame = wp.media({
	// Accepts [ 'select', 'post', 'image', 'audio', 'video' ]
	frame: 'select'
}); </code></pre>
See <a href="<?php echo WPMT::get_section_url( 'wp.media.view.MediaFrame.Post' ) ?>">wp.media.view.MediaFrame.Post</a>,
<a href="<?php echo WPMT::get_section_url( 'wp.media.view.MediaFrame.Select' ) ?>">wp.media.view.MediaFrame.Select</a>
<a href="<?php echo WPMT::get_section_url( 'wp.media.view.MediaFrame.ImageDetails' ) ?>">wp.media.view.MediaFrame.ImageDetails</a>
<a href="<?php echo WPMT::get_section_url( 'wp.media.view.MediaFrame.AudioDetails' ) ?>">wp.media.view.MediaFrame.AudioDetails</a>
<a href="<?php echo WPMT::get_section_url( 'wp.media.view.MediaFrame.VideoDetails' ) ?>">wp.media.view.MediaFrame.VideoDetails</a>