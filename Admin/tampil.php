<?php include "getitem.php";  ?>


<div class="form-group">
  <label for="">Jenis Orderan</label>
  <select name="cuciSaja" id="cuciandgosok" class="form-control">
  <option value="">---Pilih---</option>
  <option value="<?php echo $_SESSION['data']['dry_price']; ?>">Cuci Saja - <?php echo $_SESSION['data']['dry_price']; ?></option>
  <option value="<?php echo $_SESSION['data']['laundry_price']; ?>">Cuci Gosok - <?= $_SESSION['data']['laundry_price']; ?> </option>
  </select>
</div>



