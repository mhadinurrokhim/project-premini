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
            <div class="logo">
                <span class="simple-text">
                    {{$user->name}}
                </span>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ route('Dashboard') }}">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>PEGAWAI</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('Absensi') }}">
                            <i class="now-ui-icons ui-1_calendar-60"></i>
                            <p>ABSENSI</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Gaji') }}">
                            <i class="now-ui-icons business_money-coins"></i>
                            <p>GAJI</p>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <i class="now-ui-icons arrows-1_minimal-left"></i>
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
                        <a class="navbar-brand" href="#pablo">ABSENSI</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
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
                            <h5 class="card-title">Data Absensi</h5>
                            <button class="btn btn-outline-warning" id="tambahButton">Tambah</button>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>

                                     @foreach ($absensi as $no => $ab)
                                    <tr>
                                        <td>{{  ++$no }}</td>
                                        <td>{{ $ab->Pegawai->nip }}</td>
                                        <td>{{ $ab->tanggal }}</td>
                                        <td>{{ $ab->keterangan }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $ab->id }}" style="margin-right: 10px;">
                                                Edit
                                            </button>
                                            <form action="/absensi/{{ $ab->id }}" method="post">
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

                {{-- Modal Edit --}}
                @foreach ($absensi as $absen)
                <div class="modal fade" id="exampleModal{{ $absen->id }}" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="tambahModalLabel">Edit Absensi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="updateAbsensi/{{$absen->id}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="id_nip">NIP:</label>
                                                    <input type="number" value="{{ $absen->pegawai->nip }}" class="form-control" id="id_nip" name="id_nip" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal:</label>
                                                    <input type="date" value="{{ $absen->tanggal }}" class="form-control" id="tanggal" name="tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan:</label>
                                            <textarea class="form-control" id="keterangan" rows="4" name="keterangan"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            id="keterangan">{{ $absen->keterangan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-outline-warning">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



                  <!-- Modal Tambah -->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
                    aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Absensi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('storeAbsensi') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="id_nip" class="form-label">NIP</label>
                                                    <select class="form-select" name="id_nip" value=" {{ old ('nip') }}" aria-label="Default control example" id="id_nip">
                                                        @foreach ($pegawai as $nip )
                                                        <option value="{{ $nip->id }}">{{ $nip->nip }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_nip')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal:</label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                                    @error('tanggal')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan:</label>
                                        <textarea class="form-control w-100" id="keterangan" rows="4" name="keterangan"></textarea>
                                        @error('keterangan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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


                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <script>
                    // Handle button click to show modal
                    document.getElementById("tambahButton").addEventListener("click", function () {
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
                $(document).ready(function () {
                    @if (count($errors) > 0)
                        $('#tambahModal').modal('show'); // Show the modal if there are validation errors
                    @endif
                });
             </script>
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
