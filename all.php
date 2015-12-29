<?php

require_once "vendor/autoload.php";

$cfg = (object)$cfg;
$url = trim($cfg->url, './');
$soapURL = "$url/link/soap.php";
$restURL = "$url/link/rest.php";
$wsdlURL = "$soapURL?wsdl";
$wsdl = file_get_contents($wsdlURL);
$sku = "soaptest";
$name = "SOAP Create is Working";
$stock = 1337;

if (empty($wsdl)) {
	echo "ERROR: Failed to download $wsdlURL\n";
	exit(1);
}

$soap = new SoapClient(
	$wsdlURL,
	array(
		'authentication' => SOAP_AUTHENTICATION_BASIC,
		'login' => $cfg->username,
		'password' => $cfg->password
	)
);

//var_dump($soap->__getTypes());

echo "SOAP tests: \n";

foreach (array(
	'create',
	'read',
	'update',
	'delete'
) as $test) {
	echo str_pad(" $test:", 12);

	try {
		include __DIR__."/tests/$test.php";
	} catch (Exception $e) {
		echo "
  Test $test failed: {$e->getMessage()}

---------------------------------------------
$e
---------------------------------------------

";
		exit(1);
	}

	echo "OK\n";
}

echo "REST tests: \n";

foreach (array(
	'create',
	'read',
	'update',
	'delete'
) as $test) {
	echo str_pad(" $test:", 12);

	try {
		include __DIR__."/tests/rest/$test.php";
	} catch (Exception $e) {
		echo "
  Test $test failed: {$e->getMessage()}

---------------------------------------------
$e
---------------------------------------------

";
		exit(1);
	}

	echo "OK\n";
}

