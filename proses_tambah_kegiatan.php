<?php 

include 'sistem/db/MysqliDb.php';

$id_pelanggan = $_POST['id_pelanggan'];
$id_mobil = $_POST['id_mobil'];
$keluhan = ucwords($_POST['keluhan']);
$keluhan2 = ucwords($_POST['keluhan2']);
$kegiatan = ucwords($_POST['kegiatan']);
$tanggal_masuk = $_POST['tanggal_masuk'];
$perkiraan_kembali = $_POST['perkiraan_kembali'];
$pesan_keluhan = $_POST['pesan_keluhan'];
$no_telepon = $_POST['no_telepon'];

$pesan_keluhan2 = 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk '.$keluhan2.' selanjutnya.';
$keluhan_final = ($keluhan == null ) ? $keluhan2 : $keluhan;
$pesan_keluhan_final = ($pesan_keluhan == null ) ? $pesan_keluhan2 : $pesan_keluhan;

$data = array(
			'id_pelanggan'=>$id_pelanggan,
			'id_mobil'=>$id_mobil,
			'keluhan'=>$keluhan_final,
			'kegiatan'=>$kegiatan,
			'tanggal_masuk'=>$tanggal_masuk,
			'perkiraan_kembali'=>$perkiraan_kembali,
			'status_kirim'=>'B',
			// 'TextDecoded'=>$pesan_keluhan_final,
		);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$db = new MysqliDb();

$masukan = $db->insert('kegiatan', $data);
if ($masukan) {
	// kirim sms
	$sms = array(
			'DestinationNumber'=>$no_telepon,
			'TextDecoded'=>$pesan_keluhan_final,
			'CreatorID'=>'Gammu'
		);
	$db->insert('outbox', $sms);

 	echo "<script>alert('Data berhasil masuk');</script>";
 	echo "<script>window.location.href='kegiatan.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL masuk');</script>";
 	echo "<script>history.back();</script>";
 }

?>