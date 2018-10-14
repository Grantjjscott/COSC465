<?php

	include 'comm.php';
  $Old_Username = $_REQUEST['Old_Username'];
  $New_Username = $_REQUEST['New_Username'];

  $sql = "UPDATE person SET Username ='$New_Username' WHERE Username = '$Old_Username'";
  if($conn->query($sql) === TRUE)
	{
		echo "Username Updated.";
	}
	else
	{
		echo "Failed to update Username";
	}

  ?>
