<?php
require_once 'nusoap/lib/nusoap.php';
$product = $_REQUEST['productName'];
$quantity = $_REQUEST['productQuantity'];
$maxPrice = $_REQUEST['productMaxPrice'];

$client = new nusoap_client("http://localhost/prog4/VendorC/SoapServer.php");
$client->soap_defencoding = 'utf-8';
$client->decode_utf8 = false;

$searchData = array("category" => $product,
                    "quantity" => $quantity,
                    "maxprice" => $maxPrice);

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
    echo"<h2> Vendor C</h2>";
    echo"<h2>Product</h2><pre>";
    echo "</pre>";
    echo " <br> Name: ". $result['title'];
    echo "<br> Price: $". $result['price'];
    echo " <br> ID:  ". $result['id'];
    echo "<br> Quantity: ". $result['quantity'];

}
}

 ?>
