<?php

include 'includes/cek_session.php';
include 'config/koneksi.php';

// Ambil ID barang dan pastikan hanya berupa angka
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Cek apakah ID valid
if ($id <= 0) {
    header('Location: data_barang.php');
    exit;
}

// Ambil nama barang sebelum dihapus
$cek = mysqli_query(
    $koneksi,
    "SELECT nama_barang FROM tbl_barang WHERE id_barang = $id"
);

$data = mysqli_fetch_assoc($cek);

// Hapus barang
$sql = "DELETE FROM tbl_barang WHERE id_barang = $id";

if (mysqli_query($koneksi, $sql)) {

    // Simpan aktivitas ke log
    if (isset($_SESSION['id_user'])) {

        $id_user = (int) $_SESSION['id_user'];
        $waktu = date('Y-m-d H:i:s');

        $nama_barang = $data['nama_barang'] ?? 'Barang';

        $aktivitas = "Hapus barang - " . $nama_barang;

        $log = "INSERT INTO tbl_log 
                (id_user, aktivitas, waktu)
                VALUES 
                ($id_user, '$aktivitas', '$waktu')";

        mysqli_query($koneksi, $log);
    }
}

// Kembali ke halaman data barang
header('Location: data_barang.php');
exit;

?>