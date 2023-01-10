<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Admin - Dashboard</title>
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
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="row g-gs">
                                <div class="col-xl-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="card-title">
                                                        <h4 class="title mb-1">Congratulations Smith!</h4>
                                                        <p class="small">Best seller of the month</p>
                                                    </div>
                                                    <div class="my-3">
                                                        <div class="amount h2 fw-bold text-primary">$42.5k</div>
                                                        <div class="smaller">You have done 69.5% more sales today.</div>
                                                    </div>
                                                    <a href="#" class="btn btn-sm btn-primary">View Sales</a></div>
                                                <div class="d-none d-sm-block d-xl-none d-xxl-block me-md-5 me-xxl-0">
                                                    <img src="images/award/a.png" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h4 class="title">New Visitors</h4>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end gap g-2">
                                                <div class="flex-grow-1">
                                                    <div class="smaller"><strong class="text-base">48%</strong> new
                                                        visitors <span class="d-block">this week.</span></div>
                                                    <div class="d-flex align-items-center mt-1">
                                                        <div class="amount h2 mb-0 fw-bold">16,328</div>
                                                        <div class="change up smaller ms-1"><em
                                                                    class="icon ni ni-trend-up"></em> 48
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-chart-ecommerce-visitor">
                                                    <canvas data-nk-chart="bar" id="visitorChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h4 class="title">Activity</h4>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end gap g-2">
                                                <div class="flex-grow-1">
                                                    <div class="smaller"><strong class="text-base">70%</strong> new
                                                        activity <span class="d-block">this week.</span></div>
                                                    <div class="d-flex align-items-center mt-1">
                                                        <div class="amount h2 mb-0 fw-bold">89,720</div>
                                                        <div class="change up smaller ms-1"><em
                                                                    class="icon ni ni-trend-up"></em> 38
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-chart-ecommerce-activity">
                                                    <canvas data-nk-chart="line" id="activityChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-8">
                                    <div class="card h-100">
                                        <div class="row g-0 col-sep col-sep-md">
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <div class="card-title-group mb-4">
                                                        <div class="card-title">
                                                            <h4 class="title">Total Profit</h4>
                                                        </div>
                                                    </div>
                                                    <div class="nk-chart-ecommerce-total-profit">
                                                        <canvas data-nk-chart="bar" id="totalProfitChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body d-flex flex-column justify-content-center">
                                                    <div class="total-profit-data">
                                                        <div class="amount-wrap pb-4">
                                                            <div class="amount h2 mb-0 fw-bold">$842.50k</div>
                                                            <span class="smaller">Last month balance $428.20k</span>
                                                        </div>
                                                        <ul class="nk-data-list-group d-flex flex-column flex-sm-row flex-md-column gap g-4">
                                                            <li class="nk-data-list-item">
                                                                <div class="media media-middle media-circle text-bg-primary-soft">
                                                                    <em class="icon ni ni-coins"></em></div>
                                                                <div class="amount-wrap">
                                                                    <div class="amount h3 mb-0">$68,740</div>
                                                                    <span class="smaller">Total Income</span></div>
                                                            </li>
                                                            <li class="nk-data-list-item">
                                                                <div class="media media-middle media-circle text-bg-success-soft">
                                                                    <em class="icon ni ni-trend-up"></em></div>
                                                                <div class="amount-wrap">
                                                                    <div class="amount h3 mb-0">$38,643</div>
                                                                    <span class="smaller">Total Profit</span></div>
                                                            </li>
                                                            <li class="nk-data-list-item">
                                                                <div class="media media-middle media-circle text-bg-secondary-soft">
                                                                    <em class="icon ni ni-coin-alt"></em></div>
                                                                <div class="amount-wrap">
                                                                    <div class="amount h3 mb-0">$12,836</div>
                                                                    <span class="smaller">Total Expense</span></div>
                                                            </li>
                                                        </ul>
                                                        <div class="pt-5"><a href="#" class="btn btn-primary">View
                                                                Report</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <div class="row g-gs">
                                        <div class="col-sm-6 col-xl-3 col-xxl-6">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="media media-middle media-circle text-bg-warning mb-3">
                                                        <em class="icon ni ni-trend-up"></em></div>
                                                    <h5>Transactions</h5>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="amount h4 mb-0">$14.3k</div>
                                                        <div class="change up smaller ms-1"><em
                                                                    class="icon ni ni-plus"></em> 12%
                                                        </div>
                                                    </div>
                                                    <p class="small">Daily Transactions</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-3 col-xxl-6">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="media media-middle media-circle text-bg-success mb-3">
                                                        <em class="icon ni ni-sign-mxn"></em></div>
                                                    <h5>Revenue</h5>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="amount h4 mb-0">$37.2k</div>
                                                        <div class="change up smaller ms-1"><em
                                                                    class="icon ni ni-plus"></em> 18%
                                                        </div>
                                                    </div>
                                                    <p class="small">Revenue Increase</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-3 col-xxl-6">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="text-center amount h4 mb-3">185k</div>
                                                    <div class="text-center">
                                                        <div class="nk-chart-ecommerce-knob js-pureknob" data-size="120"
                                                             data-value="65" data-angle-offset="-0.5"
                                                             data-angle-start="0.5" data-angle-end="0.5"
                                                             data-color-fg="#0EA5E9"></div>
                                                        <p class="small mt-3">Total Sales</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-3 col-xxl-6">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="text-center amount h4 mb-0">$64.35k</div>
                                                    <div class="nk-chart-ecommerce-total-revenue">
                                                        <canvas data-nk-chart="line" id="totalRevenueChart"></canvas>
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="small mt-3">Total Revenue</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div class="card h-100">
                                        <div class="card-body flex-grow-0 py-2">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h4 class="title">Top Selling Products</h4>
                                                </div>
                                                <div class="card-tools">
                                                    <div class="dropdown"><a href="#"
                                                                             class="btn btn-sm btn-icon btn-zoom me-n1"
                                                                             data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-v"></em></a>
                                                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                            <li>
                                                                <div class="dropdown-header pt-2 pb-0">
                                                                    <h6 class="mb-0">Options</h6>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a href="#" class="dropdown-item">Low to high</a></li>
                                                            <li><a href="#" class="dropdown-item">High to low</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-middle mb-0">
                                                <thead class="table-light table-head-sm">
                                                <tr>
                                                    <th class="tb-col"><span class="overline-title">products</span></th>
                                                    <th class="tb-col tb-col-end tb-col-sm text-center"><span
                                                                class="overline-title">Description</span></th>
                                                    <th class="tb-col tb-col-end tb-col-sm"><span
                                                                class="overline-title">price</span></th>
                                                    <th class="tb-col tb-col-end tb-col-sm"><span
                                                                class="overline-title">qty</span></th>
                                                    <th class="tb-col tb-col-end tb-col-sm"><span
                                                                class="overline-title">unit</span></th>
                                                    <th class="tb-col tb-col-end tb-col-sm text-center"><span
                                                                class="overline-title">status</span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="tb-col">
                                                        <div class="media-group">
                                                            <div class="media media-md flex-shrink-0 media-middle media-circle">
                                                                <img src="images/product/a.jpg" alt=""></div>
                                                            <div class="media-text"><span
                                                                        class="title">Nike v22 Running</span</div>
                                                        </div>
                                                    </td>
                                                    <td class="tb-col tb-col-end tb-col-sm text-center"><span
                                                                class="small">Best quality oranges from mandarin</span>
                                                    </td>
                                                    <td class="tb-col tb-col-end tb-col-sm"><span
                                                                class="small">$130.20</span></td>
                                                    <td class="tb-col tb-col-end tb-col-sm"><span
                                                                class="small">38</span></td>
                                                    <td class="tb-col tb-col-end tb-col-sm"><span
                                                                class="small">Kg</span></td>
                                                    <td class="tb-col tb-col-end tb-col-sm">
                                                        <div class="d-flex justify-content-center form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                   role="switch" id="flexSwitchCheckChecked" checked>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h4 class="title">Sales Analytics</h4>
                                                </div>
                                                <div class="card-tools">
                                                    <div class="dropdown"><a href="#"
                                                                             class="btn btn-sm btn-icon btn-zoom me-n1"
                                                                             data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-v"></em></a>
                                                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                            <li>
                                                                <div class="dropdown-header pt-2 pb-0">
                                                                    <h6 class="mb-0">Options</h6>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a href="#" class="dropdown-item">7 Days</a></li>
                                                            <li><a href="#" class="dropdown-item">15 Days</a></li>
                                                            <li><a href="#" class="dropdown-item">30 Days</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-chart-ecommerce-sales-analytics mt-3">
                                                <canvas data-nk-chart="line" id="salesAnalyticsChart"></canvas>
                                            </div>
                                            <div class="chart-legend-group justify-content-center gap gx-4 pt-3">
                                                <div class="gap-col">
                                                    <div class="chart-legend"><span class="dot bg-warning"></span>
                                                        <div class="chart-legend-text">
                                                            <div class="title">Total Sales</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gap-col">
                                                    <div class="chart-legend"><span class="dot bg-danger"></span>
                                                        <div class="chart-legend-text">
                                                            <div class="title">Total Orders</div>
                                                        </div>
                                                    </div>
                                                </div>
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
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<div class="offcanvas offcanvas-end offcanvas-size-lg" id="notificationOffcanvas">
    <div class="offcanvas-header border-bottom border-light">
        <h5 class="offcanvas-title" id="offcanvasTopLabel">Recent Notification</h5>
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
                                <div class="media media-xxl"><img src="images/product/a.jpg" alt=""
                                                                  class="img-thumbnail"></div>
                            </li>
                            <li>
                                <div class="media media-xxl"><img src="images/product/b.jpg" alt=""
                                                                  class="img-thumbnail"></div>
                            </li>
                            <li>
                                <div class="media media-xxl"><img src="images/product/c.jpg" alt=""
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
                                        <div class="media rounded-0"><img src="images/icon/file-type-pdf.svg" alt="">
                                        </div>
                                        <div class="media-text ms-1"><a href="#" class="title">Modern Designs
                                                Pattern</a><span class="text smaller">1.6.mb</span></div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="media-group">
                                        <div class="media rounded-0"><img src="images/icon/file-type-doc.svg" alt="">
                                        </div>
                                        <div class="media-text ms-1"><a href="#" class="title">Cpanel Upload
                                                Guidelines</a><span class="text smaller">18kb</span></div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="media-group">
                                        <div class="media rounded-0"><img src="images/icon/file-type-code.svg" alt="">
                                        </div>
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
                                    <div>
                                        <h6 class="alert-heading mb-0">Business Template - UI/UX design</h6><span
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
<script src="assets/js/charts/ecommerce-chart.js"></script>
<!-- Mirrored from html.nioboard.themenio.com/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 17:28:48 GMT -->

</html>