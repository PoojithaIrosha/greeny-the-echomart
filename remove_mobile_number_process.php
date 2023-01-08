<?php

require_once "MySQL.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    Database::iud("DELETE FROM user_mobiles WHERE id='${id}'");
    echo "success";

}