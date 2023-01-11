<?php

require_once "MySQL.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

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
    <title>Greeny - Order History</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="assets/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="assets/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/orderlist.css">
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

<div class="mobile-menu"><a href="index.php" title="Home Page"><i
                class="fas fa-home"></i><span>Home</span></a>
    <button class="cate-btn" title="Category List"><i
                class="fas fa-list"></i><span>category</span></button>
    <button class="cart-btn" title="Cartlist"><i
                class="fas fa-shopping-basket"></i><span>cartlist</span><sup>9+</sup></button>
    <a href="wishlist.php"
       title="Wishlist"><i class="fas fa-heart"></i><span>wishlist</span><sup>0</sup></a><a href="compare.html"
                                                                                            title="Compare List"><i
                class="fas fa-random"></i><span>compare</span><sup>0</sup></a></div>
<section class="inner-section single-banner" style="background: url(assets/images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>Order History</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orderlist</li>
        </ol>
    </div>
</section>
<section class="inner-section orderlist-part">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                <?php

                $invoiceRs = Database::search("SELECT * FROM invoice WHERE user_email='" . $user['email'] . "'");
                if ($invoiceRs->num_rows > 0) {
                    while ($invoiceData = $invoiceRs->fetch_assoc()) {
                        ?>


                        <div class="orderlist">
                            <div class="orderlist-head">
                                <h5>order <?= $invoiceData['order_id'] ?></h5>
                                <a class="btn btn-sm btn-inline"
                                   href="email-template.php?invoice=<?= $invoiceData['order_id'] ?>">
                                    <i class="icofont-download"></i>
                                    <span>download invoice</span>
                                </a>
                            </div>

                            <div class="orderlist-body">
                                <div class="row">

                                    <div class="col-lg-5">
                                        <ul class="orderlist-details">
                                            <li>
                                                <h6>order id</h6>
                                                <p><?= $invoiceData['order_id'] ?></p>
                                            </li>
                                            <li>
                                                <h6>Total Item</h6>
                                                <p><?= Database::search("SELECT * FROM invoice_item WHERE invoice_order_id = '" . $invoiceData['order_id'] . "'")->num_rows ?></p>
                                            </li>
                                            <li>
                                                <h6>Order Time</h6>
                                                <p><?= $invoiceData['date'] ?></p>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="orderlist-details">
                                            <li>
                                                <h6>Sub Total</h6>
                                                <p>
                                                    Rs.<?= $invoiceData['amount'] + ($invoiceData['amount'] / 100) * 15 ?></p>
                                            </li>
                                            <li>
                                                <h6>Discount</h6>
                                                <p>Rs.<?= ($invoiceData['amount'] / 100) * 15 ?></p>
                                            </li>
                                            <li>
                                                <h6>Total<small>(Incl. VAT)</small></h6>
                                                <p>Rs.<?= $invoiceData['amount'] ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="orderlist-deliver">
                                            <?php
                                            $addressRs = Database::search("SELECT *, c.name as cname FROM address JOIN city c on address.city_id = c.id WHERE user_email = '" . $invoiceData['user_email'] . "'");
                                            $address = $addressRs->fetch_assoc();
                                            ?>
                                            <h6>Delivery location</h6>
                                            <p><?= $address['line1'] . ', ' . $address['line2'] . ', ' . $address['cname'] ?></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="account-card">
                                            <div class="account-title">
                                                <h4>Your order</h4>
                                            </div>
                                            <div class="account-content">
                                                <div class="table-scroll">
                                                    <table class="table-list">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Serial</th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">brand</th>
                                                            <th scope="col">quantity</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php

                                                        $invoiceItemRs = Database::search("SELECT *, p.id as pid, b.name as brand, invoice_item.qty as qty FROM invoice_item JOIN product p on p.id = invoice_item.product_id JOIN brand b on b.id = p.brand_id WHERE invoice_order_id='" . $invoiceData["order_id"] . "'");

                                                        while ($InvItem = $invoiceItemRs->fetch_assoc()) {
                                                            ?>
                                                            <tr>
                                                                <td class="table-serial">
                                                                    <h6><?= $InvItem["pid"] ?></h6>
                                                                </td>
                                                                <td class="table-image">
                                                                    <?php
                                                                    $product_img_rs = Database::search("SELECT * FROM product_images WHERE product_id = '${InvItem['pid']}' LIMIT 1");
                                                                    $product_img_data = $product_img_rs->fetch_assoc();
                                                                    ?>
                                                                    <img src="<?= $product_img_data['code'] ?>"
                                                                         alt="product">
                                                                </td>
                                                                <td class="table-name">
                                                                    <h6><?= $InvItem["title"] ?></h6>
                                                                </td>
                                                                <td class="table-price">
                                                                    <h6>Rs.<?= $InvItem["price"] * $InvItem["qty"] ?>
                                                                        .00</h6>
                                                                </td>
                                                                <td class="table-brand">
                                                                    <h6><?= $InvItem["brand"] ?></h6>
                                                                </td>
                                                                <td class="table-quantity">
                                                                    <h6><?= $InvItem["qty"] ?>
                                                                        <small><?= $InvItem["unit"] ?></small></h6>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>

                    <div>
                        <h2 class="text-center text-danger">No Payment Done Yet</h2>
                    </div>

                    <?php
                }
                ?>

            </div>
        </div>

    </div>
</section>


<!-- footer -->
<?php require "footer.php" ?>
<!-- footer -->

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