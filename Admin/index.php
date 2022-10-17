<?php

session_start();


if (!isset($_SESSION['Admin_Portal']))
{
  header("Location: login.php");
}


?>

<?php include "header/header.php"; ?>

<?php include "../proses/proses.php"; ?>





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
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cutlery"></i>
              </div>
              <div class="mr-5">
                 Total Servics Provide!
               </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu_record.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"> Resginter user!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Register_user.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Pending Order</div>
        <div class="card-body">


         



          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Order</th>
                  <th>Alamat</th>
                  <th>order code</th>
                  <th>Dry Price</th>
                  <th>Laundry Price</th>
                  <th>Nama Pengguna</th>
                  <th>Order Date</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              
              <tbody>
              <?php $nomor = 1;  ?>
              <?php $proses = new Proses; ?>
              <?php $ambil = $proses->ShowAll();  ?>
              <?php foreach($ambil as $amb) :  ?>
                <tr>
                  <td><?= $nomor++; ?></td>
                  <td><?= $amb['nama_order']; ?></td>
                  <td><?= $amb['alamat']; ?></td>
                  <td><?= $amb['order_code']; ?></td>
                  <td><?= $amb['dry_price']; ?></td>
                  <td><?= $amb['laundry_price']; ?></td>
                  <td><?= $amb['User_Name']; ?></td>
                  <td><?= $amb['order_date']; ?></td>
                  <td><span class="badge bg-warning"><?= $amb['status']; ?></span></td>
                  
                </tr>
              <?php endforeach; ?>
              </tbody>
          </table>
        </div>
     </div>

   </div>



    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer/footer.php');?>
  </div>
</body>

</html>
