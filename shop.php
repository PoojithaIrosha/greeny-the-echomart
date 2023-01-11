<?php
session_start();
require_once "MySQL.php";

if (!isset($_GET["search"])) {
    header("Location: index.php");
    exit();
}

$c = array();
$b = array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="template" content="greeny"/>
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template"/>
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online"/>
    <title>Greeny Echomart - Shop</title>
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

<?php require "header.php" ?>

<?php require "mobile_aside.php" ?>

<section class="inner-section single-banner" style="background: url(assets/images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2><i class="fas fa-shopping-cart"></i> Shop</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </div>
</section>

<section class="inner-section shop-part">
    <div class="container">
        <div class="row content-reverse">

            <!--End widgets-->
            <div class="col-lg-3">

                <div class="shop-widget-promo">
                    <a href="#"><img src="assets/images/promo/shop/01.jpg" alt="promo"></a>
                </div>

                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Price</h6>
                    <form>
                        <div class="shop-widget-group">
                            <input type="text" placeholder="Min - 00" id="min_price"
                                   onkeyup='do_filter(<?= json_encode($_SESSION["c"]) ?>,<?= json_encode($_SESSION["b"]) ?>, "<?= $_GET["search"] ?>", "0")'>
                            <input type="text" placeholder="Max - 5k" id="max_price"
                                   onkeyup='do_filter(<?= json_encode($_SESSION["c"]) ?>,<?= json_encode($_SESSION["b"]) ?>, "<?= $_GET["search"] ?>", "0")'>
                        </div>
                        <button type="reset" class="shop-widget-btn">
                            <i class="fas fa-search"></i>
                            <span>search</span>
                        </button>
                    </form>
                </div>

                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Category</h6>
                    <div>
                        <input class="shop-widget-search" type="text" placeholder="Search...">
                        <ul class="shop-widget-list shop-widget-scroll">
                            <?php
                            $category_rs = Database::search("SELECT * FROM category");
                            while ($category_data = $category_rs->fetch_assoc()) {
                                $c[] = "cat_" . $category_data["id"];
                                ?>
                                <li>
                                    <div class="shop-widget-content">
                                        <input type="checkbox" id="cat_<?= $category_data["id"] ?>"
                                               onchange='do_filter(<?= json_encode($_SESSION["c"]) ?>,<?= json_encode($_SESSION["b"]) ?>, "<?= $_GET["search"] ?>", "0")'>
                                        <label for="cat_<?= $category_data["id"] ?>"><?= $category_data["name"] ?></label>
                                    </div>
                                    <span class="shop-widget-number"><i class="fas fa-dot-circle"></i></span>
                                </li>
                                <?php
                            }
                            $_SESSION["c"] = $c;
                            ?>
                        </ul>
                        <button onclick="window.location.reload()" class="shop-widget-btn">
                            <i class="far fa-trash-alt"></i>
                            <span>clear filter</span>
                        </button>
                    </div>
                </div>

                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Brand</h6>
                    <form><input class="shop-widget-search" type="text" placeholder="Search...">
                        <ul class="shop-widget-list shop-widget-scroll">
                            <?php
                            $brand_rs = Database::search("SELECT * FROM brand");
                            while ($brand_data = $brand_rs->fetch_assoc()) {
                                $b[] = "brand_" . $brand_data["id"];
                                ?>
                                <li>
                                    <div class="shop-widget-content">
                                        <input type="checkbox" id="brand_<?= $brand_data["id"] ?>"
                                               onchange='do_filter(<?= json_encode($_SESSION["c"]) ?>,<?= json_encode($_SESSION["b"]) ?>, "<?= $_GET["search"] ?>", "0")'>
                                        <label for="brand_<?= $brand_data["id"] ?>"><?= $brand_data["name"] ?></label>
                                    </div>
                                    <span class="shop-widget-number"><i class="fas fa-neuter"></i></span>
                                </li>
                                <?php
                            }
                            $_SESSION["b"] = $b;
                            ?>


                        </ul>
                        <button type="reset" onclick="window.location.reload()" class="shop-widget-btn">
                            <i class="far fa-trash-alt"></i><span>clear
                                    filter</span></button>
                    </form>
                </div>
            </div>
            <!--End widgets-->

            <!--Products-->
            <div class="col-lg-9" id="p_container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-filter">
                            <div class="filter-short"><label class="filter-label">Short by :</label><select
                                        class="form-select filter-select">
                                    <option selected>default</option>
                                    <option value="3">trending</option>
                                    <option value="1">featured</option>
                                    <option value="2">recommend</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4" id="products_container">

                    <?php

                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    }

                    $search = $_GET["search"];
                    $product_rs = Database::search("SELECT *, product.id AS `pid` , unit.`name` AS `unit_name` FROM `product` INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE title LIKE '%" . $search . "%' AND product.status_id = '1'");

                    $no_of_products = $product_rs->num_rows;
                    $results_per_page = 10;
                    $no_of_pages = ceil($no_of_products / $results_per_page);
                    $viewed_result_count = ((int)$page - 1) * $results_per_page;

                    $product_rs2 = Database::search("SELECT *, product.id AS `pid` , unit.`name` AS `unit_name` FROM `product` INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE title LIKE '%" . $search . "%' AND product.status_id = '1' LIMIT ${results_per_page} OFFSET ${viewed_result_count}");

                    while ($data = $product_rs2->fetch_assoc()) {
                        ?>
                        <!--Single Product-->
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
                                    <h6 class="product-price">
                                        <del><?= "Rs." . (($data["price"] / 100) * 25) + $data["price"] ?></del>
                                        <span>
                                    <?= "Rs." . ($data["price"]) ?>
                                    <small>/piece</small>
                                </span>
                                    </h6>
                                    <h6 class="mb-2">
                                        <small class="text-muted"><?= $data["qty"] . " " . $data["unit_name"] ?>
                                            Available</small>
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
                        <!--Single Product-->
                        <?php
                    }
                    ?>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bottom-paginate">
                            <p class="page-info">Showing <?= $no_of_products ?> Results</p>
                            <ul class="pagination d-flex">
                                <li class="page-item">
                                    <a class="page-link" style="cursor: pointer"
                                       href="shop.php?search=<?= $_GET["search"] ?>&page=<?= ($page <= 1) ? $page : ($page - 1) ?>">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </li>

                                <?php

                                for ($x = 1; $x <= $no_of_pages; $x++) {
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link active" style="cursor: pointer"
                                           href="shop.php?search=<?= $_GET["search"] ?>&page=<?= $x ?>"><?= $x ?></a>
                                    </li>
                                    <?php
                                }

                                ?>

                                <li class="page-item">
                                    <a class="page-link" style="cursor: pointer"
                                       href="shop.php?search=<?= $_GET["search"] ?>&page=<?= ($page >= $no_of_pages) ? $page : ($page + 1) ?>">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Toast-->
<?php require "toast.php" ?>
<!--Toast-->

<?php require "footer.php" ?>

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