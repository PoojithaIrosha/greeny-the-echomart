<?php

require "../MySQL.php";

$name = $_POST['name'];

if (empty($name)) {
    echo "Please enter the category name";
} else {
    $rs = Database::search("SELECT * FROM category WHERE name = '${name}'");
    if ($rs->num_rows > 0) {
        echo "Category already exists";
    } else {
        Database::iud("INSERT INTO category(name) VALUE ('${name}')");
        echo "success";
    }

}
