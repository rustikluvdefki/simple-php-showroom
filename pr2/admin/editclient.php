
<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM clients WHERE IDcl = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$fname = $resultData['FName'];
$lname = $resultData['LName'];
$phone = $resultData['Phone'];
$adress = $resultData['Adress'];
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

<form name="edit" method="post" action="editclientAction.php">
    <table border="0">
        <tr>
            <td>Имя</td>
            <td><input type="text" name="FName" value="<?php echo $fname; ?>"></td>
        </tr>
        <tr>
            <td>Фамилия</td>
            <td><input type="text" name="LName" value="<?php echo $lname; ?>"></td>
        </tr>
        <tr>
            <td>Номер телефона</td>
            <td><input type="text" name="Phone" value="<?php echo $phone; ?>"></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><input type="text" name="Adress" value="<?php echo $adress; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="IDcl" value=<?php echo $id; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
