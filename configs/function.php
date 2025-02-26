<?php

    // persiapan function upload file/foto
    function upload()
    {
        // deklarasikan variabel kebutuhan
        $namafile = $_FILES['file']['name'];
        $ukuranfile = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $tmpname = $_FILES['file']['tmp_name'];

        // cek apakah yang diupload adalah file / gambar
        $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'];
        $eksfile = explode('.', $namafile);

        // nama.jpg nama.lengkap.jpg
        $eksfile = strtolower(end($eksfile));

        // cek jika format file tidak valid
        if(!in_array($eksfile, $eksfilevalid))
        {
            echo "<script> alert('Format File Tidak Mendukung') 
            
            </script>";
            return false;
        }

        //cek jika ukuran file terlalu besar
        if($ukuranfile > 1000000000){
            echo "<script> alert('Ukuran File Terlalu Besar!') 
            
            </script>";
            return false;
        }

        //jika lolos pengecekan, file siap diupload
        //generate nama file baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksfile;

        // pindahkan file yang diupload ke folder "files" dengan format nama baru
        move_uploaded_file($tmpname, 'files/'.$namafilebaru);
        return $namafilebaru;
    }
?>