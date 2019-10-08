<?php
    session_start();
    include "koneksi.php";
    
    if (isset($_POST) & !empty($_POST))
    {
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id_jenisuser = $_POST['id_jenisuser'];

    

        $cek = mysqli_query ($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        
        if (mysqli_num_rows ($cek) == 1)
        {
            $c = mysqli_fetch_array($cek);
            $_SESSION['username'] = $c['username'];
            $_SESSION['id_jenisuser'] = $c['id_jenisuser'];
            
            if ($c['id_jenisuser'] == "U01")
            {
                header("location:data-pegawai.php");
            }
            else if ($c['id_jenisuser'] == "U02")
            {
                header("location:dashboard.php");
            }
            else if ($c['id_jenisuser'] == "U03")
            {
                header("location:dashboard-kc.php");
            }
            else
            {
                echo "<div id='gagal' class='alert alert-danger'>Mohon maaf username & password anda salah<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
            }
        }

    }
?>