<?php

session_start();
if (isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit();
}

$checked = false;
if (isset($_COOKIE["admin_email"])) {
    $email = $_COOKIE["admin_email"];
    $checked = true;
}

if (isset($_COOKIE["admin_password"])) {
    $pwd = $_COOKIE["admin_password"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Admin - Login</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/css/style926d.css?v1.1.1">
</head>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<div class="nk-app-root">
    <div class="nk-main">
        <div class="nk-wrap align-items-center justify-content-center">
            <div class="container p-2 p-sm-4">
                <div class="wide-xs mx-auto">
                    <div class="text-center mb-5">
                        <div class="brand-logo mb-1">
                            <a href="index.php" class="logo-link">
                                <div class="logo-wrap">
                                    <img src="../assets/images/logo.png" style="height: 80px" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card card-gutter-lg rounded-4 card-auth">
                        <div class="card-body">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content"><h3 class="nk-block-title mb-1">Login to Admin
                                        Account</h3>
                                    <p class="small">Please sign-in to your account.</p></div>
                            </div>
                            <form id="admin-login-form" onsubmit="adminLogin(event)">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="username" class="form-label">Email Address</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" name="email"
                                                       placeholder="Enter email address" value="<?= $email ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="Enter password" value="<?= $pwd ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-12 d-none' id="error-msg">
                                        <span class="text-danger fw-bold" style="font-size: 14px;"></span>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <div class="form-check form-check-sm">
                                                <input class="form-check-input" type="checkbox"
                                                       id="rememberMe"
                                                       name="rememberMe" <?= $checked ? "checked" : "" ?>>
                                                <label class="form-check-label" for="rememberMe"> Remember Me </label>
                                            </div>
                                            <a href="forgot-password.php" class="small text-success">Forgot
                                                Password?</a></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid mt-2">
                                            <button class="btn btn-success" type="submit">Login to account</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/admin.js"></script>
</html>