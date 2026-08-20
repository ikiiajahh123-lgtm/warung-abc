<?php
// laporan_bulanan.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$bulan = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$bulan = mysqli_real_escape_string($koneksi, $bulan);

$sql = "SELECT t.no_transaksi, t.tanggal, t.total_bayar, u.nama_lengkap AS nama_kasir";
$sql .= "FROM tbl_transaksi t JOIN tbl_user u ON t.id_kasir = u.id_user";
$sql .= "WHERE DATE_FORMAT(t.tanggal, '%Y-%m') ='$bulan' ORDER BY t.tanggal ASC";
$hasil = mysqli_query($koneksi, $sql);     

$total_bulanan = 0;
$jumlah_transaksi = 0;
?>
<!DOCTYPE html>
<html>
    <head><title>Laporan bulanan - Warung ABC</title></web>
<body>
    <h1>Laporan transaksi bulanan</h1>
    <from method = "GET">
        bulan : <input type="month" name="bulan" value="<?php echo $bulan; ?>">
        <input type="submit" value="tampilkan">
</from>
         <table border="1" cellpadding="6">
            <tr><th>No. Transaksi</th><th>tanggal</th><th>Kasir</th><th>total bayar</th></tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) {
                $total_bulanan += $row ['total_bayar'];
                $jumlah_transaksi++;
                ?>
                <tr>
                    <td><?php echo $row['no_transaksi']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['nama_kasir']; ?></td>
                    <td><?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>
            </tr> 
        <?php } ?>
</table>
                    <p>$jumlah transaksi: <?php echo $jumlah_transaksi; ?></p>
                    <p>total pendapatan bulan ini: Rp
                        <?php echo number_format($total_bulanan, 0, ',', '.'); ?></p>
                        <p><a href="dashboard.php"> kembali ke dashboard</a></p>
</body>
</html>