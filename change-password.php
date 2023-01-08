<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Greeny - Change Password</title>
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
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="user-form-logo"><a href="index.php"><img src="assets/images/logo.png" alt="logo"></a></div>
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>any issue?</h2>
                        <p>Make sure your current password is strong</p>
                    </div>
                    <div class="user-form">
                        <div class="mb-2">
                            <span id="err-msg" class="text-danger fw-bold" style="font-size: 13px"></span>
                        </div>
                        <div class="form-group">
                            <input id="new_pwd" type="password" class="form-control" placeholder="New password">
                        </div>
                        <div class="form-group">
                            <input id="r_pwd" type="password" class="form-control" placeholder="Repeat password">
                        </div>
                        <div class="form-button">
                            <button onclick="update_password('<?php echo $_GET['uid']; ?>')" type="submit">change
                                password
                            </button>
                        </div>
                    </div>
                </div>
                <div class="user-form-remind">
                    <p>Go Back To<a href="login.php">login here</a></p>
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