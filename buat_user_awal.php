<?php
include 'config/koneksi.php';

$sql = "SELECT * FROM tbl_user LIMIT 1";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($hasil) > 0) {
    echo "User sudah ada. Silakan login.";
    exit;
}

$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO tbl_user (username, password)
        VALUES ('admin', '$password')";

if (mysqli_query($koneksi, $sql)) {
    echo "User admin berhasil dibuat.<br>";
    echo "Username: admin<br>";
    echo "Password: admin123<br><br>";
    echo "<a href='login.php'>Login</a>";
} else {
    echo "Gagal membuat user: " . mysqli_error($koneksi);
}
?>