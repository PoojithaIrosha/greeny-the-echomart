<?php

require "../MySQL.php";

$id = $_GET["cid"];

$rs = Database::search("SELECT * FROM category WHERE id='${id}'");
if ($rs->num_rows > 0) {
    Database::iud("DELETE FROM category WHERE id = '${id}'");
    echo "success";
}
