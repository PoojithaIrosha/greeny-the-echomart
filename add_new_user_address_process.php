<?php

session_start();
require_once 'connection.php';

$email = $_SESSION["user"]["email"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$city_id = $_POST["city_id"];
$postal_code = $_POST["postal_code"];

if (empty($line1)) {
    echo "Please enter address line 01";
} else if ($city_id == '0') {
    echo "Please select your city";
} else if (empty($postal_code)) {
    echo "Please enter the postal code";
} else {

    Database::iud("INSERT INTO address(line1, line2, city_id, postal_code, user_email) value ('${line1}','${line2}','${city_id}','${postal_code}', '${email}')");
    echo "success";

}

