<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    die();
}

$checked = false;
if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
    $checked = true;
}

if (isset($_COOKIE["password"])) {
    $pwd = $_COOKIE["password"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Greeny | Login</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="assets/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="assets/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/user-auth.css">
</head>

<body>
<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
                <div class="user-form-logo"><a href="index.php"><img src="assets/images/logo.png" alt="logo"></a></div>
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>welcome!</h2>
                        <p>Use your credentials to access</p>
                    </div>
                    <div class="user-form-group">
                        <ul class="user-form-social">
                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>login with
                                    facebook</a></li>
                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>login with twitter</a>
                            </li>
                            <li><a href="#" class="google"><i class="fab fa-google"></i>login with google</a></li>
                            <li><a href="#" class="instagram"><i class="fab fa-instagram"></i>login with
                                    instagram</a></li>
                        </ul>
                        <div class="user-form-divider">
                            <p>or</p>
                        </div>
                        <div class="user-form">
                            <div class="mb-2">
                                <span id="err-msg" class="text-danger fw-bold" style="font-size: 13px"></span>
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" placeholder="Enter your email"
                                       value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <input id="pwd" type="password" class="form-control" placeholder="Enter your password"
                                       value="<?php echo $pwd; ?>">
                            </div>
                            <div class="form-check mb-1">
                                <input id="rmb_me" class="form-check-input"
                                       type="checkbox" <?= $checked ? "checked" : "" ?>>
                                <label class="form-check-label" for="rmb_me">Remember Me</label>
                            </div>

                            <div class="form-button">
                                <button onclick="user_login()">login</button>
                                <p>Forgot your password?<a href="reset-password.php">reset here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-form-remind">
                    <p>Don't have any account?<a href="register.php">register here</a></p>
                </div>
                <div class="user-form-footer">
                    <p>Greeny | &COPY; Copyright by <a href="#">Poojitha Irosha</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/vendor/bootstrap/jquery-1.12.4.min.js"></script>
<script src="assets/vendor/bootstrap/popper.min.js"></script>
<script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/vendor/countdown/countdown.min.js"></script>
<script src="assets/vendor/niceselect/nice-select.min.js"></script>
<script src="assets/vendor/slickslider/slick.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/js/nice-select.js"></script>
<script src="assets/js/countdown.js"></script>
<script src="assets/js/accordion.js"></script>
<script src="assets/js/venobox.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>