<?php

	include 'comm.php';
  $Old_email = $_GET['Old_email'];
  $New_email = $_GET['New_email'];

  $sql = "UPDATE person SET Email ='$New_email' WHERE Email = '$Old_email'";
  if($conn->query($sql) === TRUE)
	{
		echo "Email Updated.";
	}
	else
	{
		echo "Failed to update email";
	}

  ?>
