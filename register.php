<?php
require "MySQL.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Greeny | Register</title>

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
                        <h2>Join Now!</h2>
                        <p>Setup A New Account In A Minute</p>
                    </div>
                    <div class="user-form-group d-flex align-items-center">
                        <ul class="user-form-social">
                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Join with facebook</a>
                            </li>
                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>Join with twitter</a></li>
                            <li><a href="#" class="google"><i class="fab fa-google"></i>Join with google</a></li>
                            <li><a href="#" class="instagram"><i class="fab fa-instagram"></i>Join with
                                    instagram</a></li>
                        </ul>
                        <div class="user-form-divider">
                            <p>or</p>
                        </div>
                        <div class="user-form">
                            <div class="form-group">
                                <input id="fname" type="text" class="form-control" placeholder="Enter your first name">
                            </div>
                            <div class="form-group">
                                <input id="lname" type="text" class="form-control" placeholder="Enter your last name">
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <input id="pwd" type="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <input id="mobile" type="text" class="form-control"
                                       placeholder="Enter your mobile number">
                            </div>
                            <div class="form-group mb-2">
                                <select id="gender" class="form-select">
                                    <option value="0">Select Gender</option>

                                    <?php
                                    $rs = Database::search("SELECT * FROM `gender`");

                                    while ($data = $rs->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $data['gender_id']; ?>"><?php echo $data["gender_name"]; ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-2">
                                <span id="err-msg" class="text-danger fw-bold" style="font-size: 13px"></span>
                            </div>
                            <div class="form-button">
                                <button onclick="user_registration()">register</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-form-remind">
                    <p>Already Have An Account?<a href="login.php">login here</a></p>
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