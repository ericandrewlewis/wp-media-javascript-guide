<h3>wp.media( attributes )</h3>
<p>Returns a media workflow.</p>
<pre><code class="language-javascript">// Returns a Select frame.
var selectFrame = wp.media({
	// Accepts [ 'select', 'post', 'image', 'audio', 'video' ]
	frame: 'select'
}); </code></pre>
See <?php WPMJG::the_section_link( 'wp.media.view.MediaFrame.Post' ) ?>,
<?php WPMJG::the_section_link( 'wp.media.view.MediaFrame.Select' ) ?>,
<?php WPMJG::the_section_link( 'wp.media.view.MediaFrame.ImageDetails' ) ?>,
<?php WPMJG::the_section_link( 'wp.media.view.MediaFrame.AudioDetails' ) ?>,
<?php WPMJG::the_section_link( 'wp.media.view.MediaFrame.VideoDetails' ) ?>