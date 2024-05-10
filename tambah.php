<?php 

   session_start();



   include("php/config.php");

   if(!isset($_SESSION['valid'])){

    header("Location: login.php");

   }

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Tambah Data Peneliti</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        body {

            font-family: 'Poppins', sans-serif;

            margin: 0;

            padding: 0;

            background-color: hsl(230, 100%, 98%);

        }



        .container {

            max-width: 600px;

            margin: 20px auto;

            padding: 20px;

            border: 1px solid #ccc;

            border-radius: 5px;

            background-color: #ffff; /* Warna latar belakang form */

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        }



        h2 {

            margin-top: 0;

            margin-bottom: 20px;

            text-align: center;

            color: hsl(230, 75%, 15%);

        }



        form label {

            display: block;

            margin-bottom: 5px;

            font-weight: bold;

            color: hsl(230, 75%, 15%);

        }



        form input[type="text"],

        form textarea {

            width: 100%;

            padding: 8px;

            margin-bottom: 10px;

            border: 1px solid #ccc;

            border-radius: 4px;

            box-sizing: border-box;

        }

form input[type="tel"],

        form textarea {

            width: 100%;

            padding: 8px;

            margin-bottom: 10px;

            border: 1px solid #ccc;

            border-radius: 4px;

            box-sizing: border-box;

        }




        form textarea {

            height: 100px;

            resize: vertical;

        }



        form button[type="submit"] {

            background-color: #007bff;

            color: white;

            padding: 10px 20px;

            border: none;

            border-radius: 4px;

            cursor: pointer;

        }



        form button[type="submit"]:hover {

            background-color: #007bff;

        }



        button[type="button"] {

            background-color: #f44336;

            color: white;

            padding: 10px 20px;

            border: none;

            border-radius: 4px;

            cursor: pointer;

            margin-top: 10px;

        }



        button[type="button"]:hover {

            background-color: #d32f2f;

        }

    </style>

</head>



<?php

$error = ""; // Variabel untuk menyimpan pesan kesalahan

$success = ""; // Variabel untuk menyimpan pesan sukses



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari formulir tambah

    $nama = $_POST['nama'];

    $telepon = $_POST['telepon'];

    $alamat = $_POST['alamat'];

    $status = $_POST['status'];



    // Lakukan validasi untuk memastikan semua bidang diisi

    if (empty($nama) || empty($telepon) || empty($alamat) || empty($status)) {

        $error = "Semua bidang harus diisi";

    } else {

        // Lakukan koneksi ke database

        if ($con->connect_error) {

            die("Connection failed: " . $con->connect_error);

        }



        // Query untuk memasukkan data baru ke dalam tabel pegawai

        $sql = "INSERT INTO pegawai (nama, telepon, alamat, status) VALUES ('$nama', '$telepon', '$alamat', '$status')";



        // Eksekusi query

        if ($con->query($sql) === TRUE) {

            $success = "Data berhasil ditambahkan";

        } else {

            $error = "Error: " . $sql . "<br>" . $con->error;

        }



        // Tutup koneksi

        $con->close();

    }

}

?>



<body>

    <div class="container">

        <h2>Tambah Data Peneliti</h2>

        <?php

        if (!empty($error)) {

            echo "<p style='color: red;'>$error</p>";

        }

        if (!empty($success)) {

            echo "<p style='color: green;'>$success</p>";

        }

        ?>

        <form action="tambah.php" method="POST">

            <label for="nama">Nama:</label>
<input type="text" id="nama" name="nama" pattern="[A-Za-z\s]+" title="Harap masukkan hanya huruf" required><br>

            

            <label for="telepon">No Telepon:</label>
	<input type="tel" id="telepon" name="telepon" pattern="[0-9]*" title="Harap masukkan hanya angka" required><br>

            

            <label for="alamat">Alamat:</label>

            <textarea id="alamat" name="alamat"></textarea><br>

            

            <label for="status">Status:</label>

            <select id="status" name="status">

                <option value="Bertugas">Bertugas</option>

                <option value="Tidak Bertugas">Tidak Bertugas</option>

            </select><br>



            

            <br><button type="submit">Tambah Data</button>

        </form>

        <button type="button" onclick="window.location.href = 'peneliti.php'">Kembali</button>

    </div>

</body>

</html>

