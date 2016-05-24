<?php
include 'sistem/db/MysqliDb.php';

$db = new MysqliDb();

$id_mobil = $_GET['id'];
$db->where('id_mobil', $id_mobil);
$hapus = $db->delete('mobil');

if ($hapus) {
 	echo "<script>alert('Data berhasil dihapus');</script>";
 	echo "<script>window.location.href='mobil.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL dihapus');</script>";
 	echo "<script>history.back();</script>";
 }


?>