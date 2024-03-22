<?php
	$host = "localhost";
	$dbName = "info_db";
	$userName = "root";
	$pwd = "";
	/*Connection*/
$dbCon = mysqli_connect($host, $userName, $pwd, $dbName);
@define("BASE", "http://localhost/insert/");
?>