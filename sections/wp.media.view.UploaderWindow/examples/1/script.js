(function($) {
	$(document).ready( function() {
		var uploaderWindow = new media.view.UploaderWindow({
			controller: { trigger: function() {}, on: function() {} },
			uploader: {
				dropzone:  $('body'),
				container: $('body')
			}
		}).render();
		uploaderWindow.ready();
		$('body').append( uploaderWindow.el );
	});
})(jQuery);