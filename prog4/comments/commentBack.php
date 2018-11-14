<?php
include 'comm.php';

$Nickname = $_REQUEST['nickname'];
$Comment = $_REQUEST['comment'];


$sql = "INSERT INTO comments (username, comment) VALUES ('$Nickname', '$Comment')";

	if($conn->query($sql) === TRUE)
	{
		echo "Comment.";
	}
	else
	{
		echo "Failed to accept";
	}


?>