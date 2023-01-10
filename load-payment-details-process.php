<?php

require "MySQL.php";
session_start();

if ($_SESSION['user']) {
    $user = $_SESSION['user'];
    $contact = $_POST['contact'];
    $addressId = $_POST['address-id'];
    $total = $_POST['total'];

    if (empty($contact)) {
        echo "Please select a contact number";
    } else if (empty($addressId)) {
        echo "Please select a address";
    } else if (empty($total)) {
        echo "Something is wrong";
    } else {

        $payment = array();
        $payment['order_id'] = uniqid("INVOICE_");
        $payment['amount'] = $total;
        $payment['first_name'] = $user['fname'];
        $payment['last_name'] = $user['lname'];
        $payment['email'] = $user['email'];
        $payment['mobile'] = $contact;

        $addressRs = Database::search("SELECT *,c.name as city FROM address JOIN city c on c.id = address.city_id WHERE address.id = '${addressId}'");
        $addressData = $addressRs->fetch_assoc();

        $payment['address'] = $addressData['line1'] . ', ' . $addressData['line2'];
        $payment['city'] = $addressData['city'];

        echo json_encode($payment);

    }
}