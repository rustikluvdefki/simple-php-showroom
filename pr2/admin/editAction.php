
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($db, $_POST['IDca']);
//	$namecar = mysqli_real_escape_string($db, $_POST['NameCar']);
	$daterelease = mysqli_real_escape_string($db, $_POST['DateRelease']);
	$color = mysqli_real_escape_string($db, $_POST['Color']);
    $vin = mysqli_real_escape_string($db, $_POST['vin']);
    $img = mysqli_real_escape_string($db, $_POST['imgs']);
	// Check for empty fields
	if (empty($vin) || empty($daterelease) || empty($color)) {
		if (empty($vin)) {
			echo "<font color='red'>1.</font><br/>";
		}
		
		if (empty($daterelease)) {
			echo "<font color='red'>2</font><br/>";
		}
		
		if (empty($color)) {
			echo "<font color='red'>3</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($db, "UPDATE cars 
        SET `DateRelease` = '$daterelease', `Color` = '$color',`imgs`='$img',`vin`='$vin'
        WHERE `IDca` = '$id'");
		
		// Display success message
		echo "<p><font color='green'>Строка изменена!</p>";
		echo "<a href='main.php'>Посмотреть результат</a>";
	}
}
