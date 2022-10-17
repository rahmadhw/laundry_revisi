<?php
include "../proses/proses.php";
$proses = new Proses;
$conn = $proses->koneksi();

$id = $_GET['id_service'];
$result = $conn->query("SELECT * FROM services_type WHERE ID='$id'");
while($row = $result->fetch_assoc()) {
  $_SESSION['data'] = $row; 
}




?>

