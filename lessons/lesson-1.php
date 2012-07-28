<html>
<head>
	<title>Lesson 1</title>
</head>
<body>
	<h1>Lesson 1 - Creating a Form and Its Elements</h1>
	<form>
		<p>
			<label>First Name:</label>
			<input type="text" name="firstname" value="First Name" />
		</p>
		<p>
			<label>Last Name:</label>
			<input type="text" name="lastname" value="Last Name" />
		</p>
		<p>
			<label>Password:</label>
			<input type="password" name="password" value="xxx" />
		</p>
		<p>
			<label>Gender:</label>
			<input type="radio" name="gender" value="male" checked /> Male
			<input type="radio" name="gender" value="female" /> Female
		</p>
		<p>
			<label>Country:</label>
			<select name="country">
				<option value="Canada">Canada</option>
				<option value="USA">United States of America</option>
			</select>
		</p>
		<p>
			<label>Comment:</label>
		</p>
		<p>
			<textarea></textarea>
		</p>
		<p>
			<label>I want to learn HTML</label>
			<input type="checkbox" name="learnhtml" />
		</p>
		<p>
			<input type="submit" value="Done!" />
		</p>
	</form>
</body>	
</html>