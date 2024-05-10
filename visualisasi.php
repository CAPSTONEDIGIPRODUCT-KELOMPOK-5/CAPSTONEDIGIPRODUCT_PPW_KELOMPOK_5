<!DOCTYPE html>

<html lang="en">



<head>

   <meta charset="UTF-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">



   <!--=============== REMIXICONS ===============-->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">



   <!--=============== CSS ===============-->

   <!-- Bootstrap CSS -->

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



   <title>AQI</title>

   <style>

      @media only screen and (max-width: 768px) {

.visualisasi {
margin-top: 90px;

}

         .visualisasi-content h2 {

            text-align: left;

            font-size: 22px;

            margin-right: -40px;

            margin-left: -40px;

            margin-top: 10px;
          
            color: black;

         }



         .visualisasi-content p {

            text-align: justify;

            font-size: 16px;

            margin-right: -40px;

            margin-left: -40px;

            margin-bottom: -30px;

            color: black;

         }



         .visualisasi1 img {

            margin-left: -16px;


         }



         .visualisasi img {

            margin-left: -16px;

         }

.polutan th, td, tr{
text-align: justify;
color: black;

}

      }

   </style>

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

   <section class="visualisasi" id="visualisasi">

      <div class="container">

         <div class="row">

            <div class="col-md-6">

               <img src="assets/img/bar.jpeg" alt="visualisasi Image" class="img-fluid">

            </div>

            <div class="col-md-6">

               <div class="visualisasi-content">

                  <h2>Data Persebaran Kategori Kualitas Udara</h2>

                  <p>Stasiun 0 merepresentasikan DKI1 (Bunderan HI), 1 merepresentasikan DKI2 (Kelapa Gading), 2 merepresentasikan DKI3 (Jagakarsa), 3 merepresentasikan DKI4 (Lubang Buaya), dan 4 merepresentasikan DKI5 (Kebon Jeruk).Data Persebaran Kategori Kualitas Udara memberikan gambaran tentang seberapa sering berbagai tingkat kualitas udara terjadi dalam suatu lokasi atau periode waktu. Analisis data ini membantu dalam mengidentifikasi pola polusi udara, mengukur dampak kebijakan lingkungan, serta memberikan dasar untuk pengambilan keputusan dalam upaya menjaga kualitas udara yang lebih baik.
                  </p>

               </div>

            </div>

         </div>

      </div>

   </section>



   <section class="visualisasi1" id="visualisasi1">

      <div class="container">

         <div class="row">

            <div class="col-md-6 order-md-2">

               <img src="assets/img/critical.jpeg" alt="visualisasi Image" class="img-fluid">

            </div>

            <div class="col-md-6 order-md-1">

               <div class="visualisasi-content">

                  <h2>Data Jumlah Kolom Critical</h2>

                  <p>Critical 0 merepresentasikan PM10, 1 merepresentasikan SO2, 2 merepresentasikan CO, 3 merepresentasikan O3, dan 4 merepresentasikan NO2. Data Jumlah Kolom Critical memberikan informasi tentang jumlah polutan, termasuk parameter O3 (ozon), yang mencapai tingkat kritis di setiap stasiun pemantauan udara. Polutan lainnya yang termasuk dalam analisis ini mencakup PM2.5, SO2, CO, dan NO2. Visualisasi stacked barplot menyoroti kontribusi masing-masing polutan terhadap jumlah total polutan kritis di setiap stasiun.

                  </p>

               </div>

            </div>

         </div>

      </div>

   </section>





   <section class="polutan" id="polutan">

      <!-- <h2>Arti Polutan</h2> -->

      <table class="table">

         <thead>

            <tr>

               <th>Polutan</th>

               <th>Deskripsi</th>

            </tr>

         </thead>

         <tbody>

            <tr>

               <td>O3 (Ozon)</td>

               <td>Ozon adalah gas beracun yang terbentuk sebagai hasil dari reaksi kimia antara oksigen dan polutan yang dihasilkan dari kendaraan bermotor dan industri. Pada tingkat tinggi, ozon dapat menyebabkan iritasi pada saluran pernapasan dan berkontribusi pada polusi udara.</td>

            </tr>

            <tr>

               <td>PM2.5 (Particulate Matter 2.5)</td>

               <td>PM2.5 adalah partikel kecil dalam udara yang berasal dari berbagai sumber seperti kendaraan bermotor, industri, dan pembakaran biomassa. Partikel ini memiliki diameter kurang dari 2.5 mikrometer dan dapat masuk ke dalam paru-paru, menyebabkan masalah kesehatan seperti gangguan pernapasan dan penyakit jantung.</td>

            </tr>

            <tr>

               <td>SO2 (Sulfur Dioxide)</td>

               <td>SO2 adalah gas beracun yang dihasilkan dari pembakaran bahan bakar fosil, seperti batu bara dan minyak bumi. Paparan SO2 dapat menyebabkan iritasi pada mata dan saluran pernapasan, serta menyebabkan masalah kesehatan serius seperti gangguan pernapasan dan asma.</td>

            </tr>

            <tr>

               <td>CO (Carbon Monoxide)</td>

               <td>CO adalah gas tak berwarna dan tidak berbau yang dihasilkan dari pembakaran tidak sempurna bahan bakar fosil. Paparan CO dalam jumlah tinggi dapat menyebabkan keracunan, mengganggu fungsi normal sistem kardiovaskular dan sistem saraf pusat.</td>

            </tr>

            <tr>

               <td>NO2 (Nitrogen Dioxide)</td>

               <td>NO2 adalah gas beracun yang terbentuk dari pembakaran bahan bakar fosil, seperti kendaraan bermotor dan pembangkit listrik. Paparan NO2 dapat menyebabkan iritasi pada saluran pernapasan dan berkontribusi pada pembentukan ozon di permukaan bumi.</td>

            </tr>

         </tbody>

      </table>

   </section>



   <!--=============== MAIN JS ===============-->

   <!-- Bootstrap JS -->

   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

   <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script> -->

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <script src="assets/js/main.js"></script>

</body>



</html>