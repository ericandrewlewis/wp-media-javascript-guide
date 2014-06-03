(function($) {
	$(document).ready( function() {
		var uploaderWindow = new wp.media.view.UploaderWindow({
			controller: { trigger: function() {}, on: function() {} },
			uploader: {
				dropzone:  $('.dragzone'),
				container: $('.dragzone')
			}
		}).render();
		uploaderWindow.ready();
		$('.dragzone').append( uploaderWindow.el );
	});
})(jQuery);