<?php 

include 'sistem/db/MysqliDb.php';

$jenis_mobil = ucwords($_POST['jenis_mobil']);
$plat_nomor = strtoupper($_POST['plat_nomor']);
$id_pelanggan = $_POST['id_pelanggan'];
$id_mobil = $_POST['id_mobil'];
$tahun = $_POST['tahun'];

$data = array(
			'id_pelanggan'=>$id_pelanggan,
			'jenis_mobil'=>$jenis_mobil,
			'plat_nomor'=>$plat_nomor,
			'tahun'=>$tahun
		);

$db = new MysqliDb();
$db->where('id_mobil', $id_mobil);
$masukan = $db->update('mobil', $data);
if ($masukan) {
 	echo "<script>alert('Data berhasil diedit');</script>";
 	echo "<script>window.location.href='mobil.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL masuk');</script>";
 	echo "<script>history.back();</script>";
 }

?>