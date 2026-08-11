<?php include 'includes/cek_session.php'; ?>
<!DOCTYPE html>
<html>
    <head><title> Tambah pelanggan - Warung ABC</title></head>
    <body>
        <h1>Tambah pelanggan</h1>
        <from action="proses_tambah_pelanggan.php" method="POST">
            <table>
                <tr><td>Nama pelanggan</td><td>:</td>
                  <td><input type ="text" nama="nama_pelanggan" required></td></tr>
                <tr><td>NO. HP</td><td>:</td>
                   <td><input type="text" nama="no_hp"></td></tr>
                <tr><td>Alamat</td><td>:</td>
                    <td><input type="text" nama="alamat"></td></tr>
                <tr><td colspan="3"><input type="submit" values="Simpan"></td></tr>
             </table>
         </from>
        <p><a href="data_pelanggan.php">kembali</a></p>
    </body>
</html>