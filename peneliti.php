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

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">



   <!--=============== CSS ===============-->

   <!-- Bootstrap CSS -->

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <link rel="stylesheet" href="assets/css/styles.css">



   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



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

                  <a href="dataa.php" class="nav__link">Laporan</a>

               </li>



               <li class="nav__item">

                  <a href="#field-researcher" class="nav__link">Peneliti</a>

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

               <a href="php/logout.php">

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

   <section class="field-researcher" id="field-researcher">

      <h2 style="font-size: 25px;">Data Peneliti <a href="tambah.php" style="float: right;"><i class="ri-add-line"></i></a></h2> <!-- Menambahkan ikon tambah yang dapat diklik -->

      <div class="table-responsive">

         <table class="table">

            <thead>

               <tr>

                  <th>NSP</th>

                  <th>Nama</th>

                  <th>No Telepon</th>

                  <th>Alamat</th>

                  <th>Status</th>

                  <th>Aksi</th>

                  <th>Edit</th>

                  <th>Hapus</th>

               </tr>

            </thead>

            <tbody>

               <?php

               // Koneksi ke database

            
               if ($conn->connect_error) {

                  die("Connection failed: " . $conn->connect_error);

               }

               // Ambil data dari tabel laporan

               $sql = "SELECT * FROM pegawai";

               $result = $con->query($sql);

               if ($result->num_rows > 0) {

                  while ($row = $result->fetch_assoc()) {

                     echo "<tr>";

                     echo "<td>" . $row["NPS"] . "</td>";

                     echo "<td>" . $row["nama"] . "</td>";

                     echo "<td>" . $row["telepon"] . "</td>";

                     echo "<td>" . $row["alamat"] . "</td>";

                     echo "<td>" . $row["status"] . "</td>";

                     // Kolom aksi akan kosong jika statusnya bertugas

                     if ($row["status"] == "Bertugas") {

                        echo "<td>-</td>";

                     } else { // Kolom aksi berisi tombol "Tugaskan" jika statusnya tidak bertugas

                        echo "<td><form action='aksi_tugaskan.php' method='POST'><button type='submit' name='tugaskan' class='btn btn-primary'>Tugaskan</button></form></td>";

                     }

                     echo "<td>";

                     echo "<a href='edit.php?id=" . $row["NPS"] . "'>";

                     echo "<i class='ri-edit-line'></i>"; // Icon Edit menggunakan Boxicons

                     echo "</a>";

                     echo "</td>";

                     // Kolom hapus data

                     // Tautan Hapus dengan parameter ID pegawai

                     echo "<td><a href='aksi_hapus.php?id=" . $row["NPS"] . "'><i class='ri-delete-bin-line'></i></a></td>"; // Icon Hapus menggunakan Boxicons

                     echo "</tr>";

                  }

               } else {

                  echo "<tr><td colspan='9'>Tidak ada data yang tersedia</td></tr>";

               }

               $con->close();

               ?>

            </tbody>

         </table>

      </div>

   </section>



   <!--=============== MAIN JS ===============-->

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <script src="assets/js/main.js"></script>

</body>



</html>