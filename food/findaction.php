<?php
require_once("dbcon.php");
if(isset($_POST['btn'])=="Search"){
	$n=$_POST['srch'];
	$srchSQL="SELECT * FROM info WHERE food_name='$n'";
	$srchQry=mysqli_query($dbcon,$srchSQL);
	$srcnt=mysqli_num_rows($srchQry);
}
?>