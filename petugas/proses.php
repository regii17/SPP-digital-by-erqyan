<?php 
require_once '../database.php';
$db = new Database();



	foreach($db->detail_data($_POST['nisn'],"siswa","nisn") as $d){
	  $id_spp= $d['id_spp'];  
	  }
   //    $un= $_POST['username'];
   //    $id_pet = mysqli_query($koneksi, "SELECT id_petugas from petugas where username=$un");
   foreach($db->detail_data($_POST['username'],"petugas","username") as $d){
	   $id_pet= $d['id_petugas'];  
	   }
   $db->input_transaksi( $id_pet, $_POST['nisn'],$_POST['tgl'],$id_spp,$_POST['jumlah']);
	header("location:transaksi.php?pesan=berhasil");
     ?>