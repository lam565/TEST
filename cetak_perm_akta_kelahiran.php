<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 215-(10*2)=195mm

$pdf = new FPDF('P','mm',array(215,330));
$pdf->AddPage();

$pdf->Image('logo.jpg',20,10,20,23);
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
$pdf->SetFont('Times','B',12);
$pdf->Cell(195,5,"PEMERINTAH KABUPATEN GUNUNG KIDUL",0,1,"L");
$pdf->Cell(120,5,"DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL",0,0,"L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"Nomor Akta ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(40,5,"....................................",0,1,"L");
$pdf->SetFont('Times','',11);
$pdf->Cell(120,5,"Alamat: Jl. Ksatrian No. 36, Wonosari, Gunung Kidul, Kode Pos 55813",0,0,"L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"Tanggal ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(40,5,"....................................",0,1,"L");
$pdf->SetFont('Times','',11);
$pdf->Cell(120,5,"Telp: (0274) 391287, Fax: (0274) 391287",0,0,"L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"Nomor Urut ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(40,5,"....................................",0,1,"L");
$pdf->ln(3);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(120,5,"LAPORAN KELAHIRAN : UMUM",0,0,"R");
$pdf->SetFont('Times','',12);
$pdf->Cell(75,5,"  *) ",0,1,"L");
$pdf->ln(2);
//Data Ayah
$pdf->Cell(35,5,"Nama Ayah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(20,5,"Umur  ",0,0,"R");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,5,"0",1,0,"L");	
}
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->Cell(40,5,"",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(2);
$pdf->Cell(35,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(2);
$pdf->Cell(35,5,"Pekerjaan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(110,5,".......................................................................................................",0,1,"L");
$pdf->ln(2);
$pdf->Cell(35,5,"Alamat Rumah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(60,5,"Padukuhan : ....................................",0,0,"L");
$pdf->Cell(10,5," RT ",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5," RW ",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(35,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(50,5,"Desa: ....................................",0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ....................................",0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(2);

//Data Ibu
$pdf->Cell(35,5,"Nama Istri/Ibu",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(20,5,"Umur  ",0,0,"R");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,5,"0",1,0,"L");	
}
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->Cell(40,5,"",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(2);
$pdf->Cell(35,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(2);
$pdf->Cell(35,5,"Pekerjaan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(110,5,".......................................................................................................",0,1,"L");
$pdf->ln(2);
$pdf->Cell(35,5,"Alamat Rumah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(60,5,"Padukuhan : ....................................",0,0,"L");
$pdf->Cell(10,5," RT ",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5," RW ",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(35,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(50,5,"Desa: ....................................",0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ....................................",0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(2);
$pdf->Output("berkas_permohonan_ktp.pdf","I");

?>