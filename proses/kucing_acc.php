<?php 
	
	if(isset($_GET['id'])){
		include '../koneksi.php';

		$query = "UPDATE kucing SET status = 'acc', tanggal_konfirmasi='".date('Y-m-d H:i:s')."' WHERE id='".$_GET['id']."'";

		if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
			$_SESSION['alert'] = '<div class="alert alert-success">Data berhasil ditambahkan</div>';
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Data gagal ditambahkan</div>';
		}

		header('Location:../daftar_kucing_detail.php?id='.$_GET['id']);
	}

?>