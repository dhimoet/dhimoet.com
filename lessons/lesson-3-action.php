<html>
<head>
	<title>Lesson 3 Action</title>
	<link rel="stylesheet" type="text/css" href="lesson-2.css" />
</head>
<body>
	<h1>Lesson 3 - Form Feedback</h1>
	<div>
		<div class="inputfield_large">
			<div class="width_half float_left">
				<label>First Name:</label>
				<span><?php echo $_REQUEST['firstname'];?></span>
			</div>
			<div class="width_half float_left">
				<label>Last Name:</label>
				<span><?php echo $_REQUEST['lastname'];?></span>
			</div>
		</div>
		<div class="inputfield_large">
			<label>Password:</label>
			<span><?php echo $_REQUEST['password'];?></span>
		</div>
		<div class="inputfield_large">
			<label>Gender:</label>
			<span><?php echo $_REQUEST['gender'];?></span>
		</div>
		<div class="inputfield_large">
			<label>Country:</label>
			<span><?php echo $_REQUEST['country'];?></span>
		</div>
		<div class="inputfield_small">
			<label>I want to learn HTML</label>
			<span><?php echo ($_REQUEST['learnhtml']=="on")?"[Yes]":"[No]";?></span>
		</div>
		<div class="inputfield_small">
			<input type="button" value=" Back " onclick="history.back();" />
		</div>
	</div>
</body>
</html>