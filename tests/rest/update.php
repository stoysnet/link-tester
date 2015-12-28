<?

$name = "SOAP Update is Working";
$stock = $stock + rand(0, 100);

$product_id = \Httpful\Request::put($restURL . '/products/' . $sku)
	->sendsJson()
	->expectsJson()
	->authenticateWithDigest($cfg->username, $cfg->password)
	->body(json_encode((object)array(
		'product_sku' => $sku,
		'product_name' => $name,
		'product_in_stock' => $stock
	)))
	->send();

include __DIR__.'/read.php';

