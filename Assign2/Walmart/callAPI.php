<?php


// API request variables;
  $string ='http://api.walmartlabs.com/v1/search?query=ipod&format=json&apiKey=nhqnfqjchruvskk5y67rfbmk';
  $endpoint ='http://api.walmartlabs.com/v1/search';
  $query = 'ipod';
  $format = 'json';
  $apiKey ='nhqnfqjchruvskk5y67rfbmk';

  //construct call
  $apicall = "$endpoint?";
  $apicall .= "query=$query";
  $apicall .= "&format=$format";
  $apicall .="&apiKey=$apiKey";

  //$resp = simplexml_load_file($apicall);
 $items = json_decode ($string, true);
  // foreach($data["items"] as $item){
    // echo $item;
   //}#$S
if (is_array($items))
foreach($items['items'] as $value){


echo value;
}



?>
