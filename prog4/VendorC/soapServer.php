<?php
require_once 'nusoap/lib/nusoap.php';

/*
*       Vendor C cheat sheet:
*    Item         Quantity        Price
     bananas ---- 200  ---------  $0.12
     apples  ---- 200  ---------  $0.45
     Mangos  ---- 50   ---------  $0.75
     Pears   ---- 20   ---------  $0.50
*/
function getProd($category){
  if ($category == "bananas"){
    $data = array();
    $data['title'] = "bananas";
    $data['id'] = "4011";
    $data['price'] = " 0.12";
    $data['quantity'] = "200";

    return $data;
  }
  elseif ($category == "apples"){
    $data = array();
    $data['title'] = "apples";
    $data['id'] = "4017";
    $data['price'] = " 0.35";
    $data['quantity'] = "200";

    return $data;
  }
    elseif ($category == "mangos"){
      $data = array();
      $data['title'] = "Mangos";
      $data['id'] = "5056";
      $data['price'] = " 0.45";
      $data['quantity'] = "50";

      return $data;
    }
    elseif ($category == "pears"){
      $data = array();
      $data['title'] = "Pears";
      $data['id'] = "5122";
      $data['price'] = " 0.50";
      $data['quantity'] = "20";

      return $data;
    }
  else {
    return "No Products at Vendor C. No Item Exists";

  }
}
 $server = new soap_server();
 $server->register("getProd");
  //$server->service($HTTP_RAW_POST_DATA);

  if ( !isset($HTTP_RAW_POST_DATA) ) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
  }
  $server->service($HTTP_RAW_POST_DATA);
 ?>
