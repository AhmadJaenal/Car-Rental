<!DOCTYPE html>
<html lang="en">

<head>
    <title>History Transaction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    @include('layouts.landingpage.partials.nav')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread">History Transactions</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Mobil</th>
                                                <th>Tanggal Rental</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
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
                                                    <td>{{ \App\Models\Mobil::find($tr->id_mobil)->merk }}</td>
                                                    <td>{{ $tr->tgl_rental }}</td>
                                                    <td>{{ $tr->tgl_kembali }}</td>
                                                    <td>{{ $tr->jam_mulai }}</td>
                                                    <td>{{ $tr->jam_selesai }}</td>
                                                    <td>{{ $tr->biaya_sewa }}</td>
                                                    <td>{{ $tr->total }}</td>
                                                    <td>{{ $tr->denda }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn @if ($tr->status_sewa == 'Diterima') btn-success @elseif ($tr->status_sewa == 'Diproses') btn-warning @else btn-danger @endif  btn-sm"
                                                                type="button" id="dropdownMenuSizeButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($tr->status_sewa == 'Diterima')
                                                                    Diterima
                                                                @elseif ($tr->status_sewa =='Ditolak') 
                                                                    Ditolak
                                                                @else
                                                                    Diproses
                                                                @endif
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn @if ($tr->status_pengembalian == 'Sudah') btn-success @else btn-danger @endif  btn-sm"
                                                            type="button" id="dropdownMenuSizeButton3"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            @if ($tr->status_pengembalian == 'Sudah')
                                                                Sudah
                                                            @else
                                                                Belum
                                                            @endif
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn @if ($tr->status_pembayaran == 'Lunas') btn-success @else btn-danger @endif  btn-sm"
                                                                type="button" id="dropdownMenuSizeButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($tr->status_pembayaran == 'Lunas')
                                                                    Lunas
                                                                @else
                                                                    Belum Lunas
                                                                @endif
                                                        </button>
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
            </div>
        </div>
    </section>
    

    @include('layouts.landingpage.partials.footer')


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>