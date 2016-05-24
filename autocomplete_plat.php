<?php 
include 'sistem/db/MysqliDb.php';

$term = trim(strip_tags($_GET['term']));

$db = new MysqliDb();

$raw = $db->rawQuery('select m.*, p.no_telepon, p.nama from mobil m, pelanggan p where m.id_pelanggan=p.id_pelanggan and m.plat_nomor like "%'.$term.'%" order by m.id_mobil');
// $raw = $db->rawQuery('select * from mobil where plat_nomor like "%'.$term.'%"');

foreach ($raw as $key) {
	$hasil['id_pelanggan'] = (int)$key['id_pelanggan'];
	$hasil['id_mobil'] = (int)$key['id_mobil'];
	$hasil['jenis_mobil'] = $key['jenis_mobil'];
	$hasil['nama'] = $key['nama'];
	$hasil['no_telepon'] = $key['no_telepon'];
	$hasil['value'] = htmlentities(stripslashes($key['plat_nomor'] .' - '. $hasil['nama']));
	$hasil_final[] = $hasil;
}

echo json_encode($hasil_final);
?> 