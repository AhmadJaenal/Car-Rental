<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Transaction</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <div class="col-5 mx-auto">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->verifikasi)
                    <h2>Verifikasi data diri sudah berhasil</h2>
                @else
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
                    <form class="forms-sample" action="{{ route('requestVerificationAction') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="numeric" class="form-control" id="nik" name="nik" placeholder="NIK"
                                pattern="[0-9]+" max="16" required>
                        </div>
                        <div class="form-group">
                            <label for="nohp">No Hp</label>
                            <input type="nohp" class="form-control" id="nohp" name="nohp"
                                placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <label>File Foto Diri</label>
                            <div class="col-md-2">
                                <img id="previewFotoDiri" style="visibility:hidden;" class="rounded mx-auto d-block"
                                    width="200" alt="foto_diri">
                            </div><br>
                            <input type="file" id="foto_diri" name="foto_diri" class="file-upload-default foto_diri"
                                onchange="previewImage('previewFotoDiri','foto_diri')" accept="image/*" required>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Foto KTP</label>
                            <div class="col-md-2">
                                <img id="previewiKTP" style="visibility:hidden;" class="rounded mx-auto d-block"
                                    width="200" alt="foto_ktp">
                            </div><br>
                            <input type="file" id="foto_ktp" name="foto_ktp" class="file-upload-default foto_ktp"
                                onchange="previewImage('previewiKTP','foto_ktp')" accept="image/*" required>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

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
                        <button onclick="goBack()" class="btn btn-light" >Cancel</button>
                    </form>
                @endif
            </div>

        </div>
    </div>

</body>
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
    function goBack() {
            window.history.back();
        }
</script>

</html>
