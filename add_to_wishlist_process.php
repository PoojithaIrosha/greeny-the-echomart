<?php

require_once "MySQL.php";
session_start();

if (isset($_GET["pid"]) && isset($_SESSION["user"])) {
    $pid = $_GET["pid"];

    $rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id` ='" . $pid . "' && `user_email` ='" . $_SESSION["user"]["email"] . "'");

    if ($rs->num_rows == 1) {
        echo "2";
    } else {
        Database::iud("INSERT INTO `wishlist`(`product_id`, `user_email`) VALUES ('" . $pid . "', '" . $_SESSION["user"]["email"] . "')");
        echo "0";
    }

} else {
    echo "1";
    exit();
}

