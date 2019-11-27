<?php
    session_start();
    $id_session = session_id();
    echo "Session id anda adalah ".$id_session;
    echo "<br><br>";
    session_destroy();
    $id_session2 = session_id();
    echo "Session id anda setelah data session di-destroy :".$id_session2;
?>