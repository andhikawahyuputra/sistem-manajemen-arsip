
        <!-- AWAL FOOTER -->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-1 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2024-<?=date('Y') ?> | Bawaslu Kabupaten Tanah Datar</span>
          </div>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><img width="35" height="35" src="https://img.icons8.com/stickers/100/instagram-new--v2.png" alt="instagram-new--v2"/></img></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><img width="35" height="35" src="https://img.icons8.com/stickers/100/twitter-circled.png" alt="twitter-circled"/></img></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><img width="35" height="35" src="https://img.icons8.com/stickers/100/facebook-new--v2.png" alt="facebook-new--v2"/></img></a></li>
          </ul>
        </footer>
        <!-- AKHIR FOOTER -->
      </div>
    </main>

    <!-- folder javascript / js -->

    <!-- script menampilkan waktu -->
    <script type="text/javascript">
      function SettingCurrentTime() {
          var currentTime = new Date();
          var hours = currentTime.getHours();
          var minutes = currentTime.getMinutes();
          var seconds = currentTime.getSeconds();
          var amOrPm = hours < 12 ? "AM" : "PM";

          hours = hours === 0 ? 12 : hours > 12 ? hours - 12 : hours;
          hours = addZero(hours);
          minutes = addZero(minutes);
          seconds = addZero(seconds);

          var currentDate = currentTime.getDate();
          var currentMonth = ConvertMonth(currentTime.getMonth());
          var currentYear = currentTime.getFullYear();
          var fullDateDisplay = `${currentDate} ${currentMonth} ${currentYear}`;

          document.getElementById("hours").innerText = hours;
          document.getElementById("minutes").innerText = minutes;
          document.getElementById("seconds").innerText = seconds;
          document.getElementById("amOrpm").innerText = amOrPm;
          document.getElementById("fullyear").innerText = fullDateDisplay;

          var timer = setTimeout(SettingCurrentTime, 1000);
      }

      function addZero(component) {
          return component < 10 ? "0" + component : component;
      }

      function ConvertMonth(component) {
          month_array = new Array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');    
          return month_array[component];
      }

      SettingCurrentTime();
    </script>

    <!-- script show/hide kata sandi -->
    <script type="text/javascript">
      function showHide() 
      {
        var inputan = document.getElementById("password");
          if (inputan.type === "password") 
          {
            inputan.type = "text";
          } 
          else 
          {
            inputan.type = "password";
          }
      } 
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>