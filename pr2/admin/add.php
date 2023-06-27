<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("dbConnection.php");

$select1= mysqli_query($db, "SELECT * FROM cars;");
?>
<html>

<head>
	<title>Добавить автомобиль</title>
</head>

<body>
	<h2>Добавить автомобиль</h2>
	<p>
		<a href="main.php">Главная страница</a>
	</p>

	<form action="addAction.php" method="post" name="add">
		<table width="25%" border="0">
            <tr>
                <td>Модель автомобиля</td>
                <td> <select name="cars">
                        <?php while ($row1=mysqli_fetch_array($select1)):; ?>
                            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                        <?php endwhile; ?>
                    </select></td>
            </tr>
            <tr>
                <td>VIN номер автомобиля</td>
                <td><input type="text" name="vin"></td>
            </tr>
			<tr> 
				<td>Цвет автомобиля</td>
				<td><input type="color" name="Color"></td>
			</tr>
			<tr> 
				<td>Дата поставки</td>
				<td><input type="date" name="DateRelease"></td>
			</tr>
            <tr>
                <td>Изображение автомобиля (URL ссылка)</td>
                <td><input type="text" name="img"></td>
            </tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Добавить"></td>
			</tr>
		</table>
	</form>
</body>
</html>

