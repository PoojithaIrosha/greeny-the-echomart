<?php

require "../MySQL.php";

$pname = $_POST['pname'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$desc = $_POST['desc'];
$unit = $_POST['unit'];
$imageIds = json_decode($_POST['imageIds']);

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
} else if (empty($imageIds)) {
    echo "Select at least one product image";
} else {

    $prodRs = Database::search("SELECT * FROM product WHERE title = '${pname}' AND category_id = '${category}'");
    if ($prodRs->num_rows > 0) {
        echo "ABC";
    } else {
        Database::iud("INSERT INTO product(title, qty, price, description, category_id, brand_id, unit_id) VALUE ('${pname}', '${qty}', '${price}', '${desc}', '${category}', '${brand}', '${unit}')");
        $last_insert_id = Database::$connection->insert_id;

        for ($x = 0; $x < sizeof($imageIds); $x++) {
            $file = $_FILES["file" . $imageIds[$x]];
            $filePath = "assets/images/product/" . uniqid() . $file['name'];
            move_uploaded_file($file['tmp_name'], "../" . $filePath);

            Database::iud("INSERT INTO product_images(code, product_id) VALUE ('${filePath}', '${last_insert_id}')");
        }

        echo "success";

    }

}



