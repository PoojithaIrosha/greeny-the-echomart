<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="template" content="greeny"/>
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template"/>
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online"/>
    <title>Greeny Echomart - Home</title>
    <link rel="icon" href="assets/images/favicon.png"/>
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css"/>
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css"/>
    <link rel="stylesheet" href="assets/fonts/fontawesome/fontawesome.min.css"/>
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.min.css"/>
    <link rel="stylesheet" href="assets/vendor/slickslider/slick.min.css"/>
    <link rel="stylesheet" href="assets/vendor/niceselect/nice-select.min.css"/>
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/home-grid.css"/>
</head>

<body>
<div class="backdrop"></div>
<a class="backtop fas fa-arrow-up" href="#"></a>

<!-- Header -->
<?php require "header.php" ?>
<!-- Header -->


<!-- mobile -->
<?php require "mobile_aside.php" ?>
<!-- mobile -->

<section class="banner-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-1 order-lg-0 order-xl-0">
                <div class="row">
                    <div class="col-sm-6 col-lg-12">
                        <div class="home-grid-promo">
                            <a href="#">
                                <img src="assets/images/promo/home/01.jpg" alt="promo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="home-grid-promo">
                            <a href="#">
                                <img src="assets/images/promo/home/02.jpg" alt="promo"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-0 order-lg-1 order-xl-1">
                <div class="home-grid-slider slider-arrow slider-dots">
                    <a href="#"><img src="assets/images/home/grid/01.jpg" alt=""/></a>
                    <a href="#"><img src="assets/images/home/grid/02.jpg" alt=""/></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section suggest-part">
    <div class="container">
        <ul class="suggest-slider slider-arrow">
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/01.jpg" alt="suggest"/>
                    <h5>
                        vegetables
                        <span>34 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/02.jpg" alt="suggest"/>
                    <h5>
                        fruits
                        <span>89 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/03.jpg" alt="suggest"/>
                    <h5>
                        groceries
                        <span>45 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/04.jpg" alt="suggest"/>
                    <h5>
                        dairy farm
                        <span>83 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/05.jpg" alt="suggest"/>
                    <h5>
                        sea foods
                        <span>40 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/06.jpg" alt="suggest"/>
                    <h5>
                        vegan foods
                        <span>57 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/07.jpg" alt="suggest"/>
                    <h5>
                        dry foods
                        <span>23 items</span>
                    </h5>
                </a>
            </li>
            <li>
                <a class="suggest-card" href="shop.php">
                    <img src="assets/images/suggest/08.jpg" alt="suggest"/>
                    <h5>
                        fast foods
                        <span>97 items</span>
                    </h5>
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>New Items</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

            <?php

            require_once "MySQL.php";

            $rs = Database::search("SELECT *, product.id AS `pid` , unit.`name` AS `unit_name` FROM `product` INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE product.status_id = '1' LIMIT 10;");
            while ($data = $rs->fetch_assoc()) {

                if ($data["status_id"] == 1) {

                    ?>
                    <!-- Product -->
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">new</label>
                                </div>

                                <?php
                                $email = "";
                                if (isset($_SESSION["user"]["email"])) {
                                    $email = $_SESSION["user"]["email"];
                                }

                                $rs2 = Database::search("SELECT * FROM `wishlist` WHERE `user_email`='" . $email . "' && `product_id`='" . $data['pid'] . "'");
                                if ($rs2->num_rows == 1) { //isset($_SESSION["user"]) &&

                                    ?>
                                    <button id="wish_btn<?= $data["pid"]; ?>" class="product-wish active"
                                            onclick="add_to_wishlist(<?= $data["pid"] ?>)">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <?php

                                } else {
                                    ?>
                                    <button id="wish_btn<?= $data["pid"]; ?>"
                                            onclick="add_to_wishlist(<?= $data["pid"] ?>)" class="product-wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <?php
                                }
                                ?>


                                <a class="product-image" href="product-view.php?pid=<?= $data["pid"] ?>">

                                    <?php
                                    $img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $data["pid"] . "' LIMIT 1");
                                    $img_data = $img_rs->fetch_assoc();
                                    ?>
                                    <img src="<?= $img_data["code"] ?>" alt="product"/>
                                </a>
                            </div>
                            <div class="product-content">
                                <!--TODO: Add ratings-->
                                <!-- Ratings -->
                                <div class="product-rating">
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                </div>
                                <!-- Title -->
                                <h6 class="product-name">
                                    <a href="product-view.php?pid=<?= $data["pid"] ?>"><?= $data["title"] ?></a>
                                </h6>
                                <!-- Price -->
                                <h6 class="product-price d-flex flex-column align-items-center">
                                    <del><?= "Rs." . number_format((($data["price"] / 100) * 25) + $data["price"]) ?></del>
                                    <span>
                                    <?= "Rs." . number_format($data["price"]) ?>
                                    <small>/piece</small>
                                </span>
                                </h6>
                                <h6 class="mb-2">
                                    <small class="text-muted"><?= ($data['qty'] != 0) ? $data["qty"] . " " . $data["unit_name"] . " Available" : "Out of Stock" ?>
                                    </small>
                                </h6>
                                <!-- Buy Now Button -->
                                <a href='<?= ($data['qty'] != 0) ? "product-view.php?pid=" . $data["pid"] . "" : "javascript:void()" ?>'
                                   class="product-add">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span>Buy Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product -->
                    <?php
                }
            }
            ?>

        </div>

    </div>
</section>
<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="promo-img">
                    <a href="#"><img src="assets/images/promo/home/03.jpg" alt="promo"/></a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section countdown-part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto">
                <div class="countdown-content">
                    <h3>special discount offer for vegetable items</h3>
                    <p>
                        Reprehenderit sed quod autem molestiae aut modi minus veritatis
                        iste dolorum suscipit quis voluptatum fugiat mollitia quia
                        minima
                    </p>
                    <div class="countdown countdown-clock" data-countdown="2022/12/22">
                            <span class="countdown-time">
                                <span>00</span>
                                <small>days</small>
                            </span>
                        <span class="countdown-time">
                                <span>00</span>
                                <small>hours</small>
                            </span>
                        <span class="countdown-time">
                                <span>00</span>
                                <small>minutes</small>
                            </span>
                        <span class="countdown-time">
                                <span>00</span>
                                <small>seconds</small>
                            </span>
                    </div>
                    <a href="shop.php" class="btn btn-inline">
                        <i class="fas fa-shopping-basket"></i>
                        <span>shop now</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="countdown-img">
                    <img src="assets/images/countdown.png" alt="countdown"/>
                    <div class="countdown-off">
                        <span>20%</span>
                        <span>off</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img">
                    <a href="#"><img src="assets/images/promo/home/01.jpg" alt="promo"/></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img">
                    <a href="#"><img src="assets/images/promo/home/02.jpg" alt="promo"/></a>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="section brand-part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Brands</h2>
                </div>
            </div>
        </div>
        <div class="brand-slider slider-arrow">
            <div class="brand-wrap">
                <div class="brand-media">
                    <img src="assets/images/brand/01.jpg" alt="brand"/>
                    <div class="brand-overlay">
                        <a href="brand-single.html"><i class="fas fa-link"></i></a>
                    </div>
                </div>
                <div class="brand-meta">
                    <h4>natural greeny</h4>
                    <p>(45 items)</p>
                </div>
            </div>
            <div class="brand-wrap">
                <div class="brand-media">
                    <img src="assets/images/brand/02.jpg" alt="brand"/>
                    <div class="brand-overlay">
                        <a href="brand-single.html"><i class="fas fa-link"></i></a>
                    </div>
                </div>
                <div class="brand-meta">
                    <h4>vegan lover</h4>
                    <p>(45 items)</p>
                </div>
            </div>
            <div class="brand-wrap">
                <div class="brand-media">
                    <img src="assets/images/brand/03.jpg" alt="brand"/>
                    <div class="brand-overlay">
                        <a href="brand-single.html"><i class="fas fa-link"></i></a>
                    </div>
                </div>
                <div class="brand-meta">
                    <h4>organic foody</h4>
                    <p>(45 items)</p>
                </div>
            </div>
            <div class="brand-wrap">
                <div class="brand-media">
                    <img src="assets/images/brand/04.jpg" alt="brand"/>
                    <div class="brand-overlay">
                        <a href="brand-single.html"><i class="fas fa-link"></i></a>
                    </div>
                </div>
                <div class="brand-meta">
                    <h4>ecomart limited</h4>
                    <p>(45 items)</p>
                </div>
            </div>
            <div class="brand-wrap">
                <div class="brand-media">
                    <img src="assets/images/brand/05.jpg" alt="brand"/>
                    <div class="brand-overlay">
                        <a href="brand-single.html"><i class="fas fa-link"></i></a>
                    </div>
                </div>
                <div class="brand-meta">
                    <h4>fresh fortune</h4>
                    <p>(45 items)</p>
                </div>
            </div>
            <div class="brand-wrap">
                <div class="brand-media">
                    <img src="assets/images/brand/06.jpg" alt="brand"/>
                    <div class="brand-overlay">
                        <a href="brand-single.html"><i class="fas fa-link"></i></a>
                    </div>
                </div>
                <div class="brand-meta">
                    <h4>econature</h4>
                    <p>(45 items)</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-50">
                    <a href="brand-list.html" class="btn btn-outline">
                        <i class="fas fa-eye"></i>
                        <span>view all brands</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Toast-->
<?php require "toast.php" ?>
<!--Toast-->

<!-- Footer -->
<?php require "footer.php" ?>
<!-- Footer -->

<script src="assets/vendor/bootstrap/jquery-1.12.4.min.js"></script>
<script src="assets/vendor/bootstrap/popper.min.js"></script>
<script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/vendor/countdown/countdown.min.js"></script>
<script src="assets/vendor/niceselect/nice-select.min.js"></script>
<script src="assets/vendor/slickslider/slick.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/js/nice-select.js"></script>
<script src="assets/js/countdown.js"></script>
<script src="assets/js/accordion.js"></script>
<script src="assets/js/venobox.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>