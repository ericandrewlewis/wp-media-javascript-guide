<div class="media-library-screenshot">
	<div class="vignette"></div>
</div>
<p>The WordPress media library interfaces (the media modal) are a Javascript heavy
feature written with <a target="_blank" href="http://backbonejs.org">Backbone</a>.
Backbone is a light, unopinionated framework that can be dropped into an existing
web application without much investment, making it suitable for WordPress core, where
new features need to play nicely with existing functionality and our commitment
to backwards compatibility.</p>

<p>Javascript classes are documented in separate sections here.</p>

<h3>FAQ</h3>

<h4>I'm writing a plugin/theme and need a user to select an attachment, and do something
with that selection. Can I use the media modal to do this?</h4>
<p>Yes! The <a href="<?php echo WPMJG::get_section_url( 'wp.media.view.MediaFrame.Select' ) ?>">Select workflow</a> can do this for you.</p>

<h4>I want to add extra fields to the edit attachment interface.</h4>
<p>You can! Use the <a href="<?php echo WPMJG::get_section_url( 'attachment_fields_to_edit' ) ?>">attachment_fields_to_edit filter</a> to produce extra UI, and save this extra data on the edit_attachment action.</p>

<h3>External Resources</h3>
<ul>
	<li><a href="https://www.youtube.com/watch?v=j5KPXLzuBXE">A video of Daryl Koopersmith gave a high level introduction to WordPress media during the 3.5 release cycle</a>.</li>
	<li><a target="_blank" href="http://addyosmani.github.io/backbone-fundamentals/">Developing Backbone.js Applications</a> by Addy Osmani. A good introduction to Javascript MV* development.</li>
</ul>