<?

$product = $soap->read(
	(object)array(
		'product_sku' => $sku
	)
);

if (empty($product)) {
	throw new Exception("Unable to read product '$sku' that was just created");
}

if ($product->product_sku != $sku) {
	throw new Exception("SKU returned was not the one requested!");
}

if ($product->product_name != $name) {
	throw new Exception("Unable to read product_name from $sku");
}

if ($product->product_in_stock != $stock) {
	throw new Exception("Expected stock to be $stock not {$product->product_in_stock}");
}
