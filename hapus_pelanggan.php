<?php
include 'sistem/db/MysqliDb.php';

$db = new MysqliDb();

$id_pelanggan = $_GET['id'];
$db->where('id_pelanggan', $id_pelanggan);
$hapus = $db->delete('pelanggan');

if ($hapus) {
 	echo "<script>alert('Data berhasil dihapus');</script>";
 	echo "<script>window.location.href='pelanggan.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL dihapus');</script>";
 	echo "<script>history.back();</script>";
 }


?>