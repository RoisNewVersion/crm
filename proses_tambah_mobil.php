<?php 

include 'sistem/db/MysqliDb.php';

$jenis_mobil = ucwords($_POST['jenis_mobil']);
$plat_nomor = strtoupper($_POST['plat_nomor']);
$id_pelanggan = $_POST['id_pelanggan'];
$tahun = $_POST['tahun'];

$data = array(
			'id_pelanggan'=>$id_pelanggan,
			'jenis_mobil'=>$jenis_mobil,
			'plat_nomor'=>$plat_nomor,
			'tahun' => $tahun,
		);

$db = new MysqliDb();

$masukan = $db->insert('mobil', $data);
if ($masukan) {
 	echo "<script>alert('Data berhasil masuk');</script>";
 	echo "<script>window.location.href='mobil.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL masuk');</script>";
 	echo "<script>history.back();</script>";
 }

?>