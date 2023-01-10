<?php

require "../MySQL.php";

$email = $_GET['email'];

$userRs = Database::search("SELECT * FROM user WHERE email = '" . $email . "'");
if ($userRs->num_rows > 0) {

    Database::iud("DELETE FROM user_mobiles WHERE user_email = '${email}'");
    Database::iud("DELETE FROM address WHERE user_email = '${email}'");
    Database::iud("DELETE FROM profile_img WHERE user_email = '${email}'");
    Database::iud("DELETE FROM reviews WHERE user_email = '${email}'");
    Database::iud("DELETE FROM wishlist WHERE user_email = '${email}'");
    Database::iud("DELETE FROM cart WHERE user_email = '${email}'");
    Database::iud("DELETE FROM invoice WHERE user_email = '${email}'");
    Database::iud("DELETE FROM user WHERE email = '${email}'");
    echo "success";
} else {
    echo "User not found";
}
