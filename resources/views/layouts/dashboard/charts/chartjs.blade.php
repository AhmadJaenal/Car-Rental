<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chart</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('css/vendors/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('css/vendors/ti-icons/css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('layouts.dashboard.partials._navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            @include('layouts.dashboard.partials._settings-panel')
            <!-- partial -->

            <!-- partial:../../partials/_sidebar.html -->
            @include('layouts.dashboard.partials._sidebar')
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Line chart</h4>
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Bar chart</h4>
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Area chart</h4>
                                    <canvas id="areaChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Doughnut chart</h4>
                                    <canvas id="doughnutChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pie chart</h4>
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Scatter chart</h4>
                                    <canvas id="scatterChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('layouts.dashboard.partials._footer')
                <!-- partial -->

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('css/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('css/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>

    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>

    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/chart.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
