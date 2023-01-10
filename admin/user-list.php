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
    <title>Admin - Customers</title>
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
                                        <h1 class="nk-block-title">Users List</h1>
                                        <nav>
                                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Customers</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card">
                                    <table class="datatable-init table" data-nk-container="table-responsive">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="tb-col"><span class="overline-title">Users</span></th>
                                            <th class="tb-col"><span class="overline-title">Mobile</span></th>
                                            <th class="tb-col"><span class="overline-title">Address</span></th>
                                            <th class="tb-col"><span class="overline-title">Password</span></th>
                                            <th class="tb-col"><span class="overline-title">Joined Date</span></th>
                                            <th class="tb-col"><span class="overline-title">Status</span></th>
                                            <th class="tb-col tb-col-end" data-sortable="false"><span
                                                        class="overline-title">Action</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        $userRs = Database::search("SELECT * FROM user");
                                        while ($user = $userRs->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td class="tb-col">
                                                    <div class="media-group">
                                                        <div class="media media-md media-middle media-circle">
                                                            <?php
                                                            $profileImgRs = Database::search("SELECT * FROM profile_img WHERE user_email = '" . $user['email'] . "'");

                                                            if ($profileImgRs->num_rows > 0) {
                                                                $profileImg = $profileImgRs->fetch_assoc();
                                                                ?>
                                                                <img src="../<?= $profileImg['code'] ?>" alt="user"
                                                                     style="clip-path: circle()">
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="../assets/images/profiles/user.png"
                                                                     alt="user">
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="media-text">
                                                            <a href="#"
                                                               class="title"><?= $user['fname'] . ' ' . $user['lname'] ?></a>
                                                            <span class="small text"><?= $user['email'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="tb-col">
                                                    <?php

                                                    $mobileRs = Database::search("SELECT * FROM user_mobiles WHERE user_email = '" . $user['email'] . "'");
                                                    if ($mobileRs->num_rows > 0) {
                                                        $mobile = $mobileRs->fetch_assoc();
                                                        echo $mobile['mobile'];
                                                    } else {
                                                        echo "N/A";
                                                    }

                                                    ?>
                                                </td>
                                                <td class="tb-col">
                                                    <?php

                                                    $addRs = Database::search("SELECT *, c.name as cname FROM address JOIN city c on c.id = address.city_id WHERE user_email = '" . $user['email'] . "'");
                                                    if ($addRs->num_rows > 0) {
                                                        $adds = $addRs->fetch_assoc();
                                                        echo $adds['line1'] . ', ' . $adds['line2'] . ', ' . $adds['cname'];
                                                    } else {
                                                        echo "N/A";
                                                    }

                                                    ?>
                                                </td>
                                                <td class="tb-col tb-col-xl"><?= $user['password'] ?></td>
                                                <td class="tb-col"><?= explode(" ", $user['registered_date'])[0]; ?></td>

                                                <td>
                                                    <div class="d-flex justify-content-center form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="user-status-check<?= $user['email'] ?>"
                                                               onchange="changeUserStatus('<?= $user['email'] ?>')" <?= ($user['status_status_id'] == 1) ? "checked" : "" ?>>
                                                    </div>
                                                </td>

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
                                                                        <a href="javascript:deleteUserAccount('<?= $user['email'] ?>')">
                                                                            <em class="icon ni ni-trash"></em>
                                                                            <span>Delete</span>
                                                                        </a>
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