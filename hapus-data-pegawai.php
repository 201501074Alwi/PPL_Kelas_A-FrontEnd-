<?php
    include "koneksi.php";
    $id = $_GET['id'];
    
    $query = "DELETE FROM pegawai WHERE nip='".$id."'";
    $sql = mysqli_query($connect, $query);
    
    if($sql)
    {
        echo"<script>alert('Data berhasil dihapus!')</script>";
        echo"<meta http-equiv='refresh' content='0; url=dashboard.php'>";
    }
    else
    {
        echo"Data gagal dihapus. <a href='dashboard.php'>Back</a>";
    }
?>