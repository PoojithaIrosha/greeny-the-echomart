<?php
session_start();
require "MySQL.php";

$pid = $_GET["pid"];
$email = $_SESSION["user"]["email"];

$cart_rs = Database::search("SELECT * FROM cart WHERE product_id='${pid}' AND user_email='${email}'");
if ($cart_rs->num_rows > 0) {
    Database::iud("DELETE FROM cart WHERE product_id='${pid}' AND user_email='${email}'");
    echo "success";
}
