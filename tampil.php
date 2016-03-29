<style type="text/css">
table{
	border-collapse:collapse;
	border:1px solid #ccc;
}
th,td{
	padding:10px;
	border:1px solid #ccc;
}
</style>
<table>
	<tr>
		<th>#</th>
		<th>nama</th>
		<th>alamat</th>
		<th>kelamin</th>
		<th>agama</th>
		<th>opsi</th>
	</tr>
	<?php
	include"koneksi.php";
	$no=1;
		try{
			$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$tampil =$db->query("SELECT * FROM user");
			while($data=$tampil->fetch(PDO::FETCH_LAZY)){
				?>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $data['nama_depan'] ?></td>
					<td><?php echo $data->alamat ?></td>
					<td><?php echo $data[8] ?></td>
					<td><?php echo $data['agama'] ?></td>
					<td>
						<button class="edit" id=" <?php echo $data[0] ?> ">Edit</button>
						<button class="hapus" id=" <?php echo $data[0] ?> "> Hapus</button>
					</td>
				</tr>
				<?php
			}
		}catch(Exeption $error){
			echo $error->getMassage();
			var_dump($error);
			exit;
		}
	 ?>
</table>