<!-- overlay template -->
<div id="overlay_container"></div>

<script type="text/template" id="overlay_template">
	<div id="overlay_background">aaa</div>
	<div id="overlay_window">
		<span id="overlay_close_button">&nbsp;<strong>X</strong>&nbsp;</span>
		<div id="overlay_content"></div>
	</div>
</script>

<script type="text/javascript">
    OverlayView = Backbone.View.extend({
        initialize: function(){
            this.render();
        },
        render: function(){
            //Pass variables in using Underscore.js Template
            var variables = {};
            // Compile the template using underscore
            var template = _.template( $("#overlay_template").html(), variables );
            // Load the compiled HTML into the Backbone "el"
            this.$el.html( template );
        },
        events: {
            "click #overlay_close_button": "closeOverlay"  
        },
        closeOverlay: function( event ){
            $('#overlay_container').empty();
        }
    });
</script>
<!-- overlay template -->

<!-- email form template -->
<script type="text/template" id="send_email_template">
	<form id="email_form" onsubmit="return false">	
		<div class="form_field">
			<div class="form_element">
				<label>Your email address:</label>
			</div>
			<div class="form_element">
				<input type="text" id="from" class="validate[required,custom[email]]" placeholder="user@email.com" />
			</div>
		</div>
		<div class="form_field">
			<div class="form_element">
				<label>Comment:</label>
			</div>
			<div class="form_element">
				<textarea id="message" class="validate[required]" placeholder="Type your comment here..." ></textarea>
			</div>
		</div>
		<div class="form_field">
			<div class="form_submit">
				<input type="submit" value="Send Now" />
			</div>
		</div>
	</form>
</script>

<script type="text/javascript">
     SendEmailView = Backbone.View.extend({
        initialize: function(){
            this.render();
        },
        render: function(){
            //Pass variables in using Underscore.js Template
            var variables = {};
            // Compile the template using underscore
            var template = _.template( $("#send_email_template").html(), variables );
            // Load the compiled HTML into the Backbone "el"
            this.$el.html( template );
        },
        events: {
            "click input[type=submit]": "sendEmail"  
        },
        sendEmail: function( event ){
			if($("#email_form").validationEngine('validate')) {
				var from = $('#from').val();
				var message = $('#message').val();
				$.ajax({
					url: "/ajax/send_email/",
					type: "POST",
					data: {from : from, message : message},
					beforeSend: function() {
						$('input[type=submit]').before('<span class="processing">Sending...</span>');
						$('input[type=submit]').hide();
						$('.error').remove();
					},
					success: function(data) {
						if(data == "success") {
							$('#overlay_container').empty();
						}
						else {
							$('.processing').remove();
							$('input[type=submit]').show();
							$('input[type=submit]').after('<div class="error">Failed... Please try again!</div>');
						}
					},
					error: function() {
						$('.processing').remove();
						$('input[type=submit]').show();
						$('input[type=submit]').after('<div class="error">Failed... Please try again!</div>');
					}
				});
			}
        }
    });
</script>
<!-- email form template -->

<!-- functions -->
<script type="text/javascript">
	// Expand overlay elements
	function expandOverlayElements() {
		$('#overlay_background').height($(window).height());
		$('#overlay_background').width($(window).width());
		$('#overlay_window').css('top', ($(window).height() / 2) - ($('#overlay_window').height() / 2));
		$('#overlay_window').css('left', ($(window).width() / 2) - ($('#overlay_window').width() / 2));
	}
</script>
<!-- functions -->
