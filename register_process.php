<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

if (empty($fname)) {
    echo "Please enter your first name";
} else if (empty($lname)) {
    echo "Please enter your last name";
} else if (empty($email)) {
    echo "Please enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
} else if (empty($pwd)) {
    echo "Please enter your password";
} else if (strlen($pwd) < 5) {
    echo "Password should contain at least 5 characters";
} else if (empty($mobile)) {
    echo "Please enter your mobile";
} else if (!preg_match("/07[12456780][0-9]{7}/", $mobile)) {
    echo "Invalid mobile number";
} else if ($gender == "0") {
    echo "Please select your gender";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

    if ($rs->num_rows > 0) {
        echo "User with the same email address or mobile number already exists.";
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`(`email`, `password`, `fname`, `lname`, `registered_date`, `status_status_id`, `gender_gender_id`) VALUES ('" . $email . "','" . $pwd . "','" . $fname . "', '" . $lname . "', '" . $date . "', '1', '" . $gender . "')");
        Database::iud("INSERT INTO user_mobiles(mobile, user_email, mobile_type_id) VALUES ('${mobile}', '${email}', '1')");

        echo "success";
    }
}
