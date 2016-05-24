<?php
include 'sistem/db/MysqliDb.php';

$db = new MysqliDb();

$id_notifikasi = $_GET['id'];
$db->where('id_notifikasi', $id_notifikasi);
$hapus = $db->delete('notifikasi');

if ($hapus) {
 	echo "<script>alert('Data berhasil dihapus');</script>";
 	echo "<script>window.location.href='notifikasi.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL dihapus');</script>";
 	echo "<script>history.back();</script>";
 }


?>