<?php 
	
	include '../koneksi.php';

	if($_GET['id']){

		$query = 'INSERT INTO adopsi SET 
					user_id = "'.$_SESSION['login_data']['id'].'",
					kucing_id = "'.$_GET['id'].'",
					alasan_adopsi = "'.$_POST['alasan_adopsi'].'"';

		$tambah = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

		if($tambah){
			$_SESSION['alert'] = '<div class="alert alert-success">Request adopsi berhasil</div>';
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Data gagal dimasukkan</div>';
		}

		header('Location:../detail_kucing.php?id='.$_GET['id']);
		
	}
?>