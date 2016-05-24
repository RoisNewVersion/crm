<?php 

include 'sistem/db/MysqliDb.php';

$nama = ucwords($_POST['nama']);
$alamat = ucwords($_POST['alamat']);
$tgl_lahir = $_POST['tgl_lahir'];
$no_telepon = $_POST['no_telepon'];

$data = array(
			'nama'=>$nama,
			'alamat'=>$alamat,
			'tanggal_lahir'=>$tgl_lahir,
			'no_telepon'=>$no_telepon
		);

$db = new MysqliDb();

$masukan = $db->insert('pelanggan', $data);
// print_r($masukan);
if ($masukan) {
	$sms = array(
			'DestinationNumber'=>$no_telepon,
			'TextDecoded'=>'Selamat Datang '.$nama.' di Bengkel Tembiring Auto Demak',
			'CreatorID'=>'Gammu'
		);
	$db->insert('outbox', $sms);
 	echo "<script>alert('Data berhasil masuk, Selamat datang ".$nama."');</script>";
 	echo "<script>window.location.href='pelanggan.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL masuk');</script>";
 	echo "<script>history.back();</script>";
 }

?>