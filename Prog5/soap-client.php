<?php

ini_set("soap.wsdl_cache_enabled", "0");

$item = $_REQUEST['item'];
echo ($item);
try {
    $client = new SoapClient('http://localhost/COSC465/Prog5/soap-server.php');
    //$events = $client->getEvents();
     //$events = $client->getEventById(3);
     $events = $client->getEventByIDLoc(1,"Amsterdam");
    // $events = $client->getEventByLoc("Toronto");
    print_r($events);
} catch (SoapFault $e) {
    var_dump($e);
}
       //print_r($client->__getTypes());
      // print_r($client->__getFunctions());

/*
echo " <hr /> <h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
*/
?>
