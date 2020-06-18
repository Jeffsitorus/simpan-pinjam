<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nasabah Simpan Pinjam Purwakarta</title>
  <style>
    table {
      margin: 20px auto;
      border-collapse: collapse;
      box-sizing: border-box;
    }
    table,
    tr,
    th,
    td {
      border:1px solid #333;
      padding: 10px;
      font-size: 12px;
    }
    h4,p {
      text-align: center;
    }
  </style>
</head><body>
  <h4>Data Nasabah Simpan Pinjam Purwakarta</h4>
  <p>Jln. Purwakarta Jawa Barat</p>
  <table>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama Nasabah</th>
      <th>No Telepon</th>
      <th>Alamat</th>
      <th>Usia</th>
    </tr>
    <?php foreach ($nasabah as $key => $nb) : ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $nb['nik']; ?></td>
        <td><?= $nb['nama']; ?></td>
        <td><?= $nb['telepon']; ?></td>
        <td><?= $nb['alamat']; ?></td>
        <td><?= $nb['usia']; ?> tahun</td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>