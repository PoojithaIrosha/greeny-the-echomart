<aside class="category-sidebar">
    <div class="category-header">
        <h4 class="category-title">
            <i class="fas fa-align-left"></i>
            <span>categories 2</span>
        </h4>
        <button class="category-close"><i class="icofont-close"></i></button>
    </div>
    <ul class="category-list">
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-vegetable"></i>
                <span>vegetables</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">asparagus</a></li>
                <li><a href="#">broccoli</a></li>
                <li><a href="#">carrot</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-groceries"></i>
                <span>groceries</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Grains & Bread</a></li>
                <li><a href="#">Dairy & Eggs</a></li>
                <li><a href="#">Oil & Fat</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-fruit"></i>
                <span>fruits</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Apple</a></li>
                <li><a href="#">Orange</a></li>
                <li><a href="#">Strawberry</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-dairy-products"></i>
                <span>dairy farm</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Egg</a></li>
                <li><a href="#">milk</a></li>
                <li><a href="#">butter</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-crab"></i>
                <span>sea foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Lobster</a></li>
                <li><a href="#">Octopus</a></li>
                <li><a href="#">Shrimp</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-salad"></i>
                <span>diet foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Salmon</a></li>
                <li><a href="#">Potatoes</a></li>
                <li><a href="#">Greens</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-dried-fruit"></i>
                <span>dry foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">noodles</a></li>
                <li><a href="#">Powdered milk</a></li>
                <li><a href="#">nut & yeast</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-fast-food"></i>
                <span>fast foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">mango</a></li>
                <li><a href="#">plumsor</a></li>
                <li><a href="#">raisins</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-cheers"></i>
                <span>drinks</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Wine</a></li>
                <li><a href="#">Juice</a></li>
                <li><a href="#">Water</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-beverage"></i>
                <span>coffee</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Cappuchino</a></li>
                <li><a href="#">Espresso</a></li>
                <li><a href="#">Latte</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-barbecue"></i>
                <span>meats</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Meatball</a></li>
                <li><a href="#">Sausage</a></li>
                <li><a href="#">Poultry</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-fish"></i>
                <span>fishes</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Agujjim</a></li>
                <li><a href="#">saltfish</a></li>
                <li><a href="#">pazza</a></li>
            </ul>
        </li>
    </ul>
    <div class="category-footer">
        <p>
            All Rights Reserved by
            <a href="#">Poojitha Irosha</a>
        </p>
    </div>
</aside>

<!-- Cart -->
<aside class="cart-sidebar" id="cart_sidebar">
    <?php
    require_once "MySQL.php";
    session_start();

    $email = "";
    if (isset($_SESSION["user"])) {
        $email = $_SESSION["user"]["email"];
    }

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "'");
    ?>

    <div class="cart-header">
        <div class="cart-total">
            <i class="fas fa-shopping-basket"></i>
            <span>total item (<?= $cart_rs->num_rows ?>)</span>
        </div>
        <button class="cart-close"><i class="icofont-close"></i></button>
    </div>

    <ul class="cart-list">

        <?php
        while ($cart_data = $cart_rs->fetch_assoc()) {

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
            $product_data = $product_rs->fetch_assoc();

            ?>
            <li class="cart-item">
                <div class="cart-media">
                    <?php

                    $product_img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $cart_data["product_id"] . "' LIMIT 1");
                    $pimg_data = $product_img_rs->fetch_assoc();

                    ?>
                    <a href="#"><img src="<?= $pimg_data["code"] ?>" alt="product"/></a>
                    <!--Delete-->
                    <button class="cart-delete" onclick="delete_from_cart('<?= $product_data["id"] ?>')">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>

                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-view.php?pid=<?= $product_data["id"] ?>"><?= $product_data["title"] ?></a>
                        </h6>
                        <p>Unit Price - Rs.<?= $product_data["price"] ?>.00</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action">
                            <button class="" title="Quantity Minus"
                                    onclick="update_cart_qty('decrement', '<?= $product_data["id"]; ?>')">
                                <i class="icofont-minus"></i>
                            </button>

                            <input class="action-input" title="Quantity Number" type="text" name="quantity"
                                   value="<?= $cart_data["qty"] ?>" id="quantity<?= $product_data["id"]; ?>"/>

                            <button class="" title="Quantity Plus"
                                    onclick="update_cart_qty('increment', '<?= $product_data["id"]; ?>')">
                                <i class="icofont-plus"></i>
                            </button>
                        </div>
                        <?php
                        $price = $product_data["price"];
                        $qty = $cart_data["qty"];
                        $total = $price * $qty;
                        ?>
                        <h6><?= $total ?></h6>
                    </div>
                </div>
            </li>

            <?php
        }

        ?>
    </ul>
    <!-- TODO: Calculate grand total-->
    <div class="cart-footer">
        <button class="coupon-btn">Checkout Here</button>
        <a class="cart-checkout-btn" href="checkout.php">
            <span class="checkout-label">Proceed to Checkout</span>
            <span class="checkout-price"></span>
        </a>
    </div>
</aside>
<!-- Cart -->

<aside class="nav-sidebar">
    <div class="nav-header">
        <a href="#"><img src="assets/images/logo.png" alt="logo"/></a>
        <button class="nav-close"><i class="icofont-close"></i></button>
    </div>
    <div class="nav-content">
        <div class="nav-btn">
            <a href="login.php" class="btn btn-inline">
                <i class="fa fa-unlock-alt"></i>
                <span>join here</span>
            </a>
        </div>
        <ul class="nav-list">
            <li>
                <a class="nav-link" href="#">
                    <i class="icofont-home"></i>
                    Home
                </a>
            </li>

            <li>
                <a class="nav-link dropdown-link" href="#">
                    <i class="icofont-bag-alt"></i>
                    my account
                </a>
                <ul class="dropdown-list">
                    <li><a href="profile.php">profile</a></li>
                    <li><a href="wallet.html">wallet</a></li>
                    <li><a href="wishlist.php">wishlist</a></li>
                    <li><a href="checkout.php">checkout</a></li>
                    <li><a href="orderlist.html">order history</a></li>
                    <li><a href="invoice.php">order invoice</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link dropdown-link" href="#">
                    <i class="icofont-lock"></i>
                    authentic
                </a>
                <ul class="dropdown-list">
                    <li><a href="login.php">login</a></li>
                    <li><a href="register.php">register</a></li>
                    <li><a href="reset-password.html">reset password</a></li>
                    <li><a href="change-password.html">change password</a></li>
                </ul>
            </li>

            <li>
                <a class="nav-link" href="offer.html">
                    <i class="icofont-sale-discount"></i>
                    offers
                </a>
            </li>
            <li>
                <a class="nav-link" href="about.html">
                    <i class="icofont-info-circle"></i>
                    about us
                </a>
            </li>
            <li>
                <a class="nav-link" href="faq.html">
                    <i class="icofont-support-faq"></i>
                    need help
                </a>
            </li>
            <li>
                <a class="nav-link" href="contact.php">
                    <i class="icofont-contacts"></i>
                    contact us
                </a>
            </li>
            <li>
                <a class="nav-link" href="privacy.html">
                    <i class="icofont-warning"></i>
                    privacy policy
                </a>
            </li>
            <li>
                <a class="nav-link" href="login.php">
                    <i class="icofont-logout"></i>
                    logout
                </a>
            </li>
        </ul>
        <div class="nav-info-group">
            <div class="nav-info">
                <i class="icofont-ui-touch-phone"></i>
                <p>
                    <small>call us</small>
                    <span>(+94) 76 287 3649</span>
                </p>
            </div>
            <div class="nav-info">
                <i class="icofont-ui-email"></i>
                <p>
                    <small>email us</small>
                    <span>support@greeny.com</span>
                </p>
            </div>
        </div>
        <div class="nav-footer">
            <p>
                All Rights Reserved by
                <a href="#">Mironcoder</a>
            </p>
        </div>
    </div>
</aside>

<div class="mobile-menu">
    <a href="index.php" title="Home Page">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <button class="cate-btn" title="Category List">
        <i class="fas fa-list"></i>
        <span>category</span>
    </button>
    <button class="cart-btn" title="Cartlist">
        <i class="fas fa-shopping-basket"></i>
        <span>cartlist</span>
        <sup>9+</sup>
    </button>
    <a href="wishlist.php" title="Wishlist">
        <i class="fas fa-heart"></i>
        <span>wishlist</span>
        <sup>0</sup>
    </a>
</div>

<script src="assets/js/script.js"></script>