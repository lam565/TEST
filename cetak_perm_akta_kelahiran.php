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
$pdf->ln(2);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(120,5,"LAPORAN KELAHIRAN : UMUM",0,0,"R");
$pdf->SetFont('Times','',12);
$pdf->Cell(75,5,"  *) ",0,1,"L");
$pdf->ln(2);
//Data Ayah
$pdf->Cell(40,5,"Nama Ayah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(15,5,"Umur  ",0,0,"R");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,5,"0",1,0,"L");	
}
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Pekerjaan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(110,5,".......................................................................................................",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Alamat Rumah",0,0,"L");
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
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(50,5,"Desa: ....................................",0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ....................................",0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);

//Data Ibu
$pdf->Cell(40,5,"Nama Istri/Ibu",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(15,5,"Umur  ",0,0,"R");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,5,"0",1,0,"L");	
}
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Pekerjaan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(110,5,".......................................................................................................",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Alamat Rumah",0,0,"L");
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
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(50,5,"Desa: ....................................",0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ....................................",0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(55,5,"Kawin syah di KUA/Gereja/Pure",0,0,"L");
$pdf->Cell(15,5,"    *) ",0,0,"L");
$pdf->Cell(20,5,"Tanggal: ",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,0,"C");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"Anak yang dilahirkan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(30,5,"Laki - laki  /  Perempuan",0,1,"L");
$pdf->ln(1);
//Data Anak
$pdf->Cell(40,5,"Nama Anak",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=23;$ul++){
	$ul==23 ? $pdf->Cell(6,5,"",1,1,"L") : $pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5," ",0,0,"L");
for ($ul=1;$ul<=23;$ul++){
	$ul==23 ? $pdf->Cell(6,5,"",1,1,"L") : $pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(2);
$pdf->Cell(40,5,"Tempat lahir",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,"............................................",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Hari lahir",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,"............................................",0,0,"L");
$pdf->Cell(8,5,"",0,0,"C");
$pdf->Cell(15,5,"Tanggal ");
$pdf->Cell(5,5," : ",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,0,"C");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,0,"C");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"Jam",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,"............................................",0,0,"L");
$pdf->Cell(8,5,"",0,0,"C");
$pdf->Cell(15,5,"Anak Ke ");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(45,5,".......................... (......................)",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Yang melaporkan",0,0,"L");
$pdf->Cell(5,5," : ",0,1,"C");
$pdf->Cell(40,5,"Nama ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(15,5,"Umur  ",0,0,"R");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,5,"0",1,0,"L");	
}
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Nomer HP",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,"............................................",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"Pekerjaan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,"............................................",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Alamat Rumah",0,0,"L");
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
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(50,5,"Desa: ....................................",0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ....................................",0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(5);
$pdf->Cell(130,5,"",0,0,"C");
$pdf->Cell(65,5,"Gunungkidul, 16 Februari 2020",0,1,"C");
$pdf->ln(13);
$pdf->Cell(130,5,"",0,0,"C");
$pdf->Cell(65,5,"(......................................)",0,1,"C");

$pdf->ln(2);
$pdf->SetFont("Times","BU",12);
$pdf->Cell(95,5,"Saksi I",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(95,5,"Saksi II",0,1,"L");
$pdf->SetFont("Times","",12);
$pdf->Cell(25,5,"Nama",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Nama",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,1,"L");
$pdf->Cell(25,5,"NIK",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"NIK",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,1,"L");
$pdf->Cell(25,5,"Pekerjaan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Pekerjaan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,1,"L");
$pdf->Cell(25,5,"Alamat",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Alamat",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,1,"L");
$pdf->Cell(25,5,"Tanda Tangan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"",0,0,"C");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Tanda Tangan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"",0,1,"C");
$pdf->ln(3);
$pdf->SetFont("Times","U",12);
$pdf->Cell(25,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,1,"L");
$pdf->ln(3);
$pdf->SetFont("Times","BU",12);
$pdf->Cell(150,5,"PERSYARATAN",0,1,"L");
$pdf->SetFont("Times","",10);
$pdf->Cell(195,4,"1. Fotocopy Surat Kelahiran dari Bidan/Dokter/Penolong kelahiran",0,1,"L");
$pdf->Cell(195,4,"2. Formulir Surat Keterangan Kelahiran dari Desa (F2.01)",0,1,"L");
$pdf->Cell(195,4,"3. Fotocopy kutipan Akta Nikah/Akta Perkawinan orang tua",0,1,"L");
$pdf->Cell(195,4,"4. Fotocopy Kartu Keluarga",0,1,"L");
$pdf->Cell(195,4,"5. Fotocopy KTP orang tua",0,1,"L");
$pdf->Cell(195,4,"6. Fotocopy Akta Kematian / Surat Kematina bagi orang tua yang sudah meninggal",0,1,"L");
$pdf->Cell(195,4,"7. Fotocopy KTP 2 orang Saksi",0,1,"L");
$pdf->Cell(195,4,"8. Surat Kuasa (Bila dikuasakan) bermaterai Rp. 6.000,- diketahui Kepala Desa dan dilampiri fotocopy KTP yang diberi kuasa",0,1,"L");
$pdf->Cell(195,4,"9. Semua persyaratan dilegalisir oleh instansi yang berwenang",0,1,"L");

//Lembar 3
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(164 ,6,'',0,0,'C');
$pdf->Cell(25 ,6,' F2.01 ',1,1,'C');
$pdf->SetFont("Times","",11);
$pdf->Cell(50,4,"Pemerintah Desa/Kelurahan",0,0,"L");
$pdf->Cell(5,4," : ",0,0,"C");
$pdf->Cell(125,4,"  ",0,1,"L");
$pdf->Cell(50,4,"Kecamatan",0,0,"L");
$pdf->Cell(5,4," : ",0,0,"C");
$pdf->Cell(125,4,"  ",0,1,"L");
$pdf->Cell(50,4,"Kabupaten/Kota",0,0,"L");
$pdf->Cell(5,4," : ",0,0,"C");
$pdf->Cell(125,4,"  ",0,1,"L");
$pdf->ln(2);
$pdf->Cell(50,4,"Kode Wilayah",0,0,"L");
$pdf->Cell(5,4," : ",0,0,"C");
for ($ul=1;$ul<=10;$ul++){
	$ul==10 ? $pdf->Cell(5,4,"  ",1,1,"L") : $pdf->Cell(5,4,"  ",1,0,"L");
}
$pdf->ln(3);
$pdf->SetFont("Times","B",12);
$pdf->Cell(195,5,"SURAT KETERANGAN KELAHIRAN",0,1,"C");
$pdf->SetFont("Times","",11);
$pdf->Cell(195,4,"No.: ..............................",0,1,"C");
$pdf->ln(1);
$pdf->Cell(5,4,"",0,0,"C");
$pdf->Cell(45,4,"Nama Kepala Keluarga",0,0,"L");
$pdf->Cell(5,4," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$ul==25 ? $pdf->Cell(5,4,"",1,1,"C") : $pdf->Cell(5,4,"",1,0,"C");
}
$pdf->Cell(5,4,"",0,0,"C");
$pdf->Cell(45,4,"Nomor Kartu Keluarga",0,0,"L");
$pdf->Cell(5,4," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$ul==25 ? $pdf->Cell(5,4,"",1,1,"C") : $pdf->Cell(5,4,"",1,0,"C");
}
$pdf->ln(2);
$fs=3.5;
$pdf->SetFont("Times","B",11);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(180,4,"BAYI/ANAK","TR",1,"L");
$pdf->SetFont("Times","",10);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"1. Nama",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"2. Jenis Kelamin",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(40,$fs,"1. Laki-laki",0,0,"L");
$pdf->Cell(40,$fs,"2. Perempuan",0,0,"L");
$pdf->Cell(40,$fs,"",0,0,"C");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"3. Tempat dilahirkan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(20,$fs,"1. RS/RB",0,0,"L");
$pdf->Cell(25,$fs,"2. Puskesmas",0,0,"L");
$pdf->Cell(25,$fs,"3. Polindes",0,0,"L");
$pdf->Cell(20,$fs,"4. Rumah",0,0,"L");
$pdf->Cell(25,$fs,"5. Lainnya",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"4. Tempat Kelahiran",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=15;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(55,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"5. Hari dan tanggal lahir",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(10,$fs,"Hari",0,0,"L");
for ($ul=1;$ul<=6;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(10,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(10,$fs,"Bln",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(10,$fs,"Thn",0,0,"L");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"6. Pukul",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(110,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"7. Jenis Kelahiran",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(20,$fs,"1. Tunggal",0,0,"L");
$pdf->Cell(25,$fs,"2. Kembar",0,0,"L");
$pdf->Cell(25,$fs,"3. Kembar 3",0,0,"L");
$pdf->Cell(25,$fs,"4. Kembar 4",0,0,"L");
$pdf->Cell(25,$fs,"5. Lainnya....",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"8. Kelahiran ke",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"1 , 2 , 3 , 4 , ..........",0,0,"L");
$pdf->Cell(95,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"9. Penolong Kelahiran",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(20,$fs,"1. Dokter",0,0,"L");
$pdf->Cell(30,$fs,"2. Bidan/Perawat",0,0,"L");
$pdf->Cell(25,$fs,"3. Dukun",0,0,"L");
$pdf->Cell(25,$fs,"4. Lainnya ....",0,0,"L");
$pdf->Cell(20,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"10. Berat Bayi",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(20,$fs,"",1,0,"C");
$pdf->Cell(105,$fs," Kg",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"11. Panjang Bayi",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(20,$fs,"",1,0,"C");
$pdf->Cell(105,$fs," cm",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");
$pdf->Cell(185,2,"","LBR",1,"C");

$pdf->SetFont("Times","B",11);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(180,4,"IBU","TR",1,"L");
$pdf->SetFont("Times","",10);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"1. NIK",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"2. Nama Lengkap",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"3. Tanggal Lahir/Umur",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Bln",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Thn",0,0,"L");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(15,$fs,"Umur",0,0,"L");
for ($ul=1;$ul<=3;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(10,$fs,"",0,0,"C");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"4. Pekerjaan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(30,$fs,"....................................",0,0,"L");
$pdf->Cell(95,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"5. Alamat",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(125,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(35,$fs,"a. Desa/Kelurahan",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(35,$fs,"c. Kabupaten/Kota",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(35,$fs,"b. Kecamatan",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(35,$fs,"d. Propinsi",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"6. Kewarganegaraan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(25,$fs,"1. WNI",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(25,$fs,"2. WNA",0,0,"L");
$pdf->Cell(65,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"7. Kebangsaan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(50,$fs,"",1,0,"L");
$pdf->Cell(75,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"8. Tgl pencatatan perkawinan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Bln",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Thn",0,0,"L");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(50,$fs,"","R",1,"C");
$pdf->Cell(185,2,"","LBR",1,"C");

$pdf->SetFont("Times","B",11);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(180,4,"AYAH","TR",1,"L");
$pdf->SetFont("Times","",10);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"1. NIK",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"2. Nama Lengkap",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
for ($ul=1;$ul<=25;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"3. Tanggal Lahir/Umur",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Bln",0,0,"L");
for ($ul=1;$ul<=2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(10,$fs,"Thn",0,0,"L");
for ($ul=1;$ul<=4;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(15,$fs,"Umur",0,0,"L");
for ($ul=1;$ul<=3;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(10,$fs,"",0,0,"C");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"4. Pekerjaan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(30,$fs,"....................................",0,0,"L");
$pdf->Cell(95,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"5. Alamat",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(125,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(35,$fs,"a. Desa/Kelurahan",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(35,$fs,"c. Kabupaten/Kota",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(35,$fs,"b. Kecamatan",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(35,$fs,"d. Propinsi",0,0,"L");
$pdf->Cell(25,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"6. Kewarganegaraan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(25,$fs,"1. WNI",0,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(25,$fs,"2. WNA",0,0,"L");
$pdf->Cell(65,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");

$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(45,$fs,"7. Kebangsaan",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"C");
$pdf->Cell(50,$fs,"",1,0,"L");
$pdf->Cell(75,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1,"C");
$pdf->Cell(185,2,"","LBR",1,"C");

$ar_dt=array("PELAPOR","SAKSI I","SAKSI II");
for ($i=0;$i<3;$i++){
	$pdf->SetFont("Times","B",11);
	$pdf->Cell(5,$fs,"","LT",0,"C");
	$pdf->Cell(180,4,$ar_dt[$i],"TR",1,"L");
	$pdf->SetFont("Times","",10);
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"1. NIK",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	for ($ul=1;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"2. Nama Lengkap",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	for ($ul=1;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"3. Umur",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	for ($ul=1;$ul<=3;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(30,$fs,"Tahun",0,0,"L");
	$pdf->Cell(80,$fs,"",0,0,"C");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"4. Jenis Kelamin",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(15,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"1. Laki-laki",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"2. Perempuan",0,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"5. Pekerjaan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(30,$fs,"....................................",0,0,"L");
	$pdf->Cell(95,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"5. Alamat",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(125,$fs,"",1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(35,$fs,"a. Desa/Kelurahan",0,0,"L");
	$pdf->Cell(25,$fs,"",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"c. Kabupaten/Kota",0,0,"L");
	$pdf->Cell(25,$fs,"",1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(35,$fs,"b. Kecamatan",0,0,"L");
	$pdf->Cell(25,$fs,"",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"d. Propinsi",0,0,"L");
	$pdf->Cell(25,$fs,"",1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");
	$pdf->Cell(185,2,"","LBR",1,"C");	
}
$pdf->ln(5);
$pdf->SetFont("Times","",11);
$fs=4;
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(45,$fs,"mengetahui,",0,0,"C");
$pdf->Cell(80,$fs,"",0,0,"C");
$pdf->Cell(50,$fs,"Gunungkidul, 18 Februari 2020",0,0,"C");
$pdf->Cell(5,$fs,"",0,1,"C");

$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(45,$fs,"Kepala Desa/Lurah",0,0,"C");
$pdf->Cell(80,$fs,"",0,0,"C");
$pdf->Cell(50,$fs,"Pelapor",0,0,"C");
$pdf->Cell(5,$fs,"",0,1,"C");

$pdf->ln(10);
$pdf->Cell(5,$fs,"",0,0,"C");
$pdf->Cell(45,$fs,"(........................)",0,0,"C");
$pdf->Cell(80,$fs,"",0,0,"C");
$pdf->Cell(50,$fs,"(........................)",0,0,"C");
$pdf->Cell(5,$fs,"",0,1,"C");


$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(164 ,6,'',0,0,'C');
$pdf->Cell(25 ,6,' F-1.16 ',1,1,'C');
$pdf->ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(195,5,"FORMULIR PERMOHONAN PERUBAHAN KARTU KELUARGA (KK) WARGA NEGARA INDONESIA",0,1,"C");
$pdf->ln(3);
$pdf->SetFont("Times","",10);
$fs=4;
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);
$pdf->SetFont("Times","B",10);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(185,$fs,"Perhatian:",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->SetFont("Times","",10);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(185,$fs,"1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(185,$fs,"2. Setelah formulir diisi dan ditandatangani, harap diserahkan kembali ke Kantor Desa/Kelurahan ",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);

$pdf->SetFont("Times","B",10);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"PEMERINTAH PROPINSI",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"PEMERINTAH KABUPATEN/KOTA",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"KECAMATAN",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"KELURAHAN/DESA",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
for ($ul=0;$ul<4;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);

$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);

$pdf->SetFont("Times","",10);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Nama Lengkap Pemohon",1,0,"L");
$pdf->Cell(2,$fs,"");
for ($ul=0;$ul<30;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"NIK Pemohon",1,0,"L");
$pdf->Cell(2,$fs,"");
for ($ul=0;$ul<16;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(70,$fs,"",0);
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Nama Kepala Pemohon",1,0,"L");
$pdf->Cell(2,$fs,"");
for ($ul=0;$ul<30;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"No. KK",1,0,"L");
$pdf->Cell(2,$fs,"");
for ($ul=0;$ul<16;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(70,$fs,"",0);
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Alamat",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(100,$fs,"",1,0,"L");
$pdf->Cell(10,$fs,"RT",0,0,"C");
for ($ul=0;$ul<3;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(10,$fs,"RW",0,0,"C");
for ($ul=0;$ul<3;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"a. Desa/Kelurahan",0,0,"L");
$pdf->Cell(50,$fs,"",1,0,"C");
$pdf->Cell(15,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"b. Kecamatan",0,0,"L");
$pdf->Cell(50,$fs,"",1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"c. Kabupaten/Kota",0,0,"L");
$pdf->Cell(50,$fs,"",1,0,"C");
$pdf->Cell(15,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"d. Propinsi",0,0,"L");
$pdf->Cell(50,$fs,"",1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"Kode Pos",0,0,"L");
for ($ul=0;$ul<5;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(40,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"Telepon",0,0,"L");
$pdf->Cell(50,$fs,"",1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Alasan Permohonan",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->SetFont("Times","",7);
$pdf->Cell(147,2,"1. Karena penambahan anggota keluarga (Kelahiran, Kedatangan)     3. Lainnya","R",1,"L");
$pdf->Cell(48,2,"");
$pdf->Cell(147,2,"2. Karena pengurangan anggota (Kematian, Kepindahan)","R",1,"L");
$pdf->Cell(195,1,"","LR",1);

$pdf->SetFont("Times","",10);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Jumlah Anggota Keluarga",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(142,$fs,"Orang","R",1,"L");

$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);

$pdf->ln(3);
$pdf->SetFont("Times","B",11);

$pdf->Cell(3,$fs,"");
$pdf->Cell(192,$fs,"DAFTAR ANGGOTA KELUARGA PEMOHON (hanya diisi anggota keluarga saja)",0,1);
$pdf->ln(3);

$pdf->Cell(10,$fs,"NO",1,0,"C");
$pdf->Cell(5,$fs,"");
$pdf->Cell(80,$fs,"NIK",1,0,"C");
$pdf->Cell(5,$fs,"");
$pdf->Cell(95,$fs,"NAMA LENGKAP",1,1,"C");
$pdf->ln(1);
for ($li=0;$li<8;$li++){
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,"",1);
	}
	$pdf->Cell(5,$fs,"");
	for ($ul=0;$ul<16;$ul++){
		$pdf->Cell(5,$fs,"",1);
	}
	$pdf->Cell(5,$fs,"");
	$pdf->Cell(95,$fs,"",1,1);
	$pdf->ln(1);	
}
$pdf->SetFont("Times","",9);
$pdf->ln(5);
$pdf->Cell(55,$fs,"Kepala Dinas Kependudukan dan",0,0,"C");
$pdf->Cell(45,$fs,"mengetahui,",0,0,"C");
$pdf->Cell(50,$fs,"",0,0,"C");
$pdf->Cell(45,$fs,"..........., ......................2020",0,1,"C");
$pdf->Cell(55,$fs,"Pencatatan Sipil Kabupaten Gunungkidul",0,0,"C");
$pdf->Cell(45,$fs,"Camat ...........................",0,0,"C");
$pdf->Cell(50,$fs,"Kepala Dusun/Lurah...............",0,0,"C");
$pdf->Cell(45,$fs,"Pemohon",0,1,"C");
$pdf->ln(13);
$pdf->SetFont("Times","BU",9);
$pdf->Cell(55,$fs,".......................................................",0,0,"C");
$pdf->Cell(45,$fs,"..................................................",0,0,"C");
$pdf->Cell(50,$fs,"..............................................",0,0,"C");
$pdf->Cell(45,$fs,"..............................................",0,1,"C");
$pdf->SetFont("Times","B",9);
$pdf->Cell(55,$fs,"      NIP :",0,0,"L");
$pdf->Cell(45,$fs,"   NIP :",0,0,"L");
$pdf->Cell(55,$fs,"        NIP :",0,0,"L");
$pdf->Cell(45,$fs,"NIP :",0,1,"L");
$pdf->SetFont("Times","",9);
$pdf->ln(5);
$pdf->Cell(120,$fs,"");
$pdf->Cell(75,$fs,"Tanggal Pemasukkan Data",0,1,"L");
$pdf->Cell(120,$fs,"");
$pdf->Cell(10,$fs,"Tgl",0,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(10,$fs,"Bln",0,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(10,$fs,"Thn",0,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,1,"L");
$pdf->ln(1);
$pdf->Cell(120,$fs,"");
$pdf->Cell(20,$fs,"Paraf",0,0,"L");
$pdf->Cell(10,$fs,"",0,0,"L");
$pdf->Cell(30,$fs,"",1,1,"L");

$pdf->Output("berkas_permohonan_ktp.pdf","I");

?>