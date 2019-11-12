<?php
$server='localhost';
$server_username='root';
$server_password='';
$server_database='informatika';

$dbc = mysqli_connect($server, $server_username, $server_password) or die ('Koneksi Gagal');

mysqli_select_db($dbc, $server_database);

?>