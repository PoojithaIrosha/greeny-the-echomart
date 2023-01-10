<?php
if (isset($_GET["pid"])) {
    $id = $_GET["pid"];
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Greeny | Product View</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="assets/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="assets/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/product-details.css">
</head>

<body>
<div class="backdrop"></div>
<a class="backtop fas fa-arrow-up" href="#"></a>

<!-- Header -->
<?php require 'header.php'; ?>
<!-- Header -->


<!-- mobile -->
<?php require 'mobile_aside.php'; ?>
<!-- mobile -->

<?php
$rs = Database::search("SELECT *, `brand`.`name` AS `brand_name`, `category`.`name` AS `category_name`, `category`.`id` AS `category_id`, `unit`.`name` AS `unit_name` FROM `product` INNER JOIN `category` ON product.category_id = category.id INNER JOIN `brand` ON product.brand_id=brand.id INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE `product`.`id` = '" . $id . "' ");
$categoryId = '';

if ($rs->num_rows == 1) {
    $data = $rs->fetch_assoc();

    $categoryId = $data['category_id'];
    ?>
    <!-- Top Bar -->
    <section class="single-banner inner-section"
             style="background: url(assets/images/single-banner.jpg) no-repeat center;">
        <div class="container">
            <h2>Product View</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product View</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $data["title"] ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Product -->
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <!--Product Image-->
                <div class="col-lg-6">
                    <div class="details-gallery">
                        <!-- Labels NEW, -25% -->
                        <div class="details-label-group"><label class="details-label new">new</label><label
                                    class="details-label off">-25%</label></div>

                        <?php
                        $img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $id . "'");
                        ?>

                        <!-- Main Product IMG -->
                        <ul class="details-preview">
                            <li><img src="<?= $main_img = $img_rs->fetch_assoc()['code'] ?>" alt="product"
                                     id="main_img_tag"></li>
                        </ul>

                        <!-- Other IMGs -->
                        <ul class="details-thumb">
                            <li><img src="<?= $main_img ?>" alt="product" id="product_img0"
                                     onclick="load_main_img(0)"></li>
                            <?php

                            for ($x = 1; $x <= $img_rs->num_rows - 1; $x++) {
                                $img_data = $img_rs->fetch_assoc();
                                ?>
                                <li><img src="<?= $img_data['code'] ?>" alt="product" id="product_img<?= $x ?>"
                                         onclick="load_main_img(<?= $x ?>)"></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!--Product Details-->
                <div class="col-lg-6">
                    <div class="details-content">
                        <!-- Name -->
                        <h3 class="details-name"><a href="#"><?= $data["title"] ?></a></h3>

                        <!-- SKU & Brand -->
                        <div class="details-meta">
                            <p>SKU:<span><?= $data["id"] ?></span></p>
                            <p>BRAND:<a href="#"><?= $data["brand_name"] ?></a></p>
                            <p>QTY: <?= $data["qty"] . " " . $data["unit_name"] ?></p>
                        </div>

                        <!--TODO: Add Ratings-->
                        <!-- Review -->
                        <div class="details-rating">
                            <i class="active icofont-star"></i>
                            <i class="active icofont-star"></i>
                            <i class="active icofont-star"></i>
                            <i class="active icofont-star"></i>
                            <i class="icofont-star"></i>
                            <a href="#">(3 reviews)</a>
                        </div>

                        <!-- Price -->
                        <h3 class="details-price">
                            <del><?= "Rs." . (($data["price"] / 100) * 25) + $data["price"] . ".00" ?></del>
                            <span><?= "Rs." . ($data["price"]) . ".00" ?><small>/per <?= $data["unit_name"] ?></small></span>
                        </h3>

                        <!-- Description -->
                        <p class="details-desc">
                            <?= $data["description"] ?>
                        </p>

                        <div class="product-action2">
                            <button onclick="decrement_qty()" title="Quantity Minus">
                                <i class="icofont-minus"></i>
                            </button>
                            <input class="action-input" title="Quantity Number" type="text" name="quantity"
                                   id="qtyInput" value="1"/>
                            <button onclick="increment_qty()" title="Quantity Plus">
                                <i class="icofont-plus"></i>
                            </button>
                        </div>

                        <div class="details-add-group mt-3">
                            <button onclick="add_to_cart(<?= $id ?>)" class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-cart"></i>
                                <span>add to cart</span>
                            </button>
                        </div>
                        <div class="details-action-group">
                            <button class="details-wish wish" title="Add Your Wishlist"
                                    onclick="add_to_wishlist(<?= $id ?>)"><i
                                        class="icofont-heart"></i><span>add to wish</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

    <section class="inner-section">
        <div class="container">
            <?php
            $rs2 = Database::search("SELECT * FROM `reviews` INNER JOIN `user` ON reviews.user_email = `user`.email WHERE `reviews`.`product_id` = '" . $id . "' ORDER BY `date_added` DESC");
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-reve" class="tab-link active" data-bs-toggle="tab">reviews
                                (<?= $rs2->num_rows; ?>
                                )</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade active show" id="tab-reve">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Reviews -->
                        <div class="product-details-frame">
                            <ul class="review-list">
                                <?php

                                while ($review_data = $rs2->fetch_assoc()) {
                                    ?>


                                    <li class="review-item">
                                        <!-- User -->
                                        <div class="review-media">
                                            <div class="review-avatar" href="#">
                                                <?php
                                                $pimg_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $review_data["user_email"] . "'");
                                                if ($pimg_rs->num_rows > 0) {
                                                    $pimg_data = $pimg_rs->fetch_assoc();
                                                    ?>
                                                    <img src="<?= $pimg_data["code"] ?>" alt="review">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="assets/images/profiles/user.png" alt="review">
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                            <h5 class="review-meta">
                                                <?= $review_data["fname"] . " " . $review_data["lname"] ?>
                                                <span><?= date_format(date_create($review_data["date_added"]), "M d, Y") ?></span>
                                                <!--Sep 23, 2022-->
                                            </h5>
                                        </div>

                                        <ul class="review-rating">
                                            <?php
                                            $count = 0;
                                            for ($x = 0; $x < 5; $x++) {
                                                if ($count < $review_data["rating"]) {
                                                    ?>
                                                    <li class="icofont-ui-rating"></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="icofont-ui-rate-blank"></li>
                                                    <?php
                                                }
                                                $count++;
                                            }
                                            ?>

                                        </ul>
                                        <p class="review-desc"><?= $review_data["review"] ?></p>
                                    </li>


                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- Reviews -->

                        <!-- Add review -->
                        <div class="product-details-frame">
                            <h3 class="frame-title">add your review</h3>

                            <div class="review-form" id="reviewForm">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="star-rating">
                                            <input type="radio" name="rating" id="star-1" value="5">
                                            <label for="star-1"></label>

                                            <input type="radio" name="rating" id="star-2" value="4">
                                            <label for="star-2"></label>

                                            <input type="radio" name="rating" id="star-3" value="3">
                                            <label for="star-3"></label>

                                            <input type="radio" name="rating" id="star-4" value="2">
                                            <label for="star-4"></label>

                                            <input type="radio" name="rating" id="star-5" value="1">
                                            <label for="star-5"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group"><textarea class="form-control"
                                                                          placeholder="Type your review here..."
                                                                          id="review" name="review"></textarea></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-inline" onclick="add_review(<?= $id ?>)"><i
                                                    class="icofont-water-drop"></i><span>drop your review</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Add review -->

                </div>
            </div>
        </div>
    </section>
<?php
}else {
?>
    <script>window.location = "index.php"</script>
    <?php
    exit();
}
?>


<?php
$email = "";
if (isset($_SESSION["user"]["email"])) {
    $email = $_SESSION["user"]["email"];
}

$productsRs = Database::search("SELECT *, product.id AS `pid` , unit.`name` AS `unit_name` FROM `product` INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE `product`.`category_id` = '" . $categoryId . "' AND `product`.`id` <> '" . $id . "'");

if ($productsRs->num_rows > 0) {
    ?>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-heading">
                        <h2>related this items</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                <?php
                while ($productsData = $productsRs->fetch_assoc()) {
                    ?>
                    <!-- Product -->
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">new</label>
                                </div>

                                <a class="product-image" href="product-view.php?pid=<?= $productsData["pid"] ?>">

                                    <?php
                                    $img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $productsData["pid"] . "' LIMIT 1");
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
                                    <a href="product-view.php?pid=<?= $productsData["pid"] ?>"><?= $productsData["title"] ?></a>
                                </h6>
                                <!-- Price -->
                                <h6 class="product-price d-flex flex-column align-items-center">
                                    <del><?= "Rs." . number_format((($productsData["price"] / 100) * 25) + $productsData["price"]) ?></del>
                                    <span>
                                    <?= "Rs." . number_format($productsData["price"]) ?>
                                    <small>/piece</small>
                                </span>
                                </h6>
                                <h6 class="mb-2">
                                    <small class="text-muted"><?= $productsData["qty"] . " " . $productsData["unit_name"] ?>
                                        Available</small>
                                </h6>
                                <!-- Buy Now Button -->
                                <a href="product-view.php?pid=<?= $productsData["pid"] ?>" class="product-add">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span>Buy Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product -->
                    <?php
                }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25"><a href="shop.php" class="btn btn-outline"><i
                                    class="fas fa-eye"></i><span>view all related</span></a></div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>


<!--Toast-->
<?php include "toast.php" ?>
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