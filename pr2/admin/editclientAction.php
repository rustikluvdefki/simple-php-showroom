
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($db, $_POST['IDcl']);
    $fname = mysqli_real_escape_string($db, $_POST['FName']);
    $lname = mysqli_real_escape_string($db, $_POST['LName']);
    $phone = mysqli_real_escape_string($db, $_POST['Phone']);
    $adress = mysqli_real_escape_string($db, $_POST['Adress']);
    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($phone) || empty($adress)) {
        if (empty($fname)) {
            echo "<font color='red'>1.</font><br/>";
        }

        if (empty($lname)) {
            echo "<font color='red'>2</font><br/>";
        }

        if (empty($phone)) {
            echo "<font color='red'>3</font><br/>";
        }

        if (empty($adress)) {
            echo "<font color='red'>3</font><br/>";
        }
    } else {
        // Update the database table
        $result = mysqli_query($db, "UPDATE clients SET `FName` = '$fname', `LName` = '$lname', `Phone` = '$phone', `Adress` = '$adress' WHERE `IDcl` = '$id'");

        // Display success message
        echo "<p><font color='green'>Строка изменена!</p>";
        echo "<a href='main.php'>Посмотреть результат</a>";
    }
}
