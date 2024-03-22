<?php
session_start();
require_once("con_db.php");
if(isset($_POST['btn'])=="Insert"){
	$id = $_POST['id'];
	$name = $_POST['nm'];
	$blood = $_POST['bld'];
	$val="'$id','$name','$blood'";
	$inSql="INSERT INTO tbl_student VALUES($val)";
	$qryIn = mysqli_query($dbCon,$inSql);
	if($qryIn){
		$_SESSION['msg']="<strong style='color: green;'>Insert Successfully</strong>";
	}else{
		$_SESSION['msg']="<strong style='color: red;'>Insert Error</strong>";
	}
	header("Location:".BASE);
}


?> 

