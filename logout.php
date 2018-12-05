<?php
include('config/db.php');
?>

<?php
   session_start();
   $namlog=$_SESSION['nama_log'];
   $sqllastlogout = mysqli_query($con, "UPDATE `admin` SET `last_logout`=CURRENT_TIMESTAMP WHERE nama_login='$namlog'");
   session_destroy();
   header('Location: index.php');
?>
