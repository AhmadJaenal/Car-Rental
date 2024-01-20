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
                <form
                    action="{{ route('transaction', ['id_mobil' => request()->id_mobil, 'jenis_sewa' => request()->model]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="@if (auth()->user()) {{ auth()->user()->username }} @endif" readonly>
                        <label for="merek" class="col-form-label">Merek</label>
                        <input type="text" class="form-control" id="merek" value="{{ $car->merk }}" readonly>
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
                        <a href="{{ route('pricing') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
