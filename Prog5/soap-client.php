<?php
//opcache_reset();
//require 'nusoap/lib/nusoap.php';
$item = $_GET['item'];

//print_r($item);
ini_set("soap.wsdl_cache_enabled", "0");

try {
    //echo $item;
    // if (isset($_POST["submit"])){
    //   $itemType = $_POST["item"];
    // }

    if ($item == 1){
      $client = new SoapClient('http://localhost/COSC465/Prog5/RestA/soap-server.php?wsdl');
      echo "Using RestA";
      echo "<br>";
    } else {
      $client = new SoapClient('http://localhost/COSC465/Prog5/RestB/soap-server.php?wsdl');
      echo "Using RestB";
      echo "<br>";
    }
    //$searchData = "";
	//$result = $client->call("getProd", $searchData);
    $events = $client->getEventById(intval($item));

	//$events = $client->getEvents();
    //$events = $client->getEventByIDLoc(1,"Amsterdam");
    // $events = $client->getEventByLoc("Toronto");
    print_r($events);
} catch (SoapFault $e) {
    var_dump($e);
}
       //print_r($client->__getTypes());
      // print_r($client->__getFunctions());

	//echo "Your " . $item . " has been ordered and is on its way."
function postResults($item,$events){
  echo "<table border='1'>

  <tr>

  <th>Items</th>

  <th>Price</th>
  </tr>";

  echo "<td>" . $events['name'] . "</td>";

  echo "<td>" . $events['price'] . "</td>";


	switch($item)
	{
		case "1":
			echo "Your starter: ". $events['name']. " has been ordered and is on its way.";
			break;
		case "2":
			echo "Your main dish: ". $events['name']. " has been ordered and is on its way.";
			break;
		case "3":
			echo "Your dessert: ". $events['name']. "has been ordered and is on its way.";
			break;
		case "4":
			echo "Your drink: ". $events['name']. "has been ordered and is on its way.";
			break;
	}

}

postResults($item, $events);

// try {
//     $client = new SoapClient('http://localhost/COSC465/Prog5/RestB/soap-server.php?wsdl');
//     //$searchData = "";
// 	//$result = $client->call("getProd", $searchData);
//     $events2 = $client->getEventById(intval($item));

// 	//$events = $client->getEvents();
//     //$events = $client->getEventByIDLoc(1,"Amsterdam");
//     // $events = $client->getEventByLoc("Toronto");
//     print_r($events);
// } catch (SoapFault $e) {
//     var_dump($e);
// }

// postResults($item, $events2);

/*
echo " <hr /> <h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
*/
?>
