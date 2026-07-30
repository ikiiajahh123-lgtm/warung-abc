<!DOCTYPE html>
<html>
    <head>
        <title>login - warung abc</title>
</head>
<body> 
    <h1>login aplikasi kasir warung abc</h1>

    <?php
    session_start();
    if (isset($_SESSION['pesan_error'])) {
        echo '<p>' . $_SESSION['pesan_error']. '</p>';
        unset($_SESSION['pesan_error']);

    }
    ?>

    <form action="proses_login.php" method="post">
        <table>
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                 <td>password</td>
                 <td>:</td>
                 <td><input type="password" name="password" required></td>
            </tr>
             <tr>
                <td colspan="3">
                    <input type="submit" value="login"></td>
            </tr>
         </table>
    </form>
   </body>
</html>