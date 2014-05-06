(function($) {
	$(document).ready(function() {
		// On clicking the open media modal button...
		// open a media modal.
		$('.open-media-modal').click(function( event ) {
			event.preventDefault();
			// Instantiate a modal view.
			var modal = new wp.media.view.Modal({
				controller: {
					trigger: function() {}
				},
				title: 'A Blank Modal'
			});
			// Create a "content" view that will go inside the modal.
			var ModalContentView = wp.Backbone.View.extend({
				render: function() {
					this.$el.html( '<h1>FREEFORM MODAL CONTENT WEE!!!</h1>' );
					wp.Backbone.View.prototype.render.apply( this, arguments );
				}
			});
			// Bind a generic ModalContentView to the modal's .media-modal-content
			// element.
			modal.content( new ModalContentView() );
			modal.open();
		});
	});
})(jQuery);