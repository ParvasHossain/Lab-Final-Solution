<?php
require_once("dbcon.php");
if(isset($_POST['btn'])=="submit"){
	$food_name = $_POST['food_name'];
	$food_price = $_POST['food_price'];
	$val="'$food_name','$food_price'";
	$inSql="INSERT INTO info VALUES($val)";
	$executeQuery =mysqli_query($dbcon,$inSql);
// if(executeQuery){
// 	echo "ok";
// }else{
// 	echo "error";
// }
	}
		header("Location:".BASE);
	

?>