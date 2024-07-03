<?php
include 'koneksi.php';
#require 'vendor/autoload.php'; // Path to PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.your-email-provider.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Ganti dengan email Anda
        $mail->Password = 'your-email-password'; // Ganti dengan password email Anda
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('your-email@example.com', 'Admin Klinik GMC');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $id = $_POST['id'];

        $sql = "SELECT * FROM marketing WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($row) {
            if ($action == 'accept') {
                $kodeReferal = 'REF' . mt_rand(100000, 999999);
                $updateSql = "UPDATE marketing SET status = 'accepted', kode_referal = '$kodeReferal' WHERE id = $id";
                if ($conn->query($updateSql) === TRUE) {
                    $message = "Pendaftaran Anda diterima. Kode Referal Anda: $kodeReferal";
                    sendEmail($row['email_marketing'], 'Pendaftaran Diterima', $message);
                    echo "Pendaftaran diterima dan email telah dikirim.";
                } else {
                    echo "Error: " . $updateSql . "<br>" . $conn->error;
                }
            } elseif ($action == 'reject') {
                $updateSql = "UPDATE marketing SET status = 'rejected' WHERE id = $id";
                if ($conn->query($updateSql) === TRUE) {
                    $message = "Pendaftaran Anda ditolak.";
                    sendEmail($row['email_marketing'], 'Pendaftaran Ditolak', $message);
                    echo "Pendaftaran ditolak dan email telah dikirim.";
                } else {
                    echo "Error: " . $updateSql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "Pendaftaran tidak ditemukan.";
        }
    } else {
        $namaLengkap = $_POST['nm_mrkt'];
        $tanggalLahir = $_POST['tgl_lhr'];
        $jenisKelamin = $_POST['jns_klmn'];
        $alamat = $_POST['almt_mrkt'];
        $email = $_POST['email_marketing'];
        $status = $_POST['status'];

        // Simpan data ke database
        $sql = "INSERT INTO marketing (nm_mrkt, tgl_lhr, jns_klmn, almt_mrkt, email_marketing, status) VALUES ('$namaLengkap', '$tanggalLahir', '$jenisKelamin', '$alamat', '$email', '$status', 'pending')";
        if ($conn->query($sql) === TRUE) {
            echo "Pendaftaran berhasil. Tunggu konfirmasi dari admin.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<link href="../assets/img/logo.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Marketing Klinik GMC</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ef6d59;
        }

        .form-container, .admin-container {
            width: 450px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 24px;
            color: #0c0401;
        }

        .form-group, .admin-table {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #0c0401;
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #190202;
            border-radius: 7px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            font-size: 14px;
        }

        .right {
            background-color: #ea4335;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #fff;
            padding: 10px 205px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        button:hover {
            background-color: rgb(90, 192, 31);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ef6d59;
            color: white;
        }

        .action-buttons form {
            display: inline-block;
            margin: 0;
        }

        .action-buttons button {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-buttons .accept-button {
            background-color: #7ee121;
            color: white;
        }

        .action-buttons .reject-button {
            background-color: #ef6d59;
            color: white;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Form Pendaftaran Marketing GMC</h1>
        <form action="marketing_db.php" method="post">
            <div class="form-group">
                <label for="nm_mrkt">Nama Lengkap :</label>
                <input type="text" name="nm_mrkt" id="nm_mrkt" required>
            </div>

            <div class="form-group">
                <label for="tgl_lhr">Tanggal Lahir :</label>
                <input type="date" name="tgl_lhr" id="tgl_lhr" required>
            </div>

            <div class="form-group">
                <label for="jns_klmn">Jenis Kelamin :</label>
                <select name="jns_klmn" id="jns_klmn" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="almt_mrkt">Alamat Lengkap :</label>
                <textarea name="almt_mrkt" id="almt_mrkt" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="email_marketing">Alamat Email :</label>
                <input type="email" name="email_marketing" id="email_marketing" required>
            </div>

            <input type='submit' value='Daftar' onclick='submitForm()' class='right center'></input>
        </form>
    </div>

    <script>
        function submitForm() {
            // Get form data
            const namaLengkap = document.getElementById('namaLengkap').value;
            const tanggalLahir = document.getElementById('tanggalLahir').value;
            const jenisKelamin = document.getElementById('jenisKelamin').value;
            const alamat = document.getElementById('alamat').value;
            const email = document.getElementById('email').value;

            // Validate data
            if (namaLengkap === '' || tanggalLahir === '' || jenisKelamin === '' || alamat === '' || email === '') {
                alert('Semua bagian wajib diisi!');
                // Simulate data submission (replace with your actual submission process)
                alert('Terima kasih! Data Anda akan diseleksi oleh pihak klinik. Tunggu informasi lebih lanjut.');
                return;
            }

            // Reset the form (optional)
            document.getElementById('formPendaftaran').reset();

        }
    </script>
</body>
</html>