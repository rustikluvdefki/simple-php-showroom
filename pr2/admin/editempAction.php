
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($db, $_POST['IDemp']);
    $fname = mysqli_real_escape_string($db, $_POST['FName']);
    $lname = mysqli_real_escape_string($db, $_POST['LName']);
    $phone = mysqli_real_escape_string($db, $_POST['Phone']);
    $pos = mysqli_real_escape_string($db, $_POST['Position']);
    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($phone) || empty($pos)) {
        if (empty($fname)) {
            echo "<font color='red'>1.</font><br/>";
        }

        if (empty($lname)) {
            echo "<font color='red'>2</font><br/>";
        }

        if (empty($phone)) {
            echo "<font color='red'>3</font><br/>";
        }

        if (empty($pos)) {
            echo "<font color='red'>3</font><br/>";
        }
    } else {
        // Update the database table
        $result = mysqli_query($db, "UPDATE employees SET `FName` = '$fname', `LName` = '$lname', `Phone` = '$phone', `Position` = '$pos' WHERE `IDemp` = '$id'");

        // Display success message
        echo "<p><font color='green'>Строка изменена!</p>";
        echo "<a href='main.php'>Посмотреть результат</a>";
    }
}
