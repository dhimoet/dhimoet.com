$(document).ready(function(){
	
	$('.item_icon > a').click(function(){
	  
		// Show description
		var hash_name = $(this).attr('rel');
		$('.item_description').slideUp();
		$('#twitter, #email').fadeOut();
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
		$('#twitter, #email').delay(400).fadeIn();
    
	});
	
	// open email form popup window
	$('#email_me').click(function() {
		
		// open overlay
		var overlay_view = new OverlayView({ el: $("#overlay_container") });
		
		// place a form
		var send_email_view = new SendEmailView({ el: $("#overlay_content") });
		
		expandOverlayElements();
		
		// initialize validation engine
		$("#email_form").validationEngine();
	});
});
