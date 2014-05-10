(function($) {
	$(document).ready( function() {
		// Create a modal view.
		var modal = new wp.media.view.Modal({
			// A controller object is expected, but let's just pass
			// a fake one to illustrate this proof of concept without
			// getting console errors.
			controller: { trigger: function() {} }
		});
		// Create a modal content view.
		var ModalContentView = wp.Backbone.View.extend({
			template: wp.template( 'modal-content' )
		});

		// When the user clicks a button, open a modal.
		$('.js--open-media-modal').click( function( event ) {
			event.preventDefault();
			// Assign the ModalContentView to the modal as the `content` subview.
			// Proxies to View.views.set( '.media-modal-content', content );
			modal.content( new ModalContentView() );
			// Out of the box, the modal is closed, so we need to open() it.
			modal.open();
		});
	});
})(jQuery);