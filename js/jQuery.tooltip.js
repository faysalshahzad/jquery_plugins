(function($) {

	$.fn.tooltip = function(options) {  
		
		var defaults = {
						 background: 'lightgrey',
						 color: 'black',
						 rounded: false
					},
		
		settings = $.extend({}, defaults, options);
		
		// do that for all a.tooltip elements in the document
		this.each(function() {  
			var $this = $(this);
			var title = $(this).attr("title");
		
			if($this.is('a') && $this.attr('title') != '') {
				$this.hover(function(e) {
					$('<div id="tooltip"></div>')
						.appendTo('body')
						.text(title)
						.css({
							backgroundColor: settings.background,
							color: settings.color,
							top: e.pageY + 10,
                     	    left: e.pageX + 20
                      })
                      .fadeIn(350);
					 
					 if(settings.rounded) {
                   	 	$('#tooltip').addClass('rounded');
                  }
			
				}, 
					function() {
					$('#tooltip').remove();
				});
			}
			
			$this.mousemove(function (e) {
				$('#tooltip').css({
					top: e.pageY + 10,
					left: e.pageX + 20
				});
			});
		});
		
		// returns the jQuery object to allow for chainability.
          return this;
	};	
	
})(jQuery);