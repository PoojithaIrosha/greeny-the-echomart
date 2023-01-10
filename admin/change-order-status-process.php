<?php

require "../MySQL.php";
$invId = $_GET['invId'];

$invRs = Database::search("SELECT * FROM invoice WHERE order_id = '${invId}'");
if ($invRs->num_rows > 0) {
    $invData = $invRs->fetch_assoc();

    if ($invData['status'] == 0) {
        Database::iud("UPDATE invoice SET status = '1' WHERE order_id='${invId}'");
        echo "success";
    }


}
