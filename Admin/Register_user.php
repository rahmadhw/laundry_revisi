<?php session_start(); ?>

<?php include "header/header.php"; ?>

<?php include "../proses/proses.php"; ?>

<?php $proses = new Proses;  ?>
<?php 


if (isset($_POST['simpan'])) {
   $proses->registerUsers();
}


?>




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
        <li class="breadcrumb-item active">Register Users</li>
      </ol>
      
    <div class="card-mb-3">
      <div class="card-header">
        <!-- <i class="fa fa-archive pr-5">Register Users</i> -->
        <div class="card-body">
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="User_Name" name="User_Name">
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="Password" name="Password" id="Password" class="form-control">
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
