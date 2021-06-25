<?php 
	
	if(isset($_POST['nama_kucing'])){
		include '../koneksi.php';

		$query    = mysqli_query($koneksi, 'SELECT * FROM kucing WHERE id="'.$_GET['id'].'"');
		$kucing  = mysqli_fetch_assoc($query);

		$query = "UPDATE kucing SET 
				judul_iklan 		 = '".$_POST['judul_iklan']."',
				nama_kucing  = '".$_POST['nama_kucing']."',
				umur  = '".$_POST['umur']."',
				jenis_kelamin  = '".$_POST['jenis_kelamin']."',
				deskripsi  = '".$_POST['deskripsi']."',
				jenis 	 = '".$_POST['jenis']."' WHERE id='".$_GET['id']."'";

		if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
			$_SESSION['alert'] = '<div class="alert alert-success">Data berhasil ditambahkan</div>';
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Data gagal ditambahkan</div>';
		}

		header('Location:../daftar_kucing_ubah.php?id='.$kucing['id']);
	}

?>