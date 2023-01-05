<?php

require "connection.php";

$email = $_POST["email"];
$pwd = $_POST["pwd"];
$rmb_me = $_POST["rmb_me"];

if (empty($email)) {
    echo "Please enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
} else if (empty($pwd)) {
    echo "Please enter your password";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $pwd . "'");

    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();

        if ($data["status_status_id"] == 2) {
            echo "Sorry, Your account is deactivated";
        } else {
            session_start();
            $_SESSION["user"] = $data;

            if ($rmb_me == "true") {
                setcookie("email", $email, time() + (60 * 60));
                setcookie("pwd", $pwd, time() + (60 * 60));
            } else {
                setcookie("email", "", -1);
                setcookie("pwd", "", -1);
            }
            echo "success";
        }
    } else {
        echo "Invalid email and password";
    }
}
