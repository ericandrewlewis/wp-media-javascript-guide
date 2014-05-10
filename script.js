(function($) {
	$(document).ready( hljs.initHighlightingOnLoad );

	$(document).ready( function() {
		$('.chapters-dropdown-trigger').on( 'click', function( event ) {
			event.preventDefault();
			$('.chapter-index').toggleClass( 'active' );
		});
	});
})(jQuery);

