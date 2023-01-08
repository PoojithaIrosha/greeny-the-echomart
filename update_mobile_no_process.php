<?php

require_once "MySQL.php";

$cid = $_POST["c_id"];
$mobile = $_POST["mobile"];
$contact_type = $_POST["contact_type"];

if (empty($mobile)) {
    echo "Please enter the mobile number";
} else if (!preg_match("/07[12456780][0-9]{7}/", $mobile)) {
    echo "Invalid mobile number";
} else {

    $user_mobiles_rs = Database::search("SELECT * FROM user_mobiles WHERE id='${cid}'");
    if ($user_mobiles_rs->num_rows > 0) {
        Database::iud("UPDATE user_mobiles SET mobile='${mobile}', mobile_type_id='${contact_type}' WHERE id='${cid}'");
        echo "success";
    }

}