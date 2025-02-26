<!-- MEMULAI SESI USER -->
<?php
  session_start();
  //mengatasi jika user langsung masuk menggunakan link tanpa login
  if(empty($_SESSION['id_user']) or empty($_SESSION['username']))
  {
    echo "<script>
                    alert('Silahkan Login Terlebih Dahulu!');
                    document.location='index.php';
            </script>";
  }
?>


<!-- PENGATURAN FRAMEWORK WEB -->
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <script src="assets/js/color-modes.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>Sistem Manajemen Arsip - Bawaslu Kabupaten Tanah Datar</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path
          d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"
        />
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
          d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"
        />
        <path
          d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"
        />
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
          d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
        />
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button
        class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center border bg-body-tertiary"
        id="bd-theme"
        type="button"
        aria-expanded="false"
        data-bs-toggle="dropdown"
        aria-label="Toggle theme (auto)"
      >
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
          <use href="#circle-half"></use>
        </svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul
        class="dropdown-menu dropdown-menu-end shadow text-end"
        aria-labelledby="bd-theme-text"
      >
        <li>
          <button
            type="button"
            class="dropdown-item"
            data-bs-theme-value="light"
            aria-pressed="false"
          >
            <svg class="bi me-2 opacity-50" width="1em" height="1em">
              <use href="#sun-fill"></use>
            </svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em">
              <use href="#check2"></use>
            </svg>
          </button>
        </li>
        <li>
          <button
            type="button"
            class="dropdown-item"
            data-bs-theme-value="dark"
            aria-pressed="false"
          >
            <svg class="bi me-2 opacity-50" width="1em" height="1em">
              <use href="#moon-stars-fill"></use>
            </svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em">
              <use href="#check2"></use>
            </svg>
          </button>
        </li>
        <li>
          <button
            type="button"
            class="dropdown-item active"
            data-bs-theme-value="auto"
            aria-pressed="true"
          >
            <svg class="bi me-2 opacity-50" width="1em" height="1em">
              <use href="#circle-half"></use>
            </svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em">
              <use href="#check2"></use>
            </svg>
          </button>
        </li>
      </ul>
    </div>
    <main>
      <!-- AWAL HEADER -->
      <div class="container py-4">
        <header class="p-3 mb-3 border-bottom">
          <div class="container">
            <div
              class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
            >
              <!-- logo bawaslu di header -->
              <a
                href="#"
                class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis dropdown-toggle text-decoration-none"
                type="button"  
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample"
              >
                <img
                  class="bi me-1"
                  width="40"
                  height="40"
                  role="img"
                  aria-label="logobawaslu"
                  src="assets/logo.png"
                >
              </a>

              <!-- Menu-menu yang ada di header -->
              <ul
                class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
              >
                <!-- tampilan awal -->
                <li>
                  <a href="?" class="nav-link px-2 link-secondary me-2">[Sistem Manajemen Arsip]</a>
                </li>
                <!-- beranda -->
                <li>
                  <a href="?halaman=beranda" class="nav-link px-2 link-body-emphasis"
                    >Beranda</a
                  >
                </li>
                <!-- data divisi -->
                <li>
                  <a href="?halaman=divisi" class="nav-link px-2 link-body-emphasis"
                    >Data Divisi</a
                  >
                </li>
                <!-- data pelaksana, terdiri dari data pengawas dan pengirim surat -->
                <li>
                  <div class="dropdown text-end">
                    <a
                      href="#"
                      class="nav-link link-body-emphasis px-2 dropdown-toggle"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >Data Pelaksana
                    </a>
                    <ul class="dropdown-menu text-small">
                      <li><a class="dropdown-item" href="?halaman=pengawas"><i class="fas fa-folder"></i> Data Pengawas</a></li>
                      <li><a class="dropdown-item" href="?halaman=pengirim_surat"><i class="fas fa-folder"></i> Data Pengirim Surat</a></li>
                    </ul>
                  </div>
                </li>
                <!-- data kearsipan, terdiri dari arsip surat dan arsip laporan -->
                <li>
                  <div class="dropdown text-end">
                    <a
                      href="#"
                      class="nav-link link-body-emphasis px-2 dropdown-toggle"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >Kearsipan
                    </a>
                    <ul class="dropdown-menu text-small">
                      <li><a class="dropdown-item" href="?halaman=arsip_surat"><i class="fas fa-folder"></i> Arsip Surat</a></li>
                      <li><a class="dropdown-item" href="?halaman=laporan"><i class="fas fa-folder"></i> Arsip Laporan</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
              <!-- tampilan nama user yang login di header -->
              <a
                  href="#"
                  class="nav-link text-capitalize"
                  aria-expanded="false"
                >
                Selamat Datang, <?php echo $_SESSION['nama_user'];?>
              </a>
              <!-- dropdown toggle menu pilihan khusus user termasuk opsi logout -->
              <div class="dropdown text-end">
                <a
                  href="#"
                  class="nav-link link-body-emphasis px-2 dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                <img class="rounded-circle border" width="40" height="40" src="files/profil/<?=$_SESSION['file']?>" alt="image"/>
                </a>
                <!-- menu user terdiri dari : profil, pengaturan, dan logout -->
                <ul class="dropdown-menu text-small">
                  <li><a class="dropdown-item" href="?halaman=profil"><i class="fas fa-user"></i> Profil</a></li>
                  <li><a class="dropdown-item" href="?halaman=pengaturan"><i class="fas fa-cog"></i> Pengaturan</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item text-danger" href="logout.php" onclick="return confirm('Apakah anda yakin ingin sign out?')"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                </ul>
              </div>
            </div>
          </div>
        </header>
        <!-- AKHIR HEADER -->

        <!-- SIDEBAR -->
        <div
          class="offcanvas offcanvas-start text-center"
          style="width: 280px"
          tabindex="-1"
          id="offcanvasExample">
          <div class="offcanvas-body">
            <a
              href="#"
              class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
            >
              <img
                class="bi pe-none me-2"
                width="32"
                height="32"
                src="assets/logo.png"
              />
              <span class="fs-6 fw-bold">Sistem Manajemen Arsip</span>
            </a>
            <hr />
            <div class="text-center border bg-body-tertiary rounded-3 shadow">
                <p class="fw-bold mt-1"><span id="fullyear"></span></p>
                <p class="fw-bold mb-1"><span id="hours"></span>:<span id="minutes"></span>:<span id="seconds"></span> <span id="amOrpm"></span></p>
            </div>
            <hr />
            <div>
              <p class="text-start"><i class="fas fa-comments"></i> Catatan</p>
            </div>
            <form method="post" action="templates/notes.php">
              <div class="input-group mb-3">
                <input type="text" class="form-control shadow" id="note" placeholder="Tuliskan catatan">
                <button class="btn btn-outline-info" type="submit" id="upload">Upload</button>
              </div>
            </form>
            <hr />
            <div>
              <table class="table text-start table-hover align-middle">
                <?php
                    // program untuk memanggil data notes di database ke dalam tabel
                    $catt =mysqli_query($koneksi, "SELECT * FROM tbl_note");
                    while($nn =mysqli_fetch_array($catt)) :
                ?>
                <tbody>
                  <tr>
                    <th class="table-active" scope="row"><img class="rounded-circle border" width="40" height="40" src="files/profil/<?=$nn['file']?>" alt="image"/></th>

                      <td class="table-active"><?=$nn['nama_user']?></td>
                  </tr>
                  <tr>
                    <td colspan="2" scope="row"><i class="fas fa-comment"></i> <?=$nn['note']?></td>
                  </tr>
                </tbody>     
                <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>