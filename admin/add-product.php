<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Admin - Add product</title>
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
                                        <h1 class="nk-block-title">Add Product</h1>
                                        <nav>
                                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Add Product
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
                                <form action="#">
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
                                                                                   placeholder="Product Name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="baseprice"
                                                                               class="form-label">Price</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                   id="baseprice"
                                                                                   placeholder="Product price">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group"><label class="form-label">Quantity</label>
                                                                        <div class="row g-gs">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number"
                                                                                           class="form-control"
                                                                                           placeholder="On shelf"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="baseprice" class="form-label">Category</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                   id="#" placeholder="Category">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="baseprice"
                                                                               class="form-label">Brand</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                   id="#" placeholder="Brand">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group"><label class="form-label">Description</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="js-quill" data-toolbar="minimal"
                                                                                 data-placeholder="Write product description here..."></div>
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
                                                            <div class="form-group"><label class="form-label">Upload
                                                                    Media</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="js-upload" id="dropzoneFile1"
                                                                         data-message-icon="img">
                                                                        <div class="dz-message" data-dz-message>
                                                                            <div class="dz-message-icon"></div>
                                                                            <span class="dz-message-text">Drop files here or click to upload.</span>
                                                                            <div class="dz-message-btn mt-2">
                                                                                <button class="btn btn-md btn-primary">
                                                                                    Upload
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                            <button type="submit" class="btn btn-primary">Save Changes
                                                            </button>
                                                        </li>
                                                        <li><a href="products.php" class="btn border-0">Cancel</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/scripts.js"></script>
<div class="offcanvas offcanvas-end offcanvas-size-lg" id="notificationOffcanvas">
    <div class="offcanvas-header border-bottom border-light"><h5 class="offcanvas-title" id="offcanvasTopLabel">Recent
            Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" data-simplebar>
        <ul class="nk-schedule">
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content"><span class="smaller">2:12 PM</span>
                        <div class="h6">Added 3 New Images</div>
                        <ul class="d-flex flex-wrap gap g-2 py-2">
                            <li>
                                <div class="media media-xxl"><img src="../images/product/a.jpg" alt=""
                                                                  class="img-thumbnail"></div>
                            </li>
                            <li>
                                <div class="media media-xxl"><img src="../images/product/b.jpg" alt=""
                                                                  class="img-thumbnail"></div>
                            </li>
                            <li>
                                <div class="media media-xxl"><img src="../images/product/c.jpg" alt=""
                                                                  class="img-thumbnail"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content"><span class="smaller">4:23 PM</span>
                        <div class="h6">Invitation for creative designs pattern</div>
                    </div>
                </div>
            </li>
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content nk-schedule-content-no-border"><span class="smaller">10:30 PM</span>
                        <div class="h6">Task report - uploaded weekly reports</div>
                        <div class="list-group-dotted mt-3">
                            <div class="list-group-wrap">
                                <div class="p-3">
                                    <div class="media-group">
                                        <div class="media rounded-0"><img src="../images/icon/file-type-pdf.svg" alt="">
                                        </div>
                                        <div class="media-text ms-1"><a href="#" class="title">Modern Designs
                                                Pattern</a><span class="text smaller">1.6.mb</span></div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="media-group">
                                        <div class="media rounded-0"><img src="../images/icon/file-type-doc.svg" alt="">
                                        </div>
                                        <div class="media-text ms-1"><a href="#" class="title">Cpanel Upload
                                                Guidelines</a><span class="text smaller">18kb</span></div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="media-group">
                                        <div class="media rounded-0"><img src="../images/icon/file-type-code.svg"
                                                                          alt=""></div>
                                        <div class="media-text ms-1"><a href="#" class="title">Weekly Finance
                                                Reports</a><span class="text smaller">10mb</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content"><span class="smaller">3:23 PM</span>
                        <div class="h6">Assigned you to new database design project</div>
                    </div>
                </div>
            </li>
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content nk-schedule-content-no-border flex-grow-1"><span class="smaller">5:05 PM</span>
                        <div class="h6">You have received a new order</div>
                        <div class="alert alert-info mt-2" role="alert">
                            <div class="d-flex"><em class="icon icon-lg ni ni-file-code opacity-75"></em>
                                <div class="ms-2 d-flex flex-wrap flex-grow-1 justify-content-between">
                                    <div><h6 class="alert-heading mb-0">Business Template - UI/UX design</h6><span
                                                class="smaller">Shared information with your team to understand and contribute to your project.</span>
                                    </div>
                                    <div class="d-block mt-1"><a href="#" class="btn btn-md btn-info"><em
                                                    class="icon ni ni-download"></em><span>Download</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content"><span class="smaller">2:45 PM</span>
                        <div class="h6">Project status updated successfully</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<link rel="stylesheet" href="../assets/css/libs/editors/quill926d.css?v1.1.1"></link>
<script src="../assets/js/libs/editors/quill.js"></script>
<script src="../assets/js/editors/quill.js"></script>
<!-- Mirrored from html.nioboard.themenio.com/ecommerce/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 17:29:10 GMT -->
</html>