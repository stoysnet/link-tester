<?

$name = "SOAP Update is Working";
$stock = $stock + rand(0, 100);

$soap->update(
	(object)array(
		'product_sku' => $sku,
		'product_name' => $name,
		'product_in_stock' => $stock
	)
);

include __DIR__.'/read.php';

