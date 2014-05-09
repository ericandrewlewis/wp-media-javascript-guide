(function($) {
	$(document).ready( hljs.initHighlightingOnLoad );

	// Example 1
	$(document).ready( function() {
		// Create view and subview constructors.
		var ViewConstructor = wp.Backbone.View.extend({
			// assign a compiled template function.
			template: wp.template( 'example-1-view-1' )
		});
		var SubviewConstructor = wp.Backbone.View.extend({
			template: wp.template( 'example-1-view-2' )
		});

		// Create the views.
		var View = new ViewConstructor({
			// specify an existing element in the document to bind the view to.
			el: '.example-1-view-1-container'
		});
		var Subview = new SubviewConstructor();

		// Set the subview on a selector inside the main view's template.
		View.views.set( '.subview-container', Subview );
		$('.js--example-1--render-view-1').on( 'click', function() {
			// When a parent view is rendered, all subviews are rendered automagically.
			View.render();
		});
	});

	// Example 2
	$(document).ready( function() {
		// When the user clicks a button, create a modal.
		$('.js--example-2-open-media-modal').click( function( event ) {
			event.preventDefault();
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
			// Assign the ModalContentView to the modal as the `content` subview.
			// Proxies to View.views.set( '.media-modal-content', content );
			modal.content( new ModalContentView() );
			// Out of the box, the modal is closed, so we need to open() it.
			modal.open();
		});
	});

})(jQuery);

