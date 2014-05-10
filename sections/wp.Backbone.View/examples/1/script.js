(function($) {
	$(document).ready( function() {
		// Create view and subview constructors.
		var ViewConstructor = wp.Backbone.View.extend({
			// assign a compiled template function.
			template: wp.template( 'view-1' )
		});
		var SubviewConstructor = wp.Backbone.View.extend({
			template: wp.template( 'view-2' )
		});

		// Create the views.
		var View = new ViewConstructor({
			// specify an existing element in the document to bind the view to.
			el: '.view-1-container'
		});
		var Subview = new SubviewConstructor();

		// Set the subview on a selector inside the main view's template.
		View.views.set( '.subview-container', Subview );

		$('.js--render-view-1').on( 'click', function() {
			// When a parent view is rendered, all subviews are rendered automagically.
			View.render();
		});
	});
})(jQuery);