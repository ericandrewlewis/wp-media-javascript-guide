(function($) {
	$(document).ready( hljs.initHighlightingOnLoad );

	// Example 1: wp.Backbone.View
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

	// Example 2: wp.media.View.Modal
	$(document).ready( function() {
		// When the user clicks a button, create a modal.
		$('.js--example-2--open-media-modal').click( function( event ) {
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

	// Example 3: media.controller.Region
	$(document).ready( function() {
		$('.js--example-3--render-region').click( function( event ) {
			event.preventDefault();

			// A region requires a parent view to live inside.
			var RegionParentViewConstructor = wp.Backbone.View.extend({
				// When the view is initialized, bind events to callbacks.
				initialize: function() {
					// Regions trigger events on their parent views, which
					// the parent view should bind callbacks for.

					// When the region is created:
					// Events triggered: {region-id}:create and {region-id}:create:{mode}
					this.on( 'region-1:create', this.onCreateRegion, this );

					// When the region is rendered:
					// Events triggered: {region-id}:render and {region-id}:render:{mode}
				},

				/**
				 * On the "create" event, the region controller is passed as an
				 * argument.
				 *
				 * This is the time to create a view on the region.
				 */
				onCreateRegion: function( region ) {
					// Create a basic view constructor that binds to a template.
					var RegionViewConstructor = wp.Backbone.View.extend({
						// assign a compiled template function.
						template: wp.template( 'example-3-view-1' )
					});
					// Create the view for the region, which is automatically
					// rendered later.
					region.view = new RegionViewConstructor();
				}
			});
			// Create an instance of the RegionParentView.
			var RegionParentView = new RegionParentViewConstructor({
				// Tie the view to an existing DOM element.
				el: '.example-3--region-parent-view'
			});
			// Render the region parent view.
			RegionParentView.render();

			// Create a new region
			var RegionOne = new wp.media.controller.Region({
				// Unique identifier.
				id: 'region-1',
				// The region's parent view.
				view: RegionParentView,
				// The selector for the element in the parent view's markup
				// that represents the region.
				selector: '.region-1'
			});
			// Render a mode on the region to trigger the {region}:create
			// event on the parent view.
			RegionOne.render( 'some-mode' );
		});
	});


})(jQuery);

