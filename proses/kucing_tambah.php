<?php 
	
	if(isset($_POST['judul_iklan'])){
		include '../koneksi.php';

		$ext_allowed = array('png','jpg', 'jpeg');
		$nama_gbr	 = $_FILES['img']['name'];
		$x 			 = explode('.', $nama_gbr);
		$ext  	     = strtolower(end($x));
		$file_tmp 	 = $_FILES['img']['tmp_name'];	

		if(in_array($ext, $ext_allowed)){
			move_uploaded_file($file_tmp, '../adopt_img/'.$nama_gbr);
			$query = "INSERT INTO kucing SET 
				judul_iklan 		 = '".$_POST['judul_iklan']."',
				foto 	 = '".$nama_gbr."',
				user_id 	 = '".$_SESSION['login_data']['id']."',
				nama_kucing  = '".$_POST['nama_kucing']."',
				umur  = '".$_POST['umur']."',
				jenis_kelamin  = '".$_POST['jenis_kelamin']."',
				deskripsi  = '".$_POST['deskripsi']."',
				jenis 	 = '".$_POST['jenis']."'";

			if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
				$_SESSION['alert'] = '<div class="alert alert-success">Data berhasil ditambahkan</div>';
			}else{
				$_SESSION['alert'] = '<div class="alert alert-danger">Data gagal ditambahkan</div>';
			}

		}else{
			$_SESSION['alert'] = '<div class="alert alert-danger">Esktensi file tidak diizinkan</div>';
		}

		header('Location:../daftar_kucing.php');
	}

?>