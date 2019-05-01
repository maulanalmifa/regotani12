<?php
include 'tes.php';
	if ($_POST['upload']) {
		$ekstensi = array('png','jpg');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$extention = strtolower(end($x));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		if (in_array($extention,$ekstensi)===true) {
			if ($ukuran<1048576) {
			move_uploaded_file($file_tmp, '../img/'.$nama);
			$query = mysqli_query($conn,"INSERT INTO produk (gambar) VALUES ('$nama')") or die(mysqli_error($conn));
			if($query){
				echo "File Terupload";
			}else{
				echo "Gagal Diupload";
			}	
			}else{
				echo "File Terlalu besar";
			}
		}else{
			echo "Ekstensi Salah";
		}
	}
	?>
