<?

$product_id = \Httpful\Request::post($restURL . '/products/' . $sku)
	->sendsJson()
	->expectsJson()
	->authenticateWithDigest($cfg->username, $cfg->password)
	->body(json_encode((object)array(
		'product_sku' => $sku,
		'product_name' => $name,
		'product_in_stock' => $stock
	)))
	->send();

if (empty($product_id->body)) {
	throw new Exception("Could not create product");
}


