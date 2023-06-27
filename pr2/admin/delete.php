<?php
// Include the database connection file
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("dbConnection.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($db, "DELETE FROM cars WHERE IDca = '$id'");

// Redirect to the main display page (main.php in our case)
echo "<p><font color='green'>Автомобиль удален!</p>";
echo "<a href='main.php'>Посмотреть результат</a>";
