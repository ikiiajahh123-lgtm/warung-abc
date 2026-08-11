<?php
// data_barang.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM tbl_barang order BY nama_barang ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
    <head><title>data barang - warung ABC</title></head>
    <body>
        <h1>data barang</h1>
        <p><a href="dashboard.php"> kembali ke dashboard</a> | <a href="tambah_barang.php">tambah barang</a></p>
               <table border="1" cellpadding="6">
                <tr>
                    <th>kode</th><th>Nama barang</th><th>Harga satuan</th>
                    <th>Stok</th><th>Kadaluarsa</th><th>Aksi</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
<tr>
       <td><?php echo $row['kode_barang']; ?></td>
       <td><?php echo $row['nama_barang']; ?></td>
       <td><?php echo number_format ($row['harga_satuan'],0,",", "."); ?></td>
       <td><?php echo $row['stok']; ?></td>
       <td><?php echo $row['tanggal_kadaluarsa']; ?></td>
       <td>
            <a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>">Edit</a> |
            <a href="hapus_barang.php?id=<?php echo $row['id_barang']; ?>'
                 onclick="return confirm('yakin hapus barang ini?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
       