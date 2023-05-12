<?php
//membuat koneksi database
session_start();
$conn = mysqli_connect("localhost","root","","db_spp");

//menambah kelas
if(isset($_POST['tambahkelas'])){
	$nama_kelas = $_POST['nama_kelas'];
	$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

	$masukdatabasekelas = mysqli_query($conn,"INSERT INTO kelas (nama_kelas, kompetensi_keahlian) values('$nama_kelas','$kompetensi_keahlian')");
	if($masukdatabasekelas){
		header('location:data_kelas.php');
	} else{
		echo "<script type='text/javascript'>alert('Data Gagal di Upload');</script>";
		header('location:data_kelas.php');
	}
}

//Edit Kelas
if(isset($_POST['editkelas'])){
	$id_kelas = $_POST['id_kelas'];
	$nama_kelas = $_POST['nama_kelas'];
	$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

	$updatekelas =mysqli_query($conn, "UPDATE kelas set nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' where id_kelas='$id_kelas'");
	if($updatekelas){
		header('location:data_kelas.php');
	} else {
		echo '<script>
		alert("Data Gagal Diupload");
		window.location.href="data_kelas.php";
		</script>';
	}
}

//hapus kelas
if(isset($_POST['hapuskelas'])){
	$id_kelas = $_POST['id_kelas'];

	$deletekelas = mysqli_query($conn, "DELETE FROM kelas where id_kelas='$id_kelas'");
	if($deletekelas){
		header('location:data_kelas.php');
	} else {
		echo '<script>
		alert("Data Gagal Dihapus");
		window.location.href="data_kelas.php";
		</script>';
	}
}


//menambah siswa
if(isset($_POST['tambahsiswa'])){
	$nisn = $_POST['nisn'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$id_kelas = $_POST['id_kelas'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];

	$masukdatabasesiswa = mysqli_query($conn,"INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp) values('$nisn','$nis', '$nama','$id_kelas', '$alamat', '$no_telp')");
	if($masukdatabasesiswa){
		header('location:siswa.php');
	} else{
		echo "<script type='text/javascript'>alert('Data Gagal di Upload');</script>";
		header('location:siswa.php');
	}
}

//Edit Siswa
if(isset($_POST['editsiswa'])){
	$nisn = $_POST['nisn'];
	$nama = $_POST['nama'];
	$id_kelas = $_POST['id_kelas'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];

	$updatesiswa =mysqli_query($conn, "UPDATE siswa set nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp' where nisn='$nisn'");
	if($updatesiswa){
		header('location:siswa.php');
	} else {
		echo '<script>
		alert("Data Gagal Diupload");
		window.location.href="siswa.php";
		</script>';
	}
}

//hapus siswa
if(isset($_POST['hapussiswa'])){
	$nisn = $_POST['nisn'];

	$deletesiswa = mysqli_query($conn, "DELETE FROM siswa where nisn='$nisn'");
	if($deletesiswa){
		header('location:siswa.php');
	} else {
		echo '<script>
		alert("Data Gagal Dihapus");
		window.location.href="siswa.php";
		</script>';
	}
}

//menambah petugas
if(isset($_POST['tambahadmin'])){
	$nama_petugas = $_POST['nama_petugas'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$masukdatabasepetugas = mysqli_query($conn,"INSERT INTO petugas (nama_petugas, username, password, level) values('$nama_petugas','$username','$password','$level')");
	if($masukdatabasepetugas){
		header('location:loginbaru.php');
	} else{
		echo "<script type='text/javascript'>alert('Data Gagal di Upload');</script>";
		header('location:loginbaru.php');
	}
}

//Edit petugas
if(isset($_POST['editadmin'])){
	$id_petugas = $_POST['id_petugas'];
	$nama_petugas = $_POST['nama_petugas'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = 'admin';
	$updateadmin =mysqli_query($conn, "UPDATE petugas set nama_petugas='$nama_petugas', username='$username' , password='$password', level='$level' where id_petugas='$id_petugas'");
	if($updateadmin){
		header('location:petugas.php');
	} else {
		echo '<script>
		alert("Data Gagal Diupload");
		window.location.href="petugas.php";
		</script>';
	}
}

//hapus petugas
if(isset($_POST['hapusadmin'])){
	$id_petugas = $_POST['id_petugas'];

	$deletepetugas = mysqli_query($conn, "DELETE FROM petugas where id_petugas='$id_petugas'");
	if($deletepetugas){
		header('location:petugas.php');
	} else {
		echo '<script>
		alert("Data Gagal Dihapus");
		window.location.href="petugas.php";
		</script>';
	}
}

//hapus kelas
if(isset($_POST['hapusspp'])){
	$id_spp = $_POST['id_spp'];

	$deletespp = mysqli_query($conn, "DELETE FROM spp where id_spp='$id_spp'");
	if($deletespp){
		header('location:spp.php');
	} else {
		echo '<script>
		alert("Data Gagal Dihapus");
		window.location.href="spp.php";
		</script>';
	}
}

?>