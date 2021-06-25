<?php 
	
	if(isset($_POST['nama'])){
		include '../koneksi.php';

		$query = "UPDATE user SET 
					nama='".$_POST['nama']."',
					no_hp='".$_POST['no_hp']."'

					WHERE id='".$_SESSION['login_data']['id']."'";

		
		if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
			$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='".$_SESSION['login_data']['id']."'");
			$user  = mysqli_fetch_assoc($query);

			$_SESSION['login_data'] = $user;
			$_SESSION['alert'] = '<div class="alert alert-success">Profile berhasil diubah</div>';
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Profile gagal diubah</div>';
		}

		header('Location:../account.php');
	}

?>