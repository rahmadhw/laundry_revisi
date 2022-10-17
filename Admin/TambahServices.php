<?php include "../proses/proses.php"; ?>

<?php $proses = new Proses;  ?>
<?php $ambil = $proses->showService();  ?>


<?php

if(isset($_POST['simpan'])) {
  $proses->addServicesType();
  
}



?>