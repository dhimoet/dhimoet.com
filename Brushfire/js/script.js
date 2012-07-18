$(document).ready(function() {
	
	/*** Menu navigation selector ***/
	$('.menu_nav li a').click(function() {
		$('.menu_nav li a').removeClass('nav_active');
		$('.menu_nav li a').addClass('nav_passive');
		$(this).addClass('nav_active');
		$('#prizes').scroll();
	});
	
	/*** Show overlay ***/
	$('#sweepstakes').submit(function() {
		$('body').prepend('<div class="overlay_background"></div>');
		$('body').prepend('<div class="overlay_window"></div>');
		$('.overlay_window').append('<h2>Terms And Conditions</h2>');
		$('.overlay_window').append('<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>');
		$('.overlay_window').append('<img src="img/close_button.png"/>');
		$('.overlay_background').height($(document).height());
		$('.overlay_window').css('top', $(window).height()/2 - 204);
		$('.overlay_window').css('left', $(window).width()/2 - 430);
		return false;
	});
	
	/*** Close overlay ***/
	$('.overlay_window img').live('click', function() {
		$('.overlay_window').remove();
		$('.overlay_background').remove();
	});
	
	/*** Remove placeholders ***/
	$('.input_text').focus(function() {
		if($(this).val() == "First Name" || $(this).val() == "Last Name" || $(this).val() == "Email") {
			$(this).val('');
		}
	});
	
	/*** Add placeholders ***/
	$('.input_text').blur(function() {
		if($(this).val() == '') {
			if($(this).attr('name') == 'firstname') {
				$(this).val('First Name');
			}
			else if($(this).attr('name') == 'lastname') {
				$(this).val('Last Name');
			}
			else if($(this).attr('name') == 'email') {
				$(this).val('Email');
			}
		}
	});
	
});
