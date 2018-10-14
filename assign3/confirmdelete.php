<?php
include 'comm.php';
$Email = $_REQUEST['email'];
$sql= "DELETE FROM person WHERE Email =('$Email')";
if($conn->query($sql) === TRUE)
{
  echo "User Deleted.";
}
else
{
  echo "Failed to accept";
}
?>
