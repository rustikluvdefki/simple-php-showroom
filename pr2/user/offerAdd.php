<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../admin/dbConnection.php");


$idca=$_GET['idca'];
$price=$_GET['price'];
$idemp=rand(2, 4);
$idcl=rand(1, 15);


$result = mysqli_query($db, "INSERT INTO sales (`DateSale`, `IDca`, `IDcl`, `IDemp`) VALUES (curdate(),'$idca', '$idcl', '$idemp')");
//$result1 = mysqli_query($db, "DELETE FROM `cars` WHERE IDca='$idca'");

echo "<p><font color='green'>Ваш заказ оформлен! Мы вам обязательно перезвоним!</p>";
?>
<form action="del.php">
    <input type="hidden" name="idca" value="<?php echo $idca?>">
    <button type='submit'>Вернуться на главную страницу</button>
</form>