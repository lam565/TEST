<?php
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="tes";

$connect=mysqli_connect ($dbHost, $dbUser, $dbPass, $dbName);
if (!$connect) die("koneksi gagal : ". mysqli_connect_error());

$nama_file=basename($_FILES["data_awal"]["name"]);
$lokasi_upload="data_dikonversi/";
$simpan=$lokasi_upload.$nama_file;
unlink($simpan);
$upload=move_uploaded_file($_FILES["data_awal"]["tmp_name"], $simpan);
$tb=$_GET['tb'];

if ($upload) {
	switch ($tb) {
		case 'dk':
		$buka = fopen($simpan, "rb");
		//kosongkan tabel
		mysqli_query($connect,"TRUNCATE data_keluarga");	
		while (!feof($buka)) {
			$ambilbaris=fgets($buka);
			$pecahkan=explode(";", $ambilbaris);
			if (str_replace('"', "", $pecahkan[15])==""){
				$ntglinsrt=$pecahkan[15];
			} else {
				$ptglnjaminsrt=explode(" ", str_replace('"', "", $pecahkan[15]));
				$pecahtglinsrt=explode("/", $ptglnjaminsrt[0]);
				isset($ptglnjaminsrt[1]) ? $jam=$ptglnjaminsrt[1]:$jam="";
				$ntglinsrt=$pecahtglinsrt[2]."-".$pecahtglinsrt[1]."-".$pecahtglinsrt[0]." ".$jam;
			}
			if (str_replace('"', "", $pecahkan[16])==""){
				$ntglupdt=$pecahkan[16];
			} else {
				$ptglnjamupdt=explode(" ", str_replace('"', "", $pecahkan[16]));
				$pecahtglupdt=explode("/", $ptglnjamupdt[0]);
				isset($ptglnjamupdt[1]) ? $jam=$ptglnjamupdt[1]:$jam="";
				$ntglupdt=$pecahtglupdt[2]."-".$pecahtglupdt[1]."-".$pecahtglupdt[0]." ".$jam;
			}
			if (str_replace('"', "", $pecahkan[26])=="\r\n" OR str_replace('"', "", $pecahkan[26])==""){
				$ntglsiakp=$pecahkan[26];
			} else {
				$ptglnjamsiakp=explode(" ", str_replace('"', "", $pecahkan[26]));
				$pecahtglsiakp=explode("/", $ptglnjamsiakp[0]);
				isset($ptglnjamsiakp[1]) ? $jam=$ptglnjamsiakp[1]:$jam="";
				$ntglsiakp=$pecahtglsiakp[2]."-".$pecahtglsiakp[1]."-".$pecahtglsiakp[0]." ".$jam;
			}
			$query="";
			foreach ($pecahkan as $data => $value) {
				switch ($data) {
					case 15:
					$query.="\"".$ntglinsrt."\",";
					break;
					case 16:
					$query.="\"".$ntglupdt."\",";
					break;
					case 26:
					$query.="\"".$ntglsiakp."\"";
					break;

					default:
					$query.=$value.",";
					break;
				}
			}
		//echo $query;
			mysqli_query($connect,"INSERT INTO data_keluarga VALUES (".$query.")");

		}
		fclose($buka);
		break;
		case 'bw':
		$buka = fopen($simpan, "rb");
		//kosongkan tabel
		mysqli_query($connect,"TRUNCATE biodata_wni");	
		while (!feof($buka)) {
			$ambilbaris=fgets($buka);
			$pecahkan=explode(";", $ambilbaris);			
			
			$query="";
			foreach ($pecahkan as $data => $value) {
				switch ($data) {
					case 4:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 8:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 16:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 19:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 35:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 43:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 44:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 45:
					if (str_replace('"', "", $value)==""){
						$query.=$value.",";	
					} else {
						$ptglnjam=explode(" ", str_replace('"', "", $value));
						isset($ptglnjam[1]) ? $jam=$ptglnjam[1]:$jam="";
						$pecahtgl=explode("/", $ptglnjam[0]);
						$newformat=$pecahtgl[2]."-".$pecahtgl[1]."-".$pecahtgl[0]." ".$jam;
						$query.="\"".$newformat."\",";
					}
					break;
					case 65:
					$value=str_replace('"', "", $value);
					$query.="\"".$value."\"";
					break;

					default:
					$value=str_replace('"', "", $value);
					$query.="\"".$value."\",";
					break;
				}
			}
		//echo $query."<br>";
		mysqli_query($connect,"INSERT INTO biodata_wni VALUES (".$query.")");

		}
		fclose($buka);
		break;
		
		default:
			# code...
		break;
	}
	
}

?>