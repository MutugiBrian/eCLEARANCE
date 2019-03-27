// JavaScript Tooltip
// Load this script once the document is ready
	$(document).ready(function () {
		
		// Get all the thumbnail
		$('div.thumbnail-item').mouseenter(function(e) {

			// Calculate the position of the image tooltip
			x = e.pageX - $(this).offset().left;
			y = e.pageY - $(this).offset().top;

			// Set the z-index of the current item, 
			// make sure it's greater than the rest of thumbnail items
			// Set the position and display the image tooltip
			$(this).css('z-index','15')
			.children("div.tooltip")
			.css({'top': y - 90,'left': x + 50,'display':'block'});
			
		}).mousemove(function(e) {
			
			// Calculate the position of the image tooltip			
			x = e.pageX - $(this).offset().left;
			y = e.pageY - $(this).offset().top;
			
			// This line causes the tooltip will follow the mouse pointer
			$(this).children("div.tooltip").css({'top': y - 90,'left': x+50});
			
		}).mouseleave(function() {
			
			// Reset the z-index and hide the image tooltip 
			$(this).css('z-index','1')
			.children("div.tooltip")
			.animate({"opacity": "hide"}, "fast");
		});

	});