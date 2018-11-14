<html>
	<h2>Comments</h2>
	<form name = "users" method = "get" action = "commentBack.php">
		Nickname:
		<input type = "text" length = "20" name = "nickname" />
		Comment:
		<input type = "text" length = "1000" name = "comment" />
		<input type = "submit" value = "POST" />
	</form>
</html>

<?php
	include 'commentDisplay.php'
?>