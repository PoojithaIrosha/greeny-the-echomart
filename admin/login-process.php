<?php

require "../MySQL.php";

$email = $_POST["email"];
$pwd = $_POST["password"];
$rmb_me = $_POST["rememberMe"];

if (empty($email)) {
    echo "Please enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
} else if (empty($pwd)) {
    echo "Please enter your password";
} else {

    $rs = Database::search("SELECT * FROM admin WHERE email='${email}' AND password='${pwd}'");

    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();

        if ($data["status_status_id"] == 2) {
            echo "Sorry, Your account is deactivated";
        } else {
            session_start();
            $_SESSION["admin"] = $data;

            if ($rmb_me == "on") {
                setcookie("admin_email", $email, time() + (60 * 60));
                setcookie("admin_password", $pwd, time() + (60 * 60));
            } else {
                setcookie("admin_email", "", -1);
                setcookie("admin_password", "", -1);
            }
            echo "success";
        }
    } else {
        echo "Invalid email and password";
    }
}
