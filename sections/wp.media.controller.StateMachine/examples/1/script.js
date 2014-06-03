(function($) {
	$(document).ready( function() {
		// Create a state machine.
		var StateMachine = new wp.media.controller.StateMachine();

		// A basic state constructor we will use for both of the states.
		var BasicStateConstructor = wp.media.controller.State.extend({
			// States expect a `frame` reference, so we'll fake it for this example.
			frame: { on: function() {}, off: function() {},
				title: { render: function() {} },
				$el: jQuery('<div></div>')
			},

			/**
			 * Activate callback.
			 *
			 * autowired (see media.controller.State.constructor() ) to be called when a state
			 * is activated (see media.controller.StateMachine.setState() )
			 */
			activate: function() {
				alert( 'The state is now ' + this.id );
			}
		});

		// Add an `on` and `off` state to the state machine.
		StateMachine.states.add( [
			new BasicStateConstructor({ id: 'on' }),
			new BasicStateConstructor({ id: 'off' })
		] );

		// Bind click handlers to update the current state depending on which button
		// is clicked.
		$('.js--switch-to-on-state').click( function() {
			StateMachine.setState( 'on' );
		});
		$('.js--switch-to-off-state').click( function() {
			StateMachine.setState( 'off' );
		});
	});
})(jQuery);