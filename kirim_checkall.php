<?php 
include 'sistem/db/MysqliDb.php';

$db = new MysqliDb();

// $data = array('haha');
// $post = $_POST['param1'];
if (!empty($_POST['param1'])) {
	$post = $_POST['param1'];
	$retVal =  $_POST['isine'] ;
	$data = $post;
	foreach ($data as $key) {
		// $hasil[] = $key;
		$db->where('id_pelanggan', $key);
		$pel = $db->getOne('pelanggan');

		$arraydata[] = array(
			'id'=>$pel['id_pelanggan'],
			'no_telp'=>$pel['no_telepon'],
			'isi'=> $retVal
			);
	}

	foreach ($arraydata as $key ) {
		$sms = array(
			'DestinationNumber'=>$key['no_telp'],
			'TextDecoded'=>$key['isi'],
			'CreatorID'=>'Gammu'
		);
		$db->insert('outbox', $sms);

		$notif = array(
			'id_pelanggan'=>$key['id'],
			'isi_notifikasi'=>$key['isi'],
			'jenis_notifikasi'=>'K'
			);
		$db->insert('notifikasi', $notif);
	}

	echo json_encode('Sukses kirim sms');
} else {
	echo json_encode('tidak memilih checklist');
}
// print_r($data);
?>