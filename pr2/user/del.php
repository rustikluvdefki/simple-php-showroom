<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../admin/dbConnection.php");

$idca=$_GET['idca'];
$result = mysqli_query($db, "DELETE FROM `cars` WHERE IDca='$idca'");
echo '<script>location.replace("main.php");</script>';

?>