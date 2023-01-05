<?php
session_start();
require_once "connection.php";

$mobile = $_POST["mobile"];
$type = $_POST["contact_type"];

if ($type == "0") {
    echo "Please select a contact type";
} else if (empty($mobile)) {
    echo "Please enter the mobile number";
} else if (!preg_match("/07[12456780][0-9]{7}/", $mobile)) {
    echo "Invalid mobile number";
} else {

    $email = $_SESSION["user"]["email"];

    if ($type == "primary") {
        $type_id = 1;
    } else if ($type == "secondary") {
        $type_id = 2;
    }

    $user_mobiles_rs = Database::search("SELECT * FROM user_mobiles WHERE user_email='${email}'");
    if ($user_mobiles_rs->num_rows > 0) {
        $exists = false;
        while ($user_mobiles_data = $user_mobiles_rs->fetch_assoc()) {
            if ($user_mobiles_data["mobile"] == $mobile) {
                $exists = true;
            }
        }

        if ($exists) {
            echo "This mobile number already exists";
        } else {
            Database::iud("INSERT INTO user_mobiles(mobile, user_email, mobile_type_id) VALUES ('${mobile}', '${email}', '${type_id}')");
            echo "success";
        }
    }

}