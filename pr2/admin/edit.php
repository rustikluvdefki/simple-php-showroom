
<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM cars WHERE IDca = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$namecar = $resultData['NameCar'];
$daterelease = $resultData['DateRelease'];
$color = $resultData['Color'];
$vin = $resultData['vin'];
$img = $resultData['imgs'];
?>
<html>
<head>	
	<title>Изменить</title>
</head>

<body>
    <h2>Изменить</h2>
    <p>
	    <a href="main.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>Модель</td>
				<td><input disabled type="text" name="NameCar" value="<?php echo $namecar; ?>"></td>
			</tr>
			<tr> 
				<td>Дата производства</td>
				<td><input type="date" name="DateRelease" value="<?php echo $daterelease; ?>"></td>
			</tr>
			<tr> 
				<td>Цвет</td>
				<td><input type="color" name="Color" value="<?php echo $color; ?>"></td>
			</tr>
            <tr>
                <td>VIN номер</td>
                <td><input type="text" name="vin" value="<?php echo $vin; ?>"></td>
            </tr>
            <tr>
                <td>Изображение автомобиля</td>
                <td><input type="text" name="imgs" value="<?php echo $img; ?>"></td>
            </tr>
			<tr>
				<td><input type="hidden" name="IDca" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
