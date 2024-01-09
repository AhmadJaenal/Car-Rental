<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verification Request</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('css/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('css/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_css.css') }}">
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
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>Foto KTP</th>
                                                <th>Foto Diri</th>
                                                <th>Provinsi</th>
                                                <th>Kota</th>
                                                <th>Jalan</th>
                                                <th>Terverifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usersRequest as $user)
                                                <tr>
                                                    <td>{{ $user->nik }}</td>
                                                    <td class="font-weight-bold">{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/foto_ktp/' . $user->foto_ktp) }}"
                                                            class="rounded mx-auto d-block zoomable-image"
                                                            width="500" height="400">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('images/foto_diri/' . $user->foto_diri) }}"
                                                            class="rounded mx-auto d-block zoomable-image"
                                                            width="500" height="400">
                                                    </td>
                                                    <td>{{ $user->provinsi }}</td>
                                                    <td>{{ $user->kota }}</td>
                                                    <td>{{ $user->jalan }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn @if ($user->verifikasi) btn-success @else btn-danger @endif  btn-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuSizeButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($user->verifikasi)
                                                                    Ya
                                                                @else
                                                                    Tidak
                                                                @endif
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuSizeButton3">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('acceptDataRequest', ['id' => $user->id_peminjam]) }}">Ya</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('rejectDataRequest', ['id' => $user->id_peminjam]) }}">Tidak</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.querySelectorAll('.zoomable-image');
            var modal = document.createElement('div');
            modal.className = 'zoomable-image-modal';

            images.forEach(function(image) {
                image.addEventListener('click', function() {
                    var clonedImage = image.cloneNode(true);
                    modal.innerHTML = '';
                    modal.appendChild(clonedImage);
                    document.body.appendChild(modal);
                    modal.style.display = 'flex';
                });
            });

            modal.addEventListener('click', function() {
                modal.style.display = 'none';
            });
        });
    </script>

</body>

</html>
