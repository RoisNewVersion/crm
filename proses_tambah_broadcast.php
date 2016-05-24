<?php 

include 'sistem/db/MysqliDb.php';

$id_pelanggan = $_POST['id_pelanggan'];
$no_telepon = $_POST['no_telepon'];
$isi_notifikasi = ucwords($_POST['isi_notifikasi']);
$jenis_notifikasi = $_POST['jenis_notifikasi'];

$data = array(
			'id_pelanggan'=>$id_pelanggan,
			'isi_notifikasi'=>$isi_notifikasi,
			'jenis_notifikasi'=>$jenis_notifikasi,
		);

$db = new MysqliDb();

$masukan = $db->insert('notifikasi', $data);
if ($masukan) {

	$sms = array(
			'DestinationNumber'=>$no_telepon,
			'TextDecoded'=>$isi_notifikasi,
			'CreatorID'=>'Gammu'
		);
	$db->insert('outbox', $sms);

 	echo "<script>alert('Data berhasil masuk');</script>";
 	echo "<script>window.location.href='notifikasi.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL masuk');</script>";
 	echo "<script>history.back();</script>";
 }

?>