<?php

require "../MySQL.php";

$name = $_POST['name'];

$rs = Database::search("SELECT * FROM brand WHERE name = '${name}'");
if ($rs->num_rows > 0) {
    echo "Brand already exists";
} else {
    Database::iud("INSERT INTO brand(name) VALUE ('${name}')");
    echo "success";
}
