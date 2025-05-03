<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dbkoneksi.php';

$_tanggal = $_POST['tanggal'];
$_berat = str_replace(',', '.', $_POST['berat']);
$_tinggi = str_replace(',', '.', $_POST['tinggi']);
$_tensi = $_POST['tensi'];
$_keterangan = $_POST['keterangan'];
$_pasien_id = $_POST['pasien_id'];
$_dokter_id = $_POST['dokter_id'];
$data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];

// Tambah/Ubah
$_proses = $_POST['proses'];
if ($_proses == "Simpan") {
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $st = $dbh->prepare($sql);
    $st->execute($data);
} else if ($_proses == "Ubah") {
    $_id = $_POST['id'];
    $data_update = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id, $_id];

    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=?
            WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute($data_update);
}


// Hapus
if (isset($_GET['proses']) && $_GET['proses'] == 'Hapus') {
$idx = $_GET['idx'];
$sql = "DELETE FROM periksa WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$idx]);
}

header('Location: data_periksa.php');
?>
