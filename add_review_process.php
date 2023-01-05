<?php

require "connection.php";
session_start();

$review = $_POST["review"];
$rating = $_POST["rating"];
$pid = $_POST["pid"];


$ratings = array(1, 2, 3, 4, 5);

if (!isset($_SESSION["user"])) {
    echo "You need to sign in first";
} else if (!in_array($rating, $ratings)) {
    echo "Please select the rating out of 5";
} else if (empty($review)) {
    echo "Review cannot be empty";
} else {

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    Database::iud("INSERT INTO `reviews`(`product_id`, `user_email`, `review`, `date_added`, `rating`) VALUES ('" . $pid . "', '" . $_SESSION["user"]["email"] . "', '" . $review . "', '" . $date . "', '" . $rating . "') ");
    echo "success";

}