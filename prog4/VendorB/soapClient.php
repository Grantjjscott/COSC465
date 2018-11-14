<?php
require_once 'nusoap/lib/nusoap.php';
$product = $_REQUEST['productName'];
$quantity = $_REQUEST['productQuantity'];
$maxPrice = $_REQUEST['productMaxPrice'];
$client = new nusoap_client("http://localhost/COSC465/prog4/VendorB/soapServer.php");

$searchData = array("category" => $product);
$result = $client->call("getProd",$searchData);

if (is_string($result)){
  //echo "<h2>Fault</h2><pre>";
  print_r($result);
  echo "</pre>";

  exit;
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
    echo "<br> Price: $". $result['price'];
    echo " <br> ID:  ". $result['id'];
    echo "<br> Quantity: ". $result['quantity'];
  }
}

// echo "<hr /> <h2>Request</h2>";
// echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
// echo "<h2>Response</h2>";
// echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
 ?>
