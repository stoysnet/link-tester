<?

// Tests the SOAP interface for STN sites
// by creating, reading, updating, and deleting
// products over SOAP and checking the results

$cfg = (include __DIR__.'/config.php');

if (empty($cfg)) {
	echo "ERROR: Unable to include config.php\n";
	exit(1);
}

$cfg = (object)$cfg;
$url = trim($cfg->url, './');
$soapURL = "$url/link/soap.php";
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

