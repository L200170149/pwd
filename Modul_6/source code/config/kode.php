<?php
function kodeBarangOtomatis($dbc) {
	$query = "SELECT max(Convert(int, kode_barang)) as maxKode FROM barang";
	$hasil = mysqli_query($dbc,"SELECT max(kode_barang) as maxKode FROM barang");

	$data = mysqli_fetch_array($hasil);
	$kodeBarang = $data['maxKode'];

	// echo $kodeBarang;
	 
	$noUrut = (int) substr($kodeBarang, 2, 3);
	$noUrut++;
	 
	$char = "BK";
	$kodeBarang = $char . sprintf("%03s", $noUrut);
	return $kodeBarang;
}

// function kodeGudangOtomatis($dbc) {
// 	$query = "SELECT max(Convert(int, kode_barang)) as maxKode FROM gudang"
// 	$hasil = mysqli_query($dbc,$query);
	
// 	if (mysqli_num_rows($hasil) == 0) {
// 		return False;
// 	}

// 	$data = mysqli_fetch_array($hasil);
// 	$kodeBarang = $data['maxKode'];
	 
// 	$noUrut = (int) substr($kodeBarang, 3, 3);
// 	$noUrut++;
	 
// 	$char = "BR";
// 	$kodeBarang = $char . sprintf("%03s", $noUrut);
// 	return $kodeBarang;
// }
?>