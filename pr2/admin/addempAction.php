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
    // Escape special characters in string for use in SQL statement
    $fname = mysqli_real_escape_string($db, $_POST['FName']);
    $lname = mysqli_real_escape_string($db, $_POST['LName']);
    $phone = mysqli_real_escape_string($db, $_POST['Phone']);
    $pos = mysqli_real_escape_string($db, $_POST['Position']);

//    echo $idma;
    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($phone) || empty($pos)) {
        if (empty($fname)) {
            echo "<font color='red'>1</font><br/>";
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

        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Назад</a>";
    } else {
        // If all the fields are filled (not empty)

        // Insert data into database
        $result = mysqli_query($db, "INSERT INTO employees (`FName`, `LName`, `Phone`, `Position`) VALUES ('$fname', '$lname', '$phone', '$pos')");
        echo $result;
        // Display success message
        echo "<p><font color='green'>Сотрудник добавлен!</p>";
        echo "<a href='main.php'>Посмотреть результат</a>";
    }
}
?>
</body>
</html>
