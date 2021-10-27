<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
date_default_timezone_set('Asia/Bangkok');
header ('Content-type: text/html; charset=utf-8');

include('include/adodb5/adodb.inc.php');
include('folder01/var.inc.php');

$db = adoNewConnection('mysqli'); # eg. 'mysqli' or 'oci8'
$db->debug = true;
$db->connect($hostDB, $userDB, $passDB, $nameDB);
$rs = $db->execute('select * from game.audit_2');

echo "test";
print "<pre>";
print_r($rs->getRow($rs));
print "</pre>";

echo "var_folder01 = ".$var_folder01."<br>";

//DocumentRoot "/volumes/mac SSD Data/coolism"
//<Directory "/volumes/mac SSD Data/coolism">


?>