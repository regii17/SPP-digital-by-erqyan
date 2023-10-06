<?php
require_once '../database.php';
$db = new Database();
$hal = $_GET['hal'];


switch ($hal) {
  case "spp": 
    //  echo "Your favorite color is red!";
      ?>
            <style>
        .card {
          width: 67rem;
        }
      </style>
      <div class="input">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah data spp</h3>
      </div>
      <form role="form" method="POST" action="proses.php?aksi=tambahspp" id="quickForm">
        <div class="card-body">
          <div class="form-group">
            <label>Tahun SPP</label>
            <input type="number" name="tahun" class="form-control" id="exampleInputEmail1"
              placeholder="Tahun pembayaran SPP">
          </div>
          <div class="form-group">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control" id="exampleInputPassword1" placeholder="Nominal">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

  </div>


    <?php

    break;
  case "siswa":
      ?>
      <style>
        .card {
          width: 67rem;
        }
      </style>
      <div class="input">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah data siswa</h3>
      </div>
      <form role="form" method="POST" action="proses.php?aksi=tambahsiswa" id="quickForm">
        <div class="card-body">
          <div class="form-group">
            <label>NISN</label>
            <input type="number" name="nisn" class="form-control" placeholder="NISN">
          </div>

          <div class="form-group">
            <label>NIS</label>
            <input type="number" name="nis" class="form-control" placeholder="NIS">
          </div>
          <div class="form-group">
            <label >PASSWORD</label>
            <input type="password" name="password" class="form-control"  placeholder="password">
          </div>
          <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control" placeholder="nama siswa">
          </div>

          <div class="form-group">
            <label>KELAS</label>
            <select class="form-control" name="id_kelas">';
              <option value="">pilih</option>';
              <?php 
              foreach ($db->tampil_data("kelas", "id_kelas") as $x) {
                echo '
          <option value="' . $x['id_kelas'] . '">' . $x['nama_kelas'] . '-' . $x['kompetensi_keahlian'] . '</option>
                    ';
              }
              echo '    
                  </select>
                </div>
				
                <div class="form-group">
                  <label>Tahun SPP-Jumlah</label>
                  <select class="form-control" name="id_spp">
                    <option value="">pilih</option>';
              
              foreach ($db->tampil_data("spp", "id_spp", "nominal") as $x) {
                echo '
				<option value="' . $x['id_spp'] . '">' . $x['tahun'] . '-' . $x['nominal'] . '</option>
								';
              }
              echo ' </select>
                </div>

				
				          <div class="form-group">
                    <label >ALAMAT</label>
                    <input type="text" name="alamat" class="form-control"  placeholder="Alamat Siswa">
                  </div> 
				  
				          <div class="form-group">
                    <label >NO TELP</label>
                    <input type="number" name="no_telp" class="form-control"  placeholder="No HP Siswa">
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

    <?php
    break;
  case "kelas":
      ?>
      <style>
        .card {
          width: 67rem;
        }
      </style>
       <div class="input">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah data kelas</h3>
      </div>
      <form role="form" method="POST" action="proses.php?aksi=tambahkelas" id="quickForm">
        <div class="card-body">
          <div class="form-group">
            <label>Nama kelas</label>
            <input type="text" name="namakelas" class="form-control" id="exampleInputEmail1" placeholder="Nama kelas">
          </div>
          <div class="form-group">
            <label>Kom. Keahlian</label>
            <input type="text" name="jurusan" class="form-control" id="exampleInputPassword1"
              placeholder="Kom. Keahlian">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>


    <?php
    break;

  case "petugas":
      ?>
      <style>
        .card {
          width: 67rem;
        }
      </style>
 <div class="input">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah data petugas</h3>
      </div>
      <form role="form" method="POST" action="proses.php?aksi=tambahpetugas" id="quickForm">
        <div class="card-body">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <label>Nama Petugas</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Petugas">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>

          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level">
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
            </select>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
  </div>

    <?php

    break;

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