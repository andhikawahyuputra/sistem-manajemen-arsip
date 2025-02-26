<?php
    // uji jika tombol simpan di klik
    if(isset($_POST['btn_simpan']))
    {
        // pengujian data akan di edit atau simpan baru
        if($_GET['hal'] == "edit")
        {
            // perintah edit data
            $ubah = mysqli_query($koneksi, "UPDATE tbl_divisi SET nama_divisi ='$_POST[nama_divisi]' where id_divisi = '$_GET[id]'");
            if($ubah)
            {
                echo "<script>
                    alert('Edit Data Sukses');
                    document.location='?halaman=divisi';
                </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            // simpan data
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_divisi VALUE ('', '$_POST[nama_divisi]') ");
            if($simpan)
            {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=divisi';
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
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_divisi where id_divisi='$_GET[id]'");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                    //jika data ditemukan, maka data ditampung kedalam variabel
                    $vnama_divisi = $data['nama_divisi'];
                }
        }
        // jika data divisi dihapus
        else
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_divisi WHERE id_divisi='$_GET[id]'");
            if($hapus){
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?halaman=divisi';
                </script>";
            }
        }
    }
?>

<!-- rancangan tampilan form input data divisi -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-cloud-upload-alt"></i> Form Data Divisi</h6>
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label class="mb-2" for="nama_divisi">Nama Divisi</label>
            <input type="text" class="form-control mb-3 shadow" id="nama_divisi" name="nama_divisi" value="<?=@$vnama_divisi?>" required>
        </div>
        <button type="submit" name="btn_simpan" class="btn btn-info mt-2"><i class="fas fa-save"></i> Simpan</button> 
        <button type="reset" name="btn_batal" class="btn btn-danger mt-2"><i class="fas fa-eraser"></i> Batal</button>
    </form>
  </div>
</div>

<!-- rancangan tampilan tabel data divisi -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInUp">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-folder-open"></i> Data Divisi</h6>
  </div>
  <div class="card-body mb-0">
    <table class="table table-bordered table-hover shadow">
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-center" width="75%">Nama Divisi</th>
            <th class="text-center" width="20%">Aksi</th>
        </tr>
    <?php
        $tampil =mysqli_query($koneksi, "SELECT * from tbl_divisi");
        $no = 1;
        while($data =mysqli_fetch_array($tampil)) :   
    ?>
        <tr>
            <td class="text-center"><?=$no++?></td>
            <td><?=$data['nama_divisi']?></td>
            <td class="text-center">
        <a href="?halaman=divisi&hal=edit&id=<?=$data['id_divisi']?>" class="btn btn-warning" type="button"><i class="fas fa-edit"></i></a>
        <a href="?halaman=divisi&hal=hapus&id=<?=$data['id_divisi']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini? Menghapus data divisi akan menyebabkan data arsip laporan terkait divisi tersebut menjadi terhapus. Tetap hapus data divisi?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>