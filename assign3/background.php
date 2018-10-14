<?php

	include 'comm.php';
	$sqlid = "SELECT ID FROM person";

	$Username = $_REQUEST['username'];
	$Email = $_REQUEST['email'];

	$sql = "INSERT INTO person (Username, Email) VALUES ('$Username', '$Email')";
	//$idno = "SELECT ID FROM person";

	if($conn->query($sql) === TRUE)
	{
		echo "User added.";
	}
	else
	{
		echo "Failed to accept";
	}
?>
