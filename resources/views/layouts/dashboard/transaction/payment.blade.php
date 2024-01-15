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
                                <p class="card-title mb-0">Top Products</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Peminjam</th>
                                                <th>ID Mobil</th>
                                                <th>ID Admin</th>
                                                <th>Tanggal Rental</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Jam</th>
                                                <th>Biaya Sewa Mobil</th>
                                                <th>Total</th>
                                                <th>Denda</th>
                                                <th>Status Peminjaman</th>
                                                <th>Status Pengembalian</th>
                                                <th>Status Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($transactions as $tr)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $tr->id_user }}</td>
                                                    <td>{{ $tr->id_mobil }}</td>
                                                    <td>{{ $tr->id_admin }}</td>
                                                    <td>{{ $tr->tgl_rental }}</td>
                                                    <td>{{ $tr->tgl_kembali }}</td>
                                                    <td>{{ $tr->jam_mulai }}</td>
                                                    <td>{{ $tr->biaya_sewa }}</td>
                                                    <td>{{ $tr->total }}</td>
                                                    <td>{{ $tr->denda }}</td>
                                                    <td>{{ $tr->status_sewa }}</td>
                                                    <td>{{ $tr->status_pengembalian }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn @if ($tr->status_pembayaran == 'Lunas') btn-success @else btn-danger @endif  btn-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuSizeButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($tr->status_pembayaran == 'Lunas')
                                                                    Lunas
                                                                @else
                                                                    Belum Lunas
                                                                @endif
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuSizeButton3">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('acceptPayment', ['id' => $tr->id_transaksi]) }}">Ya</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('rejectPayment', ['id' => $tr->id_transaksi]) }}">Tidak</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Advanced Table</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="example" class="display expandable-table"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Quote#</th>
                                                            <th>Product</th>
                                                            <th>Business type</th>
                                                            <th>Policy holder</th>
                                                            <th>Premium</th>
                                                            <th>Status</th>
                                                            <th>Updated at</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</body>

</html>
