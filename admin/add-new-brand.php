<?php

require "../MySQL.php";

$name = $_POST['name'];

if (empty($name)) {
    echo "Please enter the brand name";
} else {
    $rs = Database::search("SELECT * FROM brand WHERE name = '${name}'");
    if ($rs->num_rows > 0) {
        echo "Brand already exists";
    } else {
        Database::iud("INSERT INTO brand(name) VALUE ('${name}')");
        echo "success";
    }
}