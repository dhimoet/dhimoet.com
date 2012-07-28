<html>
<head>
	<title>Lesson 4</title>
	<link rel="stylesheet" type="text/css" href="lesson-2.css" />
</head>
<body>
	<h1>Lesson 4 - Introduction to PHP</h1>
	
	<?php echo "<p>This paragraph is printed by PHP, including the p tag.</p>";?>
	
	<p><?php echo "This paragraph is printed by PHP, but not the p tag."?></p>
	
	<?php
		echo "<p>This script was executed on " . date('l jS \of F Y h:i:s A') . "</p>\n\n";
		
		if(time() % 2) {
			echo "\t<p>The second showed an odd value when this script was executed.</p>\n\n";
		}
		else {
			echo "\t<p>The second showed an even value when this script was executed.</p>\n\n";
		}
		
		echo "\t<p>These numbers below are printed using for loop.</p>\n\n\t";
		for($i=0; $i<100; $i++) {
			echo "<span>$i </span>";
		}
		echo "\n\n";
		
		echo "\t<p>These numbers below are printed using while loop.</p>\n\n\t";
		$i = 0;
		while($i < 100) {
			echo "<span>$i </span>";
			$i++; 
		}
		echo "\n\n";
		
		if(isset($_REQUEST['action'])) {
			echo "\t<p>You entered <strong>{$_REQUEST['action']}</strong> into the address bar.</p>\n\n";
		}
		else {
			echo "\t<p>Please append ?action=SOME_VALUE to the link and enter it.</p>\n\n";
		}
	?>
	
</body>	
</html>