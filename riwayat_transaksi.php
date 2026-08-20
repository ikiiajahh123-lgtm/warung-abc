<?php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT *
        FROM tbl_transaksi
        ORDER BY tanggal DESC";

$hasil = mysqli_query($koneksi, $sql);

$sql = "SELECT t.id_transaksi, t.no_transaksi, t.tanggal, t.total_bayar,";
$sql .= "u.nama_lengkap AS nama_kasir";
$sql .= "FROM tbl_transaksi t";
$sql .= "JOIN tbl_user u ON t.id_kasir = u.id_user";
$sql .= "ORDER BY t.tanggal DESC";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Transaksi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th {
            background: #333;
            color: white;
            padding: 12px;
            border: 1px solid #ddd;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .kembali:hover {
            background: #555;
        }
    </style>
</head>

<body>

<h1>Riwayat Transaksi</h1>

<table>
    <tr>
        <th>No. Transaksi</th>
        <th>Tanggal</th>
        <th>Kasir</th>
        <th>Total Bayar</th>
        <th>Aksi</th>
    </tr>
     <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td><?php echo $row['no_transaksi']; ?></td>
        <td><?php echo $row['tanggal']; ?></td>
        <td><?php echo $row['nama_kasir']; ?></td>
        <td><?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>
        <td><a href="struk.php?id=<?php echo $row['id_transaksi']; ?>">Cetak</a></td>
    </tr>
    <?php } ?>    
</table>

<a class="kembali" href="dashboard.php">
    Kembali ke Dashboard
</a>

</body>
</html>