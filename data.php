<?php
header("Content-Type: application/json; charset=UTF-8");
include "connect.php";


$nik = $_GET["query"];

// Query ke database.
$query  = $connect->query("SELECT NIK,NAMA_LGKP FROM biodata_wni WHERE NIK LIKE '%$nik%' ORDER BY NIK DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['NIK'],
        'nik'  => $data['NIK'],
        'nama' => $data['NAMA_LGKP']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>