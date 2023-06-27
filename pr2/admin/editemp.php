
<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM employees WHERE IDemp = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$fname = $resultData['FName'];
$lname = $resultData['LName'];
$phone = $resultData['Phone'];
$pos = $resultData['Position'];
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

<form name="edit" method="post" action="editempAction.php">
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
            <td>Должность</td>
            <td><input type="text" name="Position" value="<?php echo $pos; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="IDemp" value=<?php echo $id; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
