<?php
$host = "localhost";
$dbName = "book";
$userName = "root";
$pwd = "";
/*Connection*/
$Config = mysqli_connect($host, $userName, $pwd, $dbName);
@define("BASE", "http://localhost/book");
?>