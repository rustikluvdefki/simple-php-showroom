<html>
<head>
    <title>Добавить клиента</title>
</head>

<body>
<h2>Добавить клиента</h2>
<p>
    <a href="main.php">Главная страница</a>
</p>

<form action="addclientAction.php" method="post" name="add">
    <table width="25%" border="0">
        <tr>
            <td>Имя</td>
            <td><input type="text" name="FName"></td>
        </tr>
        <tr>
            <td>Фамилия</td>
            <td><input type="text" name="LName"></td>
        </tr>
        <tr>
            <td>Номер телефона</td>
            <td><input type="text" name="Phone"></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><input type="text" name="Adress"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Добавить"></td>
        </tr>
    </table>
</form>
</body>
</html>

