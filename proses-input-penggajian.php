<?php
    include "koneksi.php";
    
    $nip          = $_POST['nip'];
    $id_bulan     = $_POST['id_bulan'];
    $id_gajipokok = $_POST['id_gajipokok'];
    $tunjangan    = $_POST['tunjangan'];
    $bonus        = $_POST['bonus'];
    $potongan     = $_POST['potongan'];
    
    $sql = "INSERT INTO penggajian(nip, id_bulan, id_gajipokok, tunjangan, bonus, potongan)
            VALUES ('$nip', '$id_bulan', '$id_gajipokok', '$tunjangan',
            '$bonus', '$potongan')";
    $tes1 = mysqli_query($connect, $sql);
    
    if ($tes1)
    {
        echo "<script>alert('Data berhasil diinput!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=input-data-penggajian.php'>";
    }
    else
    {
        echo "<script>alert('Data tidak berhasil diinput!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=form-input-penggajian.php'>";
    }
?>