<?php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT *
        FROM tbl_transaksi
        ORDER BY tanggal DESC";

$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($koneksi));
}
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
    </tr>

    <?php if (mysqli_num_rows($hasil) > 0): ?>

        <?php while ($row = mysqli_fetch_assoc($hasil)): ?>

            <tr>
                <td>
                    <?php
                    echo isset($row['no_transaksi'])
                        ? htmlspecialchars($row['no_transaksi'])
                        : '-';
                    ?>
                </td>

                <td>
                    <?php
                    echo isset($row['tanggal'])
                        ? htmlspecialchars($row['tanggal'])
                        : '-';
                    ?>
                </td>
            </tr>

        <?php endwhile; ?>

    <?php else: ?>

        <tr>
            <td colspan="2" style="text-align:center;">
                Belum ada transaksi.
            </td>
        </tr>

    <?php endif; ?>

</table>

<a class="kembali" href="dashboard.php">
    Kembali ke Dashboard
</a>

</body>
</html>