<?php 
$dbCon = mysqli_connect("localhost","root","","info_db");
require_once("con_db.php");
if(isset($_POST['btn'])=="Insert"){
	$id = $_POST['id'];
	$name = $_POST['nm'];
	$blood = $_POST['bld'];
	$inSql="INSERT INTO tbl_student VALUES('$id','$name','$blood')";
	$qryIn = mysqli_query($dbCon,$inSql);
	if($qryIn){
		echo "OK";
	}else{
		echo "Error";
	}
}

?>