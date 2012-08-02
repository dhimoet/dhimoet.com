$(document).ready(function(){
	
	$('.item_icon > a').click(function(){
	  
		// Show description
		var hash_name = $(this).attr('rel');
		$('.item_description').slideUp();
		$('#twitter').fadeOut();
		$(hash_name).delay(400).slideDown();
		
		// Animate clicked icon
		$().animate();
		$('.item_icon > a').removeClass('active');
		$(this).addClass('active');
    
	});
  
	$('.close').click(function() {
	  
		// Close description
		$('.item_description').slideUp();
		$('.item_icon > a').removeClass('active');
		$('#twitter').delay(400).fadeIn();
    
	});
	
	$('body').click(function() {
	
		// Create overlay elements
		$('body').prepend('<div id="overlay_background"></div>');
		$('body').prepend('<div id="overlay_window"></div>');
		$('#overlay_window').prepend('<form name="email_me" id="email_me" method="post" action="#sent"></form>');
		$('#email_me').prepend('<div><input type="submit" value="Send Email" /></div>');
		$('#email_me').prepend('<div><textarea name="message" id="message">Comment</textarea></div>');
		$('#email_me').prepend('<div><label>From: </label><input type="text" name="from" id="from" /></div>');

		// Expand overlay elements
		$('#overlay_background').height($(window).height());
		$('#overlay_background').width($(window).width());
		$('#overlay_window').css('top', ($(window).height() / 2) - ($('#overlay_window').height() / 2));
		$('#overlay_window').css('left', ($(window).width() / 2) - ($('#overlay_window').width() / 2));
	
	});
});
