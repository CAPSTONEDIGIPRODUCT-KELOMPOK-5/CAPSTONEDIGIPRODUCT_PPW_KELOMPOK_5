<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
?>

<?php
// Konfigurasi database
$host = "localhost"; // Host database
$username = "root"; // Username database
$password = ""; // Password database
$database = "pa_web"; // Nama database

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
        $notification = "File ". basename($_FILES["file"]["name"]). " berhasil diunggah.";
    } else {
        $notification = "Terjadi kesalahan saat mengunggah file.";
    }

    // Simpan data ke database jika file berhasil diunggah
    if ($notification === "File ". basename($_FILES["file"]["name"]). " berhasil diunggah.") {
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

