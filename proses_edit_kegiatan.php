<?php 

include 'sistem/db/MysqliDb.php';

$id_kegiatan = $_POST['id_kegiatan'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_mobil = $_POST['id_mobil'];
$keluhan = ucwords($_POST['keluhan']);
$kegiatan = ucwords($_POST['kegiatan']);
$tanggal_masuk = $_POST['tanggal_masuk'];
$perkiraan_kembali = $_POST['perkiraan_kembali'];

$data = array(
			'id_pelanggan'=>$id_pelanggan,
			'id_mobil'=>$id_mobil,
			'keluhan'=>$keluhan,
			'kegiatan'=>$kegiatan,
			'tanggal_masuk'=>$tanggal_masuk,
			'perkiraan_kembali'=>$perkiraan_kembali,
		);

$db = new MysqliDb();
$db->where('id_kegiatan', $id_kegiatan);
$edit = $db->update('kegiatan', $data);
if ($edit) {
 	echo "<script>alert('Data berhasil diedit');</script>";
 	echo "<script>window.location.href='kegiatan.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL diedit');</script>";
 	echo "<script>history.back();</script>";
 }

?>