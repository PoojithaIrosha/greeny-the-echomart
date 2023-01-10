<?php

require "../MySQL.php";

$pid = $_POST['pid'];
$pname = $_POST['pname'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$desc = $_POST['desc'];
$unit = $_POST['unit'];

if (empty($pname)) {
    echo "Product name cannot be empty";
} else if (empty($price)) {
    echo "Product price cannot be empty";
} else if (!is_numeric($price)) {
    echo "Invalid price";
} else if (empty($qty)) {
    echo "Product quantity cannot be empty";
} else if (!is_numeric($qty)) {
    echo "Invalid quantity";
} else if ($category == '0') {
    echo "Select a category";
} else if ($brand == '0') {
    echo "Select a brand";
} else if ($unit == '0') {
    echo "Select a unit";
} else if (empty($desc)) {
    echo "Description cannot be empty";
} else {

    $prodRs = Database::search("SELECT * FROM product WHERE id = '${pid}'");
    if ($prodRs->num_rows > 0) {
        Database::iud("UPDATE product SET title = '${pname}', price ='${price}', qty = '${qty}', category_id='${category}', brand_id = '${brand}', description = '${desc}', unit_id = '${unit}' WHERE id='${pid}'");
        echo "success";
    }

}
