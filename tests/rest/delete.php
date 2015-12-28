<?

$result = \Httpful\Request::delete($restURL . '/products/' . $sku)
	->authenticateWithDigest($cfg->username, $cfg->password)
	->send();

if (empty($result->body)) {
	throw new Exception("Could not delete product");
}


