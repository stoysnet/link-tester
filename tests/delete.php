<?

$x = $soap->delete((object)array(
	'product_sku' => $sku
));

if ($x !== 'true') {
	throw new Exception("Unable to delete product");
}
