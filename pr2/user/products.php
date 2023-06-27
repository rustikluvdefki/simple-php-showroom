<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require_once("../admin/dbConnection.php");

    $result = mysqli_query($db, "SELECT NameCar, DateRelease, Color, imgs, price, NameMaker, IDca FROM cars JOIN automaker ON cars.IDma=automaker.IDma");

    $cars=array();

    while ($res = mysqli_fetch_assoc($result)) {
        $cars[]=array_values($res);
    }



?>
