<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("dbConnection.php");

$select1= mysqli_query($db, "SELECT * FROM country;");
$select2= mysqli_query($db, "SELECT * FROM employees;");

$result1 = mysqli_query($db, "SELECT FName, LName FROM sales JOIN clients ON sales.IDcl = clients.IDcl GROUP BY clients.FName;");



$result7 = mysqli_query($db, "SELECT c.NameCar, c.vin
FROM cars AS c
LEFT JOIN sales AS s ON c.IDca = s.IDca
WHERE s.IDca IS NULL;");
$result8 = mysqli_query($db, "SELECT cl.FName, cl.LName
FROM clients AS cl
LEFT JOIN sales AS s ON cl.IDcl = s.IDcl
WHERE s.IDcl IS NULL;");
$result9 = mysqli_query($db, "SELECT co.NameCountry, AVG(c.Price) AS AveragePrice
FROM country AS co
JOIN automaker AS a ON co.IDco = a.IDco
JOIN cars AS c ON a.IDma = c.IDma
GROUP BY co.IDco;");


?>
<html>
<head>
    <title>Запросы</title>
</head>

<body>

<h3>
    <a href="main.php">Главная страница</a>
</h3>

<h2>Запросы</h2>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    1. Вывести все автомобили, их производителей из страны:
</p>
<form action="" method="post">
    <select name="countries">
        <?php while ($row1=mysqli_fetch_array($select1)):; ?>
            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
        <?php endwhile; ?>
    </select>
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Модель автомобиля</strong></td>
        <td><strong>VIN номер</strong></td>
        <td><strong>Марка автомобиля</strong></td>
        <td><strong>Страна производства</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['countries'])){
            $selected=$_POST['countries'];
            $result = mysqli_query($db, "SELECT NameCar, vin, NameMaker, NameCountry
FROM cars JOIN automaker ON cars.IDma = automaker.IDma JOIN country ON automaker.IDco = country.IDco WHERE country.IDco='$selected';");
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['NameCar']."</td>";
                echo "<td>".$res['vin']."</td>";
                echo "<td>".$res['NameMaker']."</td>";
                echo "<td>".$res['NameCountry']."</td>";
            }

        }
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    2. Вывести имена клиентов, которые совершили покупки:
</p>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Имя</strong></td>
        <td><strong>Фамилия</strong></td>
    </tr>
    <?php
    // Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result1)) {
        echo "<tr>";
        echo "<td>".$res['FName']."</td>";
        echo "<td>".$res['LName']."</td>";
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    3. Вывести все продажи, включая информацию об автомобиле, клиенте от сотрудника:
</p>
<form action="" method="post">
    <select name="employees">
        <?php while ($row1=mysqli_fetch_array($select2)):; ?>
            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[2]; ?></option>
        <?php endwhile; ?>
    </select>
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Модель автомобиля</strong></td>
        <td><strong>VIN номер</strong></td>
        <td><strong>Имя клиента</strong></td>
        <td><strong>Фамилия клиента</strong></td>
        <td><strong>Имя сотрудника</strong></td>
        <td><strong>Фамилия сотрудника</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['employees'])){
            $selected=$_POST['employees'];
            $result2 = mysqli_query($db, "SELECT s.IDsa, c.NameCar, c.vin,cl.FName AS ClientFirstName, cl.LName AS ClientLastName, e.FName AS EmployeeFirstName, e.LName AS EmployeeLastName 
FROM sales AS s JOIN cars AS c ON s.IDca = c.IDca JOIN clients AS cl ON s.IDcl = cl.IDcl JOIN employees AS e ON s.IDemp = e.IDemp WHERE e.IDemp='$selected' GROUP BY cl.FName;");
            while ($res = mysqli_fetch_assoc($result2)) {
                echo "<tr>";
                echo "<td>".$res['NameCar']."</td>";
                echo "<td>".$res['vin']."</td>";
                echo "<td>".$res['ClientFirstName']."</td>";
                echo "<td>".$res['ClientLastName']."</td>";
                echo "<td>".$res['EmployeeFirstName']."</td>";
                echo "<td>".$res['EmployeeLastName']."</td>";
            }

        }
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    4. Вывести общую сумму продаж для каждого клиента, у которого сумма от:
</p>
<form action="" method="post">
    <input type="number" name="number">
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Имя клиента</strong></td>
        <td><strong>Фамилия клиента</strong></td>
        <td><strong>Сумма продаж</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['number'])){
            $selected=$_POST['number'];
            $result3 = mysqli_query($db, "SELECT cl.FName, cl.LName, SUM(ca.Price) AS TotalSales
FROM clients AS cl
JOIN sales AS s ON cl.IDcl = s.IDcl
JOIN cars AS ca ON s.IDca = ca.IDca
GROUP BY cl.IDcl
HAVING SUM(ca.Price)>'$selected';");
            while ($res = mysqli_fetch_assoc($result3)) {
                echo "<tr>";
                echo "<td>".$res['FName']."</td>";
                echo "<td>".$res['LName']."</td>";
                echo "<td>".$res['TotalSales']."</td>";
            }

        }
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    5. Вывести список клиентов, совершивших покупки, и общую сумму их покупок, отсортированных по убыванию общей суммы, у которых сумма находится в диапазоне:
</p>
<form action="" method="post">
    <p>от</p>
    <input type="number" name="number">
    <p>до</p>
    <input type="number" name="number1">
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Имя клиента</strong></td>
        <td><strong>Фамилия клиента</strong></td>
        <td><strong>Сумма продаж</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['number'])){
            $selected=$_POST['number'];
            $selected1=$_POST['number1'];
            $result4 = mysqli_query($db, "SELECT cl.FName, cl.LName, SUM(ca.Price) AS TotalSales
FROM clients AS cl
JOIN sales AS s ON cl.IDcl = s.IDcl
JOIN cars AS ca ON s.IDca = ca.IDca
GROUP BY cl.IDcl
HAVING SUM(ca.Price)>'$selected' AND SUM(ca.Price)<'$selected1'
ORDER BY TotalSales DESC
;");
            while ($res = mysqli_fetch_assoc($result4)) {
                echo "<tr>";
                echo "<td>".$res['FName']."</td>";
                echo "<td>".$res['LName']."</td>";
                echo "<td>".$res['TotalSales']."</td>";
            }

        }
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    6. Вывести список автомобилей и количество продаж каждого автомобиля, количество продаж которых больше чем:
</p>
<form action="" method="post">
    <input type="number" name="number">
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Модель автомобиля</strong></td>
        <td><strong>Количество продаж</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['number'])){
            $selected=$_POST['number'];
            $result5 = mysqli_query($db, "SELECT c.NameCar, COUNT(s.IDca) AS SalesCount
FROM cars AS c
LEFT JOIN sales AS s ON c.IDca = s.IDca
GROUP BY c.IDca
HAVING COUNT(s.IDca)>='$selected';");
            while ($res = mysqli_fetch_assoc($result5)) {
                echo "<tr>";
                echo "<td>".$res['NameCar']."</td>";
                echo "<td>".$res['SalesCount']."</td>";
            }

        }
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    7. Вывести список сотрудников и количество совершенных ими продаж, количество продаж которых больше чем:
</p>
<form action="" method="post">
    <input type="number" name="number">
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Имя сотрудника</strong></td>
        <td><strong>Фамилия сотрудника</strong></td>
        <td><strong>Количество продаж</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['number'])){
            $selected=$_POST['number'];
            $result6 = mysqli_query($db, "SELECT e.FName, e.LName, COUNT(s.IDemp) AS SalesCount
FROM employees AS e
LEFT JOIN sales AS s ON e.IDemp = s.IDemp
GROUP BY e.IDemp
HAVING COUNT(s.IDemp)>=$selected;");
            while ($res = mysqli_fetch_assoc($result6)) {
                echo "<tr>";
                echo "<td>".$res['FName']."</td>";
                echo "<td>".$res['LName']."</td>";
                echo "<td>".$res['SalesCount']."</td>";
            }

        }
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    8. Вывести список автомобилей, которые еще не были проданы:
</p>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Модель автомобиля</strong></td>
        <td><strong>VIN номер</strong></td>
    </tr>
    <?php
    // Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result7)) {
        echo "<tr>";
        echo "<td>".$res['NameCar']."</td>";
        echo "<td>".$res['vin']."</td>";
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    9. Вывести список клиентов, которые не совершили ни одной покупки:
</p>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Имя клиента</strong></td>
        <td><strong>Фамилия клиента</strong></td>
    </tr>
    <?php
    // Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result8)) {
        echo "<tr>";
        echo "<td>".$res['FName']."</td>";
        echo "<td>".$res['LName']."</td>";
    }
    ?>
</table>
<p>-------------------------------------------------------------------------------------------------</p>
<p>
    10. Вывести список стран и среднюю стоимость автомобилей, выпущенных в каждой стране, средняя стоимость которых находится в диапазоне:
</p>
<form action="" method="post">
    <p>от</p>
    <input type="number" name="number">
    <p>до</p>
    <input type="number" name="number1">
    <input type="submit" name="submit" value="Выполнить">
</form>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Название страны</strong></td>
        <td><strong>Средняя стоимость</strong></td>
    </tr>
    <?php
    if (isset($_POST['submit'])){
        if (!empty($_POST['number'])){
            $selected=$_POST['number'];
            $selected1=$_POST['number1'];
            $result9 = mysqli_query($db, "SELECT co.NameCountry, AVG(c.Price) AS AveragePrice
FROM country AS co
JOIN automaker AS a ON co.IDco = a.IDco
JOIN cars AS c ON a.IDma = c.IDma
GROUP BY co.IDco
HAVING AVG(c.Price)>'$selected' AND AVG(c.Price)<'$selected1';");
            while ($res = mysqli_fetch_assoc($result9)) {
                echo "<tr>";
                echo "<td>".$res['NameCountry']."</td>";
                echo "<td>".$res['AveragePrice']."</td>";
            }

        }
    }
    ?>
</table>
</body>
</html>