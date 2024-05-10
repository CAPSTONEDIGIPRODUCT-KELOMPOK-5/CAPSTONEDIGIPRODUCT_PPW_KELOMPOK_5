<?php

session_start();



include("php/config.php");

if (!isset($_SESSION['valid'])) {

   header("Location: login.php");

}

?>



<!DOCTYPE html>

<html lang="en">



<head>

   <meta charset="UTF-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">



   <!--=============== REMIXICONS ===============-->

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">



   <!--=============== CSS ===============-->

   <link rel="stylesheet" href="assets/css/styles.css">



   <style>

      /* Tabel responsif */

      table {

         width: 100%;

         border-collapse: collapse;

         border-spacing: 0;

      }



      th {

         background-color: rgba(135, 206, 250, 0.5);

      }



      td {

         padding: 8px;

         text-align: left;

         border-bottom: 1px solid #ddd;

      }



      /* Atur lebar minimum kolom */

      @media screen and (max-width: 600px) {

         table {

            overflow-x: auto;

            display: block;

         }



         th,

         td {

            white-space: nowrap;

            max-width: 150px;

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

               <li class="nav__item">

                  <a href="#data" class="nav__link">Laporan</a>

               </li>



               <li class="nav__item">

                  <a href="peneliti.php" class="nav__link">Peneliti</a>

               </li>

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

               <a href="index.php">

                  <i class="ri-logout-box-line nav__login"></i>

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

   <section class="data" id="data">

      <h2 style="font-size: 25px;">Data Pengajuan Laporan Polusi Udara</h2>

      <table>

         <tr>

            <th>Id</th>

            <th>Nama</th>

            <th>No Telepon</th>

            <th>Alamat</th>

            <th>Deskripsi</th>

            <th>Tanggal Pengajuan</th>

            <th>File</th>

         </tr>

         <?php

         // Koneksi ke database

        
         if ($con->connect_error) {

            die("Connection failed: " . $con->connect_error);

         }

         // Ambil data dari tabel laporan

         $sql = "SELECT * FROM laporan";

         $result = $con->query($sql);

         if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

               echo "<tr>";

               echo "<td>" . $row["id"] . "</td>";

               echo "<td>" . $row["nama"] . "</td>";

               echo "<td>" . $row["telepon"] . "</td>";

               echo "<td>" . $row["alamat"] . "</td>";

               echo "<td>" . $row["deskripsi"] . "</td>";

               echo "<td>" . $row["tanggal_submit"] . "</td>";

               echo "<td><a class='btn btn-sm btn-primary' href='" . $row["file"] . "' target='_blank'>Lihat</a></td>";

               echo "</tr>";

            }

         } else {

            echo "<tr><td colspan='6'>Tidak ada data yang tersedia</td></tr>";

         }

         $con->close();

         ?>

      </table>

   </section>



   <!--=============== MAIN JS ===============-->

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <script src="assets/js/main.js"></script>

</body>



</html>