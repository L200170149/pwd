<?php
if(isset($_GET['kode'])) {
    include_once('config/koneksi.php');
    // cek mahasiswa
    $kode=$_GET['kode'];
    $query=mysqli_query($dbc,"SELECT * FROM barang WHERE kode_barang='$kode'");
    if(mysqli_num_rows($query) == 0) {
        echo "<script>alert('Buku Tidak Ada..');window.location='./';</script>";
        exit;
    } else {
        $query=mysqli_query($dbc, "DELETE FROM barang WHERE kode_barang='$kode'");
        if($query) {
            echo "<script>alert('Buku Berhasil Dihapus');window.location='./';</script>";
        } else {
            echo "<script>alert('Buku Gagal Dihapus');window.location='./';</script>";
        }
    }
} else {
    echo "Mau Apa ??";
}