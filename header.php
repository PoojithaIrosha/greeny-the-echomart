<?php
require_once "MySQL.php";
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
?>

<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="header-top-welcome">
                    <p>Welcome to Greeny Ecomart</p>
                </div>
            </div>
            <div class="col-md-5 col-lg-3"></div>
            <div class="col-md-7 col-lg-4">

                <?php

                if (!isset($user)) {
                    ?>
                    <ul class="header-top-list">
                        <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login</a></li>
                        <li><a href="register.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Register</a></li>
                        <li><a href="contact.php"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;contact us</a></li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="header-top-list">
                        <li>
                            <button onclick="logout()" class="text-light"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Log
                                out
                            </button>
                        </li>
                        <li><a href="contact.php"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;contact us</a></li>
                    </ul>
                    <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user">
                    <img src="assets/images/profiles/user.png" alt="user"/>
                </button>
                <a href="index.php"><img src="assets/images/logo.png" alt="logo"/></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>
            <a href="index.php" class="header-logo">
                <img src="assets/images/logo.png" alt="logo"/>
            </a>
            <div class="header-widget dropdown">
                <?php
                $url = "";
                $rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $user["email"] . "'");
                $nr = $rs->num_rows;
                if ($nr == 1) {
                    $data = $rs->fetch_assoc();
                    $url = $data["code"];
                }
                ?>

                <img src="<?= ($nr == 1) ? $url : "assets/images/profiles/user.png" ?>" class="dropdown-toggle"
                     data-bs-toggle="dropdown"
                     aria-expanded="false"/>
                <span><?= (isset($user)) ? $user["fname"] . " " . $user["lname"] : "Welcome" ?></span>
                <!--Dropdown-->
                <!--<ul class="dropdown-menu">-->
                <!--    <li><a class="dropdown-item" href="#">My Account</a></li>-->
                <!--    <li><a class="dropdown-item" href="#">Another action</a></li>-->
                <!--    <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                <!--</ul>-->
            </div>

            <form method="get" action="shop.php" class="header-form">
                <input type="text" placeholder="Search anything..." name="search"/>
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="header-widget-group">
                <a href="wishlist.php" class="header-widget" title="Wishlist">
                    <i class="fas fa-heart"></i>
                    <?php
                    $wrs = Database::search("SELECT * FROM `wishlist` WHERE `user_email`='" . $user["email"] . "'");
                    ?>
                    <sup><?= $wrs->num_rows ?></sup>
                </a>
                <button class="header-widget header-cart" title="Cartlist">
                    <i class="fas fa-shopping-basket"></i>
                    <?php
                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user["email"] . "'");
                    ?>
                    <sup id="no_of_products_in_cart"><?= $cart_rs->num_rows ?></sup>
                    <span>
                        total price
                        <small>$345.00</small>
                    </span>
                </button>
            </div>

        </div>
    </div>
</header>
<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                        <li class="navbar-item dropdown">
                            <a class="navbar-link dropdown-arrow" href="#">My Account</a>
                            <ul class="dropdown-position-list">
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="#">Wallet</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Shopping Cart</a></li>
                                <li><a href="#">Order History</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item dropdown">
                            <a class="navbar-link" href="index.php">home</a>
                        </li>
                        <li class="navbar-item dropdown-megamenu">
                            <a class="navbar-link dropdown-arrow" href="#">category</a>
                            <div class="megamenu">
                                <div class="container megamenu-scroll">
                                    <div class="row row-cols-5">
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">vegetables</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">carrot</a></li>
                                                    <li><a href="#">broccoli</a></li>
                                                    <li><a href="#">asparagus</a></li>
                                                    <li><a href="#">cauliflower</a></li>
                                                    <li><a href="#">eggplant</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">fruits</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">Apple</a></li>
                                                    <li><a href="#">orange</a></li>
                                                    <li><a href="#">banana</a></li>
                                                    <li><a href="#">strawberrie</a></li>
                                                    <li><a href="#">watermelon</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">dairy farms</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">Butter</a></li>
                                                    <li><a href="#">Cheese</a></li>
                                                    <li><a href="#">Milk</a></li>
                                                    <li><a href="#">Eggs</a></li>
                                                    <li><a href="#">cream</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">seafoods</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">Lobster</a></li>
                                                    <li><a href="#">Octopus</a></li>
                                                    <li><a href="#">Shrimp</a></li>
                                                    <li><a href="#">Halabos</a></li>
                                                    <li><a href="#">Maeuntang</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">diet foods</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">Salmon</a></li>
                                                    <li><a href="#">Avocados</a></li>
                                                    <li><a href="#">Leafy Greens</a></li>
                                                    <li><a href="#">Boiled Potatoes</a></li>
                                                    <li><a href="#">Cottage Cheese</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">fast foods</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">burger</a></li>
                                                    <li><a href="#">milkshake</a></li>
                                                    <li><a href="#">sandwich</a></li>
                                                    <li><a href="#">doughnut</a></li>
                                                    <li><a href="#">pizza</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">drinks</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">cocktail</a></li>
                                                    <li><a href="#">hard soda</a></li>
                                                    <li><a href="#">shampain</a></li>
                                                    <li><a href="#">Wine</a></li>
                                                    <li><a href="#">barley</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">meats</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">Meatball</a></li>
                                                    <li><a href="#">Sausage</a></li>
                                                    <li><a href="#">Poultry</a></li>
                                                    <li><a href="#">chicken</a></li>
                                                    <li><a href="#">Cows</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">fishes</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">scads</a></li>
                                                    <li><a href="#">pomfret</a></li>
                                                    <li><a href="#">groupers</a></li>
                                                    <li><a href="#">anchovy</a></li>
                                                    <li><a href="#">mackerel</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="megamenu-wrap">
                                                <h5 class="megamenu-title">dry foods</h5>
                                                <ul class="megamenu-list">
                                                    <li><a href="#">noodles</a></li>
                                                    <li><a href="#">Powdered milk</a></li>
                                                    <li><a href="#">nut & yeast</a></li>
                                                    <li><a href="#">almonds</a></li>
                                                    <li><a href="#">pumpkin</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-info-group">
                        <div class="navbar-info">
                            <i class="icofont-ui-touch-phone"></i>
                            <p>
                                <small>call us</small>
                                <span>(+94) 76 287 3649</span>
                            </p>
                        </div>
                        <div class="navbar-info">
                            <i class="icofont-ui-email"></i>
                            <p>
                                <small>email us</small>
                                <span>support@greeny.com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>