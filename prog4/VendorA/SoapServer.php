<?php
require_once 'nusoap/lib/nusoap.php';
//$product = (string)$_REQUEST['productName'];


function getProd($category, $quantity, $maxPrice){
include "comm.php";

  $sql = "SELECT  ID, Name, Price, Quantity From items WHERE Name= ('$category') AND Quantity >= $quantity AND  Price <= $maxPrice";
  $result = $conn->query($sql);
  //print_r ($result);

    if ($result->num_rows >0){
        while($row = $result->fetch_assoc())  {
            //echo "found item";
            $name = $row["Name"];
            $id =   $row["ID"];
            $price = $row["Price"];
            $quantity = $row["Quantity"];

            $data = array();
            $data['title'] =(string)$name;
            $data['id'] = (string)$id;
            $data['price'] = (string)$price;
            $data['quantity'] = (string)$quantity;

            return $data;
          }
        }
  else {
    return "No Products at Vendor A... checking other vendors";

  }
}



$server = new soap_server();
$server->register("getProd");
 //$server->service($HTTP_RAW_POST_DATA);

 if ( !isset($HTTP_RAW_POST_DATA) ) {
   $HTTP_RAW_POST_DATA = file_get_contents('php://input');
 }
 $server->service($HTTP_RAW_POST_DATA);
 //print_r(getProd("apples", 1,1 ))
?>
