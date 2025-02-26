<?php
    // uji jika tombol edit profil di klik
    if(isset($_POST['simpanprofil']))
    {
        $ubah = mysqli_query($koneksi, "UPDATE tbl_user SET 
                                                    nama_user ='$_POST[nama_user]',
                                                    username = '$_POST[username]',
                                                    jenis_kelamin = '$_POST[jenis_kelamin]',
                                                    alamat_user = '$_POST[alamat_user]',
                                                    no_hp = '$_POST[no_hp]',
                                                    password = '$_POST[password]'
                                                        WHERE 
                                                    id_user = '$_SESSION[id_user]'");
    }
?>

<?php
    include "configs/function_profil.php";
    if(isset($_POST['profilbaru']))
    {
        $profil = upload();
        $a = "UPDATE tbl_user SET file ='$profil' WHERE id_user = '$_SESSION[id_user]' ";
        if(mysqli_query($koneksi, $a)){
            echo"<script>
                        document.location='?halaman=pengaturan';
                </script>";
        }
    }
?>

<!-- pengaturan tabel yang menampilkan data user di profil -->
  <div class="container px-4 py-3">
    <h2 class="pb-2 text-center border-bottom mb-4 animate__animated animate__fadeInDown"><i class="fas fa-tools"></i> Pengaturan</h2>
    <h4 class="pb-2 col-md-4 border-bottom mb-4 animate__animated animate__fadeInUp"><i class="fas fa-fingerprint"></i> Data Pengguna</h4>
    <table class="table table-bordered table-striped">

        <!-- kepala tabel -->
        <tr>
            <th class="text-center" width="20%">Nama Pengguna</th>
            <th class="text-center" width="10%">E-mail</th>
            <th class="text-center" width="10%">Jenis Kelamin</th>
            <th class="text-center" width="25%">Alamat</th>
            <th class="text-center" width="10%">Nomor HP</th>
            <th class="text-center" width="10%">Kata Sandi</th>
            <th class="text-center" width="10%">Aksi</th>
        </tr>

        <!-- program agar hanya menampilkan data user yang login -->
        <?php
            $tampil =mysqli_query($koneksi, "SELECT 
                        tbl_user.*
                     FROM
                        tbl_user
                     WHERE
                        tbl_user.id_user = '$_SESSION[id_user]'
                     ");
            $no = 1;
            while($data =mysqli_fetch_array($tampil)) :
        
        ?>

        <!-- badan tabel -->
        <tr>
            <td class="text-center"><?=$data['nama_user']?></td>
            <td class="text-center"><?=$data['username']?></td>
            <td class="text-center"><?=$data['jenis_kelamin']?></td>
            <td class="text-center"><?=$data['alamat_user']?></td>
            <td class="text-center"><?=$data['no_hp']?></td>
            <td class="text-center"><i class="fas fa-lock"></i></td>
            <td class="text-center">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editprofil"><i class="fas fa-edit"></i></button>

                <!-- rancangan tampilan form edit profil -->
                <form method="post" action="">
                    <div class="modal fade" id="editprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <div class="form-group">
                                    <label for="nama_user" class="mb-2">Nama Pengguna</label>
                                    <input type="text" class="form-control mb-3 shadow" id="nama_user" name="nama_user" value="<?=$data['nama_user']?>">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="mb-2">Email</label>
                                    <input type="text" class="form-control mb-3 shadow" id="username" name="username" value="<?=$data['username']?>">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="mb-2">Jenis Kelamin</label>
                                    <select type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-select mb-3 shadow">
                                        <option selected><?=$data['jenis_kelamin']?></option>
                                        <option><?php if($data['jenis_kelamin']=='Laki-Laki'){echo "Perempuan";} else {if($data['jenis_kelamin']=='Perempuan'){echo "Laki-Laki";}}?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_user" class="mb-2">Alamat</label>
                                    <input type="text" class="form-control mb-3 shadow" id="alamat_user" name="alamat_user" value="<?=$data['alamat_user']?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="mb-2">Nomor Handphone</label>
                                    <input type="text" class="form-control mb-3 shadow" id="no_hp" name="no_hp" value="<?=$data['no_hp']?>">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="mb-2">Kata Sandi</label>
                                    <input type="password" class="form-control mb-3 shadow" id="password" name="password" value="<?=$data['password']?>">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" onclick="showHide()" id="showpw">
                                        <label class="form-check-label" for="showpw">
                                            Tampilkan kata sandi
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-target="#notifeditprofil" data-bs-toggle="modal"><i class="fas fa-save"></i> Simpan</button>       
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- tampilan notifikasi setelah selesai edit profil -->
                    <div class="modal fade" id="notifeditprofil" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Notifikasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h1 class="modal-title fs-5 p-4" id="exampleModalToggleLabel2">Profil berhasil diperbaharui.</h1>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="simpanprofil" data-bs-toggle="modal" class="btn btn-info"><i class="fas fa-reply-all"></i> Kembali</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
        <h4 class="pb-2 col-md-3 border-bottom mb-4 animate__animated animate__fadeInUp"><i class="fas fa-user-circle"></i> Ganti Foto Profil</h4>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <input type="file" id="profil" name="file" class="form-control mb-3 shadow" required >
                <button type="button" class="rounded btn btn-warning" data-bs-toggle="modal" data-bs-target="#notifunggahprofil">
                <i class="fas fa-upload"></i> Unggah</button>

                <!-- Notifikasi Unggah Foto Profil Baru Sukses -->
                <div class="modal fade" id="notifunggahprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel1">Notifikasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-unstyled text-center">
                            <li class="modal-title fs-5 p-4">
                                Profil berhasil diperbaharui.
                            </li>
                            <li>
                                Mohon login kembali untuk melihat perubahan.
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit" id="profilbaru" name="profilbaru" data-bs-dismiss="modal">Kembali</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
  </div>