<?php

$path = $_SERVER['DOCUMENT_ROOT']. "/prog4/nusoap/lib/nusoap.php";
require_once $path;
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


    echo "<h3> What people are saying about this vendor:</h3>";

    $sql = "SELECT username, comment from comments";
     include 'comm.php';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    	  echo "<br><br><b>Here's what </b>". $row["username"]. "<b> had to say!</b>" . "<br>"."<br>"."<br>";
    		echo $row["comment"]. "<br>". "<br>"."<br>"."<br>";
        }
    } else {
        echo "0 results";
    }
}
}

 ?>
  <html>
  	<h2> write your own comment</h2>
  	<form name = "users" method = "get" action = "commentBack.php">
  		Nickname:
  		<input type = "text" length = "20" name = "nickname" />
  		Comment:
  		<input type = "text" length = "1000" name = "comment" />
  		<input type = "submit" value = "POST" />
  	</form>
  </html>
