<?php
require_once 'nusoap/lib/nusoap.php';
$product = $_REQUEST['productName'];
$client = new nusoap_client("http://localhost/prog4/Vendora/SoapServer.php");

$searchData = array("category" => $product);
$result = $client->call("getProd",$searchData);

if ($client->fault){
  echo "<h2>Fault</h2><pre>";
  print_r($result);
  echo "</pre>";
}
else{
$error = $client->getError();
  if($error){
    echo"<h2>Error wwww</h2><pre>".$error. "</pre>";
  }
  else{
    echo"<h2>Product</h2><pre>";
    echo "</pre>";
    echo " <br> Name: ". $result['title'];
    echo "<br> Price:". $result['price'];
    echo " <br> ID:". $result['id'];
    echo "<br> Quantity: ". $result['quantity'];

}
}

 ?>