<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
    if (!empty($_POST['cars'])){
        $selected=$_POST['cars'];
        $result = mysqli_query($db, "SELECT NameCar, IDma, price
FROM cars WHERE IDca='$selected';");
        while ($res = mysqli_fetch_assoc($result)) {
            $namecar = $res['NameCar'];
            $idma = $res['IDma'];
            $price = $res['price'];
        }

    }
	// Escape special characters in string for use in SQL statement
	$datarelease = mysqli_real_escape_string($db, $_POST['DateRelease']);
	$color = mysqli_real_escape_string($db, $_POST['Color']);
    $img = mysqli_real_escape_string($db, $_POST['img']);
    $vin =mysqli_real_escape_string($db, $_POST['vin']);
//    $idma = mysqli_real_escape_string($db, $_POST['IDma']);

//    echo $idma;
	// Check for empty fields
	if (empty($namecar) || empty($datarelease) || empty($color)) {
		if (empty($namecar)) {
			echo "<font color='red'>1</font><br/>";
		}

		if (empty($datarelease)) {
			echo "<font color='red'>2</font><br/>";
		}

		if (empty($color)) {
			echo "<font color='red'>3</font><br/>";
		}

		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Назад</a>";
	} else {
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($db, "INSERT INTO cars (`NameCar`, `DateRelease`, `Color`, `IDma`, `imgs`, `price`, `vin`) VALUES ('$namecar', '$datarelease', '$color', '$idma','$img' , '$price', '$vin')");

		// Display success message
		echo "<p><font color='green'>Автомобиль добавлен!</p>";
		echo "<a href='main.php'>Посмотреть результат</a>";
	}
}
?>
</body>
</html>
