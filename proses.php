<?php 
	include "koneksi.php";
		$nama1 = @$_POST['nama1'];
		$alamat = @$_POST['alamat'];
		$kelamin = @$_POST['kelamin'];
		$pass = @$_POST['pass'];
		$tel = @$_POST['tel'];
		$agama = @$_POST['agama'];
		$id = @$_POST['id'];

	if(@$_GET['page']=='tambah'){
		$insert= $db->prepare("INSERT INTO user(nama_depan,alamat,kelamin,password,tlp,agama) VALUES ('$nama1','$alamat','$kelamin','$pass','$tel','$agama') ");
		$insert->execute();
		if($insert->rowCount() > 0 ){
			echo"sukses";
		}
	}else if(@$_GET['page']=='edit'){
		$edit= $db->prepare("UPDATE user SET nama_depan='$nama1',alamat='$alamat',kelamin='$kelamin',password='$pass',tlp='$tel',agama='$agama' WHERE id_user='$id'" );
		$edit->execute();
		if($edit->rowCount() > 0 ){
			echo"sukses";
		}
	}else if(@$_GET['page']=='hapus'){
		$del= $db->prepare("DELETE FROM user WHERE id_user =':id'" );
		$del->execute(':id',$id);
		if($del->rowCount() > 0 ){
			echo"sukses";
		}
	}
 ?>