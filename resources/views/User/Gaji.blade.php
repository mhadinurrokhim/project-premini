<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Pegawai
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->

    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{ route('Dashboard') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>PEGAWAI</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Absensi') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>ABSENSI</p>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('Gaji') }}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>GAJI</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Jabatan') }}">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p>JABATAN</p>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('User') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Table') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>Table List</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Typography') }}">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>Typography</p>
                </a>
            </li> --}}
            <li>
                <a href="/logout">
                    <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                    <p>Log out</p>
                </a>
            </li>
        </ul>
    </div>
</div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">GAJI</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->


            <!-- start tabel-->
            <style>
                .card {
                    font-size: 1opx;
                    /* Mengatur ukuran font dalam card */
                }

                .table {
                    font-size: 11px;
                    /* Mengatur ukuran font dalam tabel */
                    color: #FFA500;
                    /* Memberi warna font pada tabel (misalnya merah) */

                }
            </style>
            <!DOCTYPE html>
            <html>

            <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>

            <body>
                <div class="panel-header panel-header-sm">
                </div>
                <br><br>

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">GAJI</h5>
                            <button class="btn btn-outline-warning" id="tambahButton">Tambah</button>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Pegawai</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Tanggal Gajian</th>
                                        <th scope="col">Aksi</th>
                                    </tr>

                                    @foreach($gaji as $iteration => $gj)
                                    <tr>
                                        <td>{{ $iteration + 1 }}</td>
                                        <td>{{ $gj->id_pegawai }}</td>
                                        <td>{{ $gj->jumlah }}</td>
                                        <td>{{ $gj->tanggal_pembayaran }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $gj->id }}" style="margin-right: 10px;">
                                                Edit
                                            </button>
                                            <form action="/deletegaji/{{ $gj->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" id="tambahButton" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>


                    <!-- Modal Edit -->
                    @foreach ($gaji as $ga)
                    <div class="modal fade" id="exampleModal{{$ga->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <form method="POST" action="update/{{$ga->id}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="container">
                                        <div class="row">
                                            <div class="coll-6">
                                                <div class="form-group">
                                                    <label for="id_pegawai">ID Pegawai:</label>
                                                    <input type="number" value="{{ $ga->id_pegawai }}" class="form-control" id="id_pegawai" name="id_pegawai">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah:</label>
                                                    <input type="number" value="{{ $ga->jumlah }}" class="form-control" id="jumlah" name="jumlah">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pembayarn">Tanggal Bayaran:</label>
                                            <input type="date" value="{{ $ga->tanggal_pembayaran }}" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-outline-warning">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Modal Tambah-->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Gaji</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('SimpanGaji') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="id_pegawai">ID Pegawai:</label>
                                                    <input type="number" class="form-control" id="id_pegawai" name="id_pegawai">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah:</label>
                                                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="tanggal_pembayaran">Tanggal Gajian:</label>
                                                <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-outline-warning">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script>
                        // Handle button click to show modal
                        document.getElementById("tambahButton").addEventListener("click", function() {
                            $('#tambahModal').modal('show');
                        });
                    </script>
            </body>

            </html>


            <!-- end tabel -->

            <!--   Core JS Files   -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/js/core/jquery.min.js"></script>
            <script src="../assets/js/core/popper.min.js"></script>
            <script src="../assets/js/core/bootstrap.min.js"></script>
            <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
            <!--  Google Maps Plugin    -->
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
            <!-- Chart JS -->
            <script src="../assets/js/plugins/chartjs.min.js"></script>
            <!--  Notifications Plugin    -->
            <script src="../assets/js/plugins/bootstrap-notify.js"></script>
            <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
            <script src="../assets/demo/demo.js"></script>
            <script>
                $(document).ready(function() {
                    // Javascript method's body can be found in assets/js/demos.js
                    demo.initDashboardPageCharts();

                });
            </script>
            @if ($errors->any())
                <script>
                    $(document).ready(function() {
                        @foreach ($errors->all() as $error)
                            toastr.error('{{ $error }}', 'Error', {
                                closeButton: true, // Menambahkan tombol hapus
                                timeOut: 0
                            });
                        @endforeach
                    });
                </script>
            @endif

</body>

</html>
