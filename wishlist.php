<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

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
    <title>Greeny Echomart - Wishlist</title>
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

<!-- mobile -->
<?php require "mobile_aside.php" ?>
<!-- mobile -->

<section class="inner-section single-banner" style="background: url(assets/images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>wishlist</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="shop.php">shop grid</a></li>
            <li class="breadcrumb-item active" aria-current="page">wishlist</li>
        </ol>
    </div>
</section>
<section class="inner-section wishlist-part">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-scroll">

                    <table class="table-list">

                        <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">description</th>
                            <th scope="col">status</th>
                            <th scope="col">shopping</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php
                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }

                        $products = Database::search("SELECT *, wishlist.id AS `wid`, product.id AS `pid` FROM wishlist INNER JOIN product ON wishlist.product_id = product.id INNER JOIN unit ON product.unit_id = unit.id WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");
                        $nwishlist = $products->num_rows;

                        $results_per_page = 5;
                        $number_of_pages = ceil($nwishlist / $results_per_page);

                        $page_first_result = ($pageno - 1) * $results_per_page;
                        $rs = Database::search("SELECT *, wishlist.id AS `wid`, product.id AS `pid` FROM wishlist INNER JOIN product ON wishlist.product_id = product.id INNER JOIN unit ON product.unit_id = unit.id WHERE `user_email` = '" . $_SESSION["user"]["email"] . "' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");


                        if ($rs->num_rows == 0) {
                            ?>
                            <tr>
                                <td colspan="8">No Products Found!</td>
                            </tr>
                            <?php
                        } else {

                            while ($data = $rs->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td class="table-serial">
                                        <h6><?= $data["pid"] ?></h6>
                                    </td>
                                    <td class="table-image">

                                        <?php
                                        $pimg_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $data["pid"] . "' LIMIT 1");
                                        $pimg_data = $pimg_rs->fetch_assoc();
                                        ?>

                                        <img src="<?= $pimg_data["code"] ?>" alt="product">
                                    </td>
                                    <td class="table-name">
                                        <h6><?= $data["title"] ?></h6>
                                    </td>
                                    <td class="table-price">
                                        <h6>Rs.<?= $data["price"] ?><small>/<?= $data["name"]; ?></small></h6>
                                    </td>
                                    <td class="table-desc">
                                        <p class="text-truncate"><?= $data["description"] ?></p>
                                    </td>
                                    <td class="table-status">
                                        <h6 class="stock-out"><?= ($data["qty"] > 0) ? "In Stock" : "Out of Stock" ?></h6>
                                    </td>
                                    <td class="table-action">
                                        <a class="view" href="product-view.php?pid=<?= $data["pid"] ?>">
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </a>
                                    </td>
                                    <td class="table-action">
                                        <a class="trash" href="remove_from_wishlist.php?id=<?= $data["wid"] ?>"
                                           title="Remove Wishlist">
                                            <i class="icofont-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>

                    </table>

                    <div class="center">
                        <div class="pagination my-3">
                            <a href="<?= ($pageno <= 1) ? "#" : "?page=" . ($pageno - 1) ?>">&laquo;</a>

                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                if ($page == $pageno) {
                                    ?>
                                    <a href="<?= "?page=" . ($page) ?>" class="active"><?= $page ?></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?= "?page=" . ($page) ?>"><?= $page ?></a>
                                    <?php
                                }
                            }

                            ?>

                            <a href="<?= ($pageno >= $number_of_pages) ? "#" : "?page=" . ($pageno + 1) ?>">&raquo;</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

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
</body>

</html>