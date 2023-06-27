<?php
// Include the database connection file
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("dbConnection.php");


// Fetch data in descending order (lastest entry first)
$result = mysqli_query($db, "SELECT IDca, NameCar, DateRelease, Color, IDma, vin FROM cars ORDER BY IDca");
$result1 = mysqli_query($db, "SELECT * FROM clients ORDER BY IDcl");
$result2 = mysqli_query($db, "SELECT * FROM employees ORDER BY IDemp");
?>
 
<html>
<head>	
	<title>Админ</title>
</head>

<body>
	<h2>Админ</h2>
    <h3>
        <a href="../index.php">Авторизация</a>
    </h3>
    <h3>
        <a href="queries.php">Запросы</a>
    </h3>
    <h3>
        <a href="../user/main.php">CARSHOWROOM</a>
    </h3>
	<p>
		<a href="add.php">Добавить новый автомобиль</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Модель</strong></td>
			<td><strong>Дата производства</strong></td>
			<td><strong>Цвет</strong></td>
            <td><strong>VIN номер</strong></td>
			<td><strong>Редактирование</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['NameCar']."</td>";
			echo "<td>".$res['DateRelease']."</td>";
			echo "<td>".$res['Color']."</td>";
            echo "<td>".$res['vin']."</td>";
			echo "<td><a href=\"edit.php?id=$res[IDca]\">Изменить</a> | 
			<a href=\"delete.php?id=$res[IDca]\" onClick=\"return confirm('Вы уверены что хотите удалить?')\">Удалить</a></td>";
		}
		?>
	</table>
    <p>
        <a href="addclient.php">Добавить клиента</a>
    </p>
    <table width='80%' border=0>
        <tr bgcolor='#DDDDDD'>
            <td><strong>Имя</strong></td>
            <td><strong>Фамилия</strong></td>
            <td><strong>Номер телефона</strong></td>
            <td><strong>Адрес</strong></td>
            <td><strong>Редактирование</strong></td>
        </tr>
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result1)) {
            echo "<tr>";
            echo "<td>".$res['FName']."</td>";
            echo "<td>".$res['LName']."</td>";
            echo "<td>".$res['Phone']."</td>";
            echo "<td>".$res['Adress']."</td>";
            echo "<td><a href=\"editclient.php?id=$res[IDcl]\">Изменить</a> | 
			<a href=\"deleteclient.php?id=$res[IDcl]\" onClick=\"return confirm('Вы уверены что хотите удалить?')\">Удалить</a></td>";
        }
        ?>
    </table>
    <p>
        <a href="addemp.php">Добавить сотрудника</a>
    </p>
    <table width='80%' border=0>
        <tr bgcolor='#DDDDDD'>
            <td><strong>Имя</strong></td>
            <td><strong>Фамилия</strong></td>
            <td><strong>Номер телефона</strong></td>
            <td><strong>Должность</strong></td>
            <td><strong>Редактирование</strong></td>
        </tr>
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result2)) {
            echo "<tr>";
            echo "<td>".$res['FName']."</td>";
            echo "<td>".$res['LName']."</td>";
            echo "<td>".$res['Phone']."</td>";
            echo "<td>".$res['Position']."</td>";
            echo "<td><a href=\"editemp.php?id=$res[IDemp]\">Изменить</a> | 
			<a href=\"deleteemp.php?id=$res[IDemp]\" onClick=\"return confirm('Вы уверены что хотите удалить?')\">Удалить</a></td>";
        }
        ?>
    </table>
</body>
</html>
