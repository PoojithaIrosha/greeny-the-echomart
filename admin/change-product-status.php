<?php
require_once "../MySQL.php";

$pId = $_GET['pid'];
$checkedStatus = $_GET['checked'];

if (isset($pId) && isset($checkedStatus)) {

    if ($checkedStatus == "true") {
        Database::iud("UPDATE product SET status_id = '1' WHERE id='${pId}'");
        echo "Product activated";
    } else {
        Database::iud("UPDATE product SET status_id = '2' WHERE id='${pId}'");
        echo "Product deactivated";
    }


}