<?

// Tests the SOAP interface for STN sites
// by creating, reading, updating, and deleting
// products over SOAP and checking the results

$cfg = (include __DIR__.'/config.php');

if (empty($cfg)) {
	echo "ERROR: Unable to include config.php\n";
	exit(1);
}

require_once 'all.php';
