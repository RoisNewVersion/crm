<?php 
include 'sistem/db/MysqliDb.php';

$term = trim(strip_tags($_GET['term']));

$db = new MysqliDb();

$raw = $db->rawQuery('select * from pelanggan where nama like "%'.$term.'%"');

foreach ($raw as $key) {
	$hasil['id_pelanggan'] = (int)$key['id_pelanggan'];
	$hasil['alamat'] = $key['alamat'];
	$hasil['no_telepon'] = $key['no_telepon'];
	$hasil['tanggal_lahir'] = $key['tanggal_lahir'];
	$hasil['value'] = htmlentities(stripslashes($key['nama']));
	$hasil_final[] = $hasil;
}

echo json_encode($hasil_final);
?> 