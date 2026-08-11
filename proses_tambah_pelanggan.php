<?php
// proses_tambah_pelanggan.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

// Ambil data dari form
$nama = isset($_POST['nama_pelanggan']) ? trim($_POST['nama_pelanggan']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

// Validasi
if ($nama == '') {
    echo "Nama pelanggan wajib diisi.";
    exit;
}

// Escape data
$nama = mysqli_real_escape_string($koneksi, $nama);
$alamat = mysqli_real_escape_string($koneksi, $alamat);

// Simpan ke database
// CATATAN: kolom no_hp dihapus karena tidak ada di database kamu
$sql = "INSERT INTO tbl_pelanggan (nama_pelanggan, alamat)
        VALUES ('$nama', '$alamat')";

if (mysqli_query($koneksi, $sql)) {

    // Simpan log aktivitas
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
    $waktu = date('Y-m-d H:i:s');
    $aktivitas = "Tambah pelanggan: " . $nama;

    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $aktivitas = mysqli_real_escape_string($koneksi, $aktivitas);

    $log = "INSERT INTO tbl_log (id_user, aktivitas, waktu)
            VALUES ('$id_user', '$aktivitas', '$waktu')";

    mysqli_query($koneksi, $log);

    // Kembali ke halaman data pelanggan
    header('Location: data_pelanggan.php');
    exit;

} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>