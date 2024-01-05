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
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Data Mobil</h4>
                          <form action="/barang" method="GET">
                          <div class="input-group">
                            <button type="submit" class="btn btn-outline-secondary rounded-0">
                                  <i class="icon-search"></i>
                              </span>
                            </button>
                              <input type="text" class="form-control" name="search" id="search" placeholder="Search now" aria-label="search" aria-describedby="search" autofocus>
                            </div>
                          </form>
                            <a href='{{route('tambahmobil')}}' class="btn btn-success mt-2">Tambah</a>
                          @if($message = Session::get('success'))
                            <div class="alert alert-success mt-2" role="alert">
                              {{$message}}
                            </div>
                          @endif
                          <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                              <thead>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Karyawan</th>
                                <th scope="col">Diperbarui</th>
                                <th scope="col">Aksi</th>
                              </thead>
                              </tbody>
                              {{-- @php
                              $no = 1;   
                              @endphp
                              @foreach($data as $index => $row)
                              <tr>
                                  <th scope="row">{{$index + $data->firstItem()}}</th>
                                  <td>{{$row->nama}}</td>
                                  <td>{{$row->harga}}</td>
                                  <td>{{ucwords($user->where('id_user', $row->id_user)->first()->username)}}</td>
                                  <td>{{$row->updated_at}}</td>
                                  <td class="text-center">
                                      <a href="/editbarang{{$row->id_barang}}" class="btn btn-info">Edit</a>
                                      <a href="#" id="delete" class="btn btn-danger delete" data-id={{$row->id_barang}} data-nama={{$row->nama}}>Delete</a>
                                  </td>
                                </tr>
                              @php
                                $no++;
                              @endphp
                              @endforeach
                              @if($no==1) --}}
                              <tr>
                                <td colspan="8" class="text-center table-danger">Data Tidak Ditemukan !!!</td>
                              </tr>
                              {{-- @endif --}}
                              </tbody>
                            </table>
                            <br>
                            {{-- {{ $data->links() }} --}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                    $('.delete').click(function(){
                      var id_barang = $(this).attr("data-id");
                      var nama = $(this).attr("data-nama");
                      swal({
                          title: "Yakin?",
                          text: "Kamu akan menghapus barang dengan nama : "+nama+"",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willDelete) => {
                          if (willDelete) {
                            window.location = "/hapusbarang"+id_barang+""
                          } else {
                            swal("Data tidak jadi dihapus");
                          }
                        });
                    });
                    @if(Session::has('successdelete'))
                      swal("Data berhasil di hapus", {
                                icon: "success",
                              });
                    @endif
                  </script>
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
</body>

</html>
