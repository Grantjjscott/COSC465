<?php
//include 'comm.php';
$get_string = $_SERVER['QUERY_STRING'];
$data = parse_str($get_string, $get_array);
//$username = $_REQUEST['username'];
$Old_Username = $_REQUEST['Old_Username'];
$New_Username = $_REQUEST['New_Username'];
//echo  $username;
$json_data =["New_Username" => $New_Username, "Old_Username"=> $Old_Username];
$apiurl = "http://localhost/cosc465/assign3/PUTusername/server.php";
$curl= curl_init($apiurl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));
 //echo curl_exec($curl); //exit; //debugging
 $response = curl_exec($curl);
 curl_close($curl);
$result = json_decode($response);
echo $response;
echo $result;
/**if($result->status==200){
	 echo"$result->status. Data successfully Updated in the Server DB";
}else{
 echo $result->status_message;
}*/
?>