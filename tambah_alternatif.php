<?php

include('koneksi.php');

$id = $_POST['id'];
$nrk = $_POST['nrk'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$masa_aktif = $_POST['masa_aktif'];
$level_akun = $_POST['level_akun'];

$sql = "INSERT INTO alternatif VALUES('$id', '$nrk', '$nama', '$jabatan', '$masa_aktif', '$level_akun')";
mysqli_query($conn, $sql);
header('location:alternatif.php');

?>