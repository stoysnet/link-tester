<?

// Tests the SOAP interface for STN sites
// by creating, reading, updating, and deleting
// products over SOAP and checking the results

$cfg = $_POST['cfg'];

if (empty($cfg)) {
	echo "ERROR: missing post data\n";
	exit(1);
}

if (empty($cfg['url'])) {
	echo "ERROR: missing site\n";
	exit(1);
}

if (empty($cfg)) {
	echo "ERROR: missing username\n";
	exit(1);
}

if (empty($cfg)) {
	echo "ERROR: missing password\n";
	exit(1);
}

header('Content-Type: text/plain');

if (!preg_match('#^http[s]?://#', $cfg['url'])) {
	$cfg['url'] = 'http://' . $cfg['url'];
}

require_once 'all.php';
