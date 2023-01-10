<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
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
                                        <tr>
                                            <td class="tb-col">
                                                <div class="media-group">
                                                    <div class="media media-md media-middle media-circle"><img
                                                                src="../images/avatar/a.jpg" alt="user"></div>
                                                    <div class="media-text">
                                                        <a href="#" class="title">Florenza Desporte</a>
                                                        <span class="small text">florenza@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tb-col">0711234567</td>
                                            <td class="tb-col">194 Waththegama, Kandy</td>
                                            <td class="tb-col tb-col-xl">12345</td>
                                            <td class="tb-col">2022/04/25</td>
                                            <td>
                                                <div class="d-flex justify-content-center form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                           id="flexSwitchCheckChecked" checked>
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
                                                                    <a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tb-col">
                                                <div class="media-group">
                                                    <div class="media media-md media-middle media-circle"><img
                                                                src="../images/avatar/a.jpg" alt="user"></div>
                                                    <div class="media-text">
                                                        <a href="#" class="title">Florenza Desporte</a>
                                                        <span class="small text">florenza@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tb-col">0711234567</td>
                                            <td class="tb-col">194 Waththegama, Kandy</td>
                                            <td class="tb-col tb-col-xl">12345</td>
                                            <td class="tb-col">2022/04/25</td>
                                            <td>
                                                <div class="d-flex justify-content-center form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                           id="flexSwitchCheckChecked" checked>
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
                                                                    <a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
            <?php require "footer.php" ?>
        </div>
    </div>
</div>
</body>
<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/scripts.js"></script>
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title" id="addUserModalLabel">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="form-group"><label for="firstname" class="form-label">First Name</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                                                      placeholder="First name"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label for="lastname" class="form-label">Last Name</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                                                      placeholder="Last name"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label for="email" class="form-label">Email Address</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                                                      placeholder="Email address"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label for="status" class="form-label">Status</label>
                                <div class="form-control-wrap"><select class="js-select" data-search="true"
                                                                       data-sort="false">
                                        <option value="">Select a status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Active</option>
                                        <option value="3">Inactive</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group"><label for="role" class="form-label">Role</label>
                                <div class="form-control-wrap"><select class="js-select" data-search="true"
                                                                       data-sort="false">
                                        <option value="">Select a role</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Developer</option>
                                        <option value="3">Analyst</option>
                                        <option value="4">Support</option>
                                        <option value="5">Trial</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex gap g-2">
                                <div class="gap-col">
                                    <button class="btn btn-primary" type="submit">Add User</button>
                                </div>
                                <div class="gap-col">
                                    <button type="button" class="btn border-0" data-bs-dismiss="modal">Discard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script src="../assets/js/data-tables/data-tables.js"></script>
<!-- Mirrored from html.nioboard.themenio.com/user-manage/user-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 17:29:04 GMT -->
</html>