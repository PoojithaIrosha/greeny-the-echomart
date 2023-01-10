<?php
require_once "../MySQL.php";

$email = $_GET['email'];
$checkedStatus = $_GET['checked'];

if (isset($email) && isset($checkedStatus)) {

    if ($checkedStatus == "true") {
        Database::iud("UPDATE user SET status_status_id = '1' WHERE email='${email}'");
        echo "User account activated";
    } else {
        Database::iud("UPDATE user SET status_status_id = '2' WHERE email='${email}'");
        echo "User account deactivated";
    }


}