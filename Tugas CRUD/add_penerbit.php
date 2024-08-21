<html>
<head>
	<title>Add Penerbit</title>
</head>

<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="add_penerbit.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Penerbit</td>
				<td><input type="text" name="id_penerbit"></td>
			</tr>
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr> 
				<td>No Telepon</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
		// Check if form submitted, insert form data into penerbit table.
		if(isset($_POST['Submit'])) {
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			// Insert data into penerbit table
			$result = mysqli_query($conn, "INSERT INTO penerbit (id_penerbit, nama_penerbit, email, telp, alamat) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat')");
			
			// Redirect to penerbit page after insertion
			header("Location: penerbit.php");
		}
	?>
</body>
</html>
