<?php
require_once "MySQL.php";
session_start();

if (!isset($_GET['invoice'])) {
    header("Location: index.php");
    exit();
}

$orderId = $_GET['invoice'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link href="assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (max-width: 767px) {
            .table-scroll {
                overflow-x: scroll;
            }

            .tables {
                width: 900px;
            }

            .header-info {
                justify-content: flex-start !important;
                align-items: flex-start !important;
                flex-direction: column;
            }
        }

        @media (max-width: 400px) {
            .header-info li p:nth-child(2) {
                width: 135px !important;
            }
        }
    </style>
</head>

<body style="font-size:14px;font-weight:400;font-family:'Rubik', sans-serif;" onload="window.print()">
<div class="container pt-5 pb-5" onclick="window.print()">
    <div class="row">
        <div class="col-lg-12"><img class="mb-3" width="180" src="assets/images/logo.png" alt="logo">
            <h6 class="mb-5 text-capitalize text-success">Thank you! We have recieved your order.</h6>
        </div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-between header-info">
                <div class="mb-4">
                    <h6 class="text-capitalize mb-3">order recieved</h6>

                    <?php

                    $invRs = Database::search("SELECT * FROM invoice JOIN user u on invoice.user_email = u.email WHERE invoice.order_id = '${orderId}'");
                    $invData = $invRs->fetch_assoc()
                    ?>

                    <ul class="p-0">
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 150px;">name</p>
                            <p class="text-capitalize mb-0"
                               style="width: 200px;"><?= $invData['fname'] . ' ' . $invData['lname'] ?></p>
                        </li>
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 150px;">total item</p>
                            <p class="mb-0"
                               style="width: 200px;"><?= Database::search("SELECT * FROM invoice_item WHERE invoice_order_id = '" . $orderId . "'")->num_rows ?></p>
                        </li>
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 150px;">total amount</p>
                            <p class="mb-0" style="width: 200px;">Rs.<?= $invData['amount'] ?>.00</p>
                        </li>
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 150px;">payment type</p>
                            <p class="mb-0" style="width: 200px;">PayHere - Card Payment</p>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h6 class="text-capitalize mb-3">Shipment Details</h6>
                    <ul class="p-0">
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 160px;">order id</p>
                            <p class="mb-0" style="width: 200px;"><?= $invData['order_id'] ?></p>
                        </li>
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 160px;">order date</p>
                            <p class="mb-0" style="width: 200px;"><?= $invData['date'] ?></p>
                        </li>
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 160px;">contact number</p>
                            <?php
                            $mobileRs = Database::search("SELECT * FROM user_mobiles WHERE user_email = '" . $invData['user_email'] . "'");
                            $moblie = $mobileRs->fetch_assoc();
                            ?>
                            <p class="mb-0" style="width: 200px;"><?= $moblie['mobile'] ?></p>
                        </li>
                        <li class="d-flex align-items-start justify-content-start mb-1">
                            <p class="text-capitalize mb-0" style="width: 160px;">delivery location</p>
                            <?php
                            $addressRs = Database::search("SELECT *, c.name as cname FROM address JOIN city c on address.city_id = c.id WHERE user_email = '" . $invData['user_email'] . "'");
                            $address = $addressRs->fetch_assoc();
                            ?>
                            <p class="mb-0"
                               style="width: 200px;"><?= $address['line1'] . ', ' . $address['line2'] . ', ' . $address['cname'] ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table">
                <table class="table table-bordered text-center tables">
                    <thead>
                    <tr class="text-success" bgcolor="#00a859">
                        <th scope="col" class="fw-normal" style="padding: 12px 0px;">SL.</th>
                        <th scope="col" class="fw-normal" style="padding: 12px 0px;">Product</th>
                        <th scope="col" class="fw-normal" style="padding: 12px 0px;">Price</th>
                        <th scope="col" class="fw-normal" style="padding: 12px 0px;">Quantity</th>
                        <th scope="col" class="fw-normal" style="padding: 12px 0px;">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $invItemsRs = Database::search("SELECT *, invoice_item.qty AS qty FROM invoice_item JOIN product p on p.id = invoice_item.product_id WHERE invoice_order_id = '${orderId}'");
                    $x = 1;
                    while ($invItem = $invItemsRs->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row"><?= $x ?></th>
                            <td class="text-capitalize"><?= $invItem['title'] ?></td>
                            <td><?= $invItem['price'] ?></td>
                            <td><?= $invItem['qty'] ?></td>
                            <td>Rs.<?= $invItem['qty'] * $invItem['price'] ?>.00</td>
                        </tr>
                        <?php
                        $x++;
                    }
                    ?>


                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end border-bottom mb-3">
                <ul class="p-3 mb-0">
                    <li class="d-flex mb-1">
                        <h6 class="text-capitalize" style="font-weight: 500; width: 250px;">Sub total:</h6>
                        <p class="mb-0">
                            Rs.<?= $invData['amount'] + number_format(($invData['amount'] / 100) * 15) ?></p>
                    </li>
                    <li class="d-flex mb-1">
                        <h6 class="text-capitalize" style="font-weight: 500; width: 250px;">discount price:</h6>
                        <p class="mb-0">Rs.<?= number_format(($invData['amount'] / 100) * 15) ?></p>
                    </li>
                    <li class="d-flex mb-1">
                        <h6 class="text-capitalize" style="font-weight: 500; width: 250px;">Total amount:</h6>
                        <p class="mb-0">Rs.<?= $invData['amount'] ?></p>
                    </li>
                </ul>
            </div>
            <p style="font-size: 12px;">Thank you for ordering greeny. We offer a 7-day return policy on all
                products. If you have any complain about this order, please call or email us.. This is a sytem generated
                invoice and no signature or seal is
                required. </p>
        </div>
    </div>
</div>
<script src="../../../../code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../../../cdn.jsdelivr.net/npm/bootstrap%405.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>