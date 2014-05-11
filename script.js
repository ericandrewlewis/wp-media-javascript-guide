(function($) {
	$(document).ready( hljs.initHighlightingOnLoad );

	$(document).ready( function() {
		$('.chapters-dropdown-trigger').on( 'click', function( event ) {
			event.preventDefault();
			$('.chapter-index').toggleClass( 'active' );
		});
	});


	$(document).ready( function() {
		$('iframe').on( 'load', function( event ) {
			var $iframe = $( event.currentTarget );
			var innerHeight = $(event.currentTarget.contentWindow.document)
				.find('#wpwrap')
				.outerHeight() + 20 /* arbitrary border on iframe */;
			$iframe.css( 'height', innerHeight );
		});
	});
})(jQuery);

