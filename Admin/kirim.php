<?php

include "../proses/proses.php";

$proses = new Proses;


   if (isset($_POST['simpan'])) {
      $tambah = $proses->createTambahDataPembeli();
      echo "<script>location.href='addPembeli.php'</script>";
   }




?>