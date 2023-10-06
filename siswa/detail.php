<?php 
 require_once '../database.php';
 $db = new Database();
 $id=$_GET['id'];
 foreach($db->detail_data($_GET['id'],"pembayaran","id_pembayaran") as $d){
 ?>
  <div class="card-body table-responsive">
    
	<div class="card card-info">
            <div id="printableArea">
              <div class="card-header">
                <h3 class="card-title">Detail Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal"  >
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID Pembayaran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" value="P-<?php echo $id; ?>" disabled>
					  
                      <input type="hidden" name="id" value="<?php echo $d['id_pembayaran']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Petugas</label>
                    <div class="col-sm-10">
                      <input type="text" name="namapetugas" class="form-control"  value="<?php 
					        foreach($db->detail_data($d['id_petugas'],"petugas","id_petugas") as $x){echo $x['nama_petugas']." - ".$x['id_petugas']; 	 }?>" disabled  >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                      <input type="text" name="nisn" class="form-control" value="<?php echo $d['nisn']; ?> "  disabled>
                    </div>
					
                  </div>  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" value="<?php 
		                     foreach($db->detail_data($d['nisn'],"siswa","nisn") as $x){
		                      echo $x['nama'] ;
		 
		                       }   ?>" disabled >
                    </div>
                  </div>  
                
              
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Bayar</label>
                    <div class="col-sm-10">
                      <input type="date" name="tgl" class="form-control" value="<?php echo $d['tgl_bayar']; ?>" disabled >
                    </div>
                  </div>  
				  
				  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                    <div class="col-sm-10">
                      <input type="number" name="jumlah" class="form-control" value="<?php echo $d['jumlah_bayar']; ?>" disabled >
                    </div>
                  </div>  
            </div>
                
              
				   
                </div>
                <!-- /.card-body -->
                <div class="card-footer"> 
                  <button onclick="printPageArea('printableArea')" class="btn btn-success float-left" style="margin-left: 5px;"><i class="fas fa-print"></i> Print
                      </button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
 
  </div>
  <script type="text/javascript">
   function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
  </script>
  <?php
 }
 ?>

 