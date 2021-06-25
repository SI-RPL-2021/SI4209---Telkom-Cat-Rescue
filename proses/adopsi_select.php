<?php 
	
	if(isset($_GET['id']) && isset($_GET['kucing_id'])){
		include '../koneksi.php';

		$query = "UPDATE kucing SET is_adopted='1' WHERE id='".$_GET['kucing_id']."'";
		mysqli_query($koneksi, $query);

		$query = "UPDATE adopsi SET is_adoption = '1' WHERE id='".$_GET['id']."'";

		if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
			$_SESSION['alert'] = '<div class="alert alert-success">Pengadopsi berhasil dipilih</div>';
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Pengadopsi gagal dipilih</div>';
		}

		header('Location:../daftar_kucing_detail.php?id='.$_GET['kucing_id']);
	}

?>