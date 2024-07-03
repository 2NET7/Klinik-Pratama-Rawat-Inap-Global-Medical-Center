<?php
include('koneksi.php');

// Mulai session
session_start();

// Mendapatkan data dari form
$nm_pasien = $_POST['nm_pasien'];
$tgl_lahir = $_POST['tgl_lahir'];
$jns_klmn = $_POST['jns_klmn'];
$email_pasien = $_POST['email_pasien'];
$almt_pasien = $_POST['almt_pasien'];
$kode_ref = $_POST['kode_ref'];

// Query untuk memasukkan data antrian ke database
$query = "INSERT INTO pasien (nm_pasien, tgl_lahir, jns_klmn, email_pasien, almt_pasien, kode_ref) 
          VALUES ('$nm_pasien', '$tgl_lahir', '$jns_klmn', '$email_pasien', '$almt_pasien', '$kode_ref')";

// Jalankan query dengan koneksi database
if (mysqli_query($koneksi, $query)) {
    // Jika query berhasil, simpan data ke session
    $_SESSION['id_pasien'] = mysqli_insert_id($koneksi);
    $_SESSION['nm_pasien'] = $nm_pasien;
    $_SESSION['tgl_lahir'] = $tgl_lahir;
    $_SESSION['jns_klmn'] = $jns_klmn;
    $_SESSION['email_pasien'] = $email_pasien;
    $_SESSION['almt_pasien'] = $almt_pasien;
    $_SESSION['kode_ref'] = $kode_ref;

    // Redirect ke halaman hasil setelah proses selesai
    header("Location: hasil.php");
    exit(); // Pastikan tidak ada output lain setelah header
} else {
    // Jika query gagal, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
