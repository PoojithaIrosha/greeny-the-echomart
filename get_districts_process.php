<?php

require_once "connection.php";

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];

    $district_rs = Database::search("SELECT * FROM district WHERE province_id='${pid}'");

    ?>
    <label class="form-label">District</label>
    <select class="form-select" id="new_district" onchange="set_district_of_address()">
        <option value="0">Select District</option>
        <?php

        while ($district = $district_rs->fetch_assoc()) {
            ?>
            <option value="<?= $district["id"] ?>"><?= $district["name"] ?></option>
            <?php
        }
        ?>
    </select>
    <?php
}

