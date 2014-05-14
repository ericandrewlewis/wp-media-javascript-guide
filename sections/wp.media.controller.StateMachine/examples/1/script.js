(function($) {
	$(document).ready( function() {
		var StateMachine = new wp.media.controller.StateMachine();

		var BasicStateConstructor = wp.media.controller.State.extend({
			frame: {
				on: function() {},
				off: function() {},
				title: {
					render: function() {}
				},
				$el: jQuery('<div></div>')
			},
			activate: function() {
				alert( 'The state is now ' + this.id );
			}
		});

		StateMachine.states.add( [ new BasicStateConstructor({ id: 'on' }),
			new BasicStateConstructor({ id: 'off' }) ] );

		$('.js--switch-to-on-state').click( function( event ) {
			event.preventDefault();
			// Set the state to the "on" state.
			StateMachine.setState( 'on' );
		});
		$('.js--switch-to-off-state').click( function( event ) {
			event.preventDefault();
			// Set the state to the "off" state.
			StateMachine.setState( 'off' );
		});
	});
})(jQuery);