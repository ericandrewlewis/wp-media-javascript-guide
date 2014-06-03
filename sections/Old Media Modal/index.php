<h3>Old Media Modal</h3>
<p>As WordPress is fully backwards compatible, the previous media library is still available for use. </p>
<div class="example">
	<h4>Enable 3.5- media modal in WP 3.5+</h4>
	<pre><code class="language-php">&lt;?php
/**
 * Remove the new media button, add the old media button.
 */
function rejigger_media_button_actions() {
	remove_action( &#039;media_buttons&#039;, &#039;media_buttons&#039; );
	add_action( &#039;media_buttons&#039;, &#039;old_media_buttons&#039; );
}
add_action( &#039;admin_init&#039;, &#039;rejigger_media_button_actions&#039; );

/**
 * Create the HTML for the old media button.
 */
function old_media_buttons( $editor_id = &#039;content&#039; ) {
	printf( &#039;&lt;a href=&quot;%s&quot; class=&quot;thickbox add_media&quot; id=&quot;%s-add_media&quot; title=&quot;%s&quot; onclick=&quot;return false;&quot;&gt;%s&lt;/a&gt;&#039;,
		esc_url( get_upload_iframe_src() ),
		esc_attr( $editor_id ),
		esc_attr__( &#039;Add Media&#039; ),
		sprintf( &#039;Upload/Insert &lt;img src=&quot;%s&quot; width=&quot;15&quot; height=&quot;15&quot; /&gt;&#039;,
			esc_url( admin_url( &#039;images/media-button.png?ver=20111005&#039; ) ) ) );
}</code></pre>
</div>