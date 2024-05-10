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
      .informasi {
         padding: 20px;
      }

      @media only screen and (max-width: 768px) {
         .informasi {
            padding: 10px;
         }

         .informasi h1 {
            margin-top: -110px;
            font-size: 24px;
         }

         .informasi h3 {
            font-size: 18px;
         }

         .map-container,
         .table-container {
            overflow-x: auto;
            width: 100%;
         }

         .map-container {
            margin-bottom: 20px;
         }

         .table-container {
            max-width: calc(100%);
         }

         .table-container table {
            width: 100%;
         }

         .solution-container img {
            margin-left: 20px;
            max-width: 250px;
            margin-bottom: 20px;
         }
      }
   </style>

   <!-- fakta -->
   <style>
      .fakta {
         padding: 20px;
      }

      @media only screen and (max-width: 768px) {
         .fakta {
            padding: 10px;
         }

         .fakta h1 {
            font-size: 24px;
            /* Mengurangi ukuran teks h1 */
         }

         .content {
            font-size: 16px;
            /* Mengurangi ukuran teks konten */
         }

         .category-table-container {
            overflow-x: auto;
            /* Menambahkan overflow-x: auto untuk mengaktifkan horizontal scrolling jika tabel melebihi lebar layar */
            width: 100%;
            /* Menyesuaikan lebar konten dengan lebar layar */
         }

         .category-table-container table {
            width: 100%;
            /* Menyesuaikan lebar tabel dengan lebar konten */
         }

         .category-table-container table th,
         .category-table-container table td {
            padding: 8px;
            /* Menambahkan padding agar lebih mudah dibaca */
         }
      }
   </style>

   <style>
      .fakta {
         padding: 20px;
      }

      @media only screen and (max-width: 768px) {
         .fakta {
            padding: 10px;
         }

         .fakta h1 {
            font-size: 24px;
            /* Mengurangi ukuran teks h1 */
         }

         .content {
            font-size: 16px;
            /* Mengurangi ukuran teks konten */
         }

         .category-table-container {
            display: flex;
            /* Menggunakan flexbox untuk mengatur tata letak */
            flex-direction: column;
            /* Menjadikan tata letak menjadi kolom */
            align-items: center;
            /* Pusatkan konten secara horizontal */
         }

         .category-table-container table {
            width: 100%;
            /* Menyesuaikan lebar tabel dengan lebar konten */
         }

         .category-table-container table th,
         .category-table-container table td {
            padding: 8px;
            /* Menambahkan padding agar lebih mudah dibaca */
            text-align: center;
            /* Pusatkan teks secara horizontal */
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
                        <a href="#main" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-home-2-line nav__home"></i> Home
                        </a>
                     </li>
                     <li>
                        <a href="#informasi" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-trophy-line nav__ranking"></i> Peringkat
                        </a>
                     </li>

                     <li>
                        <a href="#fakta" class="dropdown__link" style="text-decoration: none;">
                           <i class="ri-information-line nav__information"></i> Informasi
                        </a>
                     </li>

                     <li>
                        <a href="#solusi" class="dropdown__link" style="text-decoration: none;">
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
   <main class="main" id="main">
      <video class="main__bg" autoplay loop muted>
         <source src="assets/img/home (4).mp4" type="video/mp4">
      </video>
   </main>

   <!-- Content 1-->
   <section class="informasi" id="informasi">
      <h1>Kualitas Udara di DKI Jakarta</h1>
      <h3>Berdasarkan data dari tahun 2019-2021</h3>
      <div class="map-container animated-box">
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTSRxMLwUZake6UGuBGqoyPcQLGFkJK9A"></script>
         </head>

         <body>
            <div id="map"></div>
            <script src="script.js"></script>
         </body>
      </div>

      <div class="table-container animated-box">
         <table>
            <thead>
               <tr>
                  <th>Stasiun</th>
                  <th>AQI US</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Lubang Buaya</td>
                  <td><span>58</span></td>
               </tr>
               <tr>
                  <td>Bunderan HI</td>
                  <td><span>52</span></td>
               </tr>
               <tr>
                  <td>Kelapa Gading</td>
                  <td><span>47</span></td>
               </tr>
               <tr>
                  <td>Jagakarsa</td>
                  <td><span>44</span></td>
               </tr>
               <tr>
                  <td>Kebon Jeruk</td>
                  <td><span>43</span></td>
               </tr>
            </tbody>
         </table>
      </div>
   </section>

   <!-- Content 2-->
   <section class="fakta" id="fakta">
      <div class="row">
         <div class="col-md-6">
            <div class="contents">
               <h1>Seberapa Berpolusikah DKI Jakarta?</h1>
               <p>DKI Jakarta menghadapi tantangan serius terkait polusi udara, dengan beberapa stasiun pemantauan kualitas udara seperti Bundaran HI, Kepala Gading, Jagakarsa, Lubang Buaya, dan Kebon Jeruk melaporkan tingkat polutan yang tinggi. Kepadatan penduduk, industri, dan lalu lintas yang padat di sekitar stasiun-stasiun ini merupakan kontributor utama terhadap tingkat polusi udara yang tinggi. Upaya untuk mengurangi polusi ini telah dilakukan, namun kerja sama yang lebih besar dan tindakan yang bersungguh-sungguh dari semua pihak diperlukan untuk secara efektif mengatasi dan menciptakan lingkungan yang lebih bersih, hijau, dan sehat agar penduduk Jakarta dapat berkembang dan menikmati kualitas hidup yang lebih baik.</p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="category-table-containers animated-box">
               <table>
                  <thead>
                     <tr>
                        <th>Kategori</th>
                        <th>Range AQI US</th>
                        <th>Dampak Kesehatan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Baik😊</td>
                        <td>0-50</td>
                        <td>Tidak ada dampak kesehatan</td>
                     </tr>
                     <tr>
                        <td>Sedang🙂</td>
                        <td>51-100</td>
                        <td>Dapat menyebabkan masalah pernapasan pada individu yang sensitif</td>
                     </tr>
                     <tr>
                        <td>Tidak Sehat😷</td>
                        <td>>100</td>
                        <td>Dapat menyebabkan masalah pernapasan dan masalah kesehatan lainnya</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>

   <!-- <section class="berita" id="berita">
      <div class="news-grid animated-box">
         <div class="row">
            <div class="col-md-6">
               <div class="news-boxs">
                  <img src="content1.png" alt="Gambar" class="news-image">
                  <h5 style="color: black;" class="mt-2">2019, Polusi Udara Jakarta Dinilai Lebih Parah dari 2018</h5>
                  <p>Kualitas udara di DKI Jakarta pada tahun 2019 dinilai lebih buruk daripada tahun 2018. Prediksi ini berdasarkan pengukuran PM 2,5...</p>
                  <a class="btn btn-sm btn-primary mb-3" href="https://www.bing.com/ck/a?!&&p=350156ff204e69a7JmltdHM9MTcxNDE3NjAwMCZpZ3VpZD0zMzcxYWY2Ni00ZGUxLTY0YTItM2FkYi1iZjFlNGNiNzY1MjImaW5zaWQ9NTE5OA&ptn=3&ver=2&hsh=3&fclid=3371af66-4de1-64a2-3adb-bf1e4cb76522&psq=berita+polusi+udra+dki+jakarta+2019&u=a1aHR0cHM6Ly9tZWdhcG9saXRhbi5rb21wYXMuY29tL3JlYWQvMjAxOS8wNi8yOS8xNjQ3MDIzMS8yMDE5LXBvbHVzaS11ZGFyYS1qYWthcnRhLWRpbmlsYWktbGViaWgtcGFyYWgtZGFyaS0yMDE4&ntb=1" target="_blank">Baca Selengkapnya</a>
               </div>
            </div>
            <div class="col-md-6">
               <div class="news-boxs">
                  <img src="content2.png" alt="Gambar" class="news-image">
                  <h5 style="color: black;" class="mt-2">Kualitas Udara Jakarta Dinyatakan Terburuk di Dunia</h5>
                  <p>Jakarta menjadi kota paling berpolusi di dunia versi AirVisual pagi ini. Jakarta menempati peringkat teratas dengan kondisi udara...</p>
                  <a class="btn btn-sm btn-primary mb-3" href="https://www.bing.com/ck/a?!&&p=cd09581c8b339dd4JmltdHM9MTcxNDE3NjAwMCZpZ3VpZD0zMzcxYWY2Ni00ZGUxLTY0YTItM2FkYi1iZjFlNGNiNzY1MjImaW5zaWQ9NTMwNg&ptn=3&ver=2&hsh=3&fclid=3371af66-4de1-64a2-3adb-bf1e4cb76522&psq=berita+polusi+udra+dki+jakarta+2019&u=a1aHR0cHM6Ly93d3cuZHcuY29tL2lkL2t1YWxpdGFzLXVkYXJhLWpha2FydGEtYnVydWstcGVtcHJvdi1ka2ktcGVuZ2FydWgtcGVtYmFuZ3VuYW4tdHJvdG9hci9hLTQ5NzgxMjA1&ntb=1" target="_blank">Baca Selengkapnya</a>
               </div>
            </div>
         </div>
      </div>
   </section> -->

   <section class="solusi mt-3" id="solusi">
      <div class="solution-container animated-box">
         <div class="row">
            <div class="col-md-6 col-xl-3">
               <img src="assets/img/polusi.png" alt="Solusi Image">
            </div>
            <div class="col-md-6 col-xl-9">
               <div class="solution-content">
                  <h2>Solusi untuk Mengatasi Polusi Udara</h2>
                  <p>Untuk mengatasi polusi di Jakarta, beberapa solusi yang dapat dipertimbangkan meliputi:</p>
                  <ol>
                     <li>Transportasi Publik yang Efisien: Meningkatkan jaringan transportasi publik seperti bus, kereta, dan MRT untuk mengurangi penggunaan kendaraan pribadi yang menjadi penyumbang utama polusi udara.</li>
                     <li>Pengendalian Emisi Kendaraan: Menerapkan standar emisi yang lebih ketat untuk kendaraan bermotor dan mendorong penggunaan kendaraan ramah lingkungan seperti mobil listrik.</li>
                     <li>Penghijauan Kota: Menanam lebih banyak pohon dan taman serta menciptakan ruang terbuka hijau yang lebih luas untuk menyaring polusi udara dan meningkatkan sirkulasi udara.</li>
                  </ol>
                  <p>Mari bersama-sama berkontribusi untuk menjaga lingkungan kita agar tetap bersih dan sehat!
                     <br>"Lingkungan yang sehat adalah hak setiap warga negara. Mari kita jaga bersama-sama untuk kebaikan kita dan generasi mendatang."
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>


   <!-- FOOTER -->

   <footer class="footer">
      <div class="footer-text">
         <p>Copyright &copy; 2024 by @kelompok-5 | All Rights Reserved.</p>
      </div>
   </footer>


   <!--=============== MAIN JS ===============-->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="assets/js/main.js"></script>
</body>

</html>