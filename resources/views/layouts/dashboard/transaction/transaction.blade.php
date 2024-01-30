<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('css/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('css/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.dashboard.partials._navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('layouts.dashboard.partials._settings-panel')
            <!-- partial -->

            <!-- partial:partials/_sidebar.html -->
            @include('layouts.dashboard.partials._sidebar')
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Transaksi</h4>


                                @foreach ($carData as $car)
                                    @if ('')
                                        @include('layouts.dashboard.transaction.transaction_day', [
                                            'id_mobil' => $car->id_mobil,
                                            'jenis_sewa' => 'day',
                                        ])
                                    @else
                                        @include('layouts.dashboard.transaction.transaction_hour', [
                                            'id_mobil' => $car->id_mobil,
                                            'jenis_sewa' => 'hour',
                                        ])
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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
    <script src="{{ asset('css/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('css/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sewaPerHariLink = document.getElementById('sewaPerHari');
            const sewaPerJamLink = document.getElementById('sewaPerJam');

            function handleClick(clickedLink) {
                event.preventDefault(); // Mencegah navigasi ke URL

                clickedLink.classList.add('active');
                clickedLink.classList.remove('btn-secondary'); // Hapus kelas sebelumnya

                const otherLink = clickedLink === sewaPerHariLink ? sewaPerJamLink : sewaPerHariLink;
                otherLink.classList.remove('active');
                otherLink.classList.add('btn-secondary'); // Kembalikan ke kelas default
            }

            sewaPerHariLink.addEventListener('click', function(event) {
                handleClick(sewaPerHariLink);
            });

            sewaPerJamLink.addEventListener('click', function(event) {
                handleClick(sewaPerJamLink);
            });
            const jenisSewa = sewaPerHariLink.getAttribute('data-jenis-sewa');
        });
    </script>
</body>

</html>