<?php
require_once "connection.php";
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["user"]["email"];
$district_id = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="template" content="greeny"/>
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template"/>
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online"/>
    <title>Greeny Echomart - Checkout</title>
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
        <h2>checkout</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">checkout</li>
        </ol>
    </div>
</section>

<section class="inner-section checkout-part">
    <div class="container">
        <div class="row">

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
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sub_total = 0;
                                $cart_rs = Database::search("SELECT *, p.id as `pid`, u.name as `unit`, b.name as `brand`, c.qty as `qty` FROM cart c JOIN product p on c.product_id = p.id JOIN unit u on p.unit_id = u.id JOIN brand b on p.brand_id = b.id WHERE user_email = '${email}'");

                                while ($cart_data = $cart_rs->fetch_assoc()) {
                                    $sub_total += ($cart_data["price"] * $cart_data["qty"]);

                                    ?>
                                    <tr>
                                        <td class="table-serial">
                                            <h6><?= $cart_data["pid"] ?></h6>
                                        </td>
                                        <td class="table-image">
                                            <?php
                                            $product_img_rs = Database::search("SELECT * FROM product_images WHERE product_id = '${cart_data['pid']}' LIMIT 1");
                                            $product_img_data = $product_img_rs->fetch_assoc();
                                            ?>
                                            <img src="<?= $product_img_data['code'] ?>" alt="product">
                                        </td>
                                        <td class="table-name">
                                            <h6><?= $cart_data["title"] ?></h6>
                                        </td>
                                        <td class="table-price">
                                            <h6>Rs.<?= $cart_data["price"] * $cart_data["qty"] ?>.00</h6>
                                        </td>
                                        <td class="table-brand">
                                            <h6><?= $cart_data["brand"] ?></h6>
                                        </td>
                                        <td class="table-quantity">
                                            <h6><?= $cart_data["qty"] ?> <small><?= $cart_data["unit"] ?></small></h6>
                                        </td>
                                        <td class="table-action">
                                            <button class="trash"
                                                    onclick="delete_from_cart('<?= $cart_data["pid"] ?>')">
                                                <i class="icofont-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="chekout-coupon mt-3">
                            <button class="coupon-btn">Do you have a coupon code?</button>
                            <form class="coupon-form"><input type="text"
                                                             placeholder="Enter your coupon code">
                                <button
                                        type="submit"><span>apply</span></button>
                            </form>
                        </div>

                        <div class="checkout-charge">
                            <ul>
                                <li><span>Sub total </span><span>LKR <span
                                                id="sub_total"><?= $sub_total ?></span>.00</span></li>
                                <li><span>delivery fee </span><span id="delivery_fee"></span></li>
                                <li><span>Total<small>(Incl. VAT)</small></span> <span>LKR <span
                                                id="total"></span>.00</span></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>contact number</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">

                            <?php
                            $contacts = array();

                            $user_mobiles_rs = Database::search("SELECT user_mobiles.id, user_mobiles.mobile,mt.type AS type FROM user_mobiles JOIN mobile_type mt on mt.id = user_mobiles.mobile_type_id WHERE user_email='${email}' ORDER BY mt.id ASC");
                            for ($i = 1; $i <= $user_mobiles_rs->num_rows; $i++) {
                                $user_mobiles_data = $user_mobiles_rs->fetch_assoc();
                                $contacts[] = "contact" . $i;
                                ?>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact <?= ($i == 1) ? "active" : "" ?>"
                                         id="contact<?= $i ?>">
                                        <h6><?= $user_mobiles_data["type"] ?></h6>
                                        <p><?= $user_mobiles_data["mobile"] ?></p>
                                    </div>
                                </div>
                                <?php
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="col-lg-12">-->
            <!--    <div class="account-card">-->
            <!--        <div class="account-title">-->
            <!--            <h4>contact number</h4>-->
            <!--            <button data-bs-toggle="modal" data-bs-target="#contact-add">add-->
            <!--                contact-->
            <!--            </button>-->
            <!--        </div>-->
            <!--        <div class="account-content">-->
            <!--            <div class="row">-->
            <!--                <div class="col-md-6 col-lg-4 alert fade show">-->
            <!--                    <div class="profile-card contact active">-->
            <!--                        <h6>primary</h6>-->
            <!--                        <p>+8801838288389</p>-->
            <!--                        <ul>-->
            <!--                            <li>-->
            <!--                                <button class="edit icofont-edit" title="Edit This"-->
            <!--                                        data-bs-toggle="modal" data-bs-target="#contact-edit"></button>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <button class="trash icofont-ui-delete" title="Remove This"-->
            <!--                                        data-bs-dismiss="alert"></button>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 col-lg-4 alert fade show">-->
            <!--                    <div class="profile-card contact">-->
            <!--                        <h6>secondary</h6>-->
            <!--                        <p>+8801941101915</p>-->
            <!--                        <ul>-->
            <!--                            <li>-->
            <!--                                <button class="edit icofont-edit" title="Edit This"-->
            <!--                                        data-bs-toggle="modal" data-bs-target="#contact-edit"></button>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <button class="trash icofont-ui-delete" title="Remove This"-->
            <!--                                        data-bs-dismiss="alert"></button>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 col-lg-4 alert fade show">-->
            <!--                    <div class="profile-card contact">-->
            <!--                        <h6>secondary</h6>-->
            <!--                        <p>+8801747875727</p>-->
            <!--                        <ul>-->
            <!--                            <li>-->
            <!--                                <button class="edit icofont-edit" title="Edit This"-->
            <!--                                        data-bs-toggle="modal" data-bs-target="#contact-edit"></button>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <button class="trash icofont-ui-delete" title="Remove This"-->
            <!--                                        data-bs-dismiss="alert"></button>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>delivery address</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <?php
                            $addresses = array();
                            $address_rs = Database::search("SELECT *,address.id AS aid, d.id as did FROM address JOIN city c on c.id = address.city_id JOIN district d on c.district_id = d.id WHERE user_email='${email}'");
                            $x = 0;

                            if ($address_rs->num_rows > 0) {
                            while ($address_data = $address_rs->fetch_assoc()) {
                                $addresses[] = "address" . $x;
                                ?>
                                <!--Address-->
                                <div class="col-md-6 col-lg-4 alert fade show"
                                     onclick="load_delivery_fee('<?= $address_data["did"] ?>')">
                                    <div class="profile-card address <?= ($x == 0) ? "active" : "" ?>"
                                         id="address<?= $x ?>">
                                        <span class="d-none"><?= $address_data["aid"] ?></span>
                                        <h5 class="fw-bold mb-2">Address <?= $x + 1 ?></h5>
                                        <p><?= $address_data["line1"] . ", " . $address_data["line2"] . ", ", $address_data["name"] . ", " . $address_data["postal_code"]; ?></p>
                                    </div>
                                </div>
                                <!--Address-->
                            <?php

                            if ($x == 0) {
                            ?>
                                <script>
                                    load_delivery_fee('<?= $address_data["did"] ?>');
                                </script>
                            <?php
                            }

                            $x += 1;
                            }

                            } else {
                            ?>
                                <!--Address-->
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card address active">
                                        <h4 class="text-center">No address found</h4>
                                    </div>
                                </div>
                                <!--Address-->
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="col-lg-12">-->
            <!--    <div class="account-card">-->
            <!--        <div class="account-title">-->
            <!--            <h4>delivery address</h4>-->
            <!--            <button data-bs-toggle="modal" data-bs-target="#address-add">add-->
            <!--                address-->
            <!--            </button>-->
            <!--        </div>-->
            <!--        <div class="account-content">-->
            <!--            <div class="row">-->
            <!--                <div class="col-md-6 col-lg-4 alert fade show">-->
            <!--                    <div class="profile-card address active">-->
            <!--                        <h6>Home</h6>-->
            <!--                        <p>jalkuri, fatullah, narayanganj-1420. word no-09, road no-17/A</p>-->
            <!--                        <ul class="user-action">-->
            <!--                            <li>-->
            <!--                                <button class="edit icofont-edit" title="Edit This"-->
            <!--                                        data-bs-toggle="modal" data-bs-target="#address-edit"></button>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <button class="trash icofont-ui-delete" title="Remove This"-->
            <!--                                        data-bs-dismiss="alert"></button>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 col-lg-4 alert fade show">-->
            <!--                    <div class="profile-card address">-->
            <!--                        <h6>Office</h6>-->
            <!--                        <p>east tejturi bazar, dhaka-1200. word no-04, road no-13/c, house no-4/b</p>-->
            <!--                        <ul class="user-action">-->
            <!--                            <li>-->
            <!--                                <button class="edit icofont-edit" title="Edit This"-->
            <!--                                        data-bs-toggle="modal" data-bs-target="#address-edit"></button>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <button class="trash icofont-ui-delete" title="Remove This"-->
            <!--                                        data-bs-dismiss="alert"></button>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 col-lg-4 alert fade show">-->
            <!--                    <div class="profile-card address">-->
            <!--                        <h6>Bussiness</h6>-->
            <!--                        <p>kawran bazar, dhaka-1100. word no-02, road no-13/d, house no-7/m</p>-->
            <!--                        <ul class="user-action">-->
            <!--                            <li>-->
            <!--                                <button class="edit icofont-edit" title="Edit This"-->
            <!--                                        data-bs-toggle="modal" data-bs-target="#address-edit"></button>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <button class="trash icofont-ui-delete" title="Remove This"-->
            <!--                                        data-bs-dismiss="alert"></button>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="col-lg-12">
                <div class="account-card mb-0">
                    <div class="account-title">
                        <h4>payment</h4>
                    </div>
                    <div>
                        <div class="checkout-check mb-3">
                            <input type="checkbox" id="checkout-check" required/>
                            <label for="checkout-check">
                                By making this purchase you agree to our <a href="#">Terms and Conditions</a>.
                            </label>
                        </div>

                        <div class="checkout-proceed">
                            <button class="btn btn-inline"
                                    onclick='checkout(<?= json_encode($contacts) ?>, <?= json_encode($addresses) ?>)'>
                                proced to checkout
                            </button>
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
<script src="assets/js/script.js"></script>
</body>

</html>