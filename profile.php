<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="template" content="greeny"/>
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template"/>
    <meta name="keywords"
          content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online"/>
    <title>Greeny Echomart - User Profile</title>
    <link rel="icon" href="assets/images/favicon.png"/>
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css"/>
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css"/>
    <link rel="stylesheet" href="assets/fonts/fontawesome/fontawesome.min.css"/>
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.min.css"/>
    <link rel="stylesheet" href="assets/vendor/slickslider/slick.min.css"/>
    <link rel="stylesheet" href="assets/vendor/niceselect/nice-select.min.css"/>
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/home-grid.css"/>
</head>

<body>
<div class="backdrop"></div>
<a class="backtop fas fa-arrow-up" href="#"></a>

<?php require "header.php" ?>

<?php require "mobile_aside.php" ?>

<section class="inner-section single-banner" style="background: url(assets/images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>my profile</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">profile</li>
        </ol>
    </div>
</section>


<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>Your Profile</h4>
                        <button data-bs-toggle="modal" data-bs-target="#profile-edit">edit profile</button>
                    </div>

                    <div class="account-content">
                        <div class="row">
                            <?php
                            require_once "connection.php";

                            $email = $_SESSION["user"]["email"];
                            $user_rs = Database::search("SELECT * FROM user WHERE email = '${email}'");

                            if ($user_rs->num_rows > 0) {
                                $user_data = $user_rs->fetch_assoc();
                                ?>
                                <div class="col-lg-2">
                                    <div class="profile-image">
                                        <a href="#">
                                            <?php
                                            $profile_img_rs = Database::search("SELECT * FROM profile_img WHERE user_email='${email}'");
                                            if ($profile_img_rs->num_rows > 0) {
                                                $profile_img_data = $profile_img_rs->fetch_assoc();
                                                ?>
                                                <img src="<?= $profile_img_data["code"] ?>" alt="user"
                                                     style="height: 100px"/>
                                                <?php
                                            } else {
                                                ?>
                                                <img src="assets/images/profiles/user.png" alt="user"/>
                                                <?php
                                            }
                                            ?>

                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">name</label>
                                        <input class="form-control" type="text"
                                               value="<?= $user_data["fname"] . ' ' . $user_data["lname"] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" value="<?= $user_data["email"] ?>"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex align-items-center">
                                    <div class="profile-btn">
                                        <a href="reset-password.php" class="link-dark">Change Password</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>contact number</h4>
                        <button data-bs-toggle="modal" data-bs-target="#contact-add">add
                            contact
                        </button>
                    </div>
                    <div class="account-content">
                        <div class="row">

                            <?php

                            $user_mobiles_rs = Database::search("SELECT user_mobiles.id, user_mobiles.mobile,mt.type AS type FROM user_mobiles JOIN mobile_type mt on mt.id = user_mobiles.mobile_type_id WHERE user_email='${email}' ORDER BY mt.id ASC");
                            for ($i = 1; $i <= $user_mobiles_rs->num_rows; $i++) {
                                $user_mobiles_data = $user_mobiles_rs->fetch_assoc();
                                ?>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact <?= ($i == 1) ? "active" : "" ?>">
                                        <h6><?= $user_mobiles_data["type"] ?></h6>
                                        <p><?= $user_mobiles_data["mobile"] ?></p>
                                        <ul>
                                            <li>
                                                <button class="edit icofont-edit" title="Edit This"
                                                        onclick="edit_contact_details('<?= $user_mobiles_data["id"] ?>')"></button>
                                            </li>
                                            <li>
                                                <button class="trash icofont-ui-delete"
                                                        onclick="remove_mobile('<?= $user_mobiles_data["id"] ?>')"></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>delivery address</h4>
                        <button data-bs-toggle="modal" data-bs-target="#address-add">add
                            address
                        </button>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <?php
                            $address_rs = Database::search("SELECT *,address.id AS aid FROM address JOIN city c on c.id = address.city_id WHERE user_email='${email}'");

                            if ($address_rs->num_rows > 0) {
                                while ($address_data = $address_rs->fetch_assoc()) {
                                    ?>
                                    <!--Address-->
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card address active">
                                            <h5 class="fw-bold mb-2">Address <?= $address_data["id"] ?></h5>
                                            <p><?= $address_data["line1"] . ", " . $address_data["line2"] . ", ", $address_data["name"] . ", " . $address_data["postal_code"]; ?></p>
                                            <ul class="user-action">
                                                <li>
                                                    <button class="edit icofont-edit"
                                                            onclick="edit_user_address('<?= $address_data["aid"] ?>')"></button>
                                                </li>
                                                <li>
                                                    <button class="trash icofont-ui-delete"
                                                            onclick="delete_user_address('<?= $address_data["aid"] ?>')"></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Address-->
                                    <?php
                                }

                            } else {
                                ?>
                                <!--Address-->
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card address active">
                                        <h4 class="text-center">No address found</h4>
                                    </div>
                                </div>
                                <!--Address-->
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add new contact -->
<div class="modal fade" id="contact-add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="modal-close" data-bs-dismiss="modal"><i
                        class="icofont-close"></i></button>
            <div class="modal-form">
                <div class="form-title">
                    <h3>add new contact</h3>
                </div>

                <div class="form-group">
                    <label class="form-label">title</label>
                    <select class="form-select" id="contact_type">
                        <option value="0">choose title</option>
                        <option value="primary">primary</option>
                        <option value="secondary">secondary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">number</label>
                    <input class="form-control" type="text" id="new_mobile" placeholder="Enter your number">
                </div>

                <button class="form-btn" type="submit" onclick="add_new_contact()">save contact info</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new contact -->

<!-- Add new address -->
<div class="modal fade" id="address-add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="modal-close" data-bs-dismiss="modal"><i
                        class="icofont-close"></i></button>
            <div class="modal-form">
                <div class="form-title">
                    <h3>add new address</h3>
                </div>
                <div>
                    <span class="text-danger d-none" id="address_error_msg"></span>
                </div>
                <div class="form-group">
                    <label class="form-label">Line 01</label>
                    <input type="text" id="new_line1" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="form-label">Line 02</label>
                    <input type="text" id="new_line2" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="form-label">Province</label>
                    <select class="form-select" id="new_province" onchange="set_province_of_address()">
                        <option value="0">Select your province</option>
                        <?php
                        $province_rs = Database::search("SELECT * FROM province");
                        while ($province_data = $province_rs->fetch_assoc()) {
                            ?>
                            <option value="<?= $province_data["id"] ?>"><?= $province_data["name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group" id="district_div">
                    <label class="form-label">District</label>
                    <select class="form-select" id="new_district" onchange="set_district_of_address()">
                        <option value="0">Select District</option>
                    </select>
                </div>

                <div class="form-group" id="city_div">
                    <label class="form-label">District</label>
                    <select class="form-select" id="new_city">
                        <option value="0">Select City</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Postal Code</label>
                    <input type="text" id="new_postal_code" class="form-control"/>
                </div>

                <button class="form-btn" type="submit" onclick="add_new_address()">save address info</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new address -->

<div class="modal fade" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="modal-close" data-bs-dismiss="modal"><i
                        class="icofont-close"></i></button>
            <div class="modal-form">
                <div class="form-title">
                    <h3>edit profile info</h3>
                </div>
                <div class="form-group">
                    <label class="form-label">profile image</label>
                    <input class="form-control" type="file" id="profile_img" accept="image/*">
                </div>
                <div class="form-group">
                    <label class="form-label">first name</label>
                    <input class="form-control" type="text" id="first_name" value="<?= $user_data["fname"] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">last name</label>
                    <input class="form-control" type="text" id="last_name" value="<?= $user_data["lname"] ?>">
                </div>
                <button class="form-btn" type="submit" onclick="update_user_details()">
                    save profile info
                </button>
            </div>
        </div>
    </div>
</div>

<!--Edit contact info-->
<div class="modal fade" id="contact-edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="modal-close" data-bs-dismiss="modal"><i
                        class="icofont-close"></i></button>

            <div class="modal-form">
                <div class="form-title">
                    <h3>edit contact info</h3>
                </div>

                <span class="text-danger my-2 d-none" id="error_msg">Error</span>

                <input type="hidden" id="c_id"/>

                <div class="form-group">
                    <label class="form-label">title</label>
                    <select class="form-select" id="contact_type2">
                        <option value="1">primary</option>
                        <option value="2">secondary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">number</label>
                    <input class="form-control" type="text" id="mobile2">
                </div>

                <button class="form-btn" onclick="update_mobile_no()">
                    save contact info
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit contact info-->

<div class="modal fade" id="address-edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="modal-close" data-bs-dismiss="modal"><i
                        class="icofont-close"></i></button>
            <div class="modal-form">
                <div class="form-title">
                    <h3>edit address info</h3>
                </div>
                <input type="hidden" id="aid"/>
                <div class="form-group">
                    <label class="form-label">Line 01</label>
                    <input type="text" class="form-control" id="line1">
                </div>
                <div class="form-group">
                    <label class="form-label">Line 02</label>
                    <input type="text" class="form-control" id="line2">
                </div>
                <div class="form-group">
                    <label class="form-label">City</label>
                    <select class="form-select" id="city">
                        <?php
                        $city_rs = Database::search("SELECT * FROM city");
                        while ($city = $city_rs->fetch_assoc()) {
                            ?>
                            <option value="<?= $city["id"] ?>"><?= $city["name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code">
                </div>
                <button class="form-btn" type="submit" onclick="update_user_address()">save
                    address info
                </button>
            </div>
        </div>
    </div>
</div>


<?php require "footer.php" ?>

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
</body>
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 06:12:21 GMT -->

</html>