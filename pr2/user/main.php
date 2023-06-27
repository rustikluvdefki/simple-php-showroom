<?php
require_once "products.php";
//var_dump($cars);
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Главная страница</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">О нас</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">CAR SHOWROOM</h1>
                    <p class="lead fw-normal text-white-50 mb-0">У нас вы найдете самые выгодные предложения</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">

            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($cars as $car) : ?>
                    <div class="col mb-5">

                        <div class="card h-100">
                            <form action="offer.php">

                            <!-- Product image-->
                            <img class="autoim" src="<?php echo $car[3]; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $car[5]; ?></h5>
                                    <h6 class="fw-bolder"><?php echo $car[0]; ?></h6>
                                    <!-- Product price-->
                                    <?php echo $car[4]; ?> руб.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <input type="hidden" name="namemaker" value="<?php echo $car[5]; ?>" >
                                    <input type="hidden" name="namecar" value="<?php echo $car[0]; ?>" >
                                    <input type="hidden" name="image" value="<?php echo $car[3]; ?>" >
                                    <input type="hidden" name="IDca" value="<?php echo $car[6]; ?>" >
                                    <input type="hidden" name="price" value="<?php echo $car[4]; ?>" >
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Заказать</button></div>
                            </div>
                            </form>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">CARSHOWROOM 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
