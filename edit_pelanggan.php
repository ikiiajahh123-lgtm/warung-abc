<?php
// edit_pelanggan.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_pelanggan WHERE id_pelanggan = '$id'";
$hasil = mysqli_query($koneksi, $sql);
$date = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
    <head><title>Edit pelanggan - warung ABC</title></head>
<body>
    <h1>Edit pelanggan</h1>
    <form action ="proses_edit_pelanggan.php" method = "POST">
        <input type ="hiddes" name="id_pelanggan"
             value ="<?php echo $data['id_pelanggan']; ?>">
        <table>
            <tr><td>Name pelanggan </td><td>:</td>
               <td><input type ="text" name="pelanggan"
                   value ="<?php echo $data['nama_pelanggan']; ?>"required></td></tr>
                <tr><td>No. hp</td><td>:</td>
                   <td><input type ="text" name ="no_hp"
                      value ="<?php echo $data['no_hp']; ?>"></td></tr>
                    <tr><td colspan ="3"><input type ="submit" value ="update"></td></tr>
                </table>
            </form>
        <p><a href ="data_pelanggan.php">Kembali</a></p>
     </body>
</html>