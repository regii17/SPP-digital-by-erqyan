<?php
//session php
session_start();
//koneksi
include 'database.php';
$db = new database();


//tangkap data dari form
$username =$_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * from petugas where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	if ($data['level'] == "admin") {
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['status'] = "login";
		header("location:admin/");

	} else if ($data['level'] == "petugas") {
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
		$_SESSION['status'] = "login";
		header("location:petugas/");
	}

} else if ($db->cek_login($username, $password) == "siswa") {
	$_SESSION['nisn'] = $username;
	$_SESSION['status'] = "login";
	header("location:siswa/");
} else {
	header("location:index.php?pesan=gagal");
}
?>