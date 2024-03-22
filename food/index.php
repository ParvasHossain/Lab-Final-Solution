<?php
require_once("findaction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab Final</title>
</head>
<body>
	
	<form action="inaction.php" method="POST">

Food Name <input type="text" name="food_name"><br><br>
Food Price <input type="text" name="food_price"><br><br>
	<input type="submit" name="btn" value="submit"><br><br>
	</form>

<h1> Search  </h1>

<form action="" method="post">
	<input type="text" name="srch" />
	<input type="submit" name="btn" value="Search">
</form>

<?php
if(@$srcnt>0){

		$recSr=mysqli_fetch_object($srchQry);
		echo "<br>";
		echo "Food Name: ", $recSr->food_name;
		echo "<br>";
		echo "Price: ", $recSr->food_price," /-Tk";
}
?>



</body>
</html>