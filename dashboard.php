<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CV Otim</title>

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

      <a class="navbar-brand mr-1" href="dashboard.php">CV Otim</a>

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
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
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
              <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Pegawai</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Tanggal Masuk</th>
                      <th>Sektor</th>
                      <th>No Telp</th>
                      <th>Agama</th>
                      <th>Pendidikan</th>
                      <th>No KTP</th>
                      <th>Control</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Tanggal Masuk</th>
                      <th>Sektor</th>
                      <th>No Telp</th>
                      <th>Agama</th>
                      <th>Pendidikan</th>
                      <th>No KTP</th>
                      <th>Control</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                        include "koneksi.php";
                        
                        $query = "SELECT
                                 pegawai.nip,
                                 pegawai.no_ktp,
                                 pegawai.nama,
                                 pegawai.tgl_masuk,
                                 pegawai.tempat_lahir,
                                 jenis_kelamin.keterangan,
                                 pegawai.alamat,
                                 jenis_pekerjaan.keteranganpekerjaan,
                                 pegawai.no_telp,
                                 agama.keteranganagama,
                                 pendidikan.keteranganpendidikan,
                                 pegawai.tgl_lahir
                                 FROM pegawai
                                 INNER JOIN jenis_kelamin ON pegawai.id_jeniskelamin = jenis_kelamin.id_jeniskelamin
                                 INNER JOIN jenis_pekerjaan ON pegawai.id_jenispekerjaan = jenis_pekerjaan.id_jenispekerjaan
                                 INNER JOIN agama ON pegawai.id_agama = agama.id_agama
                                 INNER JOIN pendidikan ON pegawai.id_pendidikan = pendidikan.id_pendidikan";
                        $sql = mysqli_query($connect, $query);
                        while ($data = mysqli_fetch_array($sql))
                        {
                    ?>
                            <tr>
                                <td><?=$data['nip']?></td>
                                <td><?=$data['nama']?></td>
                                <td><?=$data['tempat_lahir']?></td>
                                <td><?=$data['tgl_lahir']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td><?=$data['alamat']?></td>
                                <td><?=$data['tgl_masuk']?></td>
                                <td><?=$data['keteranganpekerjaan']?></td>
                                <td><?=$data['no_telp']?></td>
                                <td><?=$data['keteranganagama']?></td>
                                <td><?=$data['keteranganpendidikan']?></td>
                                <td><?=$data['no_ktp']?></td>
                                <td>
                                    <a href="edit-data-pegawai.php?id=<?php echo $data['nip']; ?>" class="tooltip-error" data-rel="tooltip" title="EDIT">
                                        <span class='glyphicon'>
								            <i class='ace-icon fa fa-pen bigger-120'></i>
								        </span>
                                    </a>
                                    |
                                    <a onclick="if(confirm('Hapus data ini?')){ location.href='hapus-data-pegawai.php?id=<?php echo $data['nip']; ?>' }" class="tooltip-error" data-rel="tooltip" title="DELETE">
                                        <span class='glyphicon'>
								            <i class='ace-icon fa fa-trash bigger-120'></i>
								        </span>
                                    </a>
                                    |
                                    <a href="cetak-data-pegawai.php" target="_blank" class="tooltip-error" data-rel="tooltip" title="Print">
                                        <span class='glyphicon glyphicon-print'>
								            <i class='ace-icon fa fa-print bigger-120'></i>
								        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © CV Otim 2018</span>
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
