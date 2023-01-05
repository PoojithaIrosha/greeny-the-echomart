<?php

require_once "connection.php";

$id = $_POST["aid"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$city_id = $_POST["city_id"];
$postal_code = $_POST["postal_code"];

if (empty($line1)) {
    echo "Please enter address line 1";
} else if (empty($postal_code)) {
    echo "Please enter postal code";
} else {

    $address_rs = Database::search("SELECT * FROM address WHERE id='${id}'");

    if ($address_rs->num_rows > 0) {
        Database::iud("UPDATE address SET line1='${line1}', line2='${line2}', postal_code='${postal_code}', city_id='${city_id}' WHERE id='${id}'");
        echo "success";
    }


}