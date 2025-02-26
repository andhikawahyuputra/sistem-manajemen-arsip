<?php
    include "configs/koneksi.php";
    @$isinote = $_POST['note'];
    @$namanote = $_SESSION['nama_user'];
    @$ppnote = $_SESSION['file'];

    $notesbaru = mysqli_query($koneksi, "INSERT INTO tbl_note 
                                                VALUE (     '',
                                                            '$isinote',
                                                            '$namanote',
                                                            '$ppnote'
                                                             ) ");
            if($notesbaru)
            {
                echo "<script>
                    alert('Simpan Data Sukses');
                    window.history.back();
                </script>";
            }else
            {
                echo "<script>
                    alert('Simpan Data Gagal!');
                    window.history.back();
                </script>";
            }
?>