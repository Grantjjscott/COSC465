<?php
require_once 'nusoap/lib/nusoap.php';
$product = $_REQUEST['productName'];
$quantity = $_REQUEST['productQuantity'];
$maxPrice = $_REQUEST['productMaxPrice'];
<<<<<<< HEAD

$client = new nusoap_client("http://localhost/prog4/VendorB/SoapServer.php");
$client->soap_defencoding = 'utf-8';
$client->decode_utf8 = false;

$searchData = array("category" => $product,
                    "quantity" => $quantity,
                    "maxprice" => $maxPrice);

=======
$client = new nusoap_client("http://localhost/COSC465/prog4/VendorB/soapServer.php");

$searchData = array("category" => $product);
>>>>>>> db390e7b90c541f5adf0c1f03e3d77917cd75549
$result = $client->call("getProd",$searchData);

if (is_string($result)){
  //echo "<h2>Fault</h2><pre>";
  print_r($result);
<<<<<<< HEAD
  header("Location:http://localhost/prog4/VendorC/SoapClient.php?productName=".$product."&productQuantity=".$quantity."&productMaxPrice=".$maxPrice);
=======
>>>>>>> db390e7b90c541f5adf0c1f03e3d77917cd75549
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
<<<<<<< HEAD

}
}

=======
  }
}

// echo "<hr /> <h2>Request</h2>";
// echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
// echo "<h2>Response</h2>";
// echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
>>>>>>> db390e7b90c541f5adf0c1f03e3d77917cd75549
 ?>
