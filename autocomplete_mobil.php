<?php 
include 'sistem/db/MysqliDb.php';

$term = trim(strip_tags($_GET['term']));

$db = new MysqliDb();

$raw = $db->rawQuery('select id_pelanggan, nama from pelanggan where nama like "%'.$term.'%"');
foreach ($raw as $key) {
	$hasil['id'] = (int)$key['id_pelanggan'];
	$hasil['value'] = htmlentities(stripslashes($key['nama']));
	$hasil_final[] = $hasil;
}

echo json_encode($hasil_final);
?> 