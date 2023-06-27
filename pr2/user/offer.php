<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../admin/dbConnection.php");



$idca=$_GET['IDca'];
$price=$_GET['price'];
$namemaker=$_GET['namemaker'];
$namecar=$_GET['namecar'];
$image=$_GET['image'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CARSHOWROOM</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="main.php">CARSHOWROOM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="main.php">Главная страница</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">О нас</a></li>

            </ul>

        </div>
    </div>
</nav>
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $image?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">NUM: CAR-<?php echo $idca?></div>
                <h1 class="display-5 fw-bolder"><?php echo $namemaker?> <?php echo $namecar?></h1>
                <div class="fs-5 mb-5">
                    <span><?php echo $price?> руб.</span>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                <input class="form-control text-center me-3" placeholder="Введите номер телефона" id="inputQuantity" type="text" value="" style="width: 300px; margin-bottom: 15px" />
                <input class="form-control text-center me-3" placeholder="Введите ваше имя" id="inputQuantity" type="text" value="" style="width: 300px; margin-bottom: 15px" />
                <div class="d-flex">
                    <form action="offerAdd.php">
                        <input type="hidden" name="idca" value="<?php echo $idca;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                    </form>
                        <i class="bi-cart-fill me-1"></i>
                        Оформить заказ
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">CARSHOWROOM</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
