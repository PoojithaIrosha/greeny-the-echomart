<?php

require "./MySQL.php";

$new_pwd = $_POST["new_pwd"];
$r_pwd = $_POST["r_pwd"];
$uid = $_POST["uid"];

if (empty($uid)) {
    echo "User couldn't find. Please try again by receiving a new email";
} else if (empty($new_pwd)) {
    echo "Please enter your password";
} else if (strlen($new_pwd) < 5) {
    echo "Password should contain at least 5 characters";
} else if (empty($r_pwd)) {
    echo "Please re-enter your password";
} else if ($new_pwd != $r_pwd) {
    echo "Your password doesn't match. Please recheck";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `verification_code` = '" . $uid . "'");

    if ($rs->num_rows == 1) {
        $rs_data = $rs->fetch_assoc();

        $user_email = $rs_data["email"];

        Database::iud("UPDATE `user` SET `password` = '" . $new_pwd . "' WHERE `email` = '" . $user_email . "' ");
        echo "success";
    }
}
