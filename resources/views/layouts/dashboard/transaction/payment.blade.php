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
                                <form action="{{ route('payment') }}" method="GET">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-outline-secondary rounded-0">
                                            <i class="icon-search"></i>
                                            </span>
                                        </button>
                                        <input type="text" class="form-control" name="search" id="search"
                                            placeholder="Search now" aria-label="search" aria-describedby="search"
                                            autofocus>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Peminjam</th>
                                                <th>NOPOL</th>
                                                <th>Tanggal Rental</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Biaya Sewa Mobil</th>
                                                <th>Denda</th>
                                                <th>Total</th>
                                                <th>Status Sewa</th>
                                                <th>Tanggal Pengembalian</th>
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
                                                    @php
                                                        $user = \App\Models\User::find($tr->id_user);
                                                    @endphp
                                                    @if ($user)
                                                        <td>{{ $user->username }}</td>
                                                    @else
                                                        <td>{{ $tr->id_user }}</td>
                                                    @endif
                                                    <td>{{ \App\Models\Mobil::find($tr->id_mobil)->no_plat }}</td>
                                                    <td>{{ $tr->tgl_rental }}</td>
                                                    <td>{{ $tr->tgl_kembali }}</td>
                                                    <td>{{ $tr->jam_mulai }}</td>
                                                    <td>{{ $tr->jam_selesai}}</td>
                                                    <td>{{ $tr->biaya_sewa }}</td>
                                                    <td>{{ $tr->denda }}</td>
                                                    <td>{{ $tr->total }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn @if ($tr->status_sewa == 'Diterima') btn-success @elseif ($tr->status_sewa == 'Diproses') btn-warning @else btn-danger @endif  btn-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuSizeButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($tr->status_sewa == 'Diterima')
                                                                    Diterima
                                                                @elseif ($tr->status_sewa == 'Ditolak')
                                                                    Ditolak
                                                                @else
                                                                    Diproses
                                                                @endif
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuSizeButton3">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('acceptSewa', ['id' => $tr->id_transaksi]) }}">Diterima</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('rejectSewa', ['id' => $tr->id_transaksi]) }}">Ditolak</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{-- <div class="dropdown">
                                                            <button
                                                                class="btn @if ($tr->status_pengembalian == 'Sudah') btn-success @else btn-danger @endif  btn-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuSizeButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($tr->status_pengembalian == 'Sudah')
                                                                    Sudah
                                                                @else
                                                                    Belum
                                                                @endif
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuSizeButton3">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('acceptPengembalian', ['id' => $tr->id_transaksi]) }}">Sudah</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('rejectPengembalian', ['id' => $tr->id_transaksi]) }}">Belum</a>
                                                            </div>
                                                        </div> --}}
                                                        <form action="{{ route('tglPengembalian', ['id' => $tr->id_transaksi]) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="time" class="form-control" id="time" name="time" required value="{{ $tr->jam_pengembalian }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="date" class="form-control" id="date" name="date" required value="{{ $tr->tgl_pengembalian }}">
                                                                </div>
                                                            </div>
                                                            <button type="submit" hidden></button>
                                                        </form>
                                                        
                                                    </td>
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
                                                                    href="{{ route('acceptPayment', ['id' => $tr->id_transaksi]) }}">Lunas</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('rejectPayment', ['id' => $tr->id_transaksi]) }}">Belum
                                                                    Lunas</a>
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
