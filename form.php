<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/styles.css">

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
      $(document).ready(function() {
         $('.dropdown__item').hover(function() {
            $(this).find('.dropdown__menu').stop(true, true).slideDown('fast');
         }, function() {
            $(this).find('.dropdown__menu').stop(true, true).slideUp('fast');
         });
      });
   </script>

   <style>
      .notification {
         position: fixed;
         top: 20px;
         right: 20px;
         background-color: #4CAF50;
         color: white;
         padding: 15px;
         border-radius: 5px;
         z-index: 999;
         animation: slideInRight 0.5s ease forwards, fadeOut 2s ease 1s forwards;
         pointer-events: none;
         /* Menambahkan properti pointer-events untuk memastikan notifikasi tidak menginterupsi event mouse */
      }

      .notification.active {
         pointer-events: auto;
         /* Mengaktifkan event mouse ketika notifikasi muncul */
      }

      @keyframes slideInRight {
         from {
            right: -200px;
            opacity: 0;
         }

         to {
            right: 20px;
            opacity: 1;
         }
      }

      @keyframes fadeOut {
         from {
            opacity: 1;
         }

         to {
            opacity: 0;
         }
      }
   </style>
   <title>AQI</title>
</head>

<body>
   <!--==================== HEADER ====================-->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="index.php" class="nav__logo">AQI Website</a>

         <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
               <!-- <li class="nav__item">
                     <a href="index.php" class="nav__link">Home</a>
                  </li> -->

               <!--=============== DROPDOWN 2 ===============-->
               <li class="dropdown__item">
                  <div class="nav__link dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown"> <!-- Menambahkan properti cursor -->
                     Navigasi
                  </div>

                  <ul class="dropdown__menu dropdown-menu">

                     <li>
                        <a href="index.php" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-home-2-line nav__home"></i> Home
                        </a>
                     </li>
                     <li>
                        <a href="index.php" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-trophy-line nav__ranking"></i> Peringkat
                        </a>
                     </li>

                     <li>
                        <a href="index.php" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-information-line nav__information"></i> Informasi
                        </a>
                     </li>

                     <li>
                        <a href="index.php" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-lightbulb-line nav__solution"></i> Solusi
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="nav__item">
                  <a href="visualisasi.php" class="nav__link" style="text-decoration: none;">Visualisasi</a>
               </li>

               <li class="nav__item">
                  <a href="form.php" class="nav__link" style="text-decoration: none;">Form</a>
               </li>

               <!-- <li class="nav__item">
                     <a href="#" class="nav__link">Contact Me</a>
                  </li> -->
            </ul>

            <!-- Close button -->
            <div class="nav__close" id="nav-close">
               <i class="ri-close-line"></i>
            </div>
         </div>

         <div class="nav__actions">
            <!-- Search button -->
            <!-- <i class="ri-search-line nav__search" id="search-btn"></i> -->

            <!-- Login button -->
            <li class="">
               <a href="login.php">
                  <i class="ri-login-box-line nav__login"></i>
               </a>
            </li>

            <!-- Toggle button -->
            <div class="nav__toggle" id="nav-toggle">
               <i class="ri-menu-line"></i>
            </div>
         </div>
      </nav>
   </header>

   
   
   <!--==================== MAIN ====================-->
   <!-- Notifikasi -->
   <div id="notificationBar" class="notification-bar">
      <span class="message">Form submitted successfully!</span>
      <span class="close-button" onclick="closeNotification()">×</span>
   </div>


   <section class="form" id="form">
      <h2>Form Pengajuan Laporan Polusi Udara</h2>
      <form action="form.php" method="POST" enctype="multipart/form-data">
         <label for="nama">Nama:</label><br>
         <input type="text" id="nama" name="nama" pattern="[A-Za-z\s]+" title="Harap masukkan hanya huruf" required><br><br>

         <label for="telepon">Nomor Telepon:</label><br>
         <input type="tel" id="telepon" name="telepon" pattern="[0-9]{10,12}" title="Harap masukkan hanya angka" required><br><br>

         <label for="alamat">Alamat:</label><br>
         <textarea id="alamat" name="alamat" rows="4" required></textarea><br><br>

         <label for="deskripsi">Deskripsi Masalah:</label><br>
         <textarea id="deskripsi" name="deskripsi" rows="6" required></textarea><br><br>

         <label for="file">Upload File:</label><br>
         <input type="file" id="file" name="file" required><br><br>

         <input type="submit" value="Submit">
      </form>

   </section>



   <?php
   // Konfigurasi database
   $host = "sql104.infinityfree.net"; // Host database

   $username = "if0_36517731"; // Username database

   $password = "IP2geee8mQ"; // Password database

   $database = "if0_36517731_finpro"; // Nama database

   // Koneksi ke database
   $conn = new mysqli($host, $username, $password, $database);

   // Periksa koneksi
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   // Variabel untuk menyimpan notifikasi
   $notification = "";

   // Tangkap data dari formulir
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama = $_POST['nama'];
      $telepon = $_POST['telepon'];
      $alamat = $_POST['alamat'];
      $deskripsi = $_POST['deskripsi'];

      // Upload file ke server
      $target_dir = "uploads/"; // Direktori tempat menyimpan file

      // Cek apakah direktori uploads/ sudah ada
      if (!is_dir($target_dir)) {
         // Jika belum ada, buat direktori uploads/
         mkdir($target_dir, 0777, true); // Mode 0777 memberikan izin penuh
      }

      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
         $notification = "File " . basename($_FILES["file"]["name"]) . " berhasil diunggah.";
      } else {
         $notification = "Terjadi kesalahan saat mengunggah file.";
      }

      // Simpan data ke database jika file berhasil diunggah
      if ($notification === "File " . basename($_FILES["file"]["name"]) . " berhasil diunggah.") {
         $sql = "INSERT INTO laporan (nama, telepon, alamat, file, deskripsi) VALUES ('$nama', '$telepon', '$alamat', '$target_file', '$deskripsi')";

         if ($conn->query($sql) === TRUE) {
            $notification .= " Laporan berhasil disimpan.";
         } else {
            $notification = "Error: " . $sql . "<br>" . $conn->error;
         }
      }
   }

   // Tutup koneksi
   $conn->close();

   // Tampilkan notifikasi jika ada
   if (!empty($notification)) {
      echo "<div class='notification'>$notification</div>";
   }
   ?>


   <!--=============== MAIN JS ===============-->
   <script src="assets/js/main.js"></script>

   <script>
      // Mendapatkan elemen notifikasi
      var notification = document.getElementById('notificationBar');

      // Menambahkan kelas 'active' saat notifikasi muncul
      notification.classList.add('active');
   </script>

   <script>
      // Mendapatkan elemen notifikasi
      var notification = document.getElementById('notificationBar');

      // Menghapus kelas 'active' saat notifikasi hilang
      notification.classList.remove('active');
   </script>
</body>

</html>