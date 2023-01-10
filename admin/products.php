<?php
session_start();
require_once "../MySQL.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Admin - Products</title>
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
                                        <h1 class="nk-block-title">Products</h1>
                                        <nav>
                                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="d-flex">
                                            <li><a href="add-product.php" class="btn btn-primary btn-md d-md-none"><em
                                                            class="icon ni ni-plus"></em><span>Add</span></a></li>
                                            <li><a href="add-product.php"
                                                   class="btn btn-primary d-none d-md-inline-flex"><em
                                                            class="icon ni ni-plus"></em><span>Add Product</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card">
                                    <table class="datatable-init table" data-nk-container="table-responsive">
                                        <thead class="table-light">


                                        <tr>
                                            <th class="tb-col tb-col-check" data-sortable="false">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </th>
                                            <th class="tb-col"><span class="overline-title">products</span></th>
                                            <th class="tb-col"><span class="overline-title">category</span></th>
                                            <th class="tb-col"><span class="overline-title">qty</span></th>
                                            <th class="tb-col tb-col-md"><span class="overline-title">price</span>
                                            </th>
                                            <th class="tb-col text-center"><span
                                                        class="overline-title">Status</span>
                                            </th>
                                            <th class="tb-col tb-col-end" data-sortable="false">
                                                <span class="overline-title">action</span>
                                            </th>
                                        </tr>


                                        </thead>
                                        <tbody>
                                        <?php

                                        $prodRs = Database::search("SELECT *, product.id as pid, c.name as cat FROM product JOIN category c on c.id = product.category_id");
                                        while ($prod = $prodRs->fetch_assoc()) {
                                            ?>

                                            <tr>
                                                <td class="tb-col tb-col-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>

                                                <td class="tb-col">
                                                    <div class="media-group">
                                                        <div class="media media-md media-middle">
                                                            <?php

                                                            $prodImageRs = Database::search("SELECT * FROM product_images WHERE product_id = '" . $prod['pid'] . "' LIMIT 1");
                                                            $image = $prodImageRs->fetch_assoc();

                                                            ?>
                                                            <img src="../<?= $image['code'] ?>" alt="product">
                                                        </div>
                                                        <div class="media-text"><a
                                                                    href="edit-product.php?pid=<?= $prod['pid'] ?>"
                                                                    class="title"><?= $prod['title'] ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="tb-col"><span><?= $prod['cat'] ?></span></td>
                                                <td class="tb-col"><span><?= $prod['qty'] ?></span></td>
                                                <td class="tb-col tb-col-md"><span>Rs.<?= $prod['price'] ?>.00</span>
                                                </td>

                                                <!--Status-->
                                                <td>
                                                    <div class="d-flex justify-content-center form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="product-status-check<?= $prod['pid'] ?>"
                                                               onchange="changeProductStatus('<?= $prod['pid'] ?>')" <?= ($prod['status_id'] == 1) ? "checked" : "" ?> >
                                                    </div>
                                                </td>
                                                <!--Action-->

                                                <td class="tb-col tb-col-end">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1"
                                                           data-bs-toggle="dropdown">
                                                            <em class="icon ni ni-more-v"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                            <div class="dropdown-content py-1">
                                                                <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                                    <li>
                                                                        <a href="edit-product.php?pid=<?= $prod['pid'] ?>">
                                                                            <em class="icon ni ni-edit"></em><span>Edit</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:deleteProduct('<?= $prod['pid'] ?>')"><em
                                                                                    class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                            <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
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
<script src="assets/js/data-tables/data-tables.js"></script>
<script src="assets/js/admin.js"></script>

</html>