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
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="{{ route('Dashboard') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>PEGAWAI</p>
            </a>
          </li>
          <li>
            <a href="{{ route('Absensi') }}">
              <i class="now-ui-icons location_map-big"></i>
              <p>ABSEN</p>
            </a>
          </li>
          <li>
            <a href="{{ route('Gaji') }}">
              <i class="now-ui-icons location_map-big"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="{{ route('Jabatan') }}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="{{route('User')}}">
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
            <a href="{{ route('Typo') }}">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          <li>
            <a href="/sesi/logout">
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
            <a class="navbar-brand" href="#pablo">PEGAWAI</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
          font-size: 1opx; /* Mengatur ukuran font dalam card */
        }

        .table {
          font-size: 11px; /* Mengatur ukuran font dalam tabel */
          color: #FFA500; /* Memberi warna font pada tabel (misalnya merah) */

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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Pegawai</h5>
            <button class="btn btn-outline-warning" id="tambahButton">Tambah</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">ID Pegawai</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Tlp</th>
                        <th scope="col">Gaji</th>
                        <th scope="col">Aksi</th>
                    </tr>

                    @foreach ($dashboard as $no => $db )
                    <tr>
                        <!-- @dump($db) -->
                        <td>{{ ++$no }}</td>
                        <td>{{ $db->nama }}</td>
                        <td></td>
                        <td>{{ $db->id_pegawai }}</td>
                        <td>{{ $db->jabatan }}</td>
                        <td>{{ $db->alamat }}</td>
                        <td>{{ $db->no_tlp }}</td>
                        <td>{{ $db->gaji }}</td>
                        <td>
                        <button class="btn btn-outline-primary" id="tambahButton">Edit</button>
                        <button class="btn btn-outline-danger" id="tambahButton">Hapus</button>
                        </td>
                    </tr>
                        @endforeach
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="btn btn-outline-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('SimpanPegawai')}}" method="post" type="multipart/form-data" >
                  @csrf
                <div class="container">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                      </div>
                      <div class="form-group">
                        <label for="id_pegawai">ID Pegawai:</label>
                        <input type="number" class="form-control" id="id_pegawai" name="id_pegawai">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">No Tlp:</label>
                        <input type="number" class="form-control" id="no_tlp" name="no_tlp">
                      </div>
                    </div>
                  </div>
                </div>
                    <div class="form-group">
                        <label for="gaji">Gaji:</label>
                        <input type="number" class="form-control" id="gaji" name="gaji">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" rows="4" name="alamat"></textarea>
                    </div>
                    <!-- <div class="">
                      <label class="form-label" for="foto">Foto:</label>
                      <input type="file" class="form-control" id="foto">
                    </div> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-warning">Simpan</button>
                  </div>
                </div>
              </div>
              </form>
            </div>



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
</body>

</html>
