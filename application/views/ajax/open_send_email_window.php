<div id="send_email_container"></div>

<script type="text/template" id="send_email_template">
	<form id="email_form">	
		<div class="form_field">
			<div class="form_element">
				<label>Your email address:</label>
			</div>
			<div class="form_element">
				<input type="text" id="from" class="validate[required,custom[email]]" />
			</div>
		</div>
		<div class="form_field">
			<div class="form_element">
				<label>Comment:</label>
			</div>
			<div class="form_element">
				<textarea id="message" class="validate[required]" ></textarea>
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
						$('input[type=submit]').hide();
					},
					success: function() {
						$('#overlay_container').remove();
					},
					error: function() {
						$('input[type=submit]').show();
					}
				});
			}
        }
    });
        
    var send_email_view = new SendEmailView({ el: $("#send_email_container") });
    
    // initialize validation engine
    $("#email_form").validationEngine();
    
    // Expand overlay elements
    $('#overlay_window').css('top', ($(window).height() / 2) - ($('#overlay_window').height() / 2));
	$('#overlay_window').css('left', ($(window).width() / 2) - ($('#overlay_window').width() / 2));
</script>
