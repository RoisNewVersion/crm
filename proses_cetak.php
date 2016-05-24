<?php 
include 'sistem/db/MysqliDb.php';
include 'sistem/fpdf17/fpdf.php';

/**
* membuat pdf cetak nota
*/

//class FPDF utk header n footer
class PDF extends FPDF
{
	public function header()
	{
		//Logo
		$this->Image('asset/img/logo-ubl.jpg',11,8);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(80);
		//judul
		$this->Cell(30,5,'TEMBIRING AUTO DEMAK',0,1,'C');

		$this->Cell(80);
		$this->SetFont('Arial','',10);
		$this->Cell(30,5,'Jl. Kyai Turmudzi No. 05 Tembiring Demak',0,1,'C');
		$this->Cell(80);
		$this->Cell(30,5,'Demak kota HP. 08157686376',0,0,'C');
		//pindah baris
		$this->Ln(10);
		//buat garis horisontal
		$this->Line(10,25,200,25);

	}

	public function footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	
	}
}//END OF CLASS

$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];



//output
$pdf = new PDF('L', 'mm', 'A5');
$pdf->AliasNbPages();
$pdf->Addpage();
$pdf->SetFont('Arial', '', '12');

// $pdf->text(17, 30, 'Data : ');
// $pdf->text(27, 30, $tgl_awal.' - '.$tgl_akhir);

$pdf->Ln();
$pdf->setFillColor(225, 225, 225);
$pdf->SetDrawColor(205, 205, 205);
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(10, 6, 'No', 1, 0, 'C', true);
$pdf->Cell(30, 6, 'Nama', 1, 0, 'L', true);
$pdf->Cell(30, 6, 'Mobil', 1, 0, 'L', true);
$pdf->Cell(30, 6, 'Plat', 1, 0, 'L', true);
$pdf->Cell(30, 6, 'Keluhan', 1, 0, 'L', true);
$pdf->Cell(30, 6, 'Kegitan', 1, 0, 'L', true);
$pdf->Cell(30, 6, 'Perk. Kembali', 1, 0, 'L', true);

//ambil dari db
$pdf->setFillColor(245, 245, 245);
	$no = 1;
	
	$db = new MysqliDb();

	$raw = $db->rawQuery("select m.*, p.*, k.* from mobil m, pelanggan p, kegiatan k where k.id_pelanggan=p.id_pelanggan and k.id_mobil=m.id_mobil and k.tanggal_masuk between \"$tgl_awal\" and \"$tgl_akhir\" ");
	foreach ($raw as $key) {

		$pdf->Ln();
		$pdf->SetFont('Arial', '', '12');
		$pdf->Cell(10, 6, $no, 1, 0, 'C', true);
		$pdf->Cell(30, 6, $key['nama'], 1, 0, 'L', true);
		$pdf->Cell(30, 6, $key['jenis_mobil'], 1, 0, 'L', true);
		$pdf->Cell(30, 6, $key['plat_nomor'], 1, 0, 'L', true);
		$pdf->Cell(30, 6, $key['keluhan'], 1, 0, 'L', true);
		$pdf->Cell(30, 6, $key['kegiatan'], 1, 0, 'L', true);
		$pdf->Cell(30, 6, $key['perkiraan_kembali'], 1, 0, 'L', true);
	$no++;
	}
$pdf->output();

?>