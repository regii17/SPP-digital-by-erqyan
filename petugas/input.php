<?php
require_once '../database.php';
$db = new Database();
$hal = $_GET['hal'];


switch ($hal) {
  case "pembayaran":
    ?>
    <style>
      .card {
        width: 67rem;
      }
      .form {
        margin-top: -1.8rem;
      }
    </style>
<div class="input">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Transaksi</h3>
    </div>
    <form style="margin-left:2rem; margin-right:2rem; margin-top:2rem;" role="form" method="POST" 	action="proses.php?aksi=tambahtransaksi" id="quickForm"  >
    <div class="form">
    <div class="form-group">
     <input type="hidden" name="username" value="<?php echo (($_SESSION['username'])); ?>">
     <?php
echo '  </select>
   </div> 			
<div class="form-group">
       <label>NISN</label>
       <select class="form-control select2" name="nisn">
';
foreach($db->tampil_data("siswa","nisn") as $x){
echo '
         <option value="'.$x['nisn'].'">'.$x['nisn'].'-'.$x['nama'].'</option>
         ';
}
echo '</select>
     </div> 

       <div class="form-group">
         <label >Tanggal Bayar</label>
         <input type="date" name="tgl" class="form-control"  placeholder="tanggal bayar" required>
       </div> 

       <div class="form-group">
         <label >Jumlah Bayar</label>
         <input type="number" name="jumlah" class="form-control"  placeholder="Jumlah bayar" required>
       </div> 


     </div>
     <!-- /.card-body -->

     <div class="card-footer">
       <button type="submit"   class="btn btn-primary">Submit</button>
     </div>
   </form>
';
    ?>

  </div>
    </div>

  <?php

  break;
  default:
    echo "404 Not Found";
}