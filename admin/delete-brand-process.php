<?php

require "../MySQL.php";

$id = $_GET["bid"];

$rs = Database::search("SELECT * FROM brand WHERE id='${id}'");
if ($rs->num_rows > 0) {
    Database::iud("DELETE FROM brand WHERE id = '${id}'");
    echo "success";
}
