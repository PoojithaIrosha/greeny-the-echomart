<?php

session_start();
require_once "connection.php";

$email = $_SESSION["user"]["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$profile_img = $_FILES["profile_img"];

if (empty($first_name)) {
    echo "Please enter the first name";
} else if (empty($last_name)) {
    echo "Please enter the last name";
} else if (empty($email)) {
    echo "Please enter the email";
} else {


    $user_rs = Database::search("SELECT * FROM user WHERE email='${email}' ");

    if ($user_rs->num_rows > 0) {
        Database::iud("UPDATE user SET fname='${first_name}', lname='${last_name}' WHERE email='${email}'");

        if (!empty($profile_img)) {

            $path = "assets/images/profiles/" . uniqid() . $profile_img["name"];
            move_uploaded_file($profile_img["tmp_name"], $path);

            $profile_img_rs = Database::search("SELECT * FROM profile_img WHERE user_email='${email}'");
            if ($profile_img_rs->num_rows > 0) {
                Database::iud("UPDATE profile_img SET code='${path}' WHERE user_email='${email}'");
            } else {
                Database::iud("INSERT INTO profile_img(code, user_email) VALUE ('${path}', '${email}')");
            }
        }

        echo "success";
    } else {
        echo "Couldn't find the user";
    }


}