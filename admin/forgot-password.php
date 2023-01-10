<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html.nioboard.themenio.com/auths/auth-reset-classic.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 17:29:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Greeny - Admin Forgot Password</title>
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
                        <div class="brand-logo mb-1"><a href="../index.php" class="logo-link">
                                <div class="logo-wrap">
                                    <img src="../assets/images/logo.png" style="height: 80px" alt="">
                                </div>
                            </a></div>
                        <div class="card card-gutter-lg rounded-4 card-auth">
                            <div class="card-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content"><h3 class="nk-block-title mb-2">Reset
                                            password</h3>
                                        <p class="small">If you forgot your password, don't worry! we’ll email you
                                            instructions to reset your password.</p></div>
                                </div>
                                <form onsubmit="reset_password(event)">
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-address" class="form-label">Email</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="email-address"
                                                           name="email" placeholder="Enter email address">
                                                </div>
                                                <div class="text-danger text-start mt-1" style="font-size: 13px"
                                                     id="fp-err"></div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-success" id="send-btn" type="submit">Send Reset
                                                    Link
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center mt-5"><p class="small"><a class="link-success" href="login.php">Back to
                                    Login</a>
                            </p></div>
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