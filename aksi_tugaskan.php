<?php 

   session_start();



   include("php/config.php");

   if(!isset($_SESSION['valid'])){

    header("Location: login.php");

   }

?>



<?php

$submitted = false; // Flag to check if the form has been submitted



// Database connection



// Process form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['NPS']) && isset($_POST['nama']) && isset($_POST['id'])) {

        $NPS = $_POST['NPS'];

        $nama = $_POST['nama'];

        $id = $_POST['id'];

        $tanggal = date("Y-m-d"); // Captures the current date in YYYY-MM-DD format



       
        if ($con->connect_error) {

            die("Connection failed: " . $con->connect_error);

        }



        // Update employee status

        $sql = "UPDATE pegawai SET status='Bertugas' WHERE nama='$nama'";

        if ($con->query($sql) === TRUE) {

            $submitted = true; // Mark that the form has been submitted successfully

            $message = "

<!DOCTYPE html>

<html lang='en'>

<head>

    <meta charset='UTF-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Surat Penugasan Pegawai</title>

    <style>

        body {

            font-family: Poppins, sans-serif;

            line-height: 1.6;

            padding: 20px;

            max-width: 800px;

            margin: auto;

        }



        h1 {

            text-align: center;

            margin-bottom: 20px;

        }



        .content {

            margin-bottom: 20px;

        }



        .signature {

            float: right;

            margin-top: 50px;

            font-style: italic;

        }



        .link-google-docs {

            display: block;

            text-align: center;

            margin-top: 20px;

        }

    </style>

</head>

<body>

    <div class='content'>

        <p><strong>NPS:</strong> " . htmlspecialchars($NPS) . "</p>

        <p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>

        <p><strong>Ditugaskan Pada Laporan:</strong> " . htmlspecialchars($id) . "</p>

        <p><strong>Tanggal Tugas Dimulai:</strong> " . htmlspecialchars($tanggal) . "</p>

        <p><strong>Deskripsi Tugas:</strong></p>

        <p>Pegawai ditugaskan untuk melakukan analisis terhadap polusi lingkungan yang dilaporkan oleh pihak yang memberikan laporan, dengan fokus pada identifikasi sumber, tingkat dampak, dan rekomendasi mitigasi.</p>

        <p>Dengan mengisi form ini secara lengkap dan jelas, kami dapat memastikan bahwa pegawai yang ditugaskan memiliki panduan yang jelas dan pemahaman yang baik mengenai tugas yang diberikan. Terima kasih atas kerja samanya dalam menjalankan tugas ini.</p>

    </div>

    <div class='signature'>

        Tanda Tangan Penugasan:<br><br><br><br>.......................................................

    </div>

</body>

</html>

";



        } else {

            $message = "Error: " . $sql . "<br>" . $con->error;

        }



        $con->close();

    } else {

        $message = "Harap lengkapi semua kolom dalam formulir.";

    }

}

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aksi Tugaskan</title>

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

            height: 650px;

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

form input[type="number"],

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



    .no-print {

        background-color: #007bff;

            color: white;

            padding: 10px 20px;

            border: none;

            border-radius: 4px;

            cursor: pointer;

    }



    .no-print:hover {

        background-color: #007bff;

    }



    @media print {

        .no-print { display: none; }

    }

</style>



</head>

<body>

    <section class="container">

        <h2>Penugasan Pegawai</h2>

    <?php if (!$submitted): ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label for="NPS">NPS:</label>
<input type="number" id="NPS" name="NPS" min="0" step="1" required><br>



            <label for="nama">Nama:</label>
<input type="text" id="nama" name="nama" pattern="[A-Za-z\s]+" title="Harap masukkan hanya huruf" required><br>



            <label for="id">Id Laporan:</label>

            <select id="id" name="id">

                <?php

                                if ($con->connect_error) {

                    die("Connection failed: " . $con->connect_error);

                }

                $sql = "SELECT id FROM laporan";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {

                        echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";

                    }

                } else {

                    echo "<option value=''>Tidak ada data yang tersedia</option>";

                }

                $con->close();

                ?>

            </select><br>

            <br>   

            <button type="submit">Tugaskan</button>

        </form>

        <button type="button" onclick="window.history.back()">Kembali</button>

    <?php else: ?>

        <?php echo $message; ?> <br> 

        <br> 

        <button onclick="window.print()" class="no-print">Print</button> <!-- Print button with no-print class -->

        <button type="button" class="no-print" onclick="window.location.href = 'peneliti.php'">Kembali</button>

    <?php endif; ?>

</body>

</html>

