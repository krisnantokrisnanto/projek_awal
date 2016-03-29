<?php
	include"koneksi.php";
	$id=@$_POST["id"];
	$no=1;
		try{
        	 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);
			$tampil =$db->query("SELECT * FROM user where id_user='$id' ");
			while($data=$tampil->fetch(PDO::FETCH_LAZY)){
				?>
				<input type="hidden"   id="id_user" value="<?php echo $data['id_user'] ?>"><br>
				<input type="text"   id="nama_depan" value="<?php echo $data['nama_depan'] ?>"><br>
					<input type="text"   id="alamat" value="<?php echo $data['alamat'] ?>" ><br>
					<select id="kelamin">
						<option value="pria">Pria</option>
						<option value="wanita" <?php if($data->kelamin=='wanita'){echo "selected";} ?>>wanita</option>
					</select><br>
					<input type="password"  required="required"  id="password" value="<?php echo $data['password'] ?>"><br>
					<input type="number" class="tlp" name=" tel" id="tel" value="<?php echo $data['tlp'] ?>"><br>
					<select id="agama">
						<option value="islam">Islam</option>
						<option value="hindu"<?php if($data->agama=='hindu'){echo "selected";} ?>>Hindu</option>
						<option value="budha"<?php if($data->agama=='budha'){echo "selected";} ?>>Budha</option>
						<option value="katolik"<?php if($data->agama=='katolik'){echo "selected";} ?>>Katolik</option>
					</select>
					<button id="edit">Edit</button>
				<?php
			}
		}catch(Exeption $error){
			echo $error->getMassage();
		}
	 ?>
</table>