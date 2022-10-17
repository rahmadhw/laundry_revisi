
<?php 
  

  if (!isset($_SESSION['users']) && empty($_SESSION['users']))
  {
    header("Location: ../login.php");
  }




 ?>

<?php include "../proses/proses.php"; ?>







  <!-- Navigation-->

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Order</div>
        <div class="card-body">


           <?php 
          $proses = new Proses;
          $conn = $proses->koneksi();
          $id = $_SESSION['id'];
          $query ="SELECT * FROM `order` JOIN services_type ON `order`.id_services_type=services_type.ID JOIN user_login ON `order`.user_id=user_login.ID WHERE user_id='$id'";

          $result = $conn->query($query);
           ?>    



          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                  <th>No</th>
                  <th>nama Service</th>
                  <th>Catatan</th>
                  <th>nama pengguna</th>
                  <th>nama order</th>
                  <th>jumlah kiloan</th>
                  <th>total</th>
                  <th>alamat</th>
                  <th>Order Code</th>
                  <th>Order Date</th>
                  <th>status</th>
                </tr>
              </thead>
              
              <tbody>
              <?php $nomor=1;  ?>
            <?php foreach ($result as $data):  ?>
              <tr>
                
                <td><?= $nomor++; ?></td>
                <td><?= $data['Services_Name']; ?></td>
                <td><?= $data['catatan']; ?></td>
                <td><?= $data['User_Name']; ?></td>
                <td><?= $data['nama_order']; ?></td>
                <td><?= $data['jumlah_kiloan']; ?></td>
                <td>Rp. <?= number_format($data['total']); ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['order_code']; ?></td>
                <td><?= $data['order_date']; ?></td>
                <td><span class="badge bg-warning"><?= $data['status']; ?></span></td>
              </tr>
            <?php endforeach; ?>
                             
                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>



    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

</body>

</html>
