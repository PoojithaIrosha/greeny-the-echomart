<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Admin - Selling History</title>
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
                                        <h1 class="nk-block-title">Selling History</h1>
                                        <nav>
                                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Selling History
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="content-wrapper">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <ul class="navbar-nav mr-lg-2">
                                            <li class="nav-item nav-search d-none d-lg-block">
                                                <div class="input-group">
                                                    <div class="col-12 bg-white mb-3 p-3">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-3 mt-3 mb-3">
                                                                <label class="form-label">Search by Invoice Id</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Invoice ID..."/>
                                                            </div>
                                                            <div class="col-12 col-lg-3 mt-3 mb-3">
                                                                <label class="form-label">From Date:</label>
                                                                <input type="date" class="form-control"/>
                                                            </div>
                                                            <div class="col-12 col-lg-3 mt-3 mb-3">
                                                                <label class="form-label">To Date:</label>
                                                                <input type="date" class="form-control"/>
                                                            </div>
                                                            <div class="col-12 col-lg-3 mt-3 mb-3 d-grid">
                                                                <label class="form-label"></label>
                                                                <button class="btn btn-primary btn-sm fw-bold">Find
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-12 grid-margin stretch-card mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Selling History</h4>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Invoice Id</th>
                                                        <th>Product Name</th>
                                                        <th>Buyer</th>
                                                        <th>Amount</th>
                                                        <th>Quantity</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>01</td>
                                                        <td>Spray Cane</td>
                                                        <td>Menuka Malinda</td>
                                                        <td>2900</td>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <button class="btn btn-success btn-sm">Confirm Order
                                                                </button>
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
                                                                            <li><a href="edit-product.php"><em
                                                                                            class="icon ni ni-edit"></em><span>Edit</span></a>
                                                                            </li>
                                                                            <li><a href="edit-product.php"><em
                                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01</td>
                                                        <td>Spray Cane</td>
                                                        <td>Menuka Malinda</td>
                                                        <td>2900</td>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <button class="btn btn-success btn-sm">Confirm Order
                                                                </button>
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
                                                                            <li><a href="edit-product.php"><em
                                                                                            class="icon ni ni-edit"></em><span>Edit</span></a>
                                                                            </li>
                                                                            <li><a href="edit-product.php"><em
                                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/scripts.js"></script>
</html>

