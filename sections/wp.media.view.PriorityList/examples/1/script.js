(function($) {
	$(document).ready( function() {
		var PriorityList = new wp.media.view.PriorityList();

		PriorityList.set( 'fifty', new wp.Backbone.View({
			el: '<div>fifty</div>',
			priority: 50
		}));

		PriorityList.set( 'seventy', new wp.Backbone.View({
			el: '<div>seventy</div>',
			priority: 70
		}));

		PriorityList.set( 'thirty', new wp.Backbone.View({
			el: '<div>thirty</div>',
			priority: 30
		}));

		PriorityList.set( 'forty', new wp.Backbone.View({
			el: '<div>forty</div>',
			priority: 40
		}));

		PriorityList.set( 'twenty', new wp.Backbone.View({
			el: '<div>twenty</div>',
			priority: 20
		}));

		PriorityList.render();

		$('.priority-list-container').append( PriorityList.el );
	});
})(jQuery);