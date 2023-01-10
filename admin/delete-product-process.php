<?php

require "../MySQL.php";

$pid = $_GET['pid'];

$productRs = Database::search("SELECT * FROM product WHERE id = '${pid}'");
if ($productRs->num_rows > 0) {
    Database::iud("DELETE FROM reviews WHERE product_id = '${pid}'");
    Database::iud("DELETE FROM product_images WHERE product_id = '${pid}'");
    Database::iud("DELETE FROM invoice_item WHERE product_id = '${pid}'");
    Database::iud("DELETE FROM wishlist WHERE product_id = '${pid}'");
    Database::iud("DELETE FROM cart WHERE product_id = '${pid}'");
    Database::iud("DELETE FROM product WHERE id = '${pid}'");
    echo "success";
}
