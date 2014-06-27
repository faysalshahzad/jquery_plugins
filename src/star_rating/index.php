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
			<span class="star-rating" data-id="1"></span>
		</div>
 		
 		<div id="box2">
			Please evaluate our product:
			<span  class="star-rating" data-id="3"></span>
		</div>
		
 		<div id="box3">
			Please evaluate our product:
			<span  class="star-rating" data-id="5"></span>
			
 		</div>
		
		<script type="text/javascript">
		/* Anonymous and self invoking function example
		(function (arg) {
		  alert("Hi"+arg);
		} )	(15); */
		
			$(document).ready(function() {
				
				ratingUrl = "star_rating.php";
				fillStarRating(3);
				
                $("span.star-rating").bind("mousemove", function(e) {
            		var x = (e.pageX-this.offsetLeft)-7;
            		var newPosX = Math.ceil((x/20))*20;
            		 newPosX-=100;
            		$(this).css("background-position",newPosX+'px '+'80px');
                });

	            $("span.star-rating").bind("mouseout", function() {
        	        $(this).removeClass('[class^="r"]');
            	});

	            $("span.star-rating").bind("click", function(e) {
					var ratingValue = (e.pageX-this.offsetLeft);
            		ratingValue = Math.ceil(ratingValue/20);
                    var elemid = $(this).attr('data-id');
                    $.ajax ({
                        url:ratingUrl,
                        type: "GET",
                        data : {id:elemid, value: ratingValue},
                        success: function(result) {
                            alert(result);
                            fillStarRating(elemid);
                        },
                        error: function() {alert("Unfortunately an error occured");},
                        async:false,
                        cache: false
                    });
            	});
            	
			
			});		

			function fillStarRating(dataid) {
				
                $.ajax({
                    url:ratingUrl,
                    type: "GET",
                    data : {id:dataid},
                    success: function(result) {
                        alert(result);
                        var values = result.split(" ");
                        var totalvotes = values[0];
                        var rating = values[1];
                            rating = rating.split('.').join("");
                        $('span[data-id='+dataid+']').addClass("r"+rating);
                        $("<span class='count'>("+totalvotes+")</span>").insertAfter('span[data-id='+dataid+']');
                    },
                    error: function() {alert("Unfortunately an error occured");},
                    async:false,
                    cache: false
                });
                
                 return false; // for asynchrnous testing, will be executed immediately if async is true, we can also use e.preventDefault; e.stopPropagation; instead of return false;
                // e.unbind();  

			}
		</script>
	</body>
</html>

