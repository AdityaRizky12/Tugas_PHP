<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
	include_once("connect.php");
	$id_pengarang = $_GET['id_pengarang'];

	$pengarang = mysqli_query($conn, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

	while($pengarang_data = mysqli_fetch_array($pengarang)) {
		$nama_pengarang = $pengarang_data['nama_pengarang'];
		$email = $pengarang_data['email'];
		$telp = $pengarang_data['telp'];
		$alamat = $pengarang_data['alamat'];
	}
?>
 
<body>
	<a href="pengarang.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_pengarang.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
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
		// Check if form is submitted, then update the data in the pengarang table.
		if(isset($_POST['update'])) {
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'");
			
			header("Location: pengarang.php");
		}
	?>
</body>
</html>
