<!DOCTYPE html>
<html>
<head>
	<title>CRUD_ajak_tutorial</title>
	<style type="text/css">
	body{
		font-family: calibri;
	}
	#tampildata{

	}
	</style>
</head>
<body>
	<div>
		<button id="tambahdata"style="margin-bottom: 20px;">Tambah</button>
	</div>
	<div id="tampil" >
		<?php include"tampil.php"; ?>
	</div>
	<div id="cruddata">

	</div>
	<script type="text/javascript" src="jquery-2.2.0.min.js"></script>
	<script type="text/javascript">
	$("#tambahdata").click(function(){
		$("#cruddata").hide().load("tambah.php").fadeIn(1000);
	});
	$("#cruddata").on("click","#daftar",function(){
		var nama1= $ ("#nama_depan").val();
		var alamat= $ ("#alamat").val();
		var kelamin= $ ("#kelamin").val();
		var pass= $ ("#password").val();
		var tel= $ ("#tel").val();
		var agama= $ ("#agama").val();
		if(nama1 =='' ||alamat ==''  ||kelamin ==''||pass ==''||tel ==''||agama =='') {
			alert("Tolong isi semua kolam");
		}else{
			$.ajax({
				url:'proses.php?page=tambah',
				type:'post',
				data:'nama1='+nama1+'&alamat='+alamat+'&kelamin='+kelamin+'&pass='+pass+'&tel='+tel+'&agama='+agama,
				success:function(msg){
					if (msg == 'sukses' ){
						$("#tampil").load("tampil.php");
						// alert("sukses tambah");

					}else{
						alert("gagal menambahkan data");
					}
				}
			});
		}
	});
	$('#tampil').on("click",".edit",function(){
		var id = $(this).attr("id");
		$.ajax({
			url:'edit.php',
			type:'post',
			data:'id='+id,
			success:function(msg){
				$("#cruddata").hide().fadeIn(1000).html(msg);
			}
		});
	});
	$("#cruddata").on("click","#edit",function(){
		var id= $ ("#id_user").val();
		var nama1= $ ("#nama_depan").val();
		var alamat= $ ("#alamat").val();
		var kelamin= $ ("#kelamin").val();
		var pass= $ ("#password").val();
		var tel= $ ("#tel").val();
		var agama= $ ("#agama").val();
		if(nama1 =='' ||alamat ==''  ||kelamin ==''||pass ==''||tel ==''||agama =='') {
			alert("Tolong isi semua kolam");
		}else{
			$.ajax({
				url:'proses.php?page=edit',
				type:'post',
				data:'id='+id+'&nama1='+nama1+'&alamat='+alamat+'&kelamin='+kelamin+'&pass='+pass+'&tel='+tel+'&agama='+agama,
				success:function(msg){
					if (msg == 'sukses' ){
						$("#tampil").load("tampil.php");
						$("#cruddata").hide();
						// alert("sukses tambah");
					}else{
						alert("gagal edit data");
					}
				}
			});
		}
	});
	$('#tampil').on("click",".hapus",function(){
		var id = $(this).attr("id");

			$.ajax({
			url:'proses.php?page=hapus',
			type:'post',
			data:'id='+id,
			success:function(msg){
					if (msg == 'sukses' ){
					$("#tampil").load("tampil.php");
					$("#cruddata").hide();
					// alert("sukses tambah");
				}else{
					alert("gagal edit data");
				}
			}
		});

	});
	</script>
	<h2>thread</h2>
</body>
</html>