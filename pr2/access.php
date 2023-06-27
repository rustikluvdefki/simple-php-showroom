<?php
$login=$_GET['login'];
$pass=$_GET['pass'];
function foo($login, $pass){
    if($login=="admin"&&$pass=="admin"){
        echo '<script>location.replace("admin/main.php");</script>'; exit;
    }
    else{
        echo '<script>location.replace("index.php");</script>'; exit;
    }
}
foo($login,$pass);
?>