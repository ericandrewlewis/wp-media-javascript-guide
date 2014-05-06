(function($) {
	$(document).ready(function() {
		// On clicking the open media frame button...
		// open a media frame.
		$('.open-media-frame').click(function( event ) {
			event.preventDefault();
			// Instantiate a media frame view.
			var mediaFrame = new wp.media.view.MediaFrame();
			mediaFrame.open();
		});
	});
})(jQuery);