<?php

    //panggil function.php untuk upload file
    include "configs/function.php";

    // uji tombol edit dan hapus
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "edit")
        {
            //tampilkan data yang akan di edit
            $tampil = mysqli_query($koneksi, "SELECT 
                    tbl_arsip.*,
                    tbl_divisi.nama_divisi,
                    tbl_pengirim_surat.nama_pengirim,
                    tbl_pengirim_surat.no_hp
                    FROM
                    tbl_arsip, tbl_divisi, tbl_pengirim_surat
                    WHERE
                    tbl_arsip.id_divisi = tbl_divisi.id_divisi
                    and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim
                    and tbl_arsip.id_arsip='$_GET[id]'");

            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung kedalam variabel
                $vno_surat = $data['no_surat'];
                $vtanggal_surat = $data['tanggal_surat'];
                $vtanggal_diterima = $data['tanggal_diterima'];
                $vperihal = $data['perihal'];
                $vid_divisi = $data['id_divisi'];
                $vnama_divisi = $data['nama_divisi'];
                $vid_pengirim = $data['id_pengirim'];
                $vnama_pengirim = $data['nama_pengirim'];
                $vfile = $data['file'];
            }
        }
        // jika data arsip surat dihapus
        elseif($_GET['hal'] == 'hapus')
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_arsip WHERE id_arsip='$_GET[id]'");
            if($hapus)
            {
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
        }
    }

    // uji jika tombol simpan di klik
    if(isset($_POST['btn_simpan']))
    {
        // pengujian data akan di edit
        if(@$_GET['hal'] == "edit")
        {
            // perintah edit data
            // cek pilih gambar atau tidak
            if($_FILES['file']['error'] === 4){
                $file = $vfile;
            }else{
                $file = upload();
            }
            $ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET 
                                            no_surat ='$_POST[no_surat]',
                                            tanggal_surat ='$_POST[tanggal_surat]',
                                            tanggal_diterima ='$_POST[tanggal_diterima]',
                                            perihal ='$_POST[perihal]',
                                            id_divisi ='$_POST[id_divisi]',
                                            id_pengirim ='$_POST[id_pengirim]',
                                            file ='$file'
                                            where id_arsip = '$_GET[id]'");
            if($ubah)
            {
                echo "<script>
                    alert('Edit Data Sukses');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
            // jika terdapat data yang tidak valid saat edit
            else
            {
                echo "<script>
                    alert('Edit Data Gagal!');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            // simpan data
            $file = upload();
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip 
                                                VALUE (     '', 
                                                            '$_POST[no_surat]',
                                                            '$_POST[tanggal_surat]',
                                                            '$_POST[tanggal_diterima]',
                                                            '$_POST[perihal]',
                                                            '$_POST[id_divisi]',
                                                            '$_POST[id_pengirim]',
                                                            '$file'
                                                             ) ");
            if($simpan)
            {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
            // jika terdapat file yang tidak valid saat menyimpan data
            else
            {
                echo "<script>
                    alert('Simpan Data Gagal!');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
        }
    }
?>

<!-- rancangan form untuk tambah/edit data arsip surat -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-cloud-upload-alt"></i> Form Data Arsip Surat</h6>
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="no_surat" class="mt-2">Nomor Surat</label>
            <input type="text" class="form-control mt-2 shadow" id="no_surat" name="no_surat" value="<?=@$vno_surat?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="tanggal_surat" class="mt-2">Tanggal Surat</label>
            <input type="date" class="form-control mt-2 shadow" id="tanggal_surat" name="tanggal_surat" value="<?=@$vtanggal_surat?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="tanggal_diterima" class="mt-2">Tanggal Diterima</label>
            <input type="date" class="form-control mt-2 shadow" id="tanggal_diterima" name="tanggal_diterima" value="<?=@$vtanggal_diterima?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="perihal" class="mt-2">Perihal</label>
            <input type="text" class="form-control mt-2 shadow" id="perihal" name="perihal" value="<?=@$vperihal?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="id_divisi" class="mt-2">Divisi Tujuan</label>
            <select class="form-control mt-2 shadow" name="id_divisi" required>
                <option value="<?=@$vid_divisi?>"><?=@$vnama_divisi?></option>
                <?php
                    $tampil = mysqli_query($koneksi, "SELECT * from tbl_divisi order by nama_divisi asc");
                    while($data = mysqli_fetch_array($tampil)){
                        echo "<option value = '$data[id_divisi]'> $data[nama_divisi] </option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="id_pengirim" class="mt-2">Nama/Instansi Pengirim Surat</label>
            <select class="form-control mt-2 shadow" name="id_pengirim" required>
                <option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
                <?php
                    $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by nama_pengirim asc");
                    while($data = mysqli_fetch_array($tampil)){
                        echo "<option value = '$data[id_pengirim]'> $data[nama_pengirim] </option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="file" class="mt-2">Pilih File</label>
            <input type="file" class="form-control mt-2 shadow" id="file" name="file" value="<?=@$vfile?>" required>
        </div>

        <button type="submit" name="btn_simpan" class="btn btn-info mt-4 mr-2"><i class="fas fa-save"></i> Simpan</button>
        <a href="?halaman=arsip_surat" class="btn btn-danger mt-4"><i class="fas fa-reply-all"></i> Batal</a>
    </form>
  </div>
</div>
