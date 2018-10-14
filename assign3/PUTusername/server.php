<?php
if($_SERVER['REQUEST_METHOD']=="PUT"){
  $data = [];
  $incoming= file_get_contents("php://input");
  parse_str($incoming, $data);
  $Old_Username= filter_var($data["Old_Username"]);
  $New_Username = filter_var($data["New_Username"]);
	$servername = "localhost";
	$dbname = "proj1email";
	$username = "root";
	$password = "";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if($conn->connect_error)
  {
    die("Connection failed: ". $conn->connect_error);
  }else{
    echo "Connection Successful". "</br>"  ;
  }
    //$sqlid = "SELECT ID FROM person";
    $sql ="UPDATE person SET Username ='$New_Username' WHERE Username = '$Old_Username'";
    echo $sql;
    //$idno = "SELECT ID FROM person";
    $result = $conn->query($sql);
    if($result)
    {
      response(200,"user added", $result);
    }else{
      response(400, "failed to add",$result );
    }
  }else{
      echo "UM?";
    }
    function response($status,$status_message,$data)
    {
        header("HTTP/1.1 ".$status);
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
        $json_response = json_encode($response);
        echo $json_response;
    }
  ?>