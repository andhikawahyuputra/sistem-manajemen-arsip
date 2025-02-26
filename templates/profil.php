

<!-- rancangan tampilan halaman profil -->
<div class="col-lg-8 mx-auto p-4 py-md-3">
      <h2 class="pb-2 text-center border-bottom mb-5 animate__animated animate__fadeInDown"><i class="fas fa-user-alt"></i> BIODATA</h2>

  <!-- menampilkan data user yang login -->
  <main>
    <div class="text-center">
      <img class="mb-3 border img-fluid animate__animated animate__fadeInDown" width="150" height="150" src="files/profil/<?=$_SESSION['file']?>" alt="image"/>
      <h1 class="display-6 text-body-emphasis text-center mt-1 mb-4 animate__animated animate__fadeInUp"><?php echo $_SESSION['nama_user'];?></h1>
      <!-- TAMBAHKAN PROGRAM JABATAN -->
      <ul class="list-unstyled fs-5 col-md-7 mx-auto text-center mb-5 animate__animated animate__fadeInUp">
        <li><?php echo $_SESSION['alamat_user'];?></li>
        <li><?php echo $_SESSION['username'];?></li>
        <li><?php echo $_SESSION['no_hp'];?></li>
      </ul>
    </div>

    <!-- menambahkan fitur tombol logout dibawah profil -->
    <hr class="col-12 col-md-12 mb-3">
    <div class="text-center animate__animated animate__fadeInUp">
      <a href="logout.php" class="btn btn-danger btn-lg px-4" onclick="return confirm('Apakah anda yakin ingin sign out?')"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
    </div>
  </main>
</div>
