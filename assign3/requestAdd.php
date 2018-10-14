<?php

	include 'comm.php';
	$sqlid = "SELECT ID FROM person";

	$Course = $_REQUEST['course'];

	$sql = "INSERT INTO requests (course) VALUE ('$Course')";

	if($conn->query($sql) === TRUE)
	{
		echo "Suggestion added.";
	}
	else
	{
		echo "Failed to accept";
	}
?>