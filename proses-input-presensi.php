<?php
    include "koneksi.php";
    
    $nip                = $_POST['nip'];
    $jam_masuk          = $_POST['jam_masuk'];
    $jam_istirahati     = $_POST['jam_istirahati'];
    $jam_istirahatii    = $_POST['jam_istirahatii'];
    $jam_keluar         = $_POST['jam_keluar'];
    $id_keterangan      = $_POST['id_keterangan'];
    
    $sql = "INSERT INTO absensi(nip, jam_masuk, jam_istirahati, jam_istirahatii, jam_keluar, id_keterangan)
            VALUES ('$nip', '$jam_masuk', '$jam_istirahati', '$jam_istirahatii',
            '$jam_keluar', '$id_keterangan')";
    $tes1 = mysqli_query($connect, $sql);
    
    if ($tes1)
    {
        echo "<script>alert('Data berhasil diinput!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=input-presensi.php'>";
    }
    else
    {
        echo "<script>alert('Data tidak berhasil diinput!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=form-input-presensi.php'>";
    }
?>