<?php
// Memeriksa koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Pengecekan Awal Pasien - Global Pratama Medical Center</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* CSS Styling */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="number"],
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.button {
    background-color: #ea4335;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

.button:hover {
    background-color: #45a049;
}

</style>
</head>
<body>
<div class="container">
    <h1><i class="fa fa-user"></i> Form Pengecekan Awal Pasien</h1>
    <form action="cek_awal_db.php" method="post">
        <label for=""><i class="fa fa-ruler-vertical"></i> Tinggi Badan (cm) :</label>
        <input type="number" name="tinggi_badan">

        <label for=""><i class="fa fa-weight"></i> Berat Badan (kg) :</label>
        <input type="number" name="brt_bdn">

        <label for=""><i class="fa fa-heartbeat"></i> Tensi Darah (mmHg) :</label>
        <input type="text" name="tnsi_drh">

        <label for=""><i class="fa fa-thermometer-half"></i> Suhu Badan (°C) :</label>
        <input type="number" name="suhu_bdn">

        <input type="submit" class='button' value="Kirim"></input>
    </form>
</div>
</body>
</html>
