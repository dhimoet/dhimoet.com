<html>
<head>
	<link rel="stylesheet" type="text/css" href="/static/scriptcam/recorder.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script src="/static/scriptcam/scriptcam.js"></script>
	<script>
	
		var x = y = 0;
		var snapshots = [];
		
		$(document).ready(function() {
			// initialize scriptcam
			$("#webcam").scriptcam({
				path: '/static/scriptcam/',
				width: 640,
				height: 480,
				cornerRadius: 0,
				useMicrophone: false,
				onWebcamReady: webcamFound,
				onError: oopsError,
				onMotion: onMotion
			});
			
			// change camera
			$('#cameraNames').change(function() {
				$.scriptcam.changeCamera($('input[name="camera"]').val());
			});
		});
		
		function webcamFound(cameraNames,camera,microphoneNames,microphone,volume) {
			// generate camera list
			$.each(cameraNames, function(index, text) {
				if(!index)
					$('#cameraNames').append(template(index, text, 1));
				else
					$('#cameraNames').append(template(index, text, 2));
			});
			// get still periodically
			setInterval(function() {
				$.scriptcam.getMotionParameters();
			},3000);
		}
		
		function oopsError(errorId,errorMsg) {
			alert(errorMsg);
		}
		
		function onMotion(motion,brightness,color,movementx,movementy) {
			// display motion status
			$('#motion').html('Motion (0 or 1): '+motion);
			$('#brightness').html('Brightness level (0-255): '+brightness);
			$('#color').html('Average color (hex): '+color);
			$('#colordiv').css('background-color','#'+color);
			$('#movementx').html('Movement x: '+movementx);
			$('#movementy').html('Movement x: '+movementy);
			
			// check movements
			if(x != movementx || y != movementy) {
				if(snapshots.length < 5) {
					snapshots.push($.scriptcam.getFrameAsBase64());
				}
				else {
					// send images to server
					sendImages($('#email').val(), JSON.stringify(snapshots));
					snapshots.length = 0;
				}
				x = movementx;
				y = movementy;
			}
		}
		
		function sendImages(email, images) {
			$.ajax({
				url: '/cctv/ajax_images',
				type: 'POST',
				data: { email: email, images: images },
				success: function(response) {
					console.log('Sent images on: '+ response + ' to: ' + email);
				}
			});
		}
		
		var template = function(index, text, version) {
			switch (version) {
				case 1:
					return '<label><input type="radio" name="camera" value="'+ index +'" checked>'+ text +'</label><br />';
				case 2:
					return '<label><input type="radio" name="camera" value="'+ index +'">'+ text +'</label><br />';
			}
		}

	</script>
</head>
<body>
	<div class="center">
		<h1>Security Camera</h1>
	</div>
	<div class="video center">
		<div id="webcam"></div>
		<div id="version"></div>
	</div>
	<div class="container">
		<div id="cameraNames" class="left">
			<h3>Camera:</h3>
		</div>
		<div class="left">
			<h3>Send Emails:</h3>
			<div>
				<label>To: <input type="text" name="email" id="email" style="width:60%" /></label>
			</div>
			<!--<div>
				<label><input type="checkbox" name="notifications" checked />Hourly</label>
			</div>
			<div>
				<label><input type="checkbox" name="notifications" />Every 5 snapshots</label>
			</div>-->
		</div>
		<div class="left">
			<h3>Motion Status:</h3>
			<div id="motion"></div>
			<div id="brightness"></div>
			<div id="color"></div>
			<div id="colordiv"></div>
			<div id="movementx"></div>
			<div id="movementy"></div>
		</div>
	</div>
</body>
</html>