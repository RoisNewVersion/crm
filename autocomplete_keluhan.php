<?php 
include 'sistem/db/MysqliDb.php';

$term = trim(strip_tags($_GET['term']));

$db = new MysqliDb();

$raw = $db->rawQuery('select * from macam_kegiatan where nama_keluhan like "%'.$term.'%"');
foreach ($raw as $key) {
	$hasil['id'] = (int)$key['id_macam'];
	$hasil['value'] = htmlentities(stripslashes($key['nama_keluhan']));
	$hasil['detail_pesan'] = htmlentities(stripslashes($key['detail_pesan']));
	$hasil_final[] = $hasil;
}

echo json_encode($hasil_final);
?> 