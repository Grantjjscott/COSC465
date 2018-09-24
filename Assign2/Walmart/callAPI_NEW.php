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


  //echo $apicall;

//Assigns the JSON file to $resp
$resp = file_get_contents($apicall);
//echo $resp;

//Assigns the decoded JSON file to $items
 $items = json_decode ($resp, true);

//Prints the queried item's name
 print_r($items['items'][0]['name']);
 echo '<br>';
//Prints the queried item's MSRP
 print_r($items['items'][0]['msrp'])


//Everything below is code not being used right now, but I didn't want to get rid of it until I was sure we wouldn't need it


 //print_r($items);
 //echo $items.name;
 //var_dump($items->{'name'});
 //echo $items->name;
  // foreach($data["items"] as $item){
    // echo $item;
   //}#$S
 //echo $items;
 //echo $items['name'];
// if (is_array($items))
// foreach($items['items'] as $value){
//   echo $value;
// }



?>
