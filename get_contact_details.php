<?php

require_once "connection.php";
session_start();


if (isset($_GET["id"])) {
    $result = array();

    $id = $_GET["id"];
    $email = $_SESSION["user"]["email"];

    $user_mobiles_rs = Database::search("SELECT * FROM user_mobiles WHERE id='${id}' AND user_email='${email}'");
    if ($user_mobiles_rs->num_rows > 0) {
        $user_mobiles = $user_mobiles_rs->fetch_assoc();

        $result["mobile"] = $user_mobiles["mobile"];
        $result["type_id"] = $user_mobiles["mobile_type_id"];
        $result["c_id"] = $user_mobiles["id"];
        $result["status"] = "success";
    } else {
        $result["status"] = "error";
    }

    echo json_encode($result);

}

