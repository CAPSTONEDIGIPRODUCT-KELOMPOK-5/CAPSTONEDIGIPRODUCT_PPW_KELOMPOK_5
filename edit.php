<?php 

   session_start();



   include("php/config.php");

   if(!isset($_SESSION['valid'])){

    header("Location: login.php");

   }

?>



<?php

// Koneksi ke database


if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

// Periksa apakah parameter ID telah diterima
if (isset($_GET['id'])&&isset($_SESSION['valid'])) {

// Tangkap id pegawai yang ingin diedit

$id = $_GET['id'];


// Periksa apakah ada permintaan pengiriman formulir

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Tangkap nilai inputan formulir

    $nama = $_POST['nama'];

    $telepon = $_POST['telepon'];

    $alamat = $_POST['alamat'];

    $status = $_POST['status'];



    // Buat dan jalankan query SQL untuk memperbarui data pegawai

    $sql = "UPDATE pegawai SET nama='$nama', telepon='$telepon', alamat='$alamat', status='$status' WHERE NPS='$id'";

    if ($con->query($sql) === TRUE) {

        // Redirect kembali ke halaman data pegawai setelah berhasil memperbarui

        header("Location: peneliti.php");

        exit();

    } else {

        echo "Error updating record: " . $con->error;

    }

}




// Ambil data pegawai berdasarkan id

$sql = "SELECT * FROM pegawai WHERE NPS='$id'";

$result = $con->query($sql);

$row = $result->fetch_assoc();

}


// Tutup koneksi

$con->close();

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="style.css"> -->

    <title>Edit Pegawai</title>

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

<body>

    <section class="container">

    <h2>Edit Data Pegawai</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">

        <label for="nama">Nama:</label>
<input type="text" id="nama" name="nama" pattern="[A-Za-z\s]+" title="Harap masukkan hanya huruf" required value="<?php echo $row['nama']; ?>"><br>

        <label for="telepon">No Telepon:</label>
<input type="tel" id="telepon" name="telepon" pattern="[0-9]*" title="Harap masukkan hanya angka" required value="<?php echo $row['telepon']; ?>"><br>

        <label for="alamat">Alamat:</label>

        <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>"><br>

        <label for="status">Status:</label>

        <select id="status" name="status">

            <option value="Bertugas" <?php if ($row['status'] == 'Bertugas') echo 'selected'; ?>>Bertugas</option>

            <option value="Tidak Bertugas" <?php if ($row['status'] == 'Tidak Bertugas') echo 'selected'; ?>>Tidak Bertugas</option>

        </select><br><br>

        <br><button type="submit">Edit Data</button>

    </form>

    <button type="button" onclick="window.location.href = 'peneliti.php'">Kembali</button>

    </section>

</body>

</html>

