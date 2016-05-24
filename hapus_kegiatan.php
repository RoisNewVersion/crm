<?php
include 'sistem/db/MysqliDb.php';

$db = new MysqliDb();

$id_kegiatan = $_GET['id'];
$db->where('id_kegiatan', $id_kegiatan);
$hapus = $db->delete('kegiatan');

if ($hapus) {
 	echo "<script>alert('Data berhasil dihapus');</script>";
 	echo "<script>window.location.href='kegiatan.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL dihapus');</script>";
 	echo "<script>history.back();</script>";
 }


?>