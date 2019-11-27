<?php
    session_start();
    echo "Anda berhasil login sebagai ".$_SESSION['username']." dan terdaftar sebagai ".$_SESSION['status'];
?>
<br>
<h1>Hallo member</h1>
Silahkan logout dengan menekan link <a href="logout.php"> logout </a>