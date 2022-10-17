<?php session_start(); ?>

<?php include "header/header.php"; ?>

<?php include "../proses/proses.php"; ?>

<?php $proses = new Proses;  ?>
<?php $ambil = $proses->showService();  ?>




<body class="fixed-nav sticky-footer bg-dark" id="page-top">


  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
    <div class="card-mb-3">
      <div class="card-header">
        <i class="fa fa-archive ml-3">Tambah Services</i>
        <div class="card-body">
        <form action="TambahServices.php" method="POST">
          <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                  <label for="">Services Name</label>
                  <input type="text" class="form-control" id="Services_Name" name="Services_Name">
                </div>


                <div class="form-group">
                  <label for="">Dry Price</label>
                  <input type="number" name="dry_price" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">laundry Price</label>
                  <input type="number" name="laundry_price" id="laundry_price" class="form-control">
                </div>

                <div class="form-group">
                  <button class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-user-plus mr-2"></i>Simpan Data</button>
                </div>
                
            </div>
          </div>
        </div>
      </div>
     </form>
    </div>
      <!-- Icon Cards-->
      
      <!-- Example DataTables Card-->
    <div class="card mb-3 mt-2">
        <div class="card-header">
          <i class="fa fa-archive"></i>List Services</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>

                  <th>No</th>
                  <th>Nama Services</th>
                  <th>Dry Price</th>
                  <th>Laundry Price</th>
                  <th>action</th>
                </tr>
              </thead>
              
              <tbody>
            <?php $nomor = 1; ?>
            <?php foreach($ambil as $amb):  ?>
              <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $amb['Services_Name'];  ?></td>
                <td><?= $amb['dry_price']; ?></td>
                <td><?= $amb['laundry_price']; ?></td>
                <td>
                  <button onclick="confirmationHapusData('hapusServiceRecord.php?id=<?= $amb['ID']; ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
            <?php endforeach; ?>
              </tbody>
          </table>
        </div>
     </div>

   </div>



    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
    <?php if (isset($_SESSION['pesanServices'])) { ?>

      <script type="text/javascript">
      swal({
          title: "<?php echo $_SESSION['pesanServices']; ?>",
          text: "Yeee",
          icon: "success",
        });
    </script>

    <?php unset($_SESSION['pesanServices']); } ?>

    <?php include('footer/footer.php');?>
  </div>
</body>

</html>
