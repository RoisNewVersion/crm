<?php 
// semua hal yang berhubungan dengan utility sistem

/**
* Author Rois New VersiOn
*/
class Utility
{
	public $db;
	
	public function __construct()
	{
		// parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function checkLogin($session)
	{
		// include 'db/MysqliDb.php';

		if (!isset($_SESSION[$session])) {
			header("Location: login.php");
		}
		
	}

	public function diLoginPage($session)
	{
		if (isset($_SESSION[$session])) {
			header("Location: index.php");
		}
	}

	public function checkUlangTahun()
	{
		// include 'db/MysqliDb.php';
		$db = new MysqliDb();

		$tgl = date('Y-m-d');
		$jam = date('H');

		$db->where('tanggal_lahir', $tgl);
		$data = $db->get('pelanggan');

		foreach ($data as $key ) {
			$data_ultah = array(
				'DestinationNumber'=>$key['no_telepon'],
				'TextDecoded'=> 'Selamat ulang tahun '.$key['nama']. ' - Dari Tembiring auto demak',
				'CreatorID'=>'Gammu'
				);

			// jika kurang dari jam 9 pagi
			if ($jam <= 9) {
				// kirim sms
				$db->insert('outbox', $data_ultah);
			}
		}

		// echo $jam;
		// echo "<pre>";
		// print_r($data_ultah);
		// echo "</pre>";
	}

	public function kirimOtomatis()
	{
		 // include 'db/MysqliDb.php';
		// ini untuk mengirim pesan otomatis berdasarkan tgl perkiraan dikurangi 7 hari.
		
		$db = new MysqliDb();

		$tgl = date('Y-m-d');
		$jam = date('H');
		// $db->where('status_kirim', 'B');
		// $data = $db->get('kegiatan');
		$db->join('pelanggan p', 'p.id_pelanggan=k.id_pelanggan', 'LEFT');
        $db->where('k.status_kirim', 'B');
		$data = $db->get('kegiatan k', null, 'p.nama, p.no_telepon, k.*');


		foreach ($data as $key) {
			$tgl1 = $key['perkiraan_kembali'];
			// kurangi waktu 7 hari.
			$tgl2 = date('Y-m-d', strtotime('-7 days', strtotime($tgl1)));
			$id_kegiatan = $key['id_kegiatan'];

			// jika tgl ny sesuai
			if ($tgl == $tgl2) {
				
				//jika ada maka kirim sms
				$data_kirim = array(
				'DestinationNumber'=>$key['no_telepon'],
				'TextDecoded'=> 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk '.$key['keluhan'].' selanjutnya.',
				'CreatorID'=>'Gammu'
				);
				
				// jika kurang dari jam 9 pagi
				if ($jam <= 9) {
					// kirim sms
					$masukan = $db->insert('outbox', $data_kirim);
					// update status mjd K = kirim.
					if ($masukan) {
						$db->where('id_kegiatan', $id_kegiatan);
						$db->update('kegiatan', array('status_kirim'=>'K'));
				 	}
				}
			}
		}

		// perkiraan 4 bulan khusus ganti oli.
		$db2 = new MysqliDb();
		$db2->join('pelanggan p', 'p.id_pelanggan=k.id_pelanggan', 'LEFT');
		$data2 = $db2->get('kegiatan k', null, 'p.nama, p.no_telepon, k.*');

		foreach ($data2 as $key2 ) {
			$tglkem = $key2['perkiraan_kembali'];

			// jika datane = ganti oli, maka tambah 4 bln
			if (strtolower($key2['keluhan']) == 'ganti oli') {
				$tgl4bln = date('Y-m-d', strtotime('+4 month', strtotime($tglkem)));
				// jika tgl sama
				if ($tgl == $tgl4bln) {
					//jika sama maka kirim sms
					$data_kirim2 = array(
					'DestinationNumber'=>$key2['no_telepon'],
					'TextDecoded'=> 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk '.'Ganti Oli'.' selanjutnya.',
					'CreatorID'=>'Gammu'
					);
					
					// jika kurang dari jam 9 pagi
					if ($jam <= 9) {
						// kirim sms
						$db2->insert('outbox', $data_kirim2);
					}
				}
			}
		}
	}
}

?>