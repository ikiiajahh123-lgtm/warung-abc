<!DOCTYPE html>
<html>
    <head>
        <title>login - warung abc</title>
</head>
<body> 
    <h1>login aplikasi kasir warung abc</h1>

    <?php
    session_start();
    if (isset($_session['pesan_error'])) {
        echo '<p>' . $_session['pesan_error']. '</p>';
        unset($_session['pesan_error']);

    }
    ?>

    <from action="proses_login.php" method="post">
        <table>
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
</tr>
<tr>
     <td colspan="3">
        <input type="submit" value="login">
                 
              </td>
            </tr>
         </table>
      </from>
   </body>
</html>