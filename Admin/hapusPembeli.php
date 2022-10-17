<?php 
session_start();
include '../proses/proses.php';

$id = $_GET['id'];
$proses = new Proses;
$conn = $proses->koneksi();
$query = "DELETE FROM `order` WHERE id='$id'";
$result = $conn->query($query);
$_SESSION['pesanHapusRecord'] = "anda Berhasil menghapus data";
echo "<script>window.location='addPembeli.php'</script>";






 ?>