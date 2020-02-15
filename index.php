<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.autocomplete-suggestions {
			border: 1px solid #999;
			background: #FFF;
			overflow: auto;
		}
		.autocomplete-suggestion {
			padding: 2px 5px;
			white-space: nowrap;
			overflow: hidden;
		}
		.autocomplete-selected {
			background: #F0F0F0;
		}
		.autocomplete-suggestions strong {
			font-weight: normal;
			color: #3399FF;
		}
		.autocomplete-group {
			padding: 2px 5px;
		}
		.autocomplete-group strong {
			display: block;
			border-bottom: 1px solid #000;
		}
	</style>
	<title>Konversi format date secara manual</title>
</head>
<body>
	<h3>Masukkan data ke database</h3>
	<form method="POST" action="proses.php?tb=dk" enctype="multipart/form-data">
		<label>Insert tabel DK (data_keluarga)</label>
		<input type="file" name="data_awal">
		<input type="submit" name="tb_konver" value="konversikan">
	</form>
	<form method="POST" action="proses.php?tb=bw" enctype="multipart/form-data">
		<label>Insert tabel BW (biodata_wni)</label>
		<input type="file" name="data_awal">
		<input type="submit" name="tb_konver" value="konversikan">
	</form>
	<h3>Cetak Permohonan</h3>
	<form method="POST" action="cetak_permohonan.php">
		<label>Masukkan Nik : </label> <input type="text" id="nik" name="nik"><br>
		<label>Nama : </label>
		<input type="text" id="nama" disabled=""><br><br>
		<input type="submit" name="cetak" value="cetak">
	</form>
	<script src="jquery.js"></script>
	<script src="autocomplete.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
        $( "#nik" ).autocomplete({
            serviceUrl: "data.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
            	$( "#nik" ).val("" + suggestion.nik);
            	$( "#nama" ).val("" + suggestion.nama);
            }
        });
    })
</script>


</body>
</html>