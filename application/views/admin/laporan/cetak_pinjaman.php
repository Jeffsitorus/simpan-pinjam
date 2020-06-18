<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Peminjaman Nasabah Simpan Pinjam Purwakarta</title>
  <style>
    table {
      width: 100%;
      margin: 20px auto;
      border-collapse: collapse;
      box-sizing: border-box;
    }

    table,
    tr,
    th,
    td {
      border: 1px solid #333;
      padding: 8px;
      font-size: 12px;
    }

    h4,
    p {
      text-align: center;
    }
  </style>
</head><body>
  <h4>Data Peminjaman Nasabah Simpan Pinjam Purwakarta</h4>
  <p>Jln. Purwakarta Jawa Barat</p>
  <table>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama Nasabah</th>
      <th>No Telepon</th>
      <th>Alamat</th>
      <th>Tanggal Peminjaman</th>
      <th>Nominal</th>
      <th>Tanggal Konfirmasi</th>
      <th>Status</th>
    </tr>
    <?php foreach ($peminjaman as $key => $pinjam) : ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $pinjam['nik']; ?></td>
        <td><?= $pinjam['nama']; ?></td>
        <td><?= $pinjam['telepon']; ?></td>
        <td><?= $pinjam['alamat']; ?></td>
        <td><?= tgl_indo($pinjam['tgl_pinjam']); ?></td>
        <td>Rp.<?= number_format($pinjam['nominal'],0,',','.'); ?></td>
        <td><?= tgl_indo($pinjam['tgl_konfirmasi']); ?></td>
        <td>
          <?php if($pinjam['status']) : ?>
            <span>Telah Disetujui</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>