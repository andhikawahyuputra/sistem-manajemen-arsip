<!-- PROGRAM TAMPILAN HALAMAN PENDAFTARAN/ DAFTAR USER BARU -->
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

    <div
      class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle"
    >
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
      <form class="form-signin" method="post" action="cek_daftar.php" enctype="multipart/form-data">
            <div class="p-2 animate__animated animate__fadeIn">
                <div class="container-fluid text-center py-5">
                  <div class="container-fluid text-center">
                    <img src="assets/logo.png" widht="100" height="100">
                  </div>
                      <p class="fs-3 fw-bold">DAFTAR PENGGUNA BARU</p>
                      <p class="fs-3 mb-3 fw-bold"><i class="fas fa-user-plus"></i></p>
                    <div class="container text-center">
                  <div class="row">
                    <div class="col-lg-4 rounded-3 p-5">
                      
                    </div>
                    <div class="col-lg-4 border text-start bg-body-tertiary rounded-3 shadow p-4">
                      <div class="form-label-group mb-3">
                        <label for="nama_user" class="mb-2">Nama Lengkap</label>  
                        <input type="text" id="nama_user" name="nama_user" class="form-control shadow" required autofocus >
                      </div>
                      <div class="form-label-group mb-3">
                        <label for="username" class="mb-2">Email / Username</label>
                        <input type="email" id="username" name="username" class="form-control shadow" required >
                      </div>
                      <div class="form-label-group mb-3">
                        <label for="jenis_kelamin" class="mb-2">Jenis Kelamin</label>
                        <select type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-select shadow" required >
                          <option selected></option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-label-group mb-3">
                        <label for="alamat_user" class="mb-2">Alamat</label>
                        <input type="text" id="alamat_user" name="alamat_user" class="form-control shadow" required >
                      </div>
                      <div class="form-label-group mb-3">
                        <label for="no_hp" class="mb-2">Nomor Handphone</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control shadow" required >
                      </div>
                      <div class="form-label-group mb-3">
                        <label for="file" class="mb-2">Upload Foto Profil</label>
                        <input type="file" id="profil" name="file" class="form-control shadow" required >
                      </div>
                      <div class="form-label-group mb-3">
                        <label for="inputPassword" class="mb-2">Masukkan Password Anda</label>
                        <input type="password" id="password" name="password" class="form-control shadow" required>
                      </div>
                      <div class="form-label-group mb-4">
                        <label for="konfirmasi_pw" class="mb-2">Konfirmasi Password Anda</label>
                        <input type="password" id="konfirmasi_pw" name="konfirmasi_pw" class="form-control shadow" required>
                      </div>
                        <div class="form-check text-start my-2 mb-4">
                            <input class="form-check-input shadow" type="checkbox" value="" onclick="showHide()" id="showpw">
                            <label class="form-check-label" for="showpw">
                                Tampilkan kata sandi
                            </label>
                        </div>

                          <hr class="my-4">
                          <h2 class="fs-5 fw-bold mb-3">Masuk melalui metode lain</h2>
                          <a href="https://x.com/i/flow/login?lang=id" target="_blank" class="w-100 py-2 mb-2 btn btn-outline-success rounded-3" type="submit">
                          <img width="16" height="16" src="https://img.icons8.com/ios/100/FFFFFF/twitter-circled--v1.png" alt="twitter-circled--v1"/></img>
                          Masuk melalui Twitter
                          </a>
                          <a href="https://web.facebook.com/login/?locale=id_ID&_rdc=1&_rdr" target="_blank" class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                          <img width="16" height="16" src="https://img.icons8.com/ios/100/FFFFFF/facebook-new.png" alt="facebook-new"/></img>
                          Masuk melalui Facebook
                          </a>
                          <a href="https://www.instagram.com/accounts/login/" target="_blank" class="w-100 py-2 mb-2 btn btn-outline-danger rounded-3" type="submit">
                          <img width="16" height="16" src="https://img.icons8.com/ios/100/FFFFFF/instagram-new--v1.png" alt="instagram-new--v1"/></img>
                          Masuk melalui Instagram
                          </a>
                                <div class="form-check text-start my-2 mb-4">
                                    <input class="form-check-input shadow" type="checkbox" value="remember-me" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dengan mengklik daftar, anda menyetujui <a href="#">syarat</a> dan <a href="#">ketentuan</a> yang berlaku.
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info w-100 py-2"> Daftar </button>
                                <p class="text-center mt-3">Sudah punya akun? <a href="index.php">Masuk <i class="fas fa-user-check"></i></a></p>
                                </div>
                              </div>
                            </div>
                            <p class="mt-2 mb-0 text-muted text-center">&copy; 2024 - <?=date('Y')?> . by Bawaslu Kabupaten Tanah Datar</p>
                          </div>
                      </div>   
          </div>
      </form>
    </main>
    <!-- script show/hide kata sandi -->
    <script type="text/javascript">
      function showHide() 
      {
        var pw = document.getElementById("password");
        var k_pw = document.getElementById("konfirmasi_pw");
          if (pw.type === "password") 
          {
            pw.type = "text";
            k_pw.type = "text";
          } 
          else 
          {
            pw.type = "password";
            k_pw.type = "password";
          }
      } 
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>