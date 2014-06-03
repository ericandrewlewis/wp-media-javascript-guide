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

			// Fires after the frame markup has been built, but not appended to the DOM.
			// @see wp.media.view.Modal.attach()
			frame.on( 'ready', function() {} );

			// Fires when the frame's $el is appended to its DOM container.
			// @see media.view.Modal.attach()
			frame.on( 'attach', function() {} );

			// Fires when the modal opens (becomes visible).
			// @see media.view.Modal.open()
			frame.on( 'open', function() {} );

			// Fires when the modal closes.
			// @see media.view.Modal.close()
			frame.on( 'close', function() {} );

			// Fires when the modal closes via the escape key.
			// @see media.view.Modal.close()
			frame.on( 'escape', function() {} );

			// Fires when a user has selected attachment(s) and clicked the select button.
			// @see media.view.MediaFrame.Post.mainInsertToolbar()
			frame.on( 'select', function() {} );

			// Fires when a state activates.
			frame.on( 'activate', function() {} );

			// Fires when a new mode is deactivated on a region.
			frame.on( '{region}:deactivate', function() {} );

			// Fires when a new mode is activated on a region.
			frame.on( '{region}:activate', function() {} );

			frame.on( 'all', function() {
				console.log( arguments );
			} );

			frame.on( 'all', function() {
				if ( arguments[0] === 'content:activate')
					debugger;
			} );



			// Get an object representing the current state.
			frame.state();

			// Get an object representing the previous state.
			frame.lastState();

			// Open the modal.
			frame.open();
			debugger;
		});
	});
})(jQuery);