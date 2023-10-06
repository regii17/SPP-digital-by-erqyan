<?php
$host = "localhost";
$uname = "root";
$pass = "";
$db = "db_spp";

$koneksi = mysqli_connect("localhost", "root", "", "db_spp");

class Database
{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "db_spp";
	var $koneksi = "";



	function __construct()
	{
		$this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);

		if (mysqli_connect_errno()) {
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}


	function cek_login($username, $pass)
	{
		$return = false;


		$data = mysqli_query($this->koneksi, "SELECT * from siswa where nis='$username' and password='$pass'");
		if (mysqli_num_rows($data) > 0) {
			$jenis = "siswa";

		}
		return $jenis;

	}

	function tampil_data($x, $y)
	{
		//$data = mysqli_query($this->koneksi,"call tampilData('spp','id_spp')");
		$data = mysqli_query($this->koneksi, "select * from $x order by $y desc ");
		while ($d = mysqli_fetch_array($data)) {
			$hasil[] = $d;
		}

		return $hasil;
	}

	function detail_data($id, $table, $pk)
	{
		$data = mysqli_query($this->koneksi, "select * from $table where $pk='$id'");
		while ($d = mysqli_fetch_array($data)) {
			$hasil[] = $d;
		}
		return $hasil;
	}

	function input_petugas($username, $password, $nama, $level)
	{
		mysqli_query($this->koneksi, "insert into petugas values('','$username','$password','$nama','$level')");
	}

	function input_spp($id_spp, $tahun, $nominal)
	{
		mysqli_query($this->koneksi, "insert into spp values('','$tahun','$nominal')");
	}

	function input_kelas($namakelas, $jurusan)
	{
		mysqli_query($this->koneksi, "insert into kelas values('','$namakelas','$jurusan')");
	}

	function input_siswa($nisn, $nis, $nama, $id_spp, $id_kelas, $alamat, $no_telp, $password)
	{
		mysqli_query($this->koneksi, "INSERT into siswa values('$nisn','$nis','$nama','$id_spp','$id_kelas','$alamat','$no_telp','$password')");
	}

	function input_transaksi($id_pet ,$nisn, $tgl, $id_spp,$jumlah){
		mysqli_query($this->koneksi,"INSERT into pembayaran values('','$id_pet','$nisn','$tgl', '$id_spp','$jumlah')");
		}

	function hapus($id, $table, $kolom)
	{
		mysqli_query($this->koneksi, "DELETE from $table where $kolom='$id'");
	}

	function update_spp($id, $tahun, $nominal)
	{
		mysqli_query($this->koneksi, "update spp set tahun='$tahun', nominal='$nominal' where id_spp='$id'");
	}

	function update_kelas($id, $nama, $jurusan)
	{
		mysqli_query($this->koneksi, "update kelas set namakelas='$nama', jurusan='$jurusan' where id_kelas='$id'");
	}
	function update_siswa($id, $nama, $alamat, $no_telp)
	{
		mysqli_query($this->koneksi, "update siswa set nama='$nama', alamat='$alamat', no_telp='$no_telp' where nisn='$id'");
	}

	function update_petugas($id, $nama, $username, $level)
	{
		mysqli_query($this->koneksi, "update petugas set nama_petugas='$nama', username='$username', level='$level' where id_petugas='$id'");
	}

	function update_pembayaran($id, $tgl, $bulan, $tahun, $jumlah)
	{
		mysqli_query($this->koneksi, "update pembayaran set tgl_bayar='$tgl', bulan_dibayar='$bulan', tahun_dibayar='$tahun', jumlah_bayar='$jumlah' where id_pembayaran='$id'");
	}

	function hitung_total($x)
	{
		$data = mysqli_query($this->koneksi, "select * from $x");
		$hasil = mysqli_num_rows($data);
		return $hasil;
	}
}


?>