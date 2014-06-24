( function($) {
		$.fn.starRating = function(opts) {
			var settings = $.extend({}, opts);
			var normalizeRatingValue = function(rate) {
				if ( typeof 'undefined' == rate) {
					return 0.0;
				}
				if ((rate % 5) !== 0) {
					rate = Math.round(rate * 2.0) / 2.0;
				}
				return rate;
			};
			var getRatingValueClass = function(value) {
				if (!value || isNaN(value)) {
					value = 0.0;
				}
				value = normalizeRatingValue(value);
				return new String(value).replace('.', '');
			};
			var setRatingClass = function(value, elem) {
				if (!elem) {
					return 0.0;
				}
				value = getRatingValueClass(value);
				elem.addClass("r" + value);
			};
			return this.each(function() {
				var $this = $(this), doneVoting = false;
				$this.on("mousemove", function(e) {
					var newPosX = (e.pageX - $this.offset().left);
					var starOffset = Math.ceil(newPosX / 20);
					$this.removeClass().addClass("star-rating hover" + starOffset);
				});
				$this.on("mouseout", function() {
					$this.removeClass(function(index, css) {
						return (css.match(/\bhover\S+/g) || []).join(' ');
					}).addClass("r" + getRatingValueClass($this.data("value")));
				});
				$this.on("click", function(e) {
					if (doneVoting)
						return;
					var rating = (e.pageX - $this.offset().left);
					rating = Math.ceil(rating / 20);
					var id = $this.data("id");
					var type = $this.data("type");
					var params = {
						"version" : "2.0",
						"id" : id,
						"value" : rating,
						"type" : type
					};
					$("#mp-thanks").show();
					var url = settings.serviceURL;
					$.getJSON(url, params, function(result) {
						if (result.status && result.data) {
							doneVoting = true;
							$this.data("value", rating);
							setRatingClass(rating, $this);
						}
					});
				});
				setRatingClass($this.data("value"), $this);
			});
		};
	}(jQuery));
;
$('.star-rating').starRating({
	serviceURL : "/service/Rating/rate"
}); 