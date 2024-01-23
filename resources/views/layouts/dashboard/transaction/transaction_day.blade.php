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
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Transaksi</h5>
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
                    <form action="{{ route('transaction', ['id_mobil' => $car->id_mobil, 'jenis_sewa' => 'day']) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <label for="merek" class="col-form-label">Merek</label>
                            <input type="text" class="form-control" id="merek" value="{{ $car->merk }}"
                                readonly>
                            <label for="tgl_rental" class="col-form-label">Mulai Tanggal</label>
                            <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>

                            <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>

                            <label for="tgl_kembali" class="col-form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>

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
                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    </div>

</body>
<script>
    var tgl_rental = document.getElementById('tgl_rental');
    var tgl_kembali = document.getElementById('tgl_kembali');

    var biaya_sewa = document.getElementById('biaya_sewa').value;
    var input_total_harga = document.getElementById('total');

    tgl_rental.addEventListener('input', showValue);
    tgl_kembali.addEventListener('input', showValue);

    function showValue() {
        var tgl_awal = new Date(tgl_rental.value);
        var tgl_akhir = new Date(tgl_kembali.value);

        var selisihWaktu = tgl_akhir - tgl_awal;

        var selisihHari = selisihWaktu / (1000 * 60 * 60 * 24);

        if (selisihHari >= 0) {
            total_durasi.value = selisihHari;
            const total_harga = biaya_sewa * selisihHari;
            input_total_harga.value = total_harga;
        }

        console.log(typeof selisihHari);

    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</html>
