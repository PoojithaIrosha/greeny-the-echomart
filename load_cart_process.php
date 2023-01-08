<?php
require_once "MySQL.php";
session_start();
?>

<!-- Cart -->
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
<!-- Cart -->