<?php

    // program ketika mendaftarkan user baru
    session_start();
    include "configs/koneksi.php";
    include "configs/function_profil.php";

    @$nama_user = $_POST['nama_user'];
    @$username = $_POST['username'];
    @$jenis_kelamin = $_POST['jenis_kelamin'];
    @$alamat_user = $_POST['alamat_user'];
    @$no_hp = $_POST['no_hp'];
    @$file = upload();
    @$password = $_POST['password'];
    @$konfirmasi_pw = $_POST['konfirmasi_pw'];

    $query_sql = "INSERT INTO tbl_user (nama_user, username, jenis_kelamin, alamat_user, no_hp, file, password, konfirmasi_pw)
                    VALUES ('$nama_user', '$username', '$jenis_kelamin', '$alamat_user', '$no_hp', '$file', '$password', '$konfirmasi_pw')";
    
    if(mysqli_query($koneksi, $query_sql)){
        echo"<script>
                    alert('Pendaftaran Berhasil!');
                    document.location='index.php';
            </script>";
    }else{
        echo"<script>
                    alert('Pendaftaran Gagal, Mohon Coba Lagi!');
                    document.location='daftar.php';
            </script>";
    }

?>