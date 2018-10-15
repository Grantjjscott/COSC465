<?php
include 'comm.php';
$Email = $_REQUEST['email'];
$sql= "DELETE FROM person WHERE Email =('$Email')";

$result = $conn->query($sql);

if($result === TRUE)
{
  response(200,"Product Delete",$result);
}
else
{
  response(400,"Product not Deleted",$result);
}


function response($status,$status_message,$data){
  header("HTTP/1.1 ".$status);

  $response['status']=$status;
  $response['status-message']=$status_message;
  $response['data']=$data;

  $json_response = json_encode($response);
  echo $json_response;
}
?>
