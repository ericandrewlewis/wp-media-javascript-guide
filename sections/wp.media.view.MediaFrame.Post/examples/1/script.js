(function($) {
	$(document).ready( function() {
		$('.open-post-frame').on( 'click', function() {
			// Accepts an optional object hash to override default values.
			var frame = new wp.media.view.MediaFrame.Post({
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
				},
				button: {
					text: {
					}
				}
			});

			// Fires when the frame's $el is appended to its DOM container.
			// @see media.view.Modal.attach()
			frame.on( 'attach', function() {} );

			// Fires when the modal opens.
			// @see media.view.Modal.open()
			frame.on( 'open', function() {} );

			// Fires when the modal closes.
			// @see media.view.Modal.close()
			frame.on( 'close', function() {} );

			// Fires when the modal closes via the escape key.
			// @see media.view.Modal.close()
			frame.on( 'escape', function() {} );

			// Fires when a user has selected attachment(s) and clicked the insert button.
			// @see media.view.MediaFrame.Post.mainInsertToolbar()
			frame.on( 'insert', function() {} );

			frame.on( 'all', function() { console.log( this, arguments ) } );

			frame.open();
		});
	});
})(jQuery);