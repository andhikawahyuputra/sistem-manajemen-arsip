<?php

    // program ketika tombol logout di klik, menghentikan sesi pengguna yang sedang berlangsung
    session_start();
    //hapus session yang sudah di set
    unset($_SESSION['id_user']);
    unset($_SESSION['username']);

    session_destroy();
    echo "<script>
                    alert('Sign out telah berhasil');
                    document.location='index.php';
            </script>";
?>