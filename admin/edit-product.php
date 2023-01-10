<?php

require_once "../MySQL.php";

if (!isset($_GET['pid'])) {
    header("Location: products.php");
    exit();
}

$pid = $_GET['pid'];

$productRs = Database::search("SELECT * FROM product JOIN brand b on b.id = product.brand_id JOIN category c on c.id = product.category_id WHERE product.id = '${pid}' ");
if ($productRs->num_rows > 0) {
    $product = $productRs->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
              content="Multi-purpose admin dashboard template that especially build for programmers.">
        <title>Admin - edit product</title>
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="stylesheet" href="assets/css/style926d.css?v1.1.1">
    </head>
    <body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
                <?php require "sidebar.php" ?>
            </div>
            <div class="nk-wrap">
                <?php require "header.php" ?>
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between flex-wrap gap g-2">
                                        <div class="nk-block-head-content">
                                            <h1 class="nk-block-title">Edit Product</h1>
                                            <nav>
                                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Edit Product
                                                    </li>
                                                </ol>
                                            </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                <li><a href="products.php" class="btn btn-primary btn-md d-md-none"><em
                                                                class="icon ni ni-eye"></em><span>View</span></a></li>
                                                <li><a href="products.php"
                                                       class="btn btn-primary d-none d-md-inline-flex"><em
                                                                class="icon ni ni-eye"></em><span>View Products</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div>
                                        <div class="row g-gs">
                                            <div class="col-xxl-9">
                                                <div class="gap gy-4">
                                                    <div class="gap-col">
                                                        <div class="card card-gutter-md">
                                                            <div class="card-body">
                                                                <div class="row g-gs">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="productname" class="form-label">Product
                                                                                Name</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control"
                                                                                       id="productname"
                                                                                       placeholder="Product Name"
                                                                                       value="<?= $product['title'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="baseprice"
                                                                                   class="form-label">Price (Rs)</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="number"
                                                                                       class="form-control"
                                                                                       id="price"
                                                                                       placeholder="Product price"
                                                                                       value="<?= $product['price'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group"><label
                                                                                    class="form-label">Quantity</label>
                                                                            <div class="row g-gs">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number"
                                                                                               id="qty"
                                                                                               class="form-control"
                                                                                               placeholder="Product quantity"
                                                                                               value="<?= $product['qty'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="baseprice" class="form-label">Category</label>
                                                                            <div class="form-control-wrap">
                                                                                <select id="category"
                                                                                        class="form-select">
                                                                                    <option value="0">Select Category
                                                                                    </option>
                                                                                    <?php
                                                                                    $categoryRs = Database::search("SELECT * FROM category");
                                                                                    while ($cat = $categoryRs->fetch_assoc()) {
                                                                                        ?>
                                                                                        <option value="<?= $cat['id'] ?>" <?= ($product['category_id'] == $cat['id']) ? "selected" : "" ?>><?= $cat['name'] ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="baseprice" class="form-label">Unit</label>
                                                                            <div class="form-control-wrap">
                                                                                <select id="unit"
                                                                                        class="form-select">
                                                                                    <option value="0">Select Unit
                                                                                    </option>
                                                                                    <?php
                                                                                    $unitRs = Database::search("SELECT * FROM unit");
                                                                                    while ($unit = $unitRs->fetch_assoc()) {
                                                                                        ?>
                                                                                        <option value="<?= $unit['id'] ?>" <?= ($product['unit_id'] == $unit['id']) ? "selected" : "" ?>><?= $unit['name'] ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="baseprice"
                                                                                   class="form-label">Brand</label>
                                                                            <div class="form-control-wrap">
                                                                                <select id="brand"
                                                                                        class="form-select">
                                                                                    <option value="0">Select Brand
                                                                                    </option>
                                                                                    <?php
                                                                                    $brandRs = Database::search("SELECT * FROM brand");
                                                                                    while ($brand = $brandRs->fetch_assoc()) {
                                                                                        ?>
                                                                                        <option value="<?= $brand['id'] ?>" <?= ($product['brand_id'] == $brand['id']) ? "selected" : "" ?>><?= $brand['name'] ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group"><label
                                                                                    class="form-label">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control"
                                                                                          id="description" cols="30"
                                                                                          rows="10"><?= $product['description'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gap-col">
                                                        <div class="card card-gutter-md">
                                                            <div class="card-body">
                                                                <div>
                                                                    <label class="form-label">Product Images</label>
                                                                    <div class="d-flex justify-content-center gap-3">
                                                                        <?php
                                                                        $prodImagesRs = Database::search("SELECT * FROM product_images WHERE product_id='${pid}'");
                                                                        while ($productImage = $prodImagesRs->fetch_assoc()) {
                                                                            ?>
                                                                            <div ondblclick="deleteProductImage('<?= $productImage['code'] ?>', '<?= $productImage['product_id'] ?>')">
                                                                                <img src="../<?= $productImage['code'] ?>"
                                                                                     style="height: 150px"
                                                                                     class="border">
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <label style="font-size: 13px"
                                                                           class="text-danger d-flex justify-content-center mt-2">Double
                                                                        click to delete</label>

                                                                </div>

                                                                <hr>
                                                                <div class="form-group">
                                                                    <label class="form-label">Upload Media</label>
                                                                    <input type="file" class="form-control"
                                                                           onchange="uploadProductImage('<?= $pid ?>')"
                                                                           id="productImg" accept="image/*">

                                                                    <div class="form-note mt-3">Set the product media
                                                                        gallery.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gap-col">
                                                        <ul class="d-flex align-items-center gap g-3">
                                                            <li>
                                                                <button class="btn btn-primary"
                                                                        onclick="updateProduct('<?= $pid ?>')">Save
                                                                    Changes
                                                                </button>
                                                            </li>
                                                            <li><a href="products.php" class="btn border-0">Cancel</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require "footer.php" ?>
            </div>
        </div>
    </div>
    </body>
    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <link rel="stylesheet" href="assets/css/libs/editors/quill926d.css?v1.1.1"></link>
    <script src="assets/js/libs/editors/quill.js"></script>
    <script src="assets/js/editors/quill.js"></script>
    <script src="assets/js/admin.js"></script>
    </html>
    <?php
} else {
    header("Location: products.php");
}
?>


