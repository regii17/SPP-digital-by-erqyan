<?php 
require_once '../database.php';
$db = new Database();
if(!isset($_POST['aksi'])){
	$aksi = $_GET['aksi'];
	if(isset($_GET['table'])){
		$hal=$_GET['table'];	
	}
}else{
	$aksi = $_POST['aksi'];
} 

//Proses Tambah data
 if($aksi == "tambahspp"){
 	$db->input_spp($_POST['id_spp'],$_POST['tahun'],$_POST['nominal']);
 	header("location:spp.php?pesan=berhasil");
 }else if($aksi == "tambahkelas"){
 	$db->input_kelas($_POST['namakelas'],$_POST['jurusan']);
 	header("location:kelas.php?pesan=berhasil");
 }
 else if($aksi == "tambahtransaksi"){
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
}else if($aksi == "tambahsiswa"){
		$db->input_siswa($_POST['nisn'],$_POST['nis'],$_POST['nama'],$_POST['id_spp'],$_POST['id_kelas'],$_POST['password'],$_POST['alamat'],$_POST['no_telp'],);
		 header("location:siswa.php?pesan=berhasil");
}else if($aksi == "tambahpetugas"){
 	$db->input_petugas($_POST['username'],$_POST['password'],$_POST['nama'],$_POST['level']);
 	header("location:petugas.php?pesan=berhasil");
       
 }
//  else if($aksi == "tambahsiswa"){
//  	$db->input_siswa($_POST['nisn'],$_POST['nis'],$_POST['nama'],$_POST['id_kelas'],$_POST['alamat'],$_POST['no_telp'],$_POST['id_spp'],md5($_POST['password']),);
//  	 header("location:siswa.php?pesan=berhasil");
//  }
 
 //Proses Hapus Data
 elseif($aksi == "hapus"){ 	
 	$db->hapus($_GET['id'],$_GET['table'],$_GET['kolom']);
	header("location:$hal.php?pesan=berhasilhapus");
 }
 
 
 //Proses Update Data
 elseif($aksi == "update_spp"){
 	$db->update_spp($_POST['id'],$_POST['tahun'],$_POST['nominal']);
 	header("location:spp.php?pesan=updateberhasil");
 } elseif($aksi == "update_kelas"){
 	$db->update_kelas($_POST['id'],$_POST['nama'],$_POST['jurusan']);
  	header("location:kelas.php?pesan=updateberhasil");
 }elseif($aksi == "update_siswa"){
 	$db->update_siswa($_POST['id'],$_POST['nama'],$_POST['alamat'],$_POST['no_telp']);
   	header("location:siswa.php?pesan=updateberhasil");
 }elseif($aksi == "update_petugas"){
 	$db->update_petugas($_POST['id'],$_POST['nama'],$_POST['username'],$_POST['level']);
   	header("location:petugas.php?pesan=updateberhasil");
 }elseif($aksi == "update_pembayaran"){
 	$db->update_pembayaran($_POST['id'],$_POST['tgl'],$_POST['bulan'],$_POST['tahun'],$_POST['jumlah']);
   	header("location:transaksi.php?pesan=updateberhasil");
 }

 
?>