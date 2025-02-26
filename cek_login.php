<?php
    // program untuk mengecek apakah email dan password yang dimasukkan sesuai dengan yang ada di database, jika sesuai maka akan memulai sesi pengguna yang masuk
    
    session_start();
    include "configs/koneksi.php";

    //contoh login sederhana
    @$username = $_POST['username'];
    @$password =$_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * from tbl_user
                                    WHERE username ='$username' and password ='$password' ");
    
    $data = mysqli_fetch_array($login);
    if($data)
    {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['jenis_kelamin'] = $data['jenis_kelamin'];
        $_SESSION['alamat_user'] = $data['alamat_user'];
        $_SESSION['no_hp'] = $data['no_hp'];
        $_SESSION['file'] = $data['file'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['konfirmasi_pw'] = $data['konfirmasi_pw'];
        header('location:admin.php');
    }
    else
    {
        echo"<script>
                    alert('Maaf, Login Gagal! Pastikan Username dan Password Anda Benar!');
                    document.location='index.php';
            </script>";
    }
?>