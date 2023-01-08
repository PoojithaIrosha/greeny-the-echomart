<?php
require_once "MySQL.php";

if (isset($_GET["did"])) {
    $did = $_GET["did"];

    $district_rs = Database::search("SELECT * FROM district WHERE id = '${did}'");

    if ($district_rs->num_rows > 0) {
        $district_data = $district_rs->fetch_assoc();
        echo $district_data["delivery_fee"];
    }

}