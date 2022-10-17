<?php session_start();  ?>
<?php include "header/header.php"; ?>

<?php include "../proses/proses.php"; ?>

<?php


$proses = new Proses();
$pecah = $proses->showAddPembeli();
$pecah1 = $proses->showService();
$pecah2 = $proses->showUser();




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
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
    <div class="card-mb-3">
      <div class="card-header">
        <i class="fa fa-archive ml-3">Tambah Orderan</i>
        <div class="card-body">
        <form action="kirim.php" method="POST" id="form">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nama Service</label>
                  <select name="id_type_service" id="tbl_service" class="form-control">
                    <option value="" class="form-control">---Pilih---</option>
                  <?php foreach($pecah1 as $pch) :  ?>
                    <option data-id="<?= $pch['ID']; ?>" value="<?= $pch['ID']; ?>" class="form-control"><?= $pch['Services_Name'] ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group" id="change">

                </div>

                <div class="form-group">
                  <label for="">Jumlah Kiloan</label>
                  <input type="number" class="form-control" id="jumlah_kiloan" name="jumlah_kiloan">
                </div>

                <div class="form-group">
                  <label for="">Total</label>
                  <input type="text" class="form-control" id="total" name="total" readonly>
                </div>

                <div class="form-group">
                  <label for="">Pilih Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="">---Pilih---</option>
                    <option value="Pending">Pending</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                </div>

                
            </div>
            <div class="col-md-6">
                

                <div class="form-group">
                  <label for="">Order Code</label>
                  <input type="text" name="order_code"class="form-control" value="<?= rand(10,100); ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="">Nama Pengguna</label>
                  <select name="user_id" id="nama_pengguna" class="form-control">
                    <option value="">---pilih---</option>
                  <?php foreach($pecah2 as $pch) :  ?>
                    <option value="<?= $pch['ID'] ?>"><?= $pch['User_Name']; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Nama Order</label>
                  <input type="text" name="nama_order" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Catatan</label>
                  <input type="text" name="catatan" class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-sm" name="simpan" id="simpan" ><i class="fas fa-user-plus mr-2"></i>Simpan</button>
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
          <i class="fa fa-archive"></i>Pending Order</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
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
                  <th>action</th>
                </tr>
              </thead>
              
              <tbody>
            <?php $nomor=1;  ?>
            <?php foreach ($pecah as $data):  ?>
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
                <td>
                  <button onclick="confirmationHapusData('hapusPembeli.php?id=<?= $data['id']; ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                  <a href="uprove.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-check"></i></a>
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

<script>
  $(document).ready(function(e) {
    $("#tbl_service").change(function(e){
      // var data = $(this).val()
      var id = e.target.value;
      $.ajax({
        type: "GET",
        url: "getitem.php",
        data: "id_service="+ id,

        success: function(hasil){ 
            $.ajax({
              type: "get",
              data: "id_service="+ id,
              url: "tampil.php",
              success: function(hasil){
                $("#change").html(hasil);
                $("#jumlah_kiloan").keyup(function() {
                      var pilih = $("#cuciandgosok").val(); 
                      var jml = $("#jumlah_kiloan").val();
                      var total = parseInt(pilih) * parseInt(jml);
                      if (!isNaN(total)) {
                        $("#total").val(total);
                       

                        $("#cuciandgosok").change(function(e) {
                          var pilih = e.target.value;
                          var total = parseInt(pilih) * parseInt(jml);
                          $("#total").val(total);
                        })

                        
                      }
                })

                
              }
            });
        },
        error: function(error){
          console.log(error);
        }
      })
    })

     
  })
 

  $("form").submit((e) => {
    var data = $("form").attr("action")
    $.ajax({
      type: "POST",
      url: data,
      success: function(responds) {
        swal({
          title: "berhasil add data",
          text: "yeee",
        });
      },
      errors: function(responds){
        swal({
          title: "Gagal add data",
          text: "yeee",
          icon: "errors",
        });
      }
    })
  })


</script>


    <?php include('footer/footer.php');?>
  </div>
</body>

</html>
