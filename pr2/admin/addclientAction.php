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
    $adress = mysqli_real_escape_string($db, $_POST['Adress']);

//    echo $idma;
    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($phone) || empty($adress)) {
        if (empty($fname)) {
            echo "<font color='red'>1</font><br/>";
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

        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>�����</a>";
    } else {
        // If all the fields are filled (not empty)

        // Insert data into database
        $result = mysqli_query($db, "INSERT INTO clients (`FName`, `LName`, `Phone`, `Adress`) VALUES ('$fname', '$lname', '$phone', '$adress')");
        echo $result;
        // Display success message
        echo "<p><font color='green'>������ ��������!</p>";
        echo "<a href='main.php'>���������� ���������</a>";
    }
}
?>
</body>
</html>
