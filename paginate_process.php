<?php

require_once "MySQL.php";

$page = $_GET["page"];
$search = $_GET["search"];

$product_rs = Database::search("SELECT *, product.id AS `pid` , unit.`name` AS `unit_name` FROM `product` INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE title LIKE '%" . $search . "%'");

$no_of_products = $product_rs->num_rows;
$city = 10;
$no_of_pages = ceil($no_of_products / $results_per_page);
$viewed_result_count = ((int)$page - 1) * $results_per_page;

$product_rs2 = Database::search("SELECT *, product.id AS `pid` , unit.`name` AS `unit_name` FROM `product` INNER JOIN `status` ON product.status_id = `status`.status_id INNER JOIN unit ON product.unit_id = unit.id WHERE title LIKE '%" . $search . "%' LIMIT ${results_per_page} OFFSET ${viewed_result_count}");

while ($data = $product_rs2->fetch_assoc()) {
    ?>
    <!--Single Product-->
    <div class="col">
        <div class="product-card">
            <div class="product-media">
                <div class="product-label">
                    <label class="label-text new">new</label>
                </div>

                <?php
                $email = "";
                if (isset($_SESSION["user"]["email"])) {
                    $email = $_SESSION["user"]["email"];
                }

                $rs2 = Database::search("SELECT * FROM `wishlist` WHERE `user_email`='" . $email . "' && `product_id`='" . $data['pid'] . "'");
                if ($rs2->num_rows == 1) { //isset($_SESSION["user"]) &&

                    ?>
                    <button id="wish_btn<?= $data["pid"]; ?>" class="product-wish active"
                            onclick="add_to_wishlist(<?= $data["pid"] ?>)">
                        <i class="fas fa-heart"></i>
                    </button>
                    <?php

                } else {
                    ?>
                    <button id="wish_btn<?= $data["pid"]; ?>"
                            onclick="add_to_wishlist(<?= $data["pid"] ?>)" class="product-wish">
                        <i class="fas fa-heart"></i>
                    </button>
                    <?php
                }
                ?>


                <a class="product-image" href="product-view.php?pid=<?= $data["pid"] ?>">

                    <?php
                    $img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $data["pid"] . "' LIMIT 1");
                    $img_data = $img_rs->fetch_assoc();
                    ?>
                    <img src="<?= $img_data["code"] ?>" alt="product"/>
                </a>
            </div>
            <div class="product-content">
                <!--TODO: Add ratings-->
                <!-- Ratings -->
                <div class="product-rating">
                    <i class="active icofont-star"></i>
                    <i class="active icofont-star"></i>
                    <i class="active icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                </div>
                <!-- Title -->
                <h6 class="product-name">
                    <a href="product-view.php?pid=<?= $data["pid"] ?>"><?= $data["title"] ?></a>
                </h6>
                <!-- Price -->
                <h6 class="product-price">
                    <del><?= "Rs." . (($data["price"] / 100) * 25) + $data["price"] ?></del>
                    <span>
                                    <?= "Rs." . ($data["price"]) ?>
                                    <small>/piece</small>
                                </span>
                </h6>
                <h6 class="mb-2">
                    <small class="text-muted"><?= $data["qty"] . " " . $data["unit_name"] ?>
                        Available</small>
                </h6>
                <!-- Buy Now Button -->
                <a href="product-view.php?pid=<?= $data["pid"] ?>" class="product-add">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Buy Now</span>
                </a>
            </div>
        </div>
    </div>
    <!--Single Product-->
    <?php
}