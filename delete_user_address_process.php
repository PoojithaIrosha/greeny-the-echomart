<?php
session_start();
require_once "connection.php";

if ($_GET["id"]) {
    $id = $_GET["id"];
    $email = $_SESSION["user"]["email"];

    $address_rs = Database::search("SELECT * FROM address WHERE id='${id}' AND user_email='${email}'");
    if ($address_rs->num_rows > 0) {
        Database::iud("DELETE FROM address WHERE id ='${id}'");
        echo "success";
    } else {
        echo "Something went wrong";
    }

}