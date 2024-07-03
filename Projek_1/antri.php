<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head section -->
  <style>
    /* Letakkan CSS di sini */
    .container {
      width: 50%;
      margin: 0 auto;
    }

    .form-container {
      background-color: #f4f4f4;
      padding: 20px;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .button {
      background-color: #ea4335;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Form section -->
    <div class="form-container">
      <h2>Form Daftar Antrian Pasien</h2>
      <form action='antri_db.php' method='post'>
        <label for="">Tanggal Antrian</label>
        <input name='tgl_antri' type="date" onselect="google.script.run.dataSelect()">
        <div class="form-group">
          <label for="">Pilih Layanan:</label>
          <select class="form-control" name="pilih_layanan">
            <option value="">Pilih Layanan</option>
            <option value="Layanan Umum | Rp50000">Pelayanan Umum (Rp 50.000)</option>
            <option value="Pemeriksaan Dokter Umum | Rp75000">Pemeriksaan Dokter Umum (Rp 75.000)</option>
            <option value="Layanan Mata | Rp100000">Poli Mata (Rp 100.000)</option>
            <option value="Surat Keterangan Sehat | Rp15000">Surat Keterangan Sehat (Rp 15000)</option>
            <option value="Pemeriksaan Lab  | Rp100000">Pemeriksaan Lab  (Rp 100.000)</option>
            <option value="Rawat Inap | Rp150000">Rawat Inap (Rp 150.000)</option>
            <option value="Rawat Jalan | Rp25000">Rawat Jalan (Rp 25.000)</option>
            <option value="Persalinan | Rp200000">Persalinan (Rp 200.000)</option>
            <option value="Sirkumsisi (khitan) | Rp250000">Sirkumsisi (khitan) (Rp 250.000)</option>
            <option value="Perawatan Luka Diabetes | Rp300000">Perawatan Luka Diabetes (Rp 300.000)</option>
            <option value="Kunjungan ke Rumah (Home Visit) | Rp100000">Kunjungan ke Rumah (Home Visit) (Rp 100.000)</option>
            <option value="Swab Antigen/PCR | Rp50000">Swab Antigen/PCR (Rp 50.000)</option>
            <option value="USG | Rp500000">USG (Rp 500.000)</option>
            <option value="KB | Rp50000">KB (Rp 50.000)</option>
            <option value="Test Kehamilan | Rp50000">Test Kehamilan (Rp 50.000)</option>
            <option value="Bedah Minor | Rp250000">Bedah Minor (Rp 250.000)</option>
            <option value="Konsultasi Kesehatan | Rp10000">Konsultasi Kesehatan (Rp 10.000)</option>
            <!-- Opsi layanan -->
          </select>
        </div>
        <div class="form-group">
          <label for="">BPJS</label>
          <select name="bpjs">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <input type="submit" value='Daftar' class="button"></input>
      </form>
    </div>
  </div>
</body>
</html>
