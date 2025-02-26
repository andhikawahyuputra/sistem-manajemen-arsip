<?php
    // uji jika tombol simpan di klik
    if(isset($_POST['btn_simpan']))
    {
        // pengujian data akan di edit atau simpan baru
        if(@$_GET['hal'] == "edit")
        {
            // perintah edit data
            $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
                                            nama_pengirim ='$_POST[nama_pengirim]',
                                            alamat ='$_POST[alamat]',
                                            no_hp ='$_POST[no_hp]',
                                            email ='$_POST[email]'
                                            where id_pengirim = '$_GET[id]'");
            if($ubah)
            {
                echo "<script>
                    alert('Edit Data Sukses');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('Edit Data Gagal!');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            // simpan data
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat 
                                                VALUE (     '', 
                                                            '$_POST[nama_pengirim]',
                                                            '$_POST[alamat]',
                                                            '$_POST[no_hp]',
                                                            '$_POST[email]'
                                                             ) ");
            if($simpan)
            {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }else
            {
                echo "<script>
                    alert('Simpan Data Gagal!');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
        }
    }

    // uji tombol edit dan hapus
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "edit")
        {
        //tampilkan data yang akan di edit
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat where id_pengirim='$_GET[id]'");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                    //jika data ditemukan, maka data ditampung kedalam variabel
                    $vnama_pengirim = $data['nama_pengirim'];
                    $valamat = $data['alamat'];
                    $vno_hp = $data['no_hp'];
                    $vemail = $data['email'];
                }
        }else
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengirim_surat WHERE id_pengirim='$_GET[id]'");
            if($hapus){
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
        }
    }
?>

<!-- rancangan tampilan form input data pengirim surat -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-cloud-upload-alt"></i> Form Data Pengirim Surat</h6>
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label for="nama_pengirim">Nama/Instansi Pengirim Surat</label>
            <input type="text" class="form-control mt-2 shadow" id="nama_pengirim" name="nama_pengirim" value="<?=@$vnama_pengirim?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control mt-2 shadow" id="alamat" name="alamat" value="<?=@$valamat?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="no_hp">Nomor HP</label>
            <input type="text" class="form-control mt-2 shadow" id="no_hp" name="no_hp" value="<?=@$vno_hp?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="text" class="form-control mt-2 shadow" id="email" name="email" value="<?=@$vemail?>" required>
        </div>

        <button type="submit" name="btn_simpan" class="btn btn-info mt-3"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" name="btn_batal" class="btn btn-danger mt-3"><i class="fas fa-eraser"></i> Batal</button>
    </form>
  </div>
</div>

<!-- rancangan tampilan tabel data pengirim surat -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInUp">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-folder-open"></i> Data Pengirim Surat</h6>
  </div>
  <div class="card-body mb-0">
    <table class="table table-bordered table-hover shadow">
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-center" width="25%">Nama Pengirim</th>
            <th class="text-center" width="30%">Alamat</th>
            <th class="text-center" width="10%">No HP</th>
            <th class="text-center" width="10%">Email</th>
            <th class="text-center" width="20%">Aksi</th>
        </tr>
        <?php
            $tampil =mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by id_pengirim");
            $no = 1;
            while($data =mysqli_fetch_array($tampil)) :
        
        ?>
        <tr>
            <td class="text-center" ><?=$no++?></td>
            <td><?=$data['nama_pengirim']?></td>
            <td><?=$data['alamat']?></td>
            <td class="text-center" ><?=$data['no_hp']?></td>
            <td><?=$data['email']?></td>
            <td class="text-center" >
                <a href="?halaman=pengirim_surat&hal=edit&id=<?=$data['id_pengirim']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>