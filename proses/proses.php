<?php 

class Proses{
  public function koneksi()
  {
    return mysqli_connect("localhost", "root", "", "laundry");
  }

  function showService(){
    $conn = $this->koneksi();
    $query = "SELECT * FROM services_type";
    $result = $conn->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) :
      $data[] = $row;
    endwhile;

   return $data;
  }

  function showUser()
  {
    $conn = $this->koneksi();
    $query = "SELECT * FROM user_login";
    $result = $conn->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) :
      $data[] = $row;
    endwhile;

   return $data;
  }

  function showAddPembeli()
  {
    $conn = $this->koneksi();
    $query = "SELECT * FROM `order` JOIN services_type ON `order`.id_services_type=services_type.ID JOIN user_login ON `order`.user_id=user_login.ID";
    $result = $conn->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) :
      $data[] = $row;
    endwhile;

   return $data;
  }

  function loginAdmin(){
    $conn = $this->koneksi();
    $A_NAME = $_POST['A_NAME'];
    $A_PASSWORD = $_POST['A_PASSWORD'];
    $query = "SELECT * FROM admin_login WHERE Adm_Name='$A_NAME' and Adm_Password='$A_PASSWORD'";
    $sql = $conn->query($query);
    if ($sql)
    {
        session_start();
        $select = "SELECT * FROM admin_login WHERE Adm_Name='$A_NAME' and Adm_Password='$A_PASSWORD'";
        $exe = $conn->query($select);
        while($row = $exe->fetch_assoc()) {
        $_SESSION['Admin_Portal'] = $row['Adm_Name'];
      }
      $_SESSION["pesan"] = "berhasil";
      header("Location: index.php");

    }
  }




  function SelectChangeService()
  {
    $conn = $this->koneksi();
    $sql = "SELECT * FROM `services_type`";
    $query = $conn->query($sql);
    return $query;
  }

  function detailServisType()
  {
    $conn = $this->koneksi();
    $sql = "SELECT * FROM detail_service_type
    JOIN services_type 
    ON detail_service_type.id_services_type=services_type.id_services_type
    ";
    $result = $conn->query($sql);
    $data = [];
    while($row = $result->fetch_assoc())
    {
      $data[] = $row;
    }

    return $data;

  }

  function createTambahDataPembeli(){
    $conn = $this->koneksi();
    $id_services_type = $this->test_input($_POST['id_type_service']);
    $cuciSaja = $this->test_input($_POST['cuciSaja']);
    $jumlah_kiloan = $this->test_input($_POST['jumlah_kiloan']);
    $status = $this->test_input($_POST['status']);
    $alamat = $this->test_input($_POST['alamat']);
    $total = $this->test_input($_POST['total']);
    $catatan =$this->test_input($_POST['catatan']);
    $user_id = $this->test_input($_POST['user_id']);
    $nama_order = $this->test_input($_POST['nama_order']);
    $order_code = $this->test_input($_POST['order_code']);
    $insert = "INSERT INTO `order` (id_services_type, user_id, nama_order, catatan, jumlah_kiloan, total, status, alamat, order_code)
               VALUES ('$id_services_type', '$user_id', '$nama_order', '$catatan', '$jumlah_kiloan', '$total', '$status', '$alamat', '$order_code') ";
    $result = $conn->query($insert);
  }

  function addServicesType(){
    $conn = $this->koneksi();
    $servicesName = $this->test_input($_POST['Services_Name']);
    $dryprice = $this->test_input($_POST['dry_price']);
    $laundry_price = $this->test_input($_POST['laundry_price']);
    $insert = "INSERT INTO `services_type` (Services_Name, dry_price, laundry_price)
               VALUES ('$servicesName', '$dryprice', '$laundry_price') ";
    $result = $conn->query($insert);
    if ($result)
    {
      $_SESSION['pesanServices'] = "Anda berhasil menambah data";
      echo "<script>window.location.href='Register_Services.php'</script>";
    }
    else
    {
      $_SESSION['pesanServices'] = "Anda gagal menambah data";
      echo "<script>location='Register_Services.php'</script>";
    }
  }


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

   function ShowAll()
    {
      $conn = $this->koneksi();
      $query = "SELECT * FROM `order` JOIN services_type ON `order`.id_services_type=services_type.ID JOIN user_login ON `order`.user_id=user_login.ID WHERE status='Pending'";
      $result = $conn->query($query);
      $data = [];
      while ($row = $result->fetch_assoc()) :
        $data[] = $row;
      endwhile;

    return $data;
    }

    function registerUsers(){
      $conn = $this->koneksi();
      $username = $this->test_input($_POST['User_Name']);
      $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
      $insert = "INSERT INTO `user_login` (User_Name, Password) VALUES ('$username', '$password')";
      $result = $conn->query($insert);
      if ($result){
				$_SESSION['register_users'] = "Anda berhasil register";
				echo "<script>document.location.replace='Register_user.php'</script>";
			}
    }

    function user_login() {
      $conn = $this->koneksi();
      $A_NAME = $_POST['A_NAME'];
      $A_PASSWORD = $_POST['A_PASSWORD'];
      $sql = "SELECT * FROM `user_login` WHERE User_Name = '$A_NAME'";
      $query1 = $conn->query($sql);
      if (mysqli_num_rows($query1) === 1 ) {
        $result = $query1->fetch_assoc();
        if (password_verify($A_PASSWORD, $result['Password'])) {
          $_SESSION['users'] = $result['User_Name'];
          $_SESSION['id'] = $result['ID'];
          $_SESSION['pesanLogin'] = "Anda berhasil Login";
          header("Location: users/index.php");
        }
      }

      $_SESSION['gagalLogin'] = "Anda gagal login";
    }

    function ubahPassword()
    {
      $conn = $this->koneksi();
      $USER_ID = $_SESSION['id'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $sql = "UPDATE user_login SET Password='$password' WHERE ID = '$USER_ID'";
      $query = $conn->query($sql);
      return $query;
    }


  }



  $proses = new Proses;

?>









