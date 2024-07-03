<?php
// Tampilkan informasi pengguna dalam tampilan HTML
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* CSS untuk styling sederhana */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .profile {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .profile h2 {
            text-align: center;
        }
        .profile-info {
            margin-bottom: 10px;
        }
        .profile-info label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="profile">
        <h2>User Profile</h2>
        <div class="profile-info">
            <label>ID Pasien:</label>
            <span><?php echo $id_pasien; ?></span>
        </div>
        <div class="profile-info">
            <label name='nm_pasien'>Nama Pasien:</label>
            <span><?php echo $nm_pasien; ?></span>
        </div>
        <div class="profile-info">
            <label>Tanggal Lahir:</label>
            <span><?php echo $tgl_lahir; ?></span>
        </div>
        <div class="profile-info">
            <label>Jenis Kelamin:</label>
            <span><?php echo $jns_klmn; ?></span>
        </div>
        <div class="profile-info">
            <label>Email:</label>
            <span><?php echo $email_pasien; ?></span>
        </div>
        <div class="profile-info">
            <label>Alamat Pasien:</label>
            <span><?php echo $almt_pasien; ?></span>
        </div>
        <div class="profile-info">
            <label>Kode Referal:</label>
            <span><?php echo $kode_ref; ?></span>
        </div>
        <!-- Anda dapat menambahkan lebih banyak informasi profil di sini -->
    </div>
</body>
</html>