<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("connect.php");
	$id_penerbit = $_GET['id_penerbit'];

	$penerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");

	while($penerbit_data = mysqli_fetch_array($penerbit)) {
		$nama_penerbit = $penerbit_data['nama_penerbit'];
		$email = $penerbit_data['email'];
		$telp = $penerbit_data['telp'];
		$alamat = $penerbit_data['alamat'];
	}
?>
 
<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_penerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>No Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check if form is submitted, then update the data in the penerbit table.
		if(isset($_POST['update'])) {
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit'");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>
