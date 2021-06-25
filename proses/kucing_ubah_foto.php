<?php 
	
	if(!empty($_FILES['img']['name'])){
		include '../koneksi.php';

		$u = true;
		$query    = mysqli_query($koneksi, 'SELECT * FROM kucing WHERE id="'.$_GET['id'].'"');
		$kucing   = mysqli_fetch_assoc($query);
		$old_gbr  = $kucing['foto'];

		if(!empty($_FILES['img']['name'])){
			$ext_allowed = array('png','jpg', 'jpeg');
			$nama_gbr	 = $_FILES['img']['name'];
			$x 			 = explode('.', $nama_gbr);
			$ext  	     = strtolower(end($x));
			$file_tmp 	 = $_FILES['img']['tmp_name'];

			if(in_array($ext, $ext_allowed)){
				move_uploaded_file($file_tmp, '../adopt_img/'.$nama_gbr);

				if(file_exists('../adopt_img/'.$old_gbr)){
					unlink('../adopt_img/'.$old_gbr);
				}

				$query = "UPDATE kucing SET foto = '".$nama_gbr."'";

				if(mysqli_query($koneksi, $query) or die(mysqli_error($koneksi))){
					$_SESSION['alert'] = '<div class="alert alert-success">Foto berhasil diubah</div>';
				}else{
					$_SESSION['alert'] = '<div class="alert alert-danger">Foto gagal diubah</div>';
				}

			}else{
				$_SESSION['alert'] = '<div class="alert alert-danger">Esktensi file tidak diizinkan</div>';
			}

			header('Location:../daftar_kucing_ubah.php?id='.$kucing['id']);
		}
		
	}

?>