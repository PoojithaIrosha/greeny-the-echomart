<?php
session_start();
require_once "connection.php";


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $address_rs = Database::search("SELECT * FROM address WHERE id='${id}'");
    if ($address_rs->num_rows > 0) {
        $result = array();
        $address_data = $address_rs->fetch_assoc();


        $result["line1"] = $address_data["line1"];
        $result["line2"] = $address_data["line2"];
        $result["postal_code"] = $address_data["postal_code"];
        $result["city_id"] = $address_data["city_id"];
        $result["aid"] = $address_data["id"];

        echo json_encode($result);
    }

}