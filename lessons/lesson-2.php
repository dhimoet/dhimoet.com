<html>
<head>
	<title>Lesson 2</title>
	<link rel="stylesheet" type="text/css" href="lesson-2.css" />
</head>
<body>
	<h1>Lesson 2 - Styling a Page Using External CSS</h1>
	<form action="http://www.dhimoet.com/lessons/lesson-2-action.php" method="post">
		<div class="inputfield_large">
			<div class="width_half float_left">
				<label>First Name:</label>
				<input type="text" name="firstname" value="First Name" />
			</div>
			<div class="width_half float_left">
				<label>Last Name:</label>
				<input type="text" name="lastname" value="Last Name" />
			</div>
		</div>
		
		
		<div class="inputfield_large">
			<label>Password:</label>
			<input type="password" name="password" value="xxx" />
		</div>
		<div class="inputfield_large">
			<label>Gender:</label>
			<input type="radio" name="gender" value="male" checked /> Male
			<input type="radio" name="gender" value="female" /> Female
		</div>
		<div class="inputfield_large">
			<label>Country:</label>
			<select name="country" id="country">
				<option value="Canada">Canada</option>
				<option value="USA">United States of America</option>
			</select>
		</div>
		<div class="inputfield_small">
			<label>Comment:</label>
		</div>
		<div class="inputfield_small">
			<textarea name="comment" id="comment"></textarea>
		</div>
		<div class="inputfield_small">
			<label>I want to learn HTML</label>
			<input type="checkbox" name="learnhtml" />
		</div>
		<div class="inputfield_small">
			<input type="submit" value="Done!" id="submit" />
		</div>
	</form>
</body>	
</html>