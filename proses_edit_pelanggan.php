<?php 

include 'sistem/db/MysqliDb.php';

$id_pelanggan = $_POST['id_pelanggan'];
$nama = ucwords($_POST['nama']);
$alamat = ucwords($_POST['alamat']);
$tanggal_lahir = $_POST['tgl_lahir'];
$no_telepon = $_POST['no_telepon'];

$data = array(
			'nama'=>$nama,
			'alamat'=>$alamat,
			'tanggal_lahir'=>$tanggal_lahir,
			'no_telepon'=>$no_telepon
		);

$db = new MysqliDb();
$db->where('id_pelanggan', $id_pelanggan);

$update = $db->update('pelanggan', $data);
if ($update) {
 	echo "<script>alert('Data berhasil diedit');</script>";
 	echo "<script>window.location.href='pelanggan.php';</script>";
 } else {
 	echo "<script>alert('Data GAGAL diedit');</script>";
 	echo "<script>history.back();</script>";
 }

?>