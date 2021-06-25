<?php 
	
	if(isset($_GET['id'])){
		include '../koneksi.php';
		$query    = mysqli_query($koneksi, 'SELECT * FROM kucing WHERE id="'.$_GET['id'].'"');
		$kucing   = mysqli_fetch_assoc($query);
		$old_gbr  = $kucing['img'];

		$id = $_GET['id'];
		$query = "DELETE FROM kucing WHERE id='".$id."'";

		if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
			if(file_exists('../adopt_img/'.$old_gbr)){
				unlink('../adopt_img/'.$old_gbr);
			}
				
			$_SESSION['alert'] = '<div class="alert alert-success">Data berhasil dihapus</div>';
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Data gagal dihapus</div>';
		}

		header('Location:../daftar_kucing.php');
	}

?>