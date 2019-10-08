<?php
    include "koneksi.php";
    
    $id_gajipokok   = $_POST['id_gajipokok'];
    $lama_kerja     = $_POST['lama_kerja'];
    $gaji           = $_POST['gaji'];
    
    $sql = "UPDATE gaji_pokok SET id_gajipokok = '$id_gajipokok' lama_kerja = '$lama_kerja', gaji = '$gaji' WHERE id_gajipokok = '$id_gajipokok'";
    
    $tes1 = mysqli_query ($connect, $sql);
    
    if($tes1)
    {
        echo "<script>alert('Data berhasil diedit!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=gaji-pokok.php'>";
    }
    else
    {
        echo "<script>alert('Data gagal diedit!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-gaji-pokok.php'>";
    }
?>