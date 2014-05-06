(function($) {
	$(document).ready(function() {
		// On clicking the open media frame button...
		// open a media frame.
		$('.open-media-frame-with-region-renderers').click(function( event ) {
			event.preventDefault();
			// Instantiate a media frame view.
			var BasicFrameView = wp.media.view.MediaFrame.extend({
				initialize: function() {
					/**
					 * call 'initialize' directly on the parent class
					 */
					wp.media.view.MediaFrame.prototype.initialize.apply( this, arguments );

					// By default, a frame will render the region container, but no
					// views within them. So it's up to you to bind callback events
					// to specific region action events.
					this.bindHandlers();
					this.createStates();
				},

				/**
				 * Bind region callbacks to region action events.
				 *
				 * {region}:{action}:{mode}
				 */
				bindHandlers: function() {
					// Create a router view in the Router region.
					this.on( 'router:create', this.createRouter, this );

					// Router render callback.
					this.on( 'router:render', this.renderRouter, this );

					// Content render callback.
					this.on( 'content:create', this.createContent, this );
				},

				/**
				 * Render the router region.
				 *
				 * @param  {wp.media.view.Router} view
				 */
				renderRouter: function( view ) {
					view.set({
						// This view will be auto select()-ed via State._router()
						// since it coincides with the `content` region's default state.
						default: {
							text:     'Default Router Item',
							priority: 20
						},
						another: {
							text:     'Another Router Item',
							priority: 40
						}
					});
				},

				/**
				 * Render the content region.
				 * @return {this.regions.content} The content region.
				 */
				createContent: function( content ) {
					var ContentView = wp.Backbone.View.extend({
						render: function() {
							this.$el.html( '<h1>FREEFORM MODAL CONTENT WEE!!!</h1>' );
							wp.Backbone.View.prototype.render.apply( this, arguments );
						}
					});
					content.view = new ContentView();
				},
				/**
				 * Create states associated with the frame.
				 */
				createStates: function() {
					var options = this.options;

					if ( this.options.states ) {
						return;
					}

					// Add the default states.
					this.states.add([
						// Main states.
						new wp.media.controller.State({
							// sub-states for each region.
							id:         'default',
							toolbar:    'default',
							sidebar:    'default',
							content:    'default',
							router:     'default',
							menu:       'default',
						})
					]);
				}

			});
			var frame = new BasicFrameView();
			frame.setState( 'default' );

			// not sure what this is and i wrote it 4 hours ago.
			// frame.router.render();
			frame.open();
		});
	});
})(jQuery);