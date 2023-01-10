<?php
require_once "MySQL.php";
session_start();

if (!isset($_GET['invoice'])) {
    header("Location: index.php");
    exit();
}

$orderId = $_GET['invoice'];

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
    <title>Greeny - Invoice</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="assets/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="assets/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/invoice.css">
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

<section class="inner-section single-banner" style="background: url(assets/images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>Order invoice</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">shop</a></li>
            <li class="breadcrumb-item"><a href="#">product details</a></li>
            <li class="breadcrumb-item"><a href="#">checkout</a></li>
            <li class="breadcrumb-item active" aria-current="page">invoice</li>
        </ol>
    </div>
</section>

<?php

$invoiceRs = Database::search("SELECT * FROM invoice WHERE order_id = '" . $orderId . "'");
if ($invoiceRs->num_rows > 0) {
    $invoiceData = $invoiceRs->fetch_assoc();
    ?>

    <section class="inner-section invoice-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert-info">
                        <p>Thank you! We have recieved your order.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>order recieved</h4>
                        </div>
                        <div class="account-content">
                            <div class="invoice-recieved">
                                <h6>order number <span><?= $invoiceData['order_id'] ?></span></h6>
                                <h6>Email <span
                                            style="text-transform: lowercase"><?= $invoiceData['user_email'] ?></span>
                                </h6>
                                <h6>payment method <span>PayHere - Card Payment</span></h6>
                                <h6>total amount <span>Rs.<?= $invoiceData['amount'] ?>.00</span></h6>
                            </div>
                            <hr/>
                            <div class="invoice-recieved">
                                <h6>order date <span><?= $invoiceData['date'] ?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
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

                            $invItemsRs = Database::search("SELECT *, p.id AS pid, invoice_item.qty AS qty, b.name AS bname FROM invoice_item JOIN product p on p.id = invoice_item.product_id JOIN brand b on b.id = p.brand_id WHERE invoice_item.invoice_order_id = '" . $orderId . "'");
                            while ($invItem = $invItemsRs->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td class="table-serial">
                                        <h6><?= $invItem['pid'] ?></h6>
                                    </td>
                                    <td class="table-image">
                                        <?php
                                        $prodImageRs = Database::search("SELECT * FROM product_images WHERE product_id='" . $invItem['pid'] . "' LIMIT 1");
                                        $prodImage = $prodImageRs->fetch_assoc();
                                        ?>
                                        <img src="<?= $prodImage["code"] ?>" alt="product">
                                    </td>
                                    <td class="table-name">
                                        <h6><?= $invItem['title'] ?></h6>
                                    </td>
                                    <td class="table-price">
                                        <h6><?= $invItem['qty'] * $invItem['price'] ?><small>/kilo</small></h6>
                                    </td>
                                    <td class="table-brand">
                                        <h6><?= $invItem['bname'] ?></h6>
                                    </td>
                                    <td class="table-quantity">
                                        <h6><?= $invItem['qty'] ?></h6>
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
            <div class="row">
                <div class="col-lg-12 text-center mt-5">
                    <a class="btn btn-inline" href="email-template.php?invoice=<?= $orderId ?>">
                        <i class="icofont-download"></i>
                        <span>download invoice</span>
                    </a>
                    <div class="back-home"><a href="index.php">Back to Home</a></div>
                </div>
            </div>
        </div>
    </section>

    <?php
}
?>

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
<script src="assets/js/script.js"></script>
</body>

</html>