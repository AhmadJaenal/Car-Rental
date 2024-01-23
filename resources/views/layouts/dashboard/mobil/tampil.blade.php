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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Mobil</h4>
                                    <form action="{{ route('tampilmobil') }}" method="GET">
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-outline-secondary rounded-0">
                                                <i class="icon-search"></i>
                                                </span>
                                            </button>
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="Search now" aria-label="search" aria-describedby="search"
                                                autofocus>
                                        </div>
                                    </form>
                                    <a href='{{ route('tambahmobil') }}' class="btn btn-success mt-2">Tambah</a>
                                    <a href='{{ route('pdf') }}' class="btn btn-danger mt-2">Export PDF</a>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endif
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th scope="col">No</th>
                                                <th scope="col">No Plat</th>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Merk</th>
                                                <th scope="col">Warna</th>
                                                <th scope="col">Tahun</th>
                                                <th scope="col">Perjam</th>
                                                <th scope="col">Perhari</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col" style="text-align: center">Aksi</th>
                                            </thead>
                                            </tbody>

                                            @php
                                                $no = 1;
                                                $bantu = 0;
                                            @endphp
                                            @foreach ($cars as $index => $car)
                                                <tr>
                                                    <td>{{ $index + $cars->firstItem() - $bantu }}</td>
                                                    <td>{{ $car->no_plat }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/mobil/' . $car->gambar) }}"
                                                            class="rounded mx-auto d-block zoomable-image"
                                                            width="500" height="400">
                                                    </td>
                                                    <td class="font-weight-bold">{{ $car->merk }}</td>
                                                    <td>{{ $car->warna }}</td>
                                                    <td>{{ $car->tahun }}</td>
                                                    <td>{{ $car->sewa_perjam }}</td>
                                                    <td>{{ $car->sewa_perhari }}</td>
                                                    <td>

                                                        @if ($car->status == 'Tersedia')
                                                            <a href="#" class="btn btn-success btn-sm"
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Tersedia</a>


                                                            {{-- <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <a href="{{ route('transactionAdminDay', ['id_mobil' => $car->id_mobil]) }}"
                                                                            id="sewaPerHari"
                                                                            class="btn btn-primary mr-2">Sewa Per
                                                                            Hari</a>

                                                                        <a href="{{ route('transactionAdminHour', ['id_mobil' => $car->id_mobil]) }}"
                                                                            id="sewaPerJam" class="btn btn-primary">Sewa
                                                                            Per Jam</a>
                                                                    </div>
                                                                </div> --}}
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Pilih jenis
                                                                                penyewaan mobil
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <a href="{{ route('transactionAdminDay', ['id_mobil' => $car->id_mobil]) }}"
                                                                                id="sewaPerHari"
                                                                                class="btn btn-primary mr-2">Sewa Per
                                                                                Hari</a>
                                                                            <a href="{{ route('transactionAdminHour', ['id_mobil' => $car->id_mobil]) }}"
                                                                                id="sewaPerJam"
                                                                                class="btn btn-primary">Sewa
                                                                                Per Jam</a>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif($car->status == 'Dipesan')
                                                            <button class="btn btn-warning btn-sm">Dipesan</button>
                                                        @else
                                                            <button class="btn btn-secondary btn-sm">Disewa</button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $car->id_kategori }}</td>
                                                    <td class="text-center">
                                                        <a href="/editmobil{{ $car->id_mobil }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="#" id="delete"class="btn btn-danger delete"
                                                            data-id="{{ $car->id_mobil }}"
                                                            data-noplat="{{ $car->no_plat }}">Delete</a>
                                                    </td>

                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach
                                            @if ($no == 1)
                                                <tr>
                                                    <td colspan="12" class="text-center table-danger">Data Tidak
                                                        Ditemukan!!!
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        <br>
                                        {{ $cars->links() }}
                                    </div>
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
        $('.delete').click(function() {
            var id_mobil = $(this).attr("data-id");
            var noplat = $(this).attr("data-noplat");
            swal({
                    title: "Yakin?",
                    text: "Kamu akan menghapus mobil dengan nopol : " + noplat + "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/hapusmobil" + id_mobil + ""
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
        @if (Session::has('successdelete'))
            swal("Data berhasil di hapus", {
                icon: "success",
            });
        @endif
    </script>
</body>

</html>
