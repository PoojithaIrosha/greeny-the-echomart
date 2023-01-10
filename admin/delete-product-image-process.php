<?php

require "../MySQL.php";

$pId = $_POST['pId'];
$imagePath = $_POST['imagePath'];

$piRs = Database::search("SELECT * FROM product_images WHERE product_id ='${pId}' AND code = '${imagePath}'");
if ($piRs->num_rows > 0) {
    Database::iud("DELETE FROM product_images WHERE product_id ='${pId}' AND code = '${imagePath}'");
    echo "success";
}

