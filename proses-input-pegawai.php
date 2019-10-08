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
    
    $sql = "INSERT INTO pegawai(nip, no_ktp, nama, tgl_masuk, tempat_lahir, id_jeniskelamin, alamat, id_jenispekerjaan, no_telp,
            id_agama, id_pendidikan, tgl_lahir)
            VALUES ('$nip', '$no_ktp', '$nama', '$tgl_masuk', '$tempat_lahir', '$id_jeniskelamin', '$alamat', '$id_jenispekerjaan',
            '$no_telp', '$id_agama', '$id_pendidikan', '$tgl_lahir')";
    $tes1 = mysqli_query($connect, $sql);
    
    if ($tes1)
    {
        echo "<script>alert('Data berhasil diinput!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
    }
    else
    {
        echo "<script>alert('Data tidak berhasil diinput!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=input-data-pegawai.php'>";
    }
?>