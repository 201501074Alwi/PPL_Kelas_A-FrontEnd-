<?php
    include "koneksi.php";
    
    $nip                = $_POST['nip'];
    $no_ktp             = $_POST['no_ktp'];
    $nama               = $_POST['nama'];
    $tgl_masuk          = $_POST['tgl_masuk'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $id_jeniskelamin    = $_POST['id_jeniskelamin'];
    $alamat             = $_POST['alamat'];
    $id_jenispekerjaan  = $_POST['id_jenispekerjaan'];
    $no_telp            = $_POST['no_telp'];
    $id_agama           = $_POST['id_agama'];
    $id_pendidikan      = $_POST['id_pendidikan'];
    $tgl_lahir          = $_POST['tgl_lahir'];
    
    $sql = "UPDATE pegawai SET nip = '$nip', no_ktp = '$no_ktp', nama = '$nama', tgl_masuk = '$tgl_masuk',
            tempat_lahir = '$tempat_lahir', id_jeniskelamin = '$id_jeniskelamin', alamat = '$alamat',
            id_jenispekerjaan = '$id_jenispekerjaan', no_telp = '$no_telp', id_agama = '$id_agama',
            id_pendidikan = '$id_pendidikan', tgl_lahir = '$tgl_lahir' WHERE nip = '$nip'";
    $tes1 = mysqli_query($connect, $sql);
    
    if ($tes1)
    {
        echo "<script>alert('Data berhasil diedit!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
    }
    else
    {
        echo "<script>alert('Data tidak berhasil diedit!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data-pegawai.php'>";
    }
?>