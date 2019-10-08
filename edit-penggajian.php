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

      <a class="navbar-brand mr-1" href="data-pegawai.php">Toko Mantep</a>

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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="data-pegawai.php">Data Pegawai</a>
            <a class="dropdown-item" href="data-absensi.php">Data Absensi</a>
            <a class="dropdown-item" href="data-penggajian.php">Data Penggajian</a>
            <a class="dropdown-item" href="gaji-pokok.php">Data Gaji Pokok</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="input-data-penggajian.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Input Data Penggajian</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Edit Data</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="edit-penggajian.php">Edit Data Penggajian</a>
            <a class="dropdown-item" href="edit-gaji-pokok.php">Edit Data Gaji Pokok</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="kc-laporanpresensi.html">Laporan Penggajian</a>
            <a class="dropdown-item" href="kc-laporantahunan.html">Laporan Tahunan</a>
            <a class="dropdown-item" href="kc-laporanbulanan.html">Laporan Bulanan</a>
          </div>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="edit-penggajian.php">Edit Data Penggajian</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Form Input -->
            <?php
            include "koneksi.php";
            $nip = $_GET['id'];
            
            $query = "SELECT
                      penggajian.nip,
                      penggajian.id_bulan,
                      penggajian.id_gajipokok,
                      penggajian.tunjangan,
                      penggajian.bonus,
                      penggajian.potongan
                      FROM penggajian WHERE nip = '$nip'";
            $sql = mysqli_query($connect, $query);
            while ($data = mysqli_fetch_array($sql))
            {
          ?>
            <form role="form" action="proses-input-penggajian.php" method="post" enctype="multipart/form-data">
                <div class="form-group has-success">
                    <label class="control-label" for="inputNIP">NIP</label>
                    <input type="text" class="form-control" name="nip" value="<?php echo $data['nip'] ?>" readonly>
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputjammasuk">Masukkan Bulan</label>
                    <a>*1 : Januari *2 : Februari *3 : Maret *4 : Maret dst</a>
                    <input type="text" class="form-control" name="id_bulan">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputistirahat1">Masukkan Gaji Pokok</label>
                    <a>*GP01 : 1 - 3 bulan *GP02 : 3 bulan - 2 tahun *GP03 : 2 - 5 tahun *GP04 : 5 - 10 tahun *GP05 : >10 tahun</a>
                    <input type="text" class="form-control" name="id_gajipokok">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputistirahat2">Masukkan Tunjangan</label>
                    <input type="text" class="form-control" name="tunjangan">
                </div>
                <div class="form-group has-success">
                    <label class="control-label" for="inputjamkeluar">Masukkan Bonus</label>
                    <input type="text" class="form-control" name="bonus">
                </div>
                <div>
                    <label class="control-label" for="inputketabsen">Masukkan Potongan</label>
                    <input type="text" class="form-control" name="id_keterangan">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
            <?php
            }
            ?>

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