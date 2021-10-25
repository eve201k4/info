<?
session_start();
date_default_timezone_set('Asia/Bangkok');
header ('Content-type: text/html; charset=utf-8');


include('include/adodb/adodb.inc.php');


$db = adoNewConnection('mysqli'); # eg. 'mysqli' or 'oci8'
$db->debug = true;
$db->connect('localhost', 'root', 'root', 'game');
$rs = $db->execute('select * from bioderma_2018');

echo "test";
print "<pre>";
print_r($rs->getRows());
print "</pre>";


//DocumentRoot "/volumes/mac SSD Data/coolism"
//<Directory "/volumes/mac SSD Data/coolism">


?>