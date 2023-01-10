<?php
require "MySQL.php";

$result = json_decode($_POST['result']);

$datetime = new DateTime();
$datetime->setTimezone(new DateTimeZone("Asia/Colombo"));
$date = $datetime->format("Y-m-d H:i:s");

Database::iud("INSERT INTO invoice(order_id, user_email, date, amount) VALUE ('" . $result->order_id . "', '" . $result->email . "', '" . $date . "', '" . $result->amount . "')");

$cartRs = Database::search("SELECT * FROM cart WHERE user_email = '" . $result->email . "'");
while ($cart = $cartRs->fetch_assoc()) {
    Database::iud("INSERT INTO invoice_item(product_id, qty, invoice_order_id) VALUE ('" . $cart['product_id'] . "', '" . $cart['qty'] . "', '" . $result->order_id . "')");
}

Database::iud("DELETE FROM cart WHERE user_email = '" . $result->email . "'");

echo "Database record added.";
