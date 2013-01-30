<?

// Create some products via the SOAP interface
$product_id = $soap->create(
	(object)array(
		'product_sku' => $sku,
		'product_name' => $name,
		'product_in_stock' => $stock
	)
);

if (empty($product_id)) {
	throw new Exception("Could not create product");
}


