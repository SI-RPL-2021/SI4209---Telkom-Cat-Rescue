<?php 
	
	include '../koneksi.php';

	if($_POST['email']){
		$query = mysqli_query($koneksi, 'SELECT * FROM user WHERE email="'.$_POST['email'].'" AND password="'.$_POST['password'].'"') or die(mysqli_error($koneksi));

		if(mysqli_num_rows($query) > 0){
			$_SESSION['login'] = true;
			$_SESSION['login_data'] = mysqli_fetch_assoc($query);

			if($_SESSION['login_data']['akses'] == 'admin'){
				header('Location:../dashboard_admin.php');
			}else{
				header('Location:../index.php');
			}
			
		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Email / username salah</div>';
			header('Location:../login.php');
		}
	}
?>