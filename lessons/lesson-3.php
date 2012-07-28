<html>
<head>
	<title>Lesson 3</title>
	<link rel="stylesheet" type="text/css" href="lesson-2.css" />
	<script type="text/javascript">
		function validateForm() {
			if(document.getElementById("firstname").value == "") {
				alert("Please fill in First Name!");
				document.getElementById("firstname").focus();
				return false;
			}
			if(document.getElementById("lastname").value == "") {
				alert("Please fill in Last Name!");
				document.getElementById("lastname").focus();
				return false;
			}
			if(document.getElementById("password").value == "") {
				alert("Please fill in Password!");
				document.getElementById("password").focus();
				return false;
			}
			if(document.getElementById("confirmpassword").value != document.getElementById("password").value) {
				alert("Please match Confirm Password with Password!");
				document.getElementById("confirmpassword").focus();
				return false;
			}
			if(!document.getElementById("learnhtml").checked) {
				alert("You have to want to learn HTML!");
				document.getElementById("learnhtml").focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<h1>Lesson 3 - Basic Form Validation Using JavaScript</h1>
	<form action="lesson-3-action.php" method="post" onsubmit="return validateForm();">
		<div class="inputfield_large">
			<div class="width_half float_left">
				<label>First Name:</label>
				<input type="text" name="firstname" id="firstname" value="" />
			</div>
			<div class="width_half float_left">
				<label>Last Name:</label>
				<input type="text" name="lastname" id="lastname" value="" />
			</div>
		</div>
		<div class="inputfield_large">
			<label>Password:</label>
			<input type="password" name="password" id="password" value="" />
		</div>
		<div class="inputfield_large">
			<label>Confirm Password:</label>
			<input type="password" name="confirmpassword" id="confirmpassword" value="" />
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
			<label>I want to learn HTML</label>
			<input type="checkbox" name="learnhtml" id="learnhtml" />
		</div>
		<div class="inputfield_small">
			<input type="submit" value="Done!" id="submit" />
		</div>
	</form>
</body>	
</html>