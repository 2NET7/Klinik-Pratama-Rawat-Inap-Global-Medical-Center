<?php
include 'koneksi.php';
// Mulai session
session_start();

// Cek apakah data session tersedia
if(isset($_SESSION['nm_pasien']) && isset($_SESSION['email_pasien']) && isset($_SESSION['id_pasien'])) {
    $id_pasien = $_SESSION['id_pasien'];
    $nm_pasien = $_SESSION['nm_pasien'];
    $email_pasien = $_SESSION['email_pasien'];
    header("Location: ../index.php?pesan=id_pasien");

    // Tampilkan data
    echo "ID Pasien: $id_pasien <br>";
    echo "Username: $nm_pasien <br>";
    echo "Email: $email_pasien";
} else {
    echo "Data tidak tersedia.";
}
?>