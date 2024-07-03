<?php
include 'koneksi.php';

// Ambil nilai yang dikirimkan dari form
$tinggi_badan = $_POST['tinggi_badan'];
$berat_badan = $_POST['brt_bdn'];
$tensi_darah = $_POST['tnsi_drh'];
$suhu_badan = $_POST['suhu_bdn'];

// Insert data ke database dengan koneksi database yang disediakan
mysqli_query($koneksi, "INSERT INTO pengecekan_awal (id_pengecekan, tinggi_badan, brt_bdn, tnsi_drh, suhu_bdn) 
                        VALUES ('', '$tinggi_badan', '$berat_badan', '$tensi_darah', '$suhu_badan')");

header("Location: antri.php");
exit();
?>
