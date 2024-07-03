<?php
include ('koneksi.php');

$nm_mrkt = $_POST['nm_mrkt'];
$tgl_lhr = $_POST['tgl_lhr'];
$jns_klmn = $_POST['jns_klmn'];
$almt_mrkt = $_POST['almt_mrkt'];
$email_marketing = $_POST['email_marketing'];

// Sesuaikan query dengan struktur tabel dan kolom yang ada
mysqli_query($koneksi, "INSERT INTO marketing (nm_mrkt, tgl_lhr, jns_klmn, almt_mrkt, email_marketing) 
VALUES ('$nm_mrkt', '$tgl_lhr', '$jns_klmn', '$almt_mrkt', '$email_marketing')");

// Redirect kembali ke halaman utama setelah menambahkan data
header("location:../index.php?submit");
?>
