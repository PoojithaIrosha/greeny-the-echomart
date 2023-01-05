<?php
session_start();
require "connection.php";

$email = $_SESSION["user"]["email"];
$action = $_POST["action"];
$qty = $_POST["c_qty"];
$pid = $_POST["id"];

$product_rs = Database::search("SELECT * FROM product WHERE id='${pid}'");

if ($product_rs->num_rows > 0) {
    $product_data = $product_rs->fetch_assoc();

    if ($action == "increment") {
        if ($product_data["qty"] >= $qty + 1) {
            $new_qty = $qty += 1;
        } else {
            $new_qty = $qty;
        }
    } else if ($action == "decrement") {
        if (($qty - 1) != 0) {
            $new_qty = $qty -= 1;
        } else {
            $new_qty = $qty;
        }
    }

    Database::iud("UPDATE cart SET qty='${new_qty}' WHERE product_id='${pid}' AND user_email='${email}' ");
    $result = array('status' => 'success', 'new_qty' => $new_qty);
    echo json_encode($result);
}