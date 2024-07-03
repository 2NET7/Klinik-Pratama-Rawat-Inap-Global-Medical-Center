<?php
// Masukkan file koneksi.php
include 'koneksi.php';

// Mengambil nilai dari URL menggunakan $_GET
$id_pasien = $_GET['id_pasien'];
$nm_pasien = $_GET['nm_pasien'];
$tgl_antri = $_GET['tgl_antri'];
$jumlah_antri = $_GET['jumlah_antri'];
$no_antrian = $_GET['no_antrian'];
$pilih_layanan = $_GET['pilih_layanan'];
$id_pengecekan = $_GET['id_pengecekan'];
$tinggi_badan = $_GET['tinggi_badan'];
$brt_bdn = $_GET['brt_bdn'];
$tnsi_drh = $_GET['tnsi_drh'];
$suhu_bdn = $_GET['suhu_bdn'];

// Query untuk menyisipkan data ke tabel kartu_antrian
$sql_insert =mysqli_query($koneksi, "INSERT INTO kartu_antrian (id_pasien, nm_pasien, tgl_antri, jumlah_antri, no_antrian, pilih_layanan, id_pengecekan, tinggi_badan, brt_bdn, tnsi_drh, suhu_bdn) VALUES ('$id_pasien', '$nm_pasien', '$tgl_antri', '$jumlah_antri', '$no_antrian', '$pilih_layanan', '$id_pengecekan', '$tinggi_badan', '$brt_bdn', '$tnsi_drh', '$suhu_bdn')");

// Memeriksa apakah penyisipan berhasil
if(mysqli_query($koneksi, $sql_insert)) {
    echo "Kartu antrian berhasil dibuat.";
    header("Location: ../index.php");
} else {
    echo "Error: ".mysqli_error($koneksi);
}

header("Location: ../index.php");
// Tutup koneksi
mysqli_close($koneksi);
?>
