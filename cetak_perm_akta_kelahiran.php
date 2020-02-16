<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 215-(10*2)=195mm

$pdf = new FPDF('P','mm',array(215,330));
$pdf->AddPage();

$pdf->Image('logo.jpg',20,10,23,23);
$pdf->SetFont('Times','B',14);
$pdf->ln(2);
$pdf->Cell(195,6,'PEMERINTAH KABUPATEN GUNUNG KIDUL',0,1,'C');
$pdf->Cell(195,6,'KECAMATAN WONOSARI',0,1,'C');
$pdf->SetFont('Times','B',16);
$pdf->Cell(195,6,'DESA GARI',0,1,'C');
$pdf->ln(4);
$pdf->Line(10,33,195,33); 
$pdf->SetLineWidth(0.1);
$pdf->Line(10,33.5,195,33.5); 
$pdf->SetLineWidth(0.1);

$pdf->ln(5);
$pdf->SetFont('Times','BU',14);
$pdf->Cell(195,6,'SURAT PENGANTAR AKTA KELAHIRAN',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(95,5,'Nomor :            460/          /          /2020',0,0,'C');
$pdf->Cell(50,5,'',0,1,'C');

$pdf->ln(6);
$text="Yang bertanda tangan di bawah ini kami Kepala Desa Gari Kecamatan Wonosari Kabupaten Gunung kidul Daerah Istimewa Yogyakarta menerangkan bahwa:";
$pdf->Cell(15,5,'',0,0,'C');
$pdf->MultiCell(170,5,$text);
$pdf->ln(3);
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Nama ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'GANDUNG SUWASNO',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Tempat, Tgl. Lahir ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Gunung Kidul, 18-06-1976',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Pekerjaan ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Perangkat Desa',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Alamat ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Gelung 001/013, Gari, Wonosari, Gunung Kidul',0,1,'L');
$pdf->ln(3);
$text="Nama tersebut di atas bermaksud mengajukan permohonan Akte Kelahiran umum/terlambat/dispensasi bagi anak yang bernama:";
$pdf->Cell(15,5,'',0,0,'C');
$pdf->MultiCell(170,5,$text);
$pdf->ln(3);
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Nama ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'LINTANG BANYU KANAYO',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Tempat, Tgl. Lahir ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Gunung Kidul, 06 Januari 2020',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Anak ke ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'2 (dua)',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Jenis Kelamin ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Perempuan',0,1,'L');
$pdf->ln(3);
$text="Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.";
$pdf->Cell(15,5,'',0,0,'C');
$pdf->MultiCell(170,5,$text);

$pdf->ln(10);
$pdf->Cell(110,5,'',0,0,'J');
$pdf->Cell(85,5,'Gari, 10 Februari 2020',0,1,'C');
$pdf->Cell(110,5,'',0,0,'J');
$pdf->Cell(85,5,'Kepala Desa,',0,1,'C');
$pdf->ln(10);

$pdf->AddPage();

$pdf->Output("berkas_permohonan_ktp.pdf","I");

?>