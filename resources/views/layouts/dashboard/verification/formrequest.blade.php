<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Request</title>
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
                                <h4 class="card-title">Form verifikasi data diri</h4>
                                <p class="card-description">
                                    Isi dengan benar sebagai bahan pertimbangan untuk penyewaan mobil
                                </p>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="forms-sample" action="{{ route('requestVerificationAction') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="numeric" class="form-control" id="nik" name="nik"
                                            placeholder="NIK" pattern="[0-9]+" max="16" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Hp</label>
                                        <input type="nohp" class="form-control" id="nohp" name="nohp"
                                            placeholder="No Hp">
                                    </div>
                                    <div class="form-group">
                                        <label>File Foto Diri</label>
                                        <div class="col-md-2">
                                            <img id="previewFotoDiri" style="visibility:hidden;"
                                                class="rounded mx-auto d-block" width="200" alt="foto_diri">
                                        </div><br>
                                        <input type="file" id="foto_diri" name="foto_diri"
                                            class="file-upload-default foto_diri"
                                            onchange="previewImage('previewFotoDiri','foto_diri')" accept="image/*"
                                            required>
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
                                        <label>File Foto KTP</label>
                                        <div class="col-md-2">
                                            <img id="previewiKTP" style="visibility:hidden;"
                                                class="rounded mx-auto d-block" width="200" alt="foto_ktp">
                                        </div><br>
                                        <input type="file" id="foto_ktp" name="foto_ktp"
                                            class="file-upload-default foto_ktp"
                                            onchange="previewImage('previewiKTP','foto_ktp')" accept="image/*" required>
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
                                        <label for="provinsi">Provinsi</label>
                                        <input type="provinsi" class="form-control" id="provinsi" name="provinsi"
                                            placeholder="provinsi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="kota" class="form-control" id="kota" name="kota"
                                            placeholder="kota" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jalan">Jalan</label>
                                        <input type="jalan" class="form-control" id="jalan" name="jalan"
                                            placeholder="Jalan" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
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
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="../../vendors/select2/select2.min.js"></script>
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
