<?php

//require_once 'nusoap/lib/nusoap.php';
require "eventServer.php";

$server = new SoapServer('wsdl'); // wsdl file name
$server->setClass('eventServer');
//$server->register("getProd");
//$server->register("getEventById");
$server->handle();
?>
