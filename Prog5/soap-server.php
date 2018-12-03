<?php

require "eventServer.php";

$server = new SoapServer('wsdl'); // wsdl file name
$server->setClass('eventServer');
$server->handle();
?>

