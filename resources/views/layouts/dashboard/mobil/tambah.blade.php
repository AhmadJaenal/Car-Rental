<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
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
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Data Mobil</h4>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endif
                                    <form class="forms-sample" action="{{route('tambahdatamobil')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="no_plat">No Plat</label>
                                            <input type="text" class="form-control" name="no_plat" id="no_plat"
                                                placeholder="No Plat" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="merk">Merk</label>
                                            <input type="text" class="form-control" name="merk" id="merk"
                                                placeholder="Merk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="warna">Warna</label>
                                            <input type="text" class="form-control" name="warna" id="warna"
                                                placeholder="Warna" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input type="number" class="form-control" name="tahun" id="tahun"
                                                placeholder="Tahun" required>
                                        </div>
                                        {{-- penting --}}
                                        <div class="form-group">
                                            <label for="sewa_perjam">Sewa Perjam</label>
                                            <input type="number" class="form-control" name="sewa_perjam" id="sewa_perjam"
                                                placeholder="Sewa Perjam" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sewa_perhari">Sewa Perhari</label>
                                            <input type="number" class="form-control" name="sewa_perhari" id="sewa_perhari"
                                                placeholder="Sewa Perhari" required>
                                        </div>
                                        <div class="form-group">
                                            <label>File Foto Mobil</label>
                                            <div class="col-md-2">
                                                <img id="previewMobil" style="visibility:hidden;"
                                                    class="rounded mx-auto d-block" width="200" alt="foto_mobil">
                                            </div><br>
                                            <input type="file" id="foto_mobil" name="foto_mobil"
                                                class="file-upload-default foto_mobil"
                                                onchange="previewImage('previewMobil','foto_mobil')" accept="image/*">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
    
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <input type="text" class="form-control" name="id_kategori"
                                                id="id_kategori" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                                        <a class="btn btn-light" href="{{route('tampilmobil')}}">Batal</a>
                                    </form>
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
    <script>
        function previewImage(preview, imageInputId) {
            var preview = document.getElementById(preview);
            var fileInput = document.getElementById(imageInputId);
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
            preview.style.visibility = "visible";
        }
    </script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
