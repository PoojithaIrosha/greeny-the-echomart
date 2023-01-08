<?php

session_start();
require "MySQL.php";

$email = "";
if (isset($_SESSION["user"])) {
    $email = $_SESSION["user"]["email"];

    $pid = $_POST["pid"];
    $qty = $_POST["qty"];

    $rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");

    if ($rs->num_rows > 0) {
        $product_data = $rs->fetch_assoc();


        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '" . $pid . "' && `user_email` = '" . $email . "'");
        if ($cart_rs->num_rows > 0) {
            $cart_data = $cart_rs->fetch_assoc();
            $current_qty = $cart_data["qty"];
            $new_qty = $current_qty + $qty;

            if ($product_data["qty"] >= $new_qty) {
                Database::iud("UPDATE `cart` SET `qty` = '" . $new_qty . "' WHERE `id` = '" . $cart_data["id"] . "'");
                echo "Product quantity updated";
            } else {
                echo "Insufficient Quantity";
            }


        } else {
            Database::iud("INSERT INTO `cart`(`product_id`, `user_email`, `qty`) VALUES ('" . $pid . "', '" . $email . "', '" . $qty . "')");
            echo "Product added to the cart";
        }
    }
} else {
    echo "redirect";
}

