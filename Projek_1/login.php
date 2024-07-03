<?php include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Klinik Pratama Global Medical Center</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="login_db.php?submit=id_pasien" method="post">
                <h1>Registrasi</h1>
                <hr>
                <p>Klinik Pratama Global Medical Center</p>
                <label for="">Nama Pasien</label>
                <input name='nm_pasien' type="varchar" placeholder="Masukan Nama">
                <label for="">Tanggal Lahir</label>
                <input name='tgl_lahir'  type="date" onselect="google.script.run.dataSelect()">
                <label for="">Jenis Kelamin</label>
                <select name="jns_klmn" id="jns_klmn">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <label for="">Email</label>
                <input name='email_pasien' type="varchar"
                placeholder="Contoh@gmail.com">
                <label for="">Alamat</label>
                <input name='almt_pasien' type="text"
                placeholder="Masukan Alamat">
                <label for="">Kode Referal</label>
                <input name='kode_ref' type='varchar'
                placeholder='Contoh: 34EA697Y'>
                <input type='submit' value='Registrasi' class='right center'></input>
            </form>
        </div>
        <div class="right.img">
            <img src="image.png" alt="">
        </div>
    </div>
</body>
</html>
