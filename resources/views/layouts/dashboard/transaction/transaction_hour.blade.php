<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Transaction</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
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
</head>


<body>
    <div class="col-5 mx-auto">
        <div class="modal-content mt-3 mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Transaksi perjam</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="modal-body">
                @foreach ($carData as $car)
                    <form
                        action="{{ route('transaction', ['id_mobil' => $car->id_mobil, 'jenis_sewa' => 'hour', 'jenis_transaksi' => 'offline']) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                            <label for="merek" class="col-form-label">Merek</label>
                            <input type="text" class="form-control" id="merek" value="{{ $car->merk }}"
                                readonly>
                            <label for="tgl_rental" class="col-form-label">Mulai Tanggal</label>
                            <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>

                            <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>

                            <label for="jam_selesai" class="col-form-label">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>

                            <label for="total_durasi" class="col-form-label">Total Durasi</label>
                            <input type="text" class="form-control" id="total_durasi" readonly>
                            <label for="biaya_sewa" class="col-form-label">Biaya Sewa</label>
                            <input type="text" class="form-control" id="biaya_sewa" name="biaya_sewa"
                                value="{{ $car->sewa_perjam }}" readonly>
                            <label for="total" class="col-form-label">Total Harga</label>
                            <input type="text" class="form-control" id="total" name="total" readonly>
                            <br>
                            <div id="cashDetails">
                                <label>
                                    Pembayaran cash dilakukan ditempat saat pengambilan mobil
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('pricing') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="{{ route('payment') }}" class="btn btn-primary">Go to Transaction</a>

                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    </div>

</body>
<script>
    var jam_mulai = document.getElementById('jam_mulai');
    var jam_selesai = document.getElementById('jam_selesai');

    var biaya_sewa = document.getElementById('biaya_sewa').value;
    var input_total_harga = document.getElementById('total');

    jam_mulai.addEventListener('input', showValue);
    jam_selesai.addEventListener('input', showValue);

    function showValue() {
        const jamMulaiString = jam_mulai.value;
        const splitJamMulai = jamMulaiString.split(':');
        const jamMulaiInt = parseInt(splitJamMulai[0], 10);
        const menitMulaiInt = parseInt(splitJamMulai[1], 10);

        const jamSelesaiString = jam_selesai.value;
        const splitJamSelesai = jamSelesaiString.split(':');
        const jamSelesaiInt = parseInt(splitJamSelesai[0], 10);
        const menitSelesaiInt = parseInt(splitJamSelesai[1], 10);

        const totalDurasi = ((jamSelesaiInt - jamMulaiInt) * 60) + (menitSelesaiInt - menitMulaiInt);
        total_durasi.value = totalDurasi;

        total_harga = totalDurasi * biaya_sewa;
        total.value = total_harga;
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</html>
