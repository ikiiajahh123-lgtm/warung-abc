<?php
// edit_barang.php
include 'includes/cek_sessin.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_barang WHERE id_barang = '$id'";
$hasil = mysqli_query($sql);
$data = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
    <head><title>Edit Barang - Warung ABC</title></head>
<body>
    <h1>Edit Barang</h1>
    <from action="proses_edit_barang.php" method="POST">
        <input type="hidden" name="id_barang" value ="<?php echo $data['id_barang']; ?>">
        <table>
            <tr><td>Kode Barang</td><td>:</td>
                 <td><input type="text" name="kode_barang"
                    value="<?php echo $data['kode_barang']; ?>" required></td></tr>
            <tr><td>nama barang</td><td>:</td>
                 <td><input type="text" name="nama_barang"
                    value="<?php echo $data['nama_barang']; ?>" required></td></tr>
            <tr><td>harga satuan</td><td>:</td>
                 <td><input type="number" name="harga_satuan" step="0.01"
                    value="<?php echo $data['harga_satuan']; ?>" required></td></tr>
            <tr><td>stok</td><td>:</td>
                 <td><input type="number" name="stok"
                    value="<?php echo $data['stok']; ?>" required></td></tr>
            <tr><td>tanggal Kadaluarsa</td><td>:</td>
                 <td><input type="date" name="tanggal_kadaluarsa"
                    value="<?php echo $data['tanggal_kadaluarsa']; ?>"></td></tr>
            <tr><td colspan="3">input type="submit" value="update"></td></tr>
             
                </table>
            </from> 
         <p><a href="data_barang.php">kembali</a></p>
    </body>
</html