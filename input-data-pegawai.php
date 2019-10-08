<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Toko Mantep Kebumen</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="dashboard.php">Toko Mantep</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="user.html">Profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="input-data-pegawai.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Input Data Pegawai</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="edit-data-pegawai.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Edit Data Pegawai</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="input-data-pegawai.php">Input Data Pegawai</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Form Input -->
          <?php
            include 'koneksi.php';
            $query = "SELECT max (nip) as userMaks FROM pegawai";
            $hasil = mysqli_query($connect, $query);
            $data = mysqli_fetch_array($hasil);
            $nip = $data['userMaks'];
            
            $noUrut = (int) substr($nip, 5, 4);
            $noUrut++;
            
            $char = "KRYWN-";
            $IDbaru = $char . sprintf("%04s", $noUrut);
        ?>
            <form role="form" action="proses-input-pegawai.php" method="post" enctype="multipart/form-data">
                <div class="form-group has-success">
                    <label class="control-label" for="inputNIP">Masukkan NIP</label>
                    <input type="text" class="form-control" name="nip">
                </div>
                <div class="form-group has-warning">
                    <label class="control-label" for="inputnama">Masukkan Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div>
                    <label class="control-label" for="inputmasuk">Masukkan Tanggal Masuk Kerja</label>
                    <input type="date" class="form-control" name="tgl_masuk">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputtempat">Masukkan Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir">
                </div>
                <div>
                    <label class="control-label" for="inputtanggal">Masukkan Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir">
                </div>
                <div>
                    <label class="control-label" for="inputjeniskelamin">Masukkan Jenis Kelamin</label>
                    <a>*K01 : Laki-laki *K02 : Perempuan</a>
                    <input type="text" class="form-control" name="id_jeniskelamin">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputalamat">Masukkan Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div>
                    <label class="control-label" for="inputjenispekerjaan">Masukkan Sektor</label>
                    <a>*P01 : Administrator *P02 : Gudang *P03 : Kepala Counter *P04 : Kasir</a>
                    <input type="text" class="form-control" name="id_jenispekerjaan">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputnotelp">Masukkan No Telp</label>
                    <input type="text" class="form-control" name="no_telp">
                </div>
                <div>
                    <label class="control-label" for="inputagama">Masukkan Agama</label>
                    <a>*A01 : Budha *A02 : Hindhu *A03 : Islam *A04 : Katholik *A05 : Kristen</a>
                    <input type="text" class="form-control" name="id_agama">
                </div>
                <div>
                    <label class="control-label" for="inputpendidikan">Masukkan Pendidikan</label>
                    <a>*PT01 : SMA/SMK *PT02 : D3 *PT03 : S1 *PT04 : S2</a>
                    <input type="text" class="form-control" name="id_pendidikan">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputnoktp">Masukkan No KTP</label>
                    <input type="text" class="form-control" name="no_ktp">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Input</button>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Toko Mantep 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
