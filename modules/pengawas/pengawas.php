<?php
    // uji jika tombol simpan di klik
    if(isset($_POST['btn_simpan']))
    {
        // pengujian data akan di edit atau simpan baru
        if(@$_GET['hal'] == "edit")
        {
            // perintah edit data
            $ubah = mysqli_query($koneksi, "UPDATE tbl_pengawas SET 
                                            nama_pengawas ='$_POST[nama_pengawas]',
                                            jabatan ='$_POST[jabatan]',
                                            alamat ='$_POST[alamat]',
                                            no_hp ='$_POST[no_hp]'
                                            where id_pengawas = '$_GET[id]'");
            if($ubah)
            {
                echo "<script>
                    alert('Edit Data Sukses');
                    document.location='?halaman=pengawas';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('Edit Data Gagal!');
                    document.location='?halaman=pengawas';
                </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            // simpan data
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengawas 
                                                VALUE (     '', 
                                                            '$_POST[nama_pengawas]',
                                                            '$_POST[jabatan]',
                                                            '$_POST[alamat]',
                                                            '$_POST[no_hp]'
                                                             ) ");
            if($simpan)
            {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=pengawas';
                </script>";
            }else
            {
                echo "<script>
                    alert('Simpan Data Gagal! Mohon Coba Lagi');
                    document.location='?halaman=pengawas';
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
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengawas where id_pengawas='$_GET[id]'");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                    //jika data ditemukan, maka data ditampung kedalam variabel
                    $vnama_pengawas = $data['nama_pengawas'];
                    $vjabatan = $data['jabatan'];
                    $valamat = $data['alamat'];
                    $vno_hp = $data['no_hp'];
                }
        }else
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengawas WHERE id_pengawas='$_GET[id]'");
            if($hapus){
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?halaman=pengawas';
                </script>";
            }
        }  
    }
?>

<!-- rancangan tampilan form input data pengawas -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-cloud-upload-alt"></i> Form Data Pengawas</h6>
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label for="nama_pengawas">Nama Pengawas</label>
            <input type="text" class="form-control mt-2 shadow" id="nama_pengawas" name="nama_pengawas" value="<?=@$vnama_pengawas?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control mt-2 shadow" id="jabatan" name="jabatan" value="<?=@$vjabatan?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control mt-2 shadow" id="alamat" name="alamat" value="<?=@$valamat?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="no_hp">Nomor Handphone</label>
            <input type="text" class="form-control mt-2 shadow" id="no_hp" name="no_hp" value="<?=@$vno_hp?>" required>
        </div>

        <button type="submit" name="btn_simpan" class="btn btn-info mt-3"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" name="btn_batal" class="btn btn-danger mt-3"><i class="fas fa-eraser"></i> Batal</button>
    </form>
  </div>
</div>

<!-- rancangan tampilan tabel data divisi -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInUp">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-folder-open"></i> Data Pengawas</h6>
  </div>
  <div class="card-body mb-0">
    <table class="table table-bordered table-hover shadow">
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-center" width="25%">Nama Pengawas</th>
            <th class="text-center" width="15%">Jabatan</th>
            <th class="text-center" width="25%">Alamat</th>
            <th class="text-center" width="10%">No HP</th>
            <th class="text-center" width="20%">Aksi</th>
        </tr>
        <?php
            $tampil =mysqli_query($koneksi, "SELECT * from tbl_pengawas order by id_pengawas");
            $no = 1;
            while($data =mysqli_fetch_array($tampil)) :
        
        ?>
        <tr>
            <td class="text-center"><?=$no++?></td>
            <td><?=$data['nama_pengawas']?></td>
            <td class="text-center"><?=$data['jabatan']?></td>
            <td><?=$data['alamat']?></td>
            <td class="text-center"><?=$data['no_hp']?></td>
            <td class="text-center">
                <a href="?halaman=pengawas&hal=edit&id=<?=$data['id_pengawas']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a href="?halaman=pengawas&hal=hapus&id=<?=$data['id_pengawas']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini? Menghapus data pengawas beresiko menghapus data laporan yang berkaitan dengan pengawas tersebut. Tetap hapus data pengawas?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>