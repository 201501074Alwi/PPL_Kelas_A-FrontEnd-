<?php
    include "koneksi.php";
    
    $nip            = $_POST['nip'];
    $id_bulan       = $_POST['id_bulan'];
    $id_gajipokok   = $_POST['id_gajipokok'];
    $tunjangan      = $_POST['tunjangan'];
    $bonus          = $_POST['bonus'];
    $potongan       = $_POST['potongan'];
    
    $sql = "UPDATE penggajian SET nip = '$nip', id_bulan = '$id_bulan', id_gajipokok = '$id_gajipokok', tunjangan = '$tunjangan',
            bonus = '$bonus', potongan = '$potongan' WHERE nip = '$nip'";
    $tes1 = mysqli_query($connect, $sql);
    
    if ($tes1)
    {
        echo "<script>alert('Data berhasil diedit!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=data-penggajian.php'>";
    }
    else
    {
        echo "<script>alert('Data tidak berhasil diedit!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-penggajian.php'>";
    }
?>