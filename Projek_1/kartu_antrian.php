<?php
// Masukkan file koneksi.php
include 'koneksi.php';

// Query untuk mengambil data kartu antrian
$sql_select = "SELECT * FROM daftar_antrian ORDER BY no_antrian, pilih_layanan DESC LIMIT 1";
$sql2 = "SELECT * FROM pasien ORDER BY id_pasien, nm_pasien";
$sql3 = "SELECT * FROM pengecekan_awal ORDER BY id_pengecekan";
$result = mysqli_query($koneksi, $sql_select);
$result2 = mysqli_query($koneksi, $sql2);
$result3 = mysqli_query($koneksi, $sql3);

// Periksa apakah query berhasil dieksekusi
if ($result && $result2 && $result3) {
    // Ambil baris data
    $row = mysqli_fetch_assoc($result);
    $row2 = mysqli_fetch_assoc($result2);
    $row3 = mysqli_fetch_assoc($result3);
} else {
    echo "Error: ".mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Antrian</title>
    <style>
        /* CSS untuk kartu antrian */
        .card {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="card" action="kartu_antrian_db.php">
        <h2>Kartu Antrian</h2>
        <p>ID Pasien: <?php echo isset($row['id_pasien']) ? $row['id_pasien'] : ''; ?></p>
        <p>Nama Pasien: <?php echo isset($row2['nm_pasien']) ? $row2['nm_pasien'] : ''; ?></p>
        <p>Tanggal Antrian: <?php echo isset($row['tgl_antri']) ? $row['tgl_antri'] : ''; ?></p>
        <p>No. Antrian: <?php echo isset($row['no_antrian']) ? $row['no_antrian'] : ''; ?></p>
        <p>Pilih Layanan: <?php echo isset($row['pilih_layanan']) ? $row['pilih_layanan'] : ''; ?></p>
        <p>ID Pengecekan: <?php echo isset($row3['id_pengecekan']) ? $row3['id_pengecekan'] : ''; ?></p>
        <p>Tinggi Badan: <?php echo isset($row3['tinggi_badan']) ? $row3['tinggi_badan'] : ''; ?></p>
        <p>Berat Badan: <?php echo isset($row3['brt_bdn']) ? $row3['brt_bdn'] : ''; ?></p>
        <p>Tensi Darah: <?php echo isset($row3['tnsi_drh']) ? $row3['tnsi_drh'] : ''; ?></p>
        <p>Suhu Badan: <?php echo isset($row3['suhu_bdn']) ? $row3['suhu_bdn'] : ''; ?></p>
        <!-- Sisipkan data lainnya sesuai kebutuhan -->
    </div>
    <input type='submit' value='Keluar'></input>
</body>
</html>
