<?php
	
	include 'includes/header.html' ;
	echo '<form action="process.php" method="post" >
	First Name : <input name="first_name" type="text">
	Last Name : <input name="last_name" type="text">
	<p>Subject:<br>
	<input name="subject" type="text" size="64" ></p>
	<p>Message:<br>
	<textarea name="message" rows="5" cols="50">
	</textarea></p>
	<p><input type="submit" value="Submit"></p>
	</form>';
	echo '<p><a href="forum.php">Forum</a></p>' ;
	 include 'includes/footer.html' ;
?>