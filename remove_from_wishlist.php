<?php

require "connection.php";
$id = $_GET["id"];

$rs = Database::search("SELECT * FROM `wishlist` WHERE `id` = '" . $id . "'");
if ($rs->num_rows > 0) {
    Database::iud("DELETE FROM `wishlist` WHERE `id` = '" . $id . "'");
    header("Location: wishlist.php");
}
