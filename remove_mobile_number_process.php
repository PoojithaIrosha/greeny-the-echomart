<?php

require_once "connection.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    Database::iud("DELETE FROM user_mobiles WHERE id='${id}'");
    echo "success";

}