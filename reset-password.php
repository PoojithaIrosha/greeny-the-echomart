<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Greeny | Reset Password</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>

<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="user-form-logo"><a href="index.php"><img src="assets/images/logo.png" alt="logo"></a></div>
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>worried?</h2>
                        <p>No Problem! Just Follow The Simple Way</p>
                    </div>
                    <div class="user-form">
                        <div class="mb-2">
                            <span id="err-msg" class="text-danger fw-bold" style="font-size: 13px"></span>
                        </div>
                        <div class="form-group">
                            <input onchange="setActiveStatus()" id="email" type="email" class="form-control"
                                   placeholder="Enter your email">
                        </div>
                        <div class="form-button">
                            <button disabled id="resetBtn" onclick="reset_password()" type="submit">get reset link
                            </button>
                            <button id="resetBtnLoading" onclick="reset_password()" type="submit"
                                    class="d-flex align-items-center justify-content-center d-none">
                                <div class="spinner-border text-light" role="status"></div>
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