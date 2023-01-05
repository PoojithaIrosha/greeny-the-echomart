<div class="row">
    <div class="col-lg-12">
        <div class="top-filter">
            <div class="filter-short"><label class="filter-label">Short by :</label><select
                        class="form-select filter-select">
                    <option selected>default</option>
                    <option value="3">trending</option>
                    <option value="1">featured</option>
                    <option value="2">recommend</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4" id="products_container">

    <?php

    if (isset($_POST["page"]) && $_POST["page"] != '0') {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $product_rs = Database::search($query);

    $no_of_products = $product_rs->num_rows;
    $results_per_page = 10;
    $no_of_pages = ceil($no_of_products / $results_per_page);
    $viewed_result_count = ((int)$page - 1) * $results_per_page;

    $product_rs2 = Database::search($query .= "LIMIT ${results_per_page} OFFSET ${viewed_result_count}");
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
    ?>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="bottom-paginate">
            <p class="page-info">Showing <?= $no_of_products ?> Results</p>
            <ul class="pagination d-flex">
                <li class="page-item">
                    <a class="page-link" style="cursor: pointer"
                       onclick='do_filter(<?= json_encode($categories) ?>, <?= json_encode($brands) ?>, "<?= $search ?>", "<?= ($page <= 1) ? $page : ($page - 1) ?>")'>
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </a>
                </li>

                <?php

                for ($x = 1; $x <= $no_of_pages; $x++) {
                    ?>
                    <li class="page-item">
                        <a class="page-link active" style="cursor: pointer"
                           onclick='do_filter(<?= json_encode($categories) ?>, <?= json_encode($brands) ?>, "<?= $search ?>", "<?= $x ?>")'><?= $x ?></a>
                    </li>
                    <?php
                }

                ?>

                <li class="page-item">
                    <a class="page-link" style="cursor: pointer"
                       onclick='do_filter(<?= json_encode($categories) ?>, <?= json_encode($brands) ?>, "<?= $search ?>", "<?= ($page >= $no_of_pages) ? $page : ($page + 1) ?>")'>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>