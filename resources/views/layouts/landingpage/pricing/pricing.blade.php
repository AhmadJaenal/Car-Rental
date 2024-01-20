<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pricing</title>
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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Pricing</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="car-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="bg-primary heading">Per Hour Rate</th>
                                    <th class="bg-dark heading">Per Day Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                    @if ($car->status == 'aktif')
                                        <tr class="">
                                            <td class="car-image">
                                                <div class="img"
                                                    style="background-image:url('images/mobil/{{ $car->gambar }}');"></div>
                                            </td>
                                            <td class="product-name">
                                                <h3>{{ $car->merk }}</h3>
                                                <p class="mb-0 rated">
                                                    <span>rated:</span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                </p>
                                            </td>

                                            <td class="price">
                                                @if (auth()->user())
                                                    <p class="btn-custom">
                                                        <a href="{{ route('formTransactionHour', ['id_mobil' => $car->id_mobil, 'model' => 'hour']) }}"
                                                            class="btn btn-primary">Rent a car</a>
                                                    </p>
                                                @else
                                                    <p class="btn-custom">
                                                        <a href="{{ route('login') }}" class="btn btn-primary">
                                                            Login
                                                        </a>
                                                    </p>
                                                @endif
                                                <div class="price-rate">
                                                    <h3>
                                                        <span class="num"><small class="currency">$</small>
                                                            {{ $car->sewa_perjam }}</span>
                                                        <span class="per">/per hour</span>
                                                    </h3>
                                                    <span class="subheading">$3/hour fuel surcharges</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                @if (auth()->user())
                                                    <p class="btn-custom">
                                                        <a href="{{ route('formTransactionDay', ['id_mobil' => $car->id_mobil, 'model' => 'day']) }}"
                                                            class="btn btn-primary">Rent a car</a>
                                                    </p>
                                                @else
                                                    <p class="btn-custom">
                                                        <a href="{{ route('login') }}" class="btn btn-primary">
                                                            Login
                                                        </a>
                                                    </p>
                                                @endif
                                                <div class="price-rate">
                                                    <h3>
                                                        <span class="num"><small class="currency">$</small>
                                                            {{ $car->sewa_perhari }}</span>
                                                        <span class="per">/per day</span>
                                                    </h3>
                                                    <span class="subheading">$3/hour fuel surcharges</span>
                                                </div>
                                            </td>

                                        </tr><!-- END TR-->
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
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

</body>

</html>
