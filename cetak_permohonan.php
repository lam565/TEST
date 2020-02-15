<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

$nik=$_POST['nik'];

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm',array(219,330));
$pdf->AddPage();

$query=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NIK='$nik' AND data_keluarga.NO_KK=biodata_wni.NO_KK");
$data=mysqli_fetch_array($query);
for ($ct=1;$ct<=2;$ct++){
	//set font to Times, bold, 12pt
	$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,6,' F-1.21 ',1,1,'C');
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(15 ,8,'',0,0,'C');
	$pdf->Cell(159 ,8,' FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA ',0,0,'C');
	$pdf->Cell(15 ,8,'',0,1,'C');
	$pdf->SetFont('Times','B',7);
	$pdf->Cell(15 ,3,'Perhatian:','LT',0,'C');
	$pdf->Cell(174 ,3,'','TR',1,'C');
	$pdf->SetFont('Times','',7);
	$pdf->Cell(189 ,3,'1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam','LR',1,'L');
	$pdf->Cell(189 ,3,'2. Untuk kolom pilihan, harap memberi tanda silang (x) pada kotak pilihan','LR',1,'L');
	$pdf->Cell(189 ,3,'3. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan','LBR',1,'L');
	$pdf->ln(3);
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'PEMERINTAH PROPINSI',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode propinsi
	strlen($data['NO_PROP']) <2 ? $noprop="0".$data['NO_PROP'] : $noprop=$data['NO_PROP'];
	$kprop=str_split($noprop);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kprop[$i],1,0,'C');	
	}	
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	//kalu sudah ada tabel propinsi bisa dipanggil dengan no prop
	$pdf->Cell(80 ,4,' Daerah Istimewa Yogyakarta',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'PEMERINTAH KABUPATEN/KOTA',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode kabupaten
	strlen($data['NO_KAB'])<2 ? $nokab="0".$data['NO_KAB'] : $nokab=$data['NO_KAB'];
	$kkab=str_split($nokab);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kprop[$i],1,0,'C');	
	}
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' Gunung Kidul',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'KECAMATAN',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode kecamatan
	strlen($data['NO_KEC'])<2 ? $nokec="0".$data['NO_KEC'] : $nokec=$data['NO_KEC'];
	$kkec=str_split($nokec);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kkec[$i],1,0,'C');	
	}
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' ',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');

	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'KELURAHAN/DESA',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode kecamatan
	strlen($data['NO_KEL'])<2 ? $nokel="0".$data['NO_KEL'] : $nokel=$data['NO_KEL'];
	$kkel=str_split($nokel);
	for ($i=0;$i<4;$i++){
		$pdf->Cell(5 ,4,$kkel[$i],1,0,'C');	
	}
	
	$pdf->Cell(5 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' ',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->ln(2);

	$pdf->SetFont('Times','BIU',8);
	$pdf->Cell(40 ,4,'PERMOHONAN KTP',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,'',1,0,'L');
	$pdf->Cell(20 ,4,'A. Baru',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'',1,0,'L');
	$pdf->Cell(30 ,4,'B. Perpanjangan',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'',1,0,'L');
	$pdf->Cell(30 ,4,'C. Penggantian',1,1,'L');
	$pdf->ln(3);

	$pdf->Cell(28 ,4,'1. Nama Lengkap',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	//Nama Lengkap
	$hurufke=0;
	$namalkp=str_split($data['NAMA_LGKP']);
	foreach ($namalkp as $huruf) {
		$hurufke++;
		$hurufke==31 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	if ($hurufke==31){

	} else {
		for ($ul=$hurufke;$ul<=31;$ul++){
			$ul==31 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
		}
		
	}
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'2. No. KK',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	//No_KK
	$hurufke=0;
	$nokk=str_split($data['NO_KK']);
	foreach ($nokk as $huruf) {
		$hurufke++;
		$hurufke==16 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	if ($hurufke==16){

	} else {
		for ($ul=$hurufke;$ul<=16;$ul++){
			$ul==16 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
		}

	}
	$pdf->ln(1);
	$pdf->Cell(28 ,4,'3. NIK',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	//NIK
	$hurufke=0;
	$dtnik=str_split($data['NIK']);
	foreach ($dtnik as $huruf) {
		$hurufke++;
		$hurufke==16 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	if ($hurufke==16){

	} else {
		for ($ul=$hurufke;$ul<=16;$ul++){
			$ul==16 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
		}

	}
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'4. Alamat',1,0,'L');
	//alamat 
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell(155 ,4,$data['ALAMAT'],1,1,'L');
	$pdf->ln(1);
	$pdf->Cell(28 ,4,'',0,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell(155 ,4,'',1,1,'L');
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'',0,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'RT:',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$RT=sprintf("%03d",$data['NO_RT']);
	$ar_RT=str_split($RT);
	foreach ($ar_RT as $huruf) {
		$hurufke++;
		$hurufke==3 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'RW:',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$RW=sprintf("%03d",$data['NO_RW']);
	$ar_RW=str_split($RW);
	foreach ($ar_RW as $huruf) {
		$hurufke++;
		$hurufke==3 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	$pdf->Cell(15 ,4,'',0,0,'L');
	$pdf->Cell(20 ,4,'Kode Pos:',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=5;$ul++){
		$ul==5 ? $pdf->Cell(5 ,4,'',1,1,'L') : $pdf->Cell(5 ,4,'',1,0,'L');;
	}
	$pdf->ln(3);

	$pdf->SetFont('Times','',6);
	$pdf->Cell(20,3,'Pas Photo (2x3)',1,0,'C');
	$pdf->Cell(20,3,'Cap Jempol',1,0,'C');
	$pdf->Cell(55,3,'Specimen Tanda Tangan',1,0,'C');
	$pdf->Cell(30,3,'',0,0,'C');
	$pdf->Cell(15,3,'...........................,',0,0,'C');
	$pdf->Cell(40,3,'  ..........................................................................',0,1,'C');
	$pdf->Cell(20,5,'','LR',0,'C');
	$pdf->Cell(20,5,'','LR',0,'C');
	$pdf->Cell(55,5,'','LR',0,'C');
	$pdf->Cell(30,5,'',0,0,'C');
	$pdf->Cell(55,5,'Pemohon,',0,1,'C');
	$pdf->Cell(20,3,'','LR',0,'C');
	$pdf->Cell(15,3,'','L',0,'C');
	$pdf->Cell(10,3,'Atau-->',0,0,'C');
	$pdf->Cell(50,3,'','R',1,'C');
	$pdf->Cell(5,5,'','L',0,'C');
	$pdf->Cell(10,5,'Bidang',0,0,'C');
	$pdf->Cell(5,5,'','R',0,'C');
	$pdf->Cell(20,5,'','LR',0,'C');
	$pdf->Cell(55,5,'','LR',1,'C');
	$pdf->Cell(5,4,'','L',0,'C');
	$pdf->Cell(10,4,'Lem',0,0,'C');
	$pdf->Cell(5,4,'','R',0,'C');
	$pdf->Cell(20,4,'','LR',0,'C');
	$pdf->Cell(55,4,'','LRB',0,'C');
	$pdf->Cell(30,4,'',0,0,'C');
	$pdf->Cell(55,4,'(...........................................................)',0,1,'C');
	$pdf->Cell(20,8,'','LRB',0,'C');
	$pdf->Cell(20,8,'','LRB',0,'C');
	$pdf->Cell(55,8,'Ket: Cap Jempol/Tanda Tangan','L',1,'L');
	$pdf->ln(1);

	$pdf->SetFont('Times','',8);
	$pdf->Cell(45,4,'',0,0,'C');
	$pdf->Cell(140,4,'Mengetahui,',0,1,'C');
	$pdf->Cell(45,6,'',0,0,'C');
	$pdf->Cell(55,6,'Camat...............................................................',0,0,'L');
	$pdf->Cell(30,6,'',0,0,'C');
	$pdf->Cell(55,6,'Kepala Desa/Lurah...........................................',0,1,'L');
	$pdf->ln(8);
	$pdf->Cell(45,6,'',0,0,'C');
	$pdf->Cell(55,6,'(...................................................................)',0,0,'L');
	$pdf->Cell(30,6,'',0,0,'C');
	$pdf->Cell(55,6,'(...................................................................)',0,1,'L');
	$pdf->Cell(45,6,'',0,0,'C');
	$pdf->Cell(55,6,'NIP. ',0,0,'L');
	$pdf->Cell(30,6,'',0,0,'C');
	$pdf->Cell(55,6,'NIP.',0,1,'L');
	$pdf->ln(2);
	if ($ct<2){
		$pdf->SetFont('Times','',6);
		$pdf->Cell(10,3,'gunting disini',0,0,'L');
		$pdf->SetFont('Times','',9);
		$pdf->Cell(179,3,' ----------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'R');
		$pdf->ln(2);	
	}
}

//next page atau page 2

$pdf->AddPage('L');

$pdf->Image('logo.jpg',100,10,15,15);
$pdf->SetFont('Times','B',12);
$pdf->ln(2);
$pdf->Cell(310,6,'PEMERINTAH KABUPATEN GUNUNG KIDUL',0,1,'C');
$pdf->Cell(310,6,'KECAMATAN WONOSARI',0,1,'C');
$pdf->ln(4);
$pdf->SetFont('Times','B',8);
$pdf->Cell(160,4,'DATA KEPALA KELUARGA',0,0,'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(45,4,'Kode-Nama Propinsi',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'34',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'Daerah Istimewa Yogyakarta',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Nama Kepala Keluarga',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(85,4,'WIDODO',1,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Kabupaten',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'03',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'GUNUNG KIDUL',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Alamat',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(85,4,'NGELOREJO',1,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Kecamatan',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'01',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'WONOSARI',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Kode Pos',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(10,4,'55851',1,0,'L');
$pdf->Cell(7,4,'RT',0,0,'L');
$pdf->Cell(8,4,'004',1,0,'L');
$pdf->Cell(7,4,'RW',0,0,'L');
$pdf->Cell(8,4,'018',1,0,'L');
$pdf->Cell(33,4,'Jumlah Anggota Keluarga',0,0,'L');
$pdf->Cell(5,4,'5',1,0,'L');
$pdf->Cell(7,4,'Orang',0,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Desa/Kelurahan',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'2004',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'GARI',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Telepon',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(85,4,'',1,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Dusun/Dukuh/Kampung',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(70,4,'NGELOREJO',1,1,'L');
$pdf->ln(2);

$pdf->SetFont('Times','B',8);
$pdf->Cell(155,4,'DATA KELUARGA',0,0,'L');
$pdf->Cell(155,4,'No. KK = 3403010911070911',0,1,'R');

//Header
$pdf->SetFont('Times','b',6);
$pdf->Cell(25,4,'NO',1,0,'C');
$pdf->Cell(50,4,'NAMA LENGKAP',1,0,'C');
$pdf->Cell(50,4,'NIK',1,0,'C');
$pdf->Cell(70,4,'ALAMAT SEBELUMNYA',1,0,'C');
$pdf->Cell(50,4,'NOMOR PASPOR',1,0,'C');
$pdf->Cell(65,4,'TANGGAL TERAKHIR PASPOR',1,1,'C');
//ISI TABEL
$pdf->SetFont('Times','',6);
for ($i=1; $i <=10 ; $i++) { 
	$pdf->Cell(25,3,$i,1,0,'C');
	$pdf->Cell(50,3,'',1,0,'C');
	$pdf->Cell(50,3,'',1,0,'C');
	$pdf->Cell(70,3,'',1,0,'C');
	$pdf->Cell(50,3,'',1,0,'C');
	$pdf->Cell(65,3,'',1,1,'C');
}
$pdf->ln(1);
$pdf->SetFont('Times','B',6);
$pdf->Cell(5,3,'','LTR',0,'C'); //no
$pdf->Cell(20,3,'','LTR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LTR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'','LTR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LTR',0,'C'); // umur
$pdf->Cell(15,3,'AKTA','LTR',0,'C'); // akta lahir
$pdf->Cell(25,3,'','LTR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'','LTR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LTR',0,'C'); // Agama
$pdf->Cell(18,3,'','LTR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'','LTR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'','LTR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LTR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'','LTR',0,'C'); // akta cerai
$pdf->Cell(25,3,'','LTR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'','LTR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'','LR',0,'C'); //no
$pdf->Cell(20,3,'','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'TANGGAL/BULAN','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LR',0,'C'); // umur
$pdf->Cell(15,3,'LAHIR/','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'NOMOR AKTA','LR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LR',0,'C'); // Agama
$pdf->Cell(18,3,'','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'AKTA','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'NOMOR AKTA','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'NOMOR/AKTA','LR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'','LR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'NO','LR',0,'C'); //no
$pdf->Cell(20,3,'JENIS','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'TEMPAT LAHIR','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'/TAHUN','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'UMUR','LR',0,'C'); // umur
$pdf->Cell(15,3,'SURAT','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'KELAHIRAN/','LR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'GOL','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'AGAMA','LR',0,'C'); // Agama
$pdf->Cell(18,3,'STATUS','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'PERKAWINAN','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'PERKAWINAN/','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'TANGGAL','LR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'AKTA CERAI/SURAT','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'PERCERAIAN','LR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'TANGGAL','LR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'','LR',0,'C'); //no
$pdf->Cell(20,3,'KELAMIN','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'LAHIR','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LR',0,'C'); // umur
$pdf->Cell(15,3,'LAHIR','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'SURAT KELAHIRAN','LR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'DARAH','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LR',0,'C'); // Agama
$pdf->Cell(18,3,'PERKAWINAN','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'BUKU NIKAH*)','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'BUKU NIKAH','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'PERKAWINAN','LR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'CERAI','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'SURAT CERAI*)','LR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'PERCERAIAN*)','LR',1,'C'); // tgl cerai
$pdf->Cell(5,3,'','LBR',0,'C'); //no
$pdf->Cell(20,3,'','LBR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LBR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'','LBR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LBR',0,'C'); // umur
$pdf->Cell(15,3,'','LBR',0,'C'); // akta lahir
$pdf->Cell(25,3,'','LBR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'','LBR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LBR',0,'C'); // Agama
$pdf->Cell(18,3,'','LBR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'','LBR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'','LBR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LBR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'','LBR',0,'C'); // akta cerai
$pdf->Cell(25,3,'','LBR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'','LBR',1,'C'); // tgl cerai
//DATA
$pdf->SetFont('Times','',6);
for ($i=1;$i<=10;$i++){
	$pdf->Cell(5,3,$i,1,0,'C'); //no
	$pdf->Cell(20,3,'',1,0,'C'); //jenis kelamin
	$pdf->Cell(25,3,'',1,0,'C'); // tmp lahir
	$pdf->Cell(25,3,'',1,0,'C'); // tgl lahir
	$pdf->Cell(10,3,'',1,0,'C'); // umur
	$pdf->Cell(15,3,'',1,0,'C'); // akta lahir
	$pdf->Cell(25,3,'',1,0,'C'); //no akta lahir
	$pdf->Cell(10,3,'',1,0,'C'); //gol darah
	$pdf->Cell(15,3,'',1,0,'C'); // Agama
	$pdf->Cell(18,3,'',1,0,'C'); // status perkawinan
	$pdf->Cell(25,3,'',1,0,'C'); // akta perkawinan
	$pdf->Cell(25,3,'',1,0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,'',1,0,'C'); // tgl kawin
	$pdf->Cell(30,3,'',1,0,'C'); // akta cerai
	$pdf->Cell(25,3,'',1,0,'C'); // no akta cerai
	$pdf->Cell(17,3,'',1,1,'C'); // tgl cerai
}
$pdf->ln(1);

//
$pdf->SetFont('Times','B',6);
$pdf->Cell(10,3,'','LTR',0,'C'); // no
$pdf->Cell(30,3,'STATUS HUB','LTR',0,'C'); // status hub
$pdf->Cell(30,3,'KELAINAN','LTR',0,'C'); // kelainan
$pdf->Cell(30,3,'PENYANDANG','LTR',0,'C'); // penyandang cacat
$pdf->Cell(20,3,'PENDIDIKAN','LTR',0,'C'); // pendidikan
$pdf->Cell(40,3,'','LTR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'','LTR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'','LTR',1,'C'); // Nama Ayah
$pdf->Cell(10,3,'NO','LBR',0,'C'); // no
$pdf->Cell(30,3,'DALAM KELUARGA','LBR',0,'C'); // status hub
$pdf->Cell(30,3,'FISIK & MENTAL','LBR',0,'C'); // kelainan
$pdf->Cell(30,3,'CACAT','LBR',0,'C'); // penyandang cacat
$pdf->Cell(20,3,'TERAKHIR','LBR',0,'C'); // pendidikan
$pdf->Cell(40,3,'PEKERJAAN','LBR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'NIK IBU','LBR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'NAMA LENGKAP IBU','LBR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'NIK AYAH','LBR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'NAMA LENKAP AYAH','LBR',1,'C'); // Nama Ayah
//data TABEL
$pdf->SetFont('Times','',8);
for ($i=1;$i<=10;$i++){
	$pdf->Cell(10,3,$i,1,0,'C'); // no
	$pdf->Cell(30,3,'',1,0,'C'); // status hub
	$pdf->Cell(30,3,'',1,0,'C'); // kelainan
	$pdf->Cell(30,3,'',1,0,'C'); // penyandang cacat
	$pdf->Cell(20,3,'',1,0,'C'); // pendidikan
	$pdf->Cell(40,3,'',1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,'',1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,'',1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,'',1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,'',1,1,'C'); // Nama Ayah
}
$pdf->ln(2);
$pdf->Cell(206,4,'',0,0,'C');
$pdf->Cell(104,4,'Gari, 10 Februari 2020',0,1,'C');
$pdf->Cell(103,4,'Kepala Desa Gari',0,0,'C');
$pdf->Cell(103,4,'Kecamatan Wonosari',0,0,'C');
$pdf->Cell(103,4,'Kepala Keluarga',0,1,'C');
$pdf->ln(9);
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(104,4,'Nama Lengkap : ............................................................',0,1,'C');

//Halaman 3
$pdf->AddPage('P');

$pdf->SetFont('Times','BU',14);
$pdf->ln(5);
$pdf->Cell(180,5,'SURAT PERNYATAAN BELUM PERNAH REKAM E-KTP',0,1,'C');
$pdf->ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(179,5,'Yang bertanda tangan di bawah ini saya: ',0,1,'J');
$pdf->ln(10);

$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'Nama',0,0,'J');
$pdf->Cell(10,5,': ',0,0,'J');
$pdf->Cell(119,5,'ARIS SUSANTO',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'Bin/Binti',0,0,'J');
$pdf->Cell(10,5,': ',0,0,'J');
$pdf->Cell(119,5,'GIYONO',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'Tempat, Tanggal Lahir',0,0,'J');
$pdf->Cell(10,5,': ',0,0,'J');
$pdf->Cell(119,5,'GUNUNG KIDUL, 13 AGUSTUS 1981',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'Agama',0,0,'J');
$pdf->Cell(10,5,': ',0,0,'J');
$pdf->Cell(119,5,'ISLAM',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'Pekerjaan',0,0,'J');
$pdf->Cell(10,5,': ',0,0,'J');
$pdf->Cell(119,5,'WIRASWASTA',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'Alamat',0,0,'J');
$pdf->Cell(10,5,': ',0,0,'J');
$pdf->Cell(119,5,'RT 01 / RW 03 KALIDADAP Desa Gari, ',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(50,5,'',0,0,'J');
$pdf->Cell(10,5,' ',0,0,'J');
$pdf->Cell(119,5,'Kecamatan Wonosari, Kabupaten Gunung Kidul',0,1,'J');
$pdf->ln(8);

$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(179,5,'Dengan ini saya menyatakan bahwa saya belum pernah melakukan perkaman E-Ktp di daerah manapun.',0,1,'J');
$pdf->Cell(10,5,'',0,0,'J');
$pdf->Cell(179,5,'Apabila di kemudian hari terbukti pernyataan saya ini tidak benar, saya sanggup dituntut di Pengadilan.',0,1,'J');
$pdf->ln(10);
$pdf->Cell(120,5,'',0,0,'J');
$pdf->Cell(69,5,'Gari, 10 Februari 2020',0,1,'C');
$pdf->Cell(120,5,'',0,0,'J');
$pdf->Cell(69,5,'Saya yang menyatakan,',0,1,'C');
$pdf->ln(10);
$pdf->Cell(120,5,'',0,0,'J');
$pdf->Cell(69,5,'Materai,',0,1,'C');
$pdf->ln(10);
$pdf->Cell(120,5,'',0,0,'J');
$pdf->Cell(69,5,'ARIS SUSANTO,',0,1,'C');

$pdf->Output("berkas_permohonan_ktp.pdf","I");

?>