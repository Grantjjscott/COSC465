<?php
//opcache_reset();
//require 'nusoap/lib/nusoap.php';
$item = $_GET['item'];
//print_r($item);
ini_set("soap.wsdl_cache_enabled", "0");

try {
    $client = new SoapClient('http://localhost/COSC465/Prog5/soap-server.php?wsdl');
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
			echo "Your starter: soup, salad, etc. has been ordered and is on its way.";
			break;
		case "2":
			echo "Your main dish: curry, chicken, etc. has been ordered and is on its way.";
			break;
		case "3":
			echo "Your dessert: Ice cream, etc. has been ordered and is on its way.";
			break;
		case "4":
			echo "Your drink:". $events['name']. "has been ordered and is on its way.";
			break;
	}



/*
echo " <hr /> <h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
*/
?>
