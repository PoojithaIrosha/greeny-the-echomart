<?php

require_once "connection.php";

if (isset($_GET["did"])) {
    $did = $_GET["did"];

    $city_rs = Database::search("SELECT * FROM city WHERE district_id='${did}'");

    ?>
    <label class="form-label">city</label>
    <select class="form-select" id="new_city" onchange="set_city_of_address()">
        <option value="0">Select city</option>
        <?php
        while ($city = $city_rs->fetch_assoc()) {
            ?>
            <option value="<?= $city["id"] ?>"><?= $city["name"] ?></option>
            <?php
        }
        ?>
    </select>
    <?php
}

