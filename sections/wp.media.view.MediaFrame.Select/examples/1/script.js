(function($) {
	$(document).ready( function() {
		$('.open-select-frame').on( 'click', function() {
			// Accepts an optional object hash to override default values.
			var frame = new wp.media.view.MediaFrame.Select({
				// Modal title
				title: 'Select an image',
				// Enable/disable multiple select
				multiple: true,
				//
				library: {
					order: 'ASC',
					orderby: 'title', // [ 'name', 'author', 'date', 'title', 'modified', 'uploadedTo', 'id', 'post__in', 'menuOrder' ]
					// mime type.
					type: 'image', // [ 'audio', 'video', 'image' ]
					// Searches the attachment title.
					search: 'term'
					// uploadedTo:
				}
			});
			frame.open();
		});
	});
})(jQuery);