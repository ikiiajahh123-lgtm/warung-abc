<?php
// dashboard.php
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title> dashboard - warung abc</title></head>
<body>
    <h1>selamat datang, <?php echo $_SESSION['nama_lengkap']; ?></h1>
    <p> anda login sebagai: <?php echo $_SESSION['role']; ?></p>

    <ul>
        <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'gudang') { ?>
    <li><a href="data_barang.php">data barang</a></li>
<?php } ?>

<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'kasir') {?>
        <li><a href="transaksi.php">Transaksi Kasir</a></li>
        <li><a href="riwayat_transaksi.php">Riwayat Transaksi</a></li>
    <?php } ?>
</ul>

 <a href= "logout.php">logout</a>
</body>
</html>