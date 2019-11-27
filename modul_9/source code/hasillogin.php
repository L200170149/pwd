<?php
    session_start();
    echo "Anda berhasil login sebagai ".$_SESSION['username']." dan terdaftar sebagai ".$_SESSION['status'];
?>
<br>
Silahkan logout dengan menekan link <a href="logoutt.php"> logout </a>