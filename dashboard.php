<?php
// dashboard.php
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title> dashboard - warung abc</title>
</head>
<body>
    <h1>selanat datang, <?php echo $_SESSION['nama_lengkap']; ?></h1>
    <p> anda login sebagai: <?php echo $_SESSION['role']; ?></p>
    <a href= "logout.php">logout</a>
</body>
</html>