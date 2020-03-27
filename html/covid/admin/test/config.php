<?php
set_time_limit(0);

$dbhost="localhost";
$dbuser="sa";
$dbpass="sa";
$dbdata="covidny";
$page_title="Covid";
$dbconnect=new MySQLi($dbhost,$dbuser,$dbpass,$dbdata);
if($dbconnect->connect_errno){
	echo $dbconnect->connect_error;
	exit;
}
$dbconnect->set_charset("utf8");

?>
