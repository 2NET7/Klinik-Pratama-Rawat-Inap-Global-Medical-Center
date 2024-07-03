<?php
include 'koneksi.php';

$tgl_antri = $_POST['tgl_antri'];
$pilih_layanan = $_POST['pilih_layanan'];
#$jumlah_hari = $_POST['jumlah_hari'];
$bpjs = $_POST['bpjs'];

// Insert data ke database
mysqli_query($koneksi, "INSERT INTO daftar_antrian (no_antrian, tgl_antri, pilih_layanan, bpjs) VALUES ('', '$tgl_antri', '$pilih_layanan', '$bpjs')");
header("Location: kartu_antrian.php");
exit();
?>