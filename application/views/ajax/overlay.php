<div id="overlay_container"></div>

<script type="text/template" id="overlay_template">
	<div id="overlay_background">aaa</div>
	<div id="overlay_window">
		<span id="overlay_close_button">&nbsp;<strong>X</strong>&nbsp;</span>
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
            $('#overlay_container').remove();
            $('#overlay_template').remove();
        }
    });
        
    var overlay_view = new OverlayView({ el: $("#overlay_container") });
    
    // Expand overlay elements
	$('#overlay_background').height($(window).height());
	$('#overlay_background').width($(window).width());
	$('#overlay_window').css('top', ($(window).height() / 2) - ($('#overlay_window').height() / 2));
	$('#overlay_window').css('left', ($(window).width() / 2) - ($('#overlay_window').width() / 2));
</script>
