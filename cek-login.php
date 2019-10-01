<?php
    error_reporting(0);
    include "koneksi.php";

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $login      = sprintf("SELECT * FROM user WHERE username='$user' AND password='$pass'");
    $cek_lagi   = mysql_query($login);
    $ketemu     = mysql_num_rows($cek_lagi);
    $r          = mysql_fetch_array($cek_lagi);

    if ($ketemu > 0)
    {
        session_start();
        $_SESSION['kode']           = $r['id_user'];
        $_SESSION['namauser']       = $r['username'];
        $_SESSION['passuser']       = $r['password'];
        $_SESSION['id_jenisuser']   = $r['id_jenisuser'];
        $id_user                    = $_SESSION['kode'];
  
        if($_SESSION['id_jenisuser']== "U01")
        {
	        echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div><script>window.location ='data-pegawai.html'</script>";
	        mysql_query("update tbl_user set status=1,w_login=NOW() where id_jenisuser='$id_user'");
        }
        else if($_SESSION['id_jenisuser']== "U02")
        {
            echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div><script>window.location ='dashboard.php'</script>";
	        mysql_query("update tbl_user set status=1,w_login=NOW() where id_jenisuser='$id_user'");
        }
        else if($_SESSION['id_jenisuser']== "U03")
        {
            echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div><script>window.location ='dashboard-kc.html'</script>";
	        mysql_query("update tbl_user set status=1,w_login=NOW() where id_user='$id_user'");
        }
    }
    else
    {
        echo "<div id='gagal' class='alert alert-danger'>Mohon maaf username & password Anda salah<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
    }
?>
