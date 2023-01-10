<?php

require "../MySQL.php";

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $productId = $_POST['pid'];

    $filePath = "assets/images/product/" . uniqid() . $file['name'];
    move_uploaded_file($file['tmp_name'], "../" . $filePath);

    Database::iud("INSERT INTO product_images(code, product_id) VALUE ('${filePath}', '${productId}')");
    echo "success";
}