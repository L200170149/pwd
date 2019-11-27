<?php
    session_start();
    session_destroy();
?>
<script>
    alert('anda berhasil logout');
    document.location = 'loginn.php';
</script>