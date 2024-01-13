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
        <div class="modal-content mt-3 mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data Transaksi</h5>
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
                <form action="{{ route('transaction', ['id_mobil' => request()->id_mobil]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="@if (auth()->user()) {{ auth()->user()->username }} @endif" readonly>
                        <label for="merek" class="col-form-label">Merek</label>
                        <input type="text" class="form-control" id="merek" value="{{ $car->merk }}" required>
                        <label for="tgl_rental" class="col-form-label">Mulai Tanggal</label>
                        <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>

                        <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>

                        @if (request()->model == 'hour')
                            <label for="jam_selesai" class="col-form-label">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                        @endif

                        @if (request()->model == 'day')
                            <label for="tgl_pengembalian" class="col-form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                        @endif

                        <label for="total_durasi" class="col-form-label">Total Durasi</label>
                        <input type="text" class="form-control" id="total_durasi" readonly>
                        <label for="biaya_sewa" class="col-form-label">Biaya Sewa</label>
                        <input type="text" class="form-control" id="biaya_sewa" name="biaya_sewa"
                            value="{{ $car->sewa_perjam }}" readonly>
                        <label for="total" class="col-form-label">Total Harga</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                        {{-- <label for="paymentMethod" class="col-form-label">Metode Pembayaran</label> --}}
                        {{-- <div class="col-form-label">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="transferOption" value="option1" onclick="showTransferDetails()">
                                <label class="form-check-label" for="transferOption" id="transferLabel">
                                    Transfer
                                </label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="cashOption"
                                    value="option2" onclick="showCashDetails()">
                                <label class="form-check-label" for="cashOption" id="cashLabel">
                                    Cash
                                </label>
                            </div>
                        </div> --}}

                        {{-- <div id="transferDetails" style="display: none;">
                            <label>
                                Transfer sesuai dengan total ke
                                <strong>12348723402</strong>
                                atas nama
                                <strong>Aawaall</strong>
                                dan kirim bukti pembayaran
                                <br>
                                <img id="previewiTf" style="visibility:hidden;" class="rounded mx-auto d-block mt-2"
                                    width="200" alt="buktiPembayaran">
                                <div class="mb-3">
                                    <label for="buktiPembayaran" class="form-label">Upload bukti pembayaran</label>
                                    <input class="form-control" type="file" id="buktiPembayaran"
                                        name="buktiPembayaran" onchange="previewImage('previewiTf','buktiPembayaran')"
                                        accept="image/*">
                                </div>
                            </label>
                        </div>

                        <div id="cashDetails" style="display: none;">
                            <label>
                                Pembayaran cash dilakukan ditempat saat pengambilan mobil
                            </label>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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

        total_durasi.value = selisihHari;

        const total_harga = biaya_sewa * selisihHari;
        input_total_harga.value = total_harga;
        console.log(typeof selisihHari);

    }
</script>



<script>
    function showTransferDetails() {
        document.getElementById('transferDetails').style.display = 'block';
        document.getElementById('cashDetails').style.display = 'none';
    }

    function showCashDetails() {
        document.getElementById('transferDetails').style.display = 'none';
        document.getElementById('cashDetails').style.display = 'block';
    }
</script>

</html>
