<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>index</title>
		<meta name="author" content="Faysal Shahzad" />
		<!-- Date: 2013-09-26 -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
		 <link rel="stylesheet" href="../../css/rating.css" />
	</head>
	<body>
		<h1>This is the heading of the plugin</h1>
		<div id="box1">
			Please evaluate our product:
			<span class="star-rating r2" data-value"4">Rating : 4.5 stars out of 5</span><br>
 		</div>
 		
 		<div id="box2">
			Please evaluate our product:
			<span  class="star-rating r3" data-val="3">Rating : 4.5 stars out of 5</span><br>
 		</div>
		
 		<div id="box3">
			Please evaluate our product:
			<span  class="star-rating r35" data-val="3">Rating : 4.5 stars out of 5</span><br>
 		</div>
		
		<script type="text/javascript">
		/* Anonymous and self invoking function example
		(function (arg) {
		  alert("Hi"+arg);
		} )	(15); */
		
			$(document).ready(function() {
								
				
				
				$("span.star-rating").bind("mousemove", function(e) {
            		var x = (e.pageX-this.offsetLeft);
            		var newPosX = Math.ceil((x/20))*20;
            		 newPosX-=100;
            		$(this).css("background-position",newPosX+'px '+'80px');
               });

	            $("span.star-rating").bind("mouseout", function() {
        	        $(this).removeClass('[class^="r"]');
            	});

	            $("span.star-rating").bind("click", function(e) {
					var x = (e.pageX-this.offsetLeft);
            		x = Math.ceil(x/20);
            	});
            	
				$();
			});		

			function fillStarRating() {
				
			}
		</script>
	</body>
</html>

