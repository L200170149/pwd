<?php
if(isset($_GET['kode'])) {
    include('config/koneksi.php');
    $kode= $_GET['kode'];

    if(isset($_POST['submit'])){
        $kode=mysqli_escape_string($dbc, $_GET['kode']);
        $nama=mysqli_escape_string($dbc, $_POST['nama_barang']);
        $kode_gudang=mysqli_escape_string($dbc, $_POST['kode_gudang']);  

        

        $query=mysqli_query($dbc, "UPDATE `barang` SET `nama_barang` = '$nama', `kode_gudang`='$kode_gudang' WHERE `barang`.`kode_barang` = '$kode'");
        if ($query) {
            echo "<script>alert('Data Berhasil Diupdate');window.location='./';</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal Diupdate');window.location='./';</script>";
            exit;
        }     
    }
    
    $querya=mysqli_query($dbc,"SELECT barang.kode_barang, barang.nama_barang, gudang.lokasi_gudang, gudang.kode_gudang FROM barang INNER JOIN gudang ON barang.kode_gudang=gudang.kode_gudang WHERE barang.kode_barang='$kode'");

    if(mysqli_num_rows($querya) == 0) {
        echo "<script>alert('Buku Tidak Ada..');window.location='./';</script>";
        exit;
    } else {
    $data=mysqli_fetch_array($querya);
    $kode_gudang=$data['kode_gudang'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT DATA</title>
</head>
<body>
<form action="?kode=<?php echo $kode; ?>" method="POST">
        <table border='0'>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="kode_barang" disabled="" value="<?php echo $kode; ?>">
                </td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>">
                </td>
            </tr>

            <tr>
                <td>Gudang</td>
                <td>:</td>
                <td>
                    <select name="kode_gudang" id="kode_gudang">
                        <?php
                        $query=mysqli_query($dbc, "SELECT * FROM gudang WHERE kode_gudang='$kode_gudang'");
                        $data=mysqli_fetch_array($query);
                        ?>
                        <option value="<?php echo $data['kode_gudang']; ?>" selected><?php echo $data['nama_gudang']; ?></option>
                        <?php
                        $query=mysqli_query($dbc, "SELECT * FROM gudang WHERE kode_gudang!='$kode_gudang'");
                        while ($data=mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $data['kode_gudang']; ?>"><?php echo $data['nama_gudang']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" align='right'>
                    <input type="submit" name="submit" value="EDIT">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    }
} else {
    echo "<script>window.location='./form.php';</script>";
}