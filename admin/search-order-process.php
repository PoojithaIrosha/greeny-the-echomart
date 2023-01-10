<?php

require "../MySQL.php";

$text = $_POST['text'];
$dateFrom = $_POST['from'];
$dateTo = $_POST['to'];

$q = "SELECT * FROM invoice JOIN user u on invoice.user_email = u.email WHERE order_id LIKE '%" . $text . "%'";

if (!empty($dateFrom) && empty($dateTo)) {
    $q .= " AND date >= '" . $dateFrom . "'";
} else if (empty($dateFrom) && !empty($dateTo)) {
    $q .= " and date <= '" . $dateTo . "'";
} else if (!empty($dateFrom) && !empty($dateTo)) {
    $q .= " AND date BETWEEN '" . $dateFrom . "' AND '" . $dateTo . "'";
}

$invoiceRs = Database::search($q);
while ($invoiceData = $invoiceRs->fetch_assoc()) {
    ?>
    <tr>
        <td><?= $invoiceData['order_id'] ?></td>
        <td><?= $invoiceData['fname'] . ' ' . $invoiceData['lname'] ?></td>
        <td>Rs.<?= $invoiceData['amount'] ?></td>
        <td><?= Database::search("SELECT * FROM invoice_item WHERE invoice_order_id = '" . $invoiceData['order_id'] . "'")->num_rows ?></td>
        <td><?= $invoiceData['date'] ?></td>
        <td>
            <div class="d-flex justify-content-center align-items-center">
                <?php

                if ($invoiceData['status'] == 0) {
                    ?>
                    <button class="btn btn-danger btn-sm"
                            onclick="changeOrderStatus('<?= $invoiceData['order_id'] ?>')">Delivering
                    </button>
                    <?php
                } else if ($invoiceData['status'] == 1) {
                    ?>
                    <button class="btn btn-success btn-sm"
                            onclick="changeOrderStatus('<?= $invoiceData['order_id'] ?>')">Confirm Order
                    </button>
                    <?php
                }

                ?>
            </div>
        </td>

    </tr>
    <?php
}
